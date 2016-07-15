@extends('app')

@section('content')
    <div class="container">
        <h1 class="page-header" align="center">Update</h1>
        <div class="jumbotron" style="background-color:rgba(0,0,0,0.1);">

            <div style="margin-left=25%; margin-right=25%;">
                <form action="{{url('updatecustomer')}}" method="POST" class="form-horizontal" style="margin-bottom: 30px; margin-left:25%; margin-right:25%;" >
                    {!!csrf_field()!!}
                    <div>
                        @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label">Name:</label>
                        <input type="text" name="name" id="task-name" class="form-control" value="{{$customer->name}}" placeholder="Enter name...">
                    </div>
                    <div class="form-group">
                        <label for="mob" class="control-label">Mobile:</label>
                        <input type="text" name="mob" id="task-name" class="form-control" value="{{$customer->mob}}" placeholder="Enter mobile No...">
                    </div>
                    <div class="form-group">
                        <label for="license" class="control-label">License No:</label>
                        <input type="text" name="license" id="task-name" class="form-control" value="{{$customer->license}}" placeholder="Enter License No...">
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label">Email:</label>
                        <input type="email" name="email" id="task-name" class="form-control" value="{{$customer->email}}" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                        <label for="address" class="control-label">Address:</label>
                        <input type="text" name="address" id="task-name" class="form-control" value="{{$customer->address}}" placeholder="Enter Email Address...">
                    </div>
                    <div align="center">
                        <button type="submit" class="btn btn-primary btn-lg">Update Customer</button>
                    </div>
                    <input type="hidden" name="id" value="{{$customer->id}}">

                </form>
            </div>
        </div>
    </div>
@endsection