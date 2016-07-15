@extends('app')

@section('content')
    <div class="container">
        <h1 class="page-header" align="center">Add a Location</h1>
        <div class="jumbotron" style="background-color:rgba(0,0,0,0.1);">
            <div style="margin-left=25%; margin-right=25%;">
                <form action="{{url('addlocation')}}" method="POST" class="form-horizontal" style="margin-bottom: 30px; margin-left:25%; margin-right:25%;" >
                    {!!csrf_field()!!}
                    <div>
                        @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="street" class="control-label">Street</label>
                        <input type="text" name="street" id="task-name" class="form-control" placeholder="Enter street name...">
                    </div>
                    <div class="form-group">
                        <label for="suburb" class="control-label">Suburb:</label>
                        <input type="text" name="suburb" id="task-name" class="form-control" placeholder="Enter suburb...">
                    </div>
                    <div class="form-group">
                        <label for="desc" class="control-label">Description:</label>
                        <textarea name="desc" id="task-name" class="form-control" placeholder="Enter Description..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="zip" class="control-label">Zip Code:</label>
                        <input type="number" name="zip" id="task-name" class="form-control" placeholder="Enter zip code...">
                    </div>
                    <div class="form-group">
                        <label for="lon" class="control-label">Longtitude:</label>
                        <input type="text" name="lon" id="task-name" class="form-control" placeholder="Enter longtitude...">
                    </div>
                    <div class="form-group">
                        <label for="lat" class="control-label">Latitude:</label>
                        <input type="text" name="lat" id="task-name" class="form-control" placeholder="Enter latitude...">
                    </div>
                    <div align="center">
                        <button type="submit" class="btn btn-primary btn-lg">Add Location</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection