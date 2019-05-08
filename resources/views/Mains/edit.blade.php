@extends('layouts.app')
@section('content')
@if(Session::has ('error'))
<div class="row">
    <div class="alert alert-danger alert-dismissible col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Warning!</strong> {{  Session::get('error') }}
    </div>
</div>
@endif
@if(Session::has ('success'))
<div class="row">
    <div class="alert alert-danger alert-dismissible col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> {{  Session::get('success') }}
    </div>
</div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Profile</div>

                <div class="panel-body">
                    <form class="form-horizontal" id="edit-profile" method="POST" action="{{route('update')}}">
                        
                        {{ csrf_field() }}
                         <input type="hidden" name="id" value="{{$user->id}}"> 

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" >

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                           
                            <div class="col-md-6">
                                <input id="password"  type="password" class="form-control hidden" name="password" value="{{ $user->password}}" >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
