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

    	return view('pages/vehicle/vehicles',['jointable'=>$jointable]);
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
}
