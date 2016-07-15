<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\Booking;
use Illuminate\Support\Facades\Input;

class BookingController extends Controller
{
    function displayAllBookings()
	{
		$jointable = DB::table('booking')->join('vehicle', 'vehicle.id', '=', 'booking.vehicle')->join('customer', 'customer.id', '=', 'booking.customer')->select('booking.id', 'booking.pickup', 'booking.return', 'customer.name', 'vehicle.model', 'booking.created_at', 'booking.updated_at','booking.returned')->get();

		return view('pages/booking/bookings', ['jointable' => $jointable])->with('keyword',"");
	}

    function displayForm()
    {
    	$c = DB::table('customer')->orderBy('id','asc')->get();
    	$v = DB::table('vehicle')->where('availability','=','1')->orderBy('id','asc')->get();

    	return view('pages/booking/register')->with('customer',$c)->with('vehicle',$v);
    }

    function saveRecord(Request $r)
    {
		$this->validate($r,[
			'vehicle' => 'required',
			'customer' => 'required',
			'pickup' => 'required|date:true',
			'return' => 'required|date:true'
		]);
    	$b = new Booking;

    	$b->vehicle = $r->vehicle;
    	$b->customer = $r->customer;
    	$b->pickup = $r->pickup;
    	$b->return = $r->return;

    	$b->save();

    	return redirect('bookings');
    }

    function deleteBooking($id)
    {
    	Booking::findOrFail($id)->delete();

    	return redirect('bookings');
    }

    function displayEditForm(Booking $booking)
    {

    	$c = DB::table('customer')->orderBy('id','asc')->get();
    	$v = DB::table('vehicle')->where('availability','=','1')->orderBy('id','asc')->get();

    	return view('pages/booking/updateForm')->with('booking',$booking)->with('customer',$c)->with('vehicle',$v);

    }
    function update(Request $r)
    {
		$this->validate($r,[
			'vehicle' => 'required',
			'customer' => 'required',
			'pickup' => 'required|date:true',
			'return' => 'required|date:true'
		]);
    	$b = Booking::find($r->id);
    	$b->vehicle = $r->vehicle;
    	$b->customer = $r->customer;
    	$b->pickup = $r->pickup;
    	$b->return = $r->return;

    	$b->save();

    	return redirect('bookings');

    }

	function searchBooking(Request $r)
	{
		//the codes below looks for records that are similar to the searching keyword entered. It will search with all the columns the table has.
		//So the user can search a record whatever keyword they want
		$jointable = DB::table('booking')->join('vehicle','vehicle.id','=','booking.vehicle')->join('customer','customer.id','=','booking.customer')
			->select('booking.id','booking.pickup','booking.return','customer.name','vehicle.model','booking.created_at','booking.updated_at','booking.returned')
			->where('customer.name','like', '%'.$r->key.'%')
			->orWhere('booking.id','like', '%'.$r->key.'%')
			->orWhere('booking.pickup','like', '%'.$r->key.'%')
			->orWhere('booking.return','like', '%'.$r->key.'%')
			->orWhere('vehicle.model','like', '%'.$r->key.'%')
			->orWhere('booking.created_at','like', '%'.$r->key.'%')
			->orWhere('booking.updated_at','like', '%'.$r->key.'%')
            ->orWhere('booking.returned','like', '%'.$r->key.'%')->get();

		return view('pages/booking/bookings')->with('jointable',$jointable)->with('keyword',$r->key);
	}

    function returnCar(Request $r)
    {
        $b = Booking::find($r->id);
            $b->returned = 'returned';

            $b->save();

            return redirect('bookings');
    }
}
