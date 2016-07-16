@extends('app')

@section('content')

<div class="panel-headding">
	<h1>Add a customer</h1>
</div>

<div class="panel-body">
	<form action="{{url('addCust')}}" method="POST" class="form-horizontal">
		{!!csrf_field()!!}

		<div class="form-group">
			<label for="name" class="col-sm-3 control-label">Customer Name</label>

			<div class="col-sm-6">
				<input type='text' name="name" id="task-name" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label for="Address" class="col-sm-3 control-label">Customer Address</label>

			<div class="col-sm-6">
				<input type='text' name="Address" id="task-name" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label for="mobile" class="col-sm-3 control-label">Customer Mobile No</label>

			<div class="col-sm-6">
				<input type='text' name="mobile" id="task-name" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label for="email" class="col-sm-3 control-label">Customer Email</label>

			<div class="col-sm-6">
				<input type='email' name="email" id="task-name" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label for="license" class="col-sm-3 control-label">Customer Driver's License No</label>

			<div class="col-sm-6">
				<input type='text' name="license" id="task-name" class="form-control">
			</div>
		</div>
		

		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-6">
				<button type='submit' class="btn btn-default">
				<i class="fa fa-plus">
				</i>Add Customer
				</button>
			</div>
		</div>
	</form>
</div>

@endsection