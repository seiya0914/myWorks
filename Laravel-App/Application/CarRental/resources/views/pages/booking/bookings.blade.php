@extends('app')

@section('content')
<div class="panel panel-default")>
    <div class="panel-heading">
        <h1>Bookings</h1>
    </div>
</div>


<div class="panel-body">
<form action="searchBooking" method="GET">
    <label for="key"><h2>Search</h2></label>
    <input type="text" class="form-control" name="key" placeholder="Enter keyword to search booking...">
    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    <div style="display:inline"> <h2>Keyword:<strong><i>{{$keyword}}</i></strong></h2></div>
</form>
    <table class="table table-striped task-table">
        <thead>
            <th>ID</th>
            <th>Customer</th>
            <th>Vehicle</th>
            <th>Pick Up</th>
            <th>Return</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Returned?</th>

        </thead>
        <tbody>
            <tr> 
                @foreach($jointable as $j)
                <td class="table-text">
                    <div>{{$j->id}}</div>
                </td>
                <td class="table-text">
                    <div>{{$j->name}}</div>
                </td>
                <td class="table-text">
                    <div>{{$j->model}}</div>
                </td>
                <td class="table-text">
                    <div>{{$j->pickup}}</div>
                </td>
                <td class="table-text">
                    <div>{{$j->return}}</div>
                </td>
                <td class="table-text">
                    <div>{{$j->created_at}}</div>
                </td>
                <td class="table-text">
                    <div>{{$j->updated_at}}</div>
                </td>
                <td class="table-text">
                    <div>
                        @if($j->returned=='return')
                            <form action="return" method="POST">
                            {!!csrf_field()!!}
                                <button class="btn btn-primary delete"><i class="fa fa-mail-reply"></i>Return</button>
                                <input type="hidden" name="id" value="{{$j->id}}">
                            </form>
                        @else
                            <button class="btn btn-default disabled ">Returned</button>
                        @endif
                    </div>
                </td>
                <td>
                    <form action="deletebooking/{{$j->id}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger delete">
                        <i class="fa fa-trash"></i>Delete</button>

                    </form>
                </td>
                <td>
                    <form action="updatebooking/{{$j->id}}" method="GET">
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
        <a href="addbooking" class="btn btn-primary" data-toggle="confirmation-singleton"><i class="fa fa-plus"></i>Add Booking</a>
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