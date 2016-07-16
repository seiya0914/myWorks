@extends('app')

@section('content')

    <div class="panel-body">
        <form action="{{url('addFAD')}}" method="POST" class="form-horizontal">
            <div>
                @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif
            </div>
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="booking" class="col-sm-3 control-label">Booking</label>
                <div class="col-sm-6">
                    <select name="booking" class="selectpicker" data-live-search="true">
                        @foreach($booking as $b)
                            <option value="{{$b->id}}">{{$b->id}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="type" class="col-sm-3 control-label">Type</label>
                <div class="col-sm-6">
                    <select name="type" class="selectpicker" data-live-search="true">
                        @foreach($fadtype as $ft)
                            <option value="{{$ft->id}}">{{$ft->typename}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label form="desc" class="col-sm-3 control-label">Description</label>

                <div class="col-sm-6">
                    <textarea name="desc" id="task-name" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Add FAD
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