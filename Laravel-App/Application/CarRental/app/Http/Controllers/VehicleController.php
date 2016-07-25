<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\location;

use App\rate;

use App\vehicle;

class VehicleController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    function displayAllVehicles()
    {
    	$jointable = DB::table('vehicle')->join('location','vehicle.location',"=","location.id")->select('vehicle.id','vehicle.rego','vehicle.make','vehicle.model','vehicle.year','vehicle.transmission','vehicle.seating','location.suburb','vehicle.rate','vehicle.created_at','vehicle.updated_at','vehicle.availability')->get();

    	return view('pages/vehicle/vehicles',['jointable'=>$jointable])->with('keyword',"");
    }

    function displayForm(Request $r)
    {
    	$l = location::orderBy('created_at','asc')->get();

    	return view('pages/vehicle/register',['location'=>$l]);
    }

    function saveRecord(Request $r)
    {
    	$v = new vehicle;
		$this->validate($r,[
			'rego' => 'required|unique:vehicle',
			'make' => 'required',
			'model' => 'required',
			'year' => 'required|numeric:true',
			'seating' => 'required|numeric:true',
			'rate' => 'required|numeric:true'
		]);
    	$v->rego = $r->rego;
    	$v->make = $r->make;
    	$v->model = $r->model;
    	$v->year = $r->year;
    	$v->transmission = $r->transmission;
    	$v->seating = $r->seating;
    	$v->location = $r->locationID;
		$v->rate = $r->rate;

    	$v->save();

    	return redirect('/vehicles/');
    }

    function deleteVehicle($id)
    {
    	vehicle::findOrFail($id)->delete();

    	return redirect('/vehicles/');
    }

    function displayEditForm(vehicle $vehicle)
    {
    	$l = location::orderBy('created_at','asc')->get();
    	return view('pages/vehicle/updateForm',['location'=>$l])->with('vehicle',$vehicle);
    }

    function update(Request $r)
    {
    	$v = vehicle::find($r->id);
		$this->validate($r,[
			'rego' => 'required',
			'make' => 'required',
			'model' => 'required',
			'year' => 'required|numeric:true',
			'seating' => 'required|numeric:true',
			'rate' => 'required|numeric:true'
		]);
    	$v->rego = $r->rego;
    	$v->make = $r->make;
    	$v->model = $r->model;
    	$v->year = $r->year;
    	$v->transmission = $r->transmission;
    	$v->seating = $r->seating;
    	$v->location = $r->locationID;
    	$v->rate = $r->rate;

    	$v->save();

    	return redirect('/vehicles');
    }

    function retire(Request $r)
    {
        $b = vehicle::find($r->id);
            $b->availability = 0;

            $b->save();

            return redirect('vehicles');
    }

    function searchVehicle(Request $r)
    {
        

        //the codes below looks for records that are similar to the searching keyword entered. It will search with all the columns the table has.
        //So the user can search a record whatever keyword they want
        $jointable = DB::table('vehicle')->join('location','location.id','=','vehicle.location')
            ->select('vehicle.id','vehicle.rego','vehicle.make','vehicle.model','vehicle.year','vehicle.transmission','vehicle.rate','vehicle.seating','location.suburb','vehicle.availability','vehicle.created_at','vehicle.updated_at')
            ->where('vehicle.availability','=',$r->vehicleSorting)
            ->orWhere('vehicle.id','like', '%'.$r->key.'%')
            ->orWhere('vehicle.rego','like', '%'.$r->key.'%')
            ->orWhere('vehicle.make','like', '%'.$r->key.'%')
            ->orWhere('vehicle.model','like', '%'.$r->key.'%')
            ->orWhere('vehicle.year','like', '%'.$r->key.'%')
            ->orWhere('vehicle.transmission','like', '%'.$r->key.'%')
            ->orWhere('vehicle.seating','like', '%'.$r->key.'%')
            ->orWhere('location.suburb','like', '%'.$r->key.'%')
            ->orWhere('vehicle.rate','like','%'.$r->key.'%')
            ->get();

        return view('pages/vehicle/vehicles')->with('jointable',$jointable)->with('keyword',$r->key);
    }

}
