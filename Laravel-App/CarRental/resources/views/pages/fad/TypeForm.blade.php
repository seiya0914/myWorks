@extends('app')

@section('content')

    <div class="panel-body">
        <form action="{{url('addFADType')}}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}
            <div>
                @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="typename" class="col-sm-3 control-label">Type Name</label>

                <div class="col-sm-6">
                    <input type="text" name="typename">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Add FAD Type
                    </button>
                </div>
            </div>
        </form>



    </div>

@endsection