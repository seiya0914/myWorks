@extends('app')

@section('content')
    <div class="container">
        <h1 class="page-header" align="center">Update</h1>
        <div class="jumbotron" style="background-color:rgba(0,0,0,0.1);">
            <div style="margin-left=25%; margin-right=25%;">
                <form action="{{url('updatelocation')}}" method="POST" class="form-horizontal" style="margin-bottom: 30px; margin-left:25%; margin-right:25%;" >
                    {!!csrf_field()!!}
                    <div>
                        @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="street" class="control-label">Street:</label>
                        <input type="text" name="street" id="task-name" class="form-control" value="{{$location->street}}" placeholder="Enter street...">
                    </div>
                    <div class="form-group">
                        <label for="suburb" class="control-label">Suburb:</label>
                        <input type="text" name="suburb" id="task-name" class="form-control" value="{{$location->suburb}}" placeholder="Enter suburb...">
                    </div>
                    <div class="form-group">
                        <label for="desc" class="control-label">Description:</label>
                        <textarea name="desc" id="task-name" class="form-control" value="{{$location->desc}}" placeholder="Enter description..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="zip" class="control-label">Zip Code:</label>
                        <input type="text" name="zip" id="task-name" class="form-control" value="{{$location->zip}}" placeholder="Enter zip code...">
                    </div>
                    <div class="form-group">
                        <label for="lon" class="control-label">Longtitude:</label>
                        <input type="text" name="lon" id="task-name" class="form-control" value="{{$location->lon}}" placeholder="Enter longtitude...">
                    </div>
                    <div class="form-group">
                        <label for="lat" class="control-label">Latitude:</label>
                        <input type="text" name="lat" id="task-name" class="form-control" value="{{$location->lat}}" placeholder="Enter lotitude...">
                    </div>
                    <div align="center">
                        <button type="submit" class="btn btn-primary btn-lg">Update Location</button>
                    </div>
                    <input type="hidden" name="id" value="{{$location->id}}">

                </form>
            </div>
        </div>
    </div>
@endsection