@extends('app')

@section('content')
    <div class="container">
        <h1 class="page-header" align="center">Update</h1>
        <div class="jumbotron" style="background-color:rgba(0,0,0,0.1);">

            <div style="margin-left=25%; margin-right=25%;">
                <form action="{{url('updatebooking')}}" method="POST" class="form-horizontal" style="margin-bottom: 30px; margin-left:25%; margin-right:25%;" >
                    {!!csrf_field()!!}
                    <div>
                        @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="customer" class="col-sm-3 control-label">Customer</label>
                        <div class="col-sm-6">
                            <select name="customer">
                                @foreach($customer as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="vehicle" class="col-sm-3 control-label">Vehicle</label>
                        <div class="col-sm-6">
                            <select name="vehicle">
                                @foreach($vehicle as $v)
                                    <option value="{{$v->id}}">{{$v->model}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="pickup" class="col-sm-3 control-label">Pick Up</label>

                        <div class="col-sm-6">
                            <input type="date" name="pickup" id="task-name" value='{{$booking->pickup}}' class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="return" class="col-sm-3 control-label">Return</label>

                        <div class="col-sm-6">
                            <input type="text" name="return" id="task-name" value="{{$booking->return}}" class="form-control">
                        </div>
                    </div>
                    <div align="center">
                        <button type="submit" class="btn btn-primary btn-lg">Update Booking</button>
                    </div>
                    <input type="hidden" name="id" value="{{$booking->id}}">

                </form>
            </div>
        </div>
    </div>
@endsection