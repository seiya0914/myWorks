@extends('app')

@section('content')

    <div class="panel-body">
        <form action="{{url('addvehicle')}}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}
            <div>
                @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif
            </div>

            <div class="form-group">
                <label for="locationID" class="col-sm-3 control-label">Location</label>
                <div class="col-sm-6">
                    <select name="locationID" class="selectpicker" data-live-search="true">
                        @foreach($location as $l)
                            <option value="{{$l->id}}">{{$l->suburb}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="form-group">
                <label for="rateID" class="col-sm-3 control-label">Rate</label>
                <div class="col-sm-6">
                    <input type="text" name="rate" id="task-name" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label form="rego" class="col-sm-3 control-label">Registration No</label>

                <div class="col-sm-6">
                    <input type="text" name="rego" id="task-name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label form="make" class="col-sm-3 control-label">Make</label>

                <div class="col-sm-6">
                    <input type="text" name="make" id="task-name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label form="model" class="col-sm-3 control-label">Model</label>

                <div class="col-sm-6">
                    <input type="text" name="model" id="task-name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label form="year" class="col-sm-3 control-label">Year</label>

                <div class="col-sm-6">
                    <input type="text" name="year" id="task-name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label form="transmission" class="col-sm-3 control-label">Transmission</label>

                <div class="col-sm-6">
                    <select name="transmission" class="selectpicker">
                        <option value="Automatic" selected="selected">Automatic</option>
                        <option value="Manual">Manual</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label form="seating" class="col-sm-3 control-label">Seating</label>

                <div class="col-sm-6">
                    <input type="text" name="seating" id="task-name" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i>
                        Add Vehicle
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