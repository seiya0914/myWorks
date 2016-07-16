<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\Fad;

use App\FADType;

use App\Booking;

class FadController extends Controller
{
    function displayAllFAD()
    {
    	$jointable = DB::table('fad')->join('fadtype','fad.type','=','fadtype.id')->join('booking','booking.id','=','fad.booking')->join('customer','customer.id','=','booking.customer')->select('fad.id','fad.desc','fadtype.typename','fad.booking','fad.created_at','fad.updated_at','customer.name')->get();

    	return view('pages/fad/fads',['jointable'=>$jointable])->with('keyword',"");;
    }

    function displayForm()
    {
    	$ft = DB::table('FADType')->orderBy('id','asc')->get();
        $b = DB::table('booking')->orderBy('id','asc')->get();

    	return view('pages/fad/register',['fadtype'=>$ft],['booking'=>$b]);
    }

    function addFAD(Request $r)
    {
        $this->validate($r,[
            'booking' => 'required',
            'desc' => 'required',
            'type' => 'required'
        ]);
    	$f = new FAD;
        $f->booking = $r->booking;
    	$f->desc = $r->desc;
    	$f->type = $r->type;

    	$f->save();

    	return redirect('FAD');
    }

    function deleteFAD($id)
    {
    	Fad::findOrFail($id)->delete();

    	return redirect('FAD');
    }

    function displayEditForm(FAD $FAD)
    {
    	$ft = FADType::orderBy('created_at','asc')->get();
        $b = Booking::orderBy('created_at','asc')->get();

    	return view('pages/fad/updateForm',['fadtype'=>$ft],['booking'=>$b])->with('FAD',$FAD);
    }

    function update(Request $r)
    {
        $f = FAD::find($r->id);
        $this->validate($r,[
            'booking' => 'required',
            'desc' => 'required',
            'type' => 'required'
        ]);
        $f->booking = $r->booking;
        $f->type = $r->type;
        $f->desc = $r->desc;

        $f->save();

        return redirect('FAD');
    }

    function searchFAD(Request $r)
    {
        //the codes below looks for records that are similar to the searching keyword entered. It will search with all the columns the table has.
        //So the user can search a record whatever keyword they want
        $jointable = DB::table('fad')->join('fadtype','fad.type','=','fadtype.id')->join('booking','booking.id','=','fad.booking')->join('customer','customer.id','=','booking.customer')->select('fad.id','fad.desc','fadtype.typename','fad.booking','fad.created_at','fad.updated_at','customer.name')
            ->where('customer.name','like', '%'.$r->key.'%')
            ->orWhere('fad.id','like', '%'.$r->key.'%')
            ->orWhere('fad.desc','like', '%'.$r->key.'%')
            ->orWhere('fadtype.typename','like', '%'.$r->key.'%')
            ->orWhere('fad.booking','like', '%'.$r->key.'%')
            ->orWhere('fad.created_at','like', '%'.$r->key.'%')
            ->orWhere('fad.updated_at','like', '%'.$r->key.'%')->get();

        return view('pages/fad/fads')->with('jointable',$jointable)->with('keyword',$r->key);
    }

    function displayTypeForm()
    {
        return view('pages/fad/TypeForm');
    }

    function addType(Request $r)
    {
        $f = new FADType;
        $this->validate($r,[
            'typename' => 'required',
        ]);
        $f->typename = $r->typename;

        $f->save();

        return redirect('FAD');
    }

}
