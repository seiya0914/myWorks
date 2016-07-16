@extends('app')
@section('content')

<div class="panel panel-default")>
		<div class="panel-heading">
			<h1>Customers</h1>
		</div>
	</div>
<div class="panel-body">
<form action="searchCustomer" method="GET">
    <label for="key"><h2>Search</h2></label>
    <input type="text" class="form-control" name="key" placeholder="Enter keyword to search booking...">
    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    <div style="display:inline"> <h2>Keyword:<strong><i>{{$keyword}}</i></strong></h2></div>
</form>

	<div>
		<a href="addcustomer" class="btn btn-primary btn-lg"><i class="fa fa-plus"></i>Register a Customer</a>
	</div>
	<table id="customerTable" class="table table-striped task-table">
		<thead>
			<th>ID</th>
			<th>Name</th>
			<th>Address</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>License No</th>
			<th>Created At</th>
			<th>Updated At</th>
		</thead>
		<tbody>
			@foreach($customer as $c)
			<tr> 
				<td class="table-text"><div>{{$c->id}}</div></td>
				<td class="table-text"><div>{{$c->name}}</div></td>
				<td class="table-text"><div>{{$c->address}}</div></td>
				<td class="table-text"><div>{{$c->email}}</div></td>
				<td class="table-text"><div>{{$c->mob}}</div></td>
				<td class="table-text"><div>{{$c->license}}</div></td>
				<td class="table-text"><div>{{$c->created_at}}</div></td>
				<td class="table-text"><div>{{$c->updated_at}}</div></td>
				<td>
					<form action="/deletecustomer/{{$c->id}}" method="POST">
						{{csrf_field()}}
                        {{method_field("DELETE")}}
						<button type="submit" class="btn btn-danger delete">
                            <i class="fa fa-btn fa-trash"></i>
                            Delete
                        </button>

					</form>
					{{--<input type="hidden" id="customerID" value="{{$c->id}}">--}}
					{{--<button class="btn btn-danger" data-toggle="modal" data-target="#confirmModal">Delete</button>--}}
				</td>
				<td>
					<form action="/updatecustomer/{{$c->id}}" method="GET">
						{{csrf_field()}}
                        {{method_field("UPDATE")}}
						<button type="submit" class="btn btn-danger">
                            <i class="fa fa-btn fa-refresh"></i>
                            Update
                        </button>
				
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div>
		<a href="addcustomer" class="btn btn-primary btn-lg"><i class="fa fa-plus"></i>Register a Customer</a>
	</div>
	
	

</div>
@stop
@section('script')
	<script>//the script is for the confirm box if the delete button is clicked.
		$('.delete').click(function(){
			return confirm("Are you sure?");
		});
	</script>
@stop

