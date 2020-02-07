@extends('layouts/admin')
@section('title')@endsection
@section('content')
    <!-- Main content -->
    @include('includes.errors')
    <section class="content">
        <div class="col-md-6 offset-md-3">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">New User</h3>
                </div>
                {!! Form::open(['files'=>'true','route'=>['admin.users.store', 'method'=>'POST']]) !!}
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
                        {!! Form::select('role_id', [''=>'Select role'] + $roles, 0, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('active', 'Is active:') !!}
                        {!! Form::select('active', [0 =>'No active', 1 =>'Active'], 0, ['class'=>'form-control']) !!}
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
    </section>
    <!-- /.content -->
@endsection
