<?php

namespace App\Http\Controllers;

use App\location;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;


class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function displayAllLocations()
    {
    	$l = DB::table('location')->orderBy('id','asc')->get();

    	return view('pages/location/locations',['location'=>$l])->with('keyword',"");
    }

    function displayForm(Request $r)
    {
    	return view('pages/location/register');
    }

    function saveRecord(Request $r)
    {
        $this->validate($r,[
            'street' => 'required',
            'suburb' => 'required',
            'desc' => 'required',
            'zip' => 'required|digits:4',
            'lon' => 'required|numeric',
            'lat' => 'required|numeric'
        ]);
    	$l = new location;
    	$l->street = $r->street;
    	$l->suburb = $r->suburb;
    	$l->desc = $r->desc;
    	$l->zip = $r->zip;
    	$l->lon = $r->lon;
    	$l->lat = $r->lat;

    	$l->save();

    	return redirect('/locations/');
    }

    function deleteLocation($id)
    {
    	location::findOrFail($id)->delete();

    	return redirect('/locations/');
    }

    function displayEditForm(location $location)
    {
    	return view('pages/location/updateForm')->with('location',$location);
    }

    function update(Request $r)
    {
    	$l = location::find($r->id);
        $this->validate($r,[
            'street' => 'required',
            'suburb' => 'required',
            'desc' => 'required',
            'zip' => 'required|digits:4',
            'lon' => 'required|numeric',
            'lat' => 'required|numeric'
        ]);
        $l->street = $r->street;
        $l->suburb = $r->suburb;
        $l->desc = $r->desc;
        $l->zip = $r->zip;
        $l->lon = $r->lon;
        $l->lat = $r->lat;

        $l->save();

        return redirect('/locations/');
    }

    function searchLocation(Request $r)
    {
        //the codes below looks for records that are similar to the searching keyword entered. It will search with all the columns the table has.
        //So the user can search a record whatever keyword they want
       $l = DB::table('location')->orderBy('id','asc')
            ->where('street','like', '%'.$r->key.'%')
            ->orWhere('id','like', '%'.$r->key.'%')
            ->orWhere('suburb','like', '%'.$r->key.'%')
            ->orWhere('desc','like', '%'.$r->key.'%')
            ->orWhere('zip','like', '%'.$r->key.'%')
            ->orWhere('lon','like', '%'.$r->key.'%')
            ->orWhere('lat','like', '%'.$r->key.'%')->get();

        return view('pages/location/locations')->with('location',$l)->with('keyword',$r->key);
    }

}
