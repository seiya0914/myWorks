@extends('app')

@section('content')
    <div class="container">
        <h1 class="page-header" align="center">Update</h1>
        <div class="jumbotron" style="background-color:rgba(0,0,0,0.1);">
            <div>
                @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif
            </div>
            <div style="margin-left=25%; margin-right=25%;">
                <form action="{{url('updatevehicle')}}" method="POST" class="form-horizontal" style="margin-bottom: 30px; margin-left:25%; margin-right:25%;" >
                    {!!csrf_field()!!}
                    <div class="form-group">
                        <label for="locationID" class="control-label">Location:</label>
                        <select name="locationID">
                            @foreach($location as $l)
                                <option value="{{$l->id}}">{{$l->suburb}}</option>
                            @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="rate">Rate:</label>
                        <input type="text" name="rate" id="task-name" class="form-control" value="{{$vehicle->rate}}" placeholder="Enter vehicle's rate...">
                    </div>
                    <div class="form-group">
                        <label for="rego" class="control-label">Registration No:</label>
                        <input type="text" name="rego" id="task-name" class="form-control" value="{{$vehicle->rego}}" placeholder="Enter registration no...">
                    </div>
                    <div class="form-group">
                        <label for="make" class="control-label">Make:</label>
                        <input type="text" name="make" id="task-name" class="form-control" value="{{$vehicle->make}}" placeholder="Enter make...">
                    </div>
                    <div class="form-group">
                        <label for="model" class="control-label">Model:</label>
                        <input type="text" name="model" id="task-name" class="form-control" value="{{$vehicle->model}}" placeholder="Enter model...">
                    </div>
                    <div class="form-group">
                        <label for="year" class="control-label">Year:</label>
                        <input type="text" name="year" id="task-name" class="form-control" value="{{$vehicle->year}}" placeholder="Enter year...">
                    </div>
                    <div class="form-group">
                        <label for="transmission" class="control-label">Transmimssion:</label>
                        <select name="transmission">
                            <option value="Automatic">Automatic</option>
                            <option value="Manual">Manual</option>
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="seating" class="control-label">Seating:</label>
                        <input type="text" name="seating" id="task-name" class="form-control" value="{{$vehicle->seating}}" placeholder="Enter seating...">
                    </div>
                    <div align="center">
                        <button type="submit" class="btn btn-primary btn-lg">Update Vehicle</button>
                    </div>
                    <input type="hidden" name="id" value="{{$vehicle->id}}">

                </form>
            </div>
        </div>
    </div>
@endsection