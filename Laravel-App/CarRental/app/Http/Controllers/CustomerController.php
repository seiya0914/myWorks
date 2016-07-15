<?php

namespace App\Http\Controllers;

use App\Customer;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Validator;

use Input;




class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//this function is to prevent a user from CRUD in the system without logging in
    }

    function displayAllCustomers()
    {
    	$c = DB::table('customer')->orderBy('id','asc')->get();

        return view('pages/customer/customers',['customer'=>$c])->with('keyword',"");
    }

    function displayForm(Request $request)
    {
    	return view('pages/customer/register');
    }

    function saveRecord(Request $r)
    {
        $this->validate($r,[
            'name' => 'required',
            'mob' => 'required|digits:10',
            'licese' => 'required|digits:10',
            'email' => 'required|email|unique:customer',
            'address' => 'required|required',
        ]);
        	$c = new Customer;
        	$c->name = $r->name;
        	$c->mob = $r->mob;
        	$c->license = $r->license;
        	$c->email = $r->email;
        	$c->address = $r->address;
        	$c->save();
        // }   
    	return redirect('/customers/');
    }

    function deleteCustomer($id)
    {
		//the parameter of this function is binded by routemodel binding feature
		
        Customer::findOrFail($id)->delete();
		//Laravel attempt to find a customer object from Customer Model, then run the delete()
		//function to delete the particular record from the database
        return redirect('/customers/');
    }

    function displayEditForm(customer $customer)
    {
        return view('pages/customer/updateForm')->with('customer',$customer);
    }

    function update(Request $r)
    {
        $this->validate($r,[
            'name' => 'required',
            'mob' => 'required|digits:10',
            'license' => 'required|digits:10',
            'email' => 'required|email|unique:customer',
            'address' => 'required|required',
        ]);
        $c = Customer::find($r->id);
        $c->name = $r->name;
        $c->mob = $r->mob;
        $c->license = $r->license;
        $c->email = $r->email;
        $c->address = $r->address;
        $c->save();

        return redirect('/customers/');
    }

    function searchCustomer(Request $r)
    {
        //the codes below looks for records that are similar to the searching keyword entered. It will search with all the columns the table has.
        //So the user can search a record whatever keyword they want
       $c = DB::table('customer')->orderBy('id','asc')
            ->where('name','like', '%'.$r->key.'%')
            ->orWhere('id','like', '%'.$r->key.'%')
            ->orWhere('mob','like', '%'.$r->key.'%')
            ->orWhere('license','like', '%'.$r->key.'%')
            ->orWhere('email','like', '%'.$r->key.'%')
            ->orWhere('address','like', '%'.$r->key.'%')->get();

        return view('pages/customer/customers')->with('customer',$c)->with('keyword',$r->key);
    }
}
