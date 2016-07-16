@extends('app')

@section('content')

    <div class="panel-body">


        <form action="{{url('addbooking')}}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}
            <div>
                @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="customer" class="col-sm-3 control-label">Customer</label>
                <div class="col-sm-6">
                    <select name="customer" class="selectpicker" data-live-search="true">
                        @foreach($customer as $c)
                            <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="vehicle" class="col-sm-3 control-label">Vehicle</label>
                <div class="col-sm-6">
                    <select name="vehicle" class="selectpicker" data-live-search="true">
                        @foreach($vehicle as $v)
                            <option value="{{$v->id}}">{{$v->model}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="pickup" class="col-sm-3 control-label">Pick Up</label>

                <div class="col-sm-6">
                    <input type="date" name="pickup" id="task-name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="return" class="col-sm-3 control-label">Return</label>

                <div class="col-sm-6">
                    <input type="date" name="return" id="task-name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i>
                        Add Booking
                    </button>
                </div>
            </div>
        </form>



    </div>

@stop

@section('script')

        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/i18n/defaults-*.min.js"></script>
@stop