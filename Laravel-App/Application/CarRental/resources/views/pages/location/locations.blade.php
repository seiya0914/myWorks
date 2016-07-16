@extends('app')

@section('content')
<div class="panel panel-default")>
        <div class="panel-heading">
            <h1>Locations</h1>
        </div>
    </div>
<div class="panel-body">

<form action="searchLocation" method="GET">
    <label for="key"><h2>Search</h2></label>
    <input type="text" class="form-control" name="key" placeholder="Enter keyword to search location...">
    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    <div style="display:inline"> <h2>Keyword:<strong><i>{{$keyword}}</i></strong></h2></div>
</form>
    <table class="table table-striped task-table">
        <thead>
            <th>ID</th>
            <th>Street</th>
            <th>Suburb</th>
            <th>Description</th>
            <th>Zip Code</th>
            <th>Longtitude</th>
            <th>Latitude</th>
            <th>Created At</th>
            <th>Updated At</th>
        </thead>
        <tbody>
            @foreach($location as $l)
            <tr> 
                <td class="table-text">
                    <div>{{$l->id}}</div>
                </td>
                <td class="table-text">
                    <div>{{$l->street}}</div>
                </td>
                <td class="table-text">
                    <div>{{$l->suburb}}</div>
                </td>
                <td class="table-text">
                    <div>{{$l->desc}}</div>
                </td>
                <td class="table-text">
                    <div>{{$l->zip}}</div>
                </td>
                <td class="table-text">
                    <div>{{$l->lon}}</div>
                </td>
                <td class="table-text">
                    <div>{{$l->lat}}</div>
                </td>
                <td class="table-text">
                    <div>{{$l->created_at}}</div>
                </td>
                <td class="table-text">
                    <div>{{$l->updated_at}}</div>
                </td>
                <td>
                    <form action="deletelocation/{{$l->id}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}

                    <button type="submit" class="btn btn-danger delete">
                        <i class="fa fa-trash"></i>Delete
                        </button>
                    </form>
                </td>
                <td>
                    <form action="updatelocation/{{$l->id}}" method="GET">
                    {{csrf_field()}}
                    {{method_field('UPDATE')}}

                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-refresh"></i>Update
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <a href="addlocation" class="btn btn-primary" data-toggle="confirmation-singleton"><i class="fa fa-plus"></i>Add Location</a>
    </div>
    
    

</div>


@endsection
@section('script')
    <script>//the script is for the confirm box if the delete button is clicked.
        $('.delete').click(function(){
            return confirm("Are you sure?");
        });
    </script>
@stop