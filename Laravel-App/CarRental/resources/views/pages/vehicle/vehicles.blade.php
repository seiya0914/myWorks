@extends('app')

@section('content')
<div class="panel panel-default")>
        <div class="panel-heading">
            <h1>Vehicles</h1>
        </div>
    </div>
<div class="panel-body">
    <table class="table table-striped task-table">
        <thead>
            <th>ID</th>
            <th>Registration No</th>
            <th>Make</th>
            <th>Model</th>
            <th>Year</th>
            <th>Transmission</th>
            <th>Seating</th>
            <th>Location</th>
            <th>Rate</th>
            <th>Created At</th>
            <th>Updated At</th>
        </thead>
        <tbody>
            <tr> 
                @foreach($jointable as $j)
                <td class="table-text">
                    <div>{{$j->id}}</div>
                </td>
                <td class="table-text">
                    <div>{{$j->rego}}</div>
                </td>
                <td class="table-text">
                    <div>{{$j->make}}</div>
                </td>
                <td class="table-text">
                    <div>{{$j->model}}</div>
                </td>
                <td class="table-text">
                    <div>{{$j->year}}</div>
                </td>
                <td class="table-text">
                    <div>{{$j->transmission}}</div>
                </td>
                <td class="table-text">
                    <div>{{$j->seating}}</div>
                </td>
                <td class="table-text">
                    <div>{{$j->suburb}}</div>
                </td>
                <td class="table-text">
                    <div>{{$j->rate}}</div>
                </td>
                <td class="table-text">
                    <div>{{$j->created_at}}</div>
                </td>
                <td class="table-text">
                    <div>{{$j->updated_at}}</div>
                </td>
                <td>
                    @if($j->availability)
                        <form action="retire" method="POST">
                            {!!csrf_field()!!}
                                <button class="btn btn-danger delete"><i class="fa fa-ban"></i>Retire</button>
                                <input type="hidden" name="id" value="{{$j->id}}">
                            </form>
                    @else
                        <button class="btn btn-default disabled ">Retired</button>
                    @endif
                </td>
                <td>
                    <form action="deletevehicle/{{$j->id}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger delete">
                        <i class="fa fa-trash"></i>Delete</button>

                    </form>
                </td>
                <td>
                    <form action="updatevehicle/{{$j->id}}" method="GET">
                        {{csrf_field()}}
                        {{method_field('UPDATE')}}
                        <button type="submit" class="btn btn-danger">
                        <i class="fa fa-refresh"></i>Update</button>
                    </form>
                </td>
            </tr>
                @endforeach
        </tbody>
    </table>
    <div>
        <a href="addvehicle" class="btn btn-primary" data-toggle="confirmation-singleton"><i class="fa fa-plus"></i>Add Vehicle</a>
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