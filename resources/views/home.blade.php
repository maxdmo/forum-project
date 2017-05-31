@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Username Form input -->
<div class="form-group">
    {{ Form::label('username', 'Username:') }}
    {{ Form::text('username', null, ['class' => 'form-control']) }}
</div>

<!-- Userpassword Form input -->
<div class="form-group">
    {{ Form::label('userpassword', 'Userpassword:') }}
    {{ Form::password('userpassword', ['class' => 'form-control']) }}
</div>