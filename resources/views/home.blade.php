@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row"><br><br>
        <div class="col-md-8 col-md-offset-2">
            <br>
            <div class="panel panel-default">
                
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! Your account is:{{auth()->user()->verified() ? 'verified' : 'not verified'}}. 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
