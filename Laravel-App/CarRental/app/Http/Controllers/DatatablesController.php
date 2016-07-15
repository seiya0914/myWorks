<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Yajra\Datatables\Datatables;

class DatatablesController extends Controller
{
//    public function getAddEditRemoveColumn()
//    {
//        return view('pages.datatables');
//    }
//
//    public function getAddEditRemoveColumnData()
//    {
//        $users = User::select(['id', 'name', 'email', 'password', 'created_at', 'updated_at'])->get();
//
//        return Datatables::of($users)
//            ->addColumn('action', function ($user) {
//                return '<a href="#edit-'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
//            })
//            ->editColumn('id', 'ID: {{$id}}')
//            ->removeColumn('password')
//            ->make(true);
//    }

//    public function getBasic(Builder $htmlBuilder)
//    {
//
//        $html = $htmlBuilder
//            ->addColumn(['data' => 'id', 'name' => 'id', 'title' => 'Id'])
//            ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Name'])
//            ->addColumn(['data' => 'email', 'name' => 'email', 'title' => 'Email'])
//            ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'])
//            ->addColumn(['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Updated At']);
//
//        return view('pages.datatables', compact('html'));
//    }

//    /**
//     * Displays datatables front end view
//     *
//     * @return \Illuminate\View\View
//     */
    public function getIndex()
    {
        return view('pages.datatables');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return Datatables::of(User::query())->make(true);
    }
}
