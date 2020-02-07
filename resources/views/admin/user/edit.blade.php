@extends('layouts/admin')
@section('title')@endsection
@section('content')
    <!-- Main content -->
    @include('includes.errors')
    <section class="content">
        <div class="row">
        <div class="col-md-2 offset-2">
            <div class="img-fluid img-thumbnail">
                <img  width="300" src="{{$user->avatar ? $user->avatar->name : 'No image'}}"></img>
            </div>
            <div>
                <p>Status: {{$user->active === 1 ? 'Active' : 'No active'}}</p>
            </div>
        </div>
        <div class="col-md-5 offset-1 ">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit User: {{$user->name}}</h3>
                </div>
                {!! Form::model($user, ['files'=>'true','method'=>'PATCH', 'route'=>['admin.users.update', $user->id]]) !!}
                <div class="card-body">
                    <div class="form-group">
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'Email:') !!}
                        {!! Form::text('email', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', 'Password:') !!}
                        {!! Form::text('password', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('role', 'role:') !!}
                        {!! Form::select('role_id', [''=>'Select role'] + $roles, null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('active', 'Is active:') !!}
                        {!! Form::select('active', [0 =>'No active', 1 =>'Active'], null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::file('file', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
