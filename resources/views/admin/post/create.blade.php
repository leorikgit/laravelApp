@extends('layouts/admin')
@section('title')@endsection
@section('content')
    <!-- Main content -->
    @include('includes.errors')
    <section class="content">
        <div class="col-md-6 offset-md-3">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Post</h3>
                </div>
                {!! Form::open(['files'=>'true','route'=>['admin.posts.store', 'method'=>'POST']]) !!}
                <div class="card-body">
                    <div class="form-group">
                        {!! Form::label('title', 'Title:') !!}
                        {!! Form::text('title', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('body', 'Content:') !!}
                        {!! Form::text('body', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('category', 'Category:') !!}
                        {!! Form::select('category_id', [''=>'Select category'] + $categories, 0, ['class'=>'form-control']) !!}
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
