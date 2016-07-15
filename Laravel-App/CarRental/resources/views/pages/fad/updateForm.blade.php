@extends('app')

@section('content')
    <div class="container">
        <h1 class="page-header" align="center">Update</h1>
        <div class="jumbotron" style="background-color:rgba(0,0,0,0.1);">
            <div style="margin-left=25%; margin-right=25%;">
                <form action="{{url('updateFAD')}}" method="POST" class="form-horizontal" style="margin-bottom: 30px; margin-left:25%; margin-right:25%;" >
                    {!!csrf_field()!!}
                    <div>
                        @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="booking" class="control-label">Booking:</label>
                        <select name="booking">
                            @foreach($booking as $b)
                            <option value="{{$b->id}}">{{$b->id}}</option>   
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="type" class="control-label">Type:</label>
                        <select name="type">
                            @foreach($fadtype as $ft)
                            <option value="{{$ft->id}}">{{$ft->typename}}</option>   
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="desc" class="control-label">Description:</label>
                        <textarea type="text" name="desc" id="task-name" class="form-control" value="{{$FAD->desc}}" placeholder="Enter description...">{{$FAD->desc}}</textarea>
                    </div>
                    <input type="hidden" name="id" value="{{$FAD->id}}">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i>Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection