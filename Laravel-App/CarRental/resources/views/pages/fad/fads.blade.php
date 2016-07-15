@extends('app')

@section('content')
<div class="panel panel-default")>
        <div class="panel-heading">
            <h1>Faults & Damages</h1>
        </div>
    </div>
<div class="panel-body">
<form action="searchFAD" method="GET">
    <label for="key"><h2>Search</h2></label>
    <input type="text" class="form-control" name="key" placeholder="Enter keyword to search FAD...">
    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    <div style="display:inline"> <h2>Keyword:<strong><i>{{$keyword}}</i></strong></h2></div>
</form>
    <table class="table table-striped task-table">
        <thead>
            <th>ID</th>
            <th>Booking</th>
            <th>Description</th>
            <th>Type</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Customer</th>
        </thead>
        <tbody>
                @foreach($jointable as $j)
            <tr> 
                <td class="table-text">
                    <div>{{$j->id}}</div>
                </td>
                <td class="table-text">
                    <div>{{$j->booking}}</div>
                </td>
                <td class="table-text">
                    <div>{{$j->desc}}</div>
                </td>
                <td class="table-text">
                    <div>{{$j->typename}}</div>
                </td>
                <td class="table-text">
                    <div>{{$j->created_at}}</div>
                </td>
                <td class="table-text">
                    <div>{{$j->updated_at}}</div>
                </td>
                <td class="table-text">
                    <div>{{$j->name}}</div>
                </td>
                <td>
                    <form action="deleteFAD/{{$j->id}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger delete">
                        <i class="fa fa-trash"></i>Delete</button>

                    </form>
                </td>
                <td>
                    <form action="updateFAD/{{$j->id}}" method="GET">
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
        <a href="addFAD" class="btn btn-primary" data-toggle="confirmation-singleton"><i class="fa fa-plus"></i>Add FAD</a>
        <a href="addFADType" class="btn btn-primary" data-toggle="confirmation-singleton"><i class="fa fa-plus"></i>Add FAD Type</a>

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