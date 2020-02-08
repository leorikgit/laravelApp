@extends('layouts/admin')
@section('title')@endsection
@section('content')
    <!-- Main content -->
    @include('includes.errors')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 offset-2">
                    <div class="img-fluid img-thumbnail">
                        <img  width="300" src="{{$post->image ? $post->image->path : 'No image'}}"></img>
                    </div>

                </div>
                <div class="col-md-5 offset-1 ">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Post: {{$post->title}}</h3>
                        </div>
                        {!! Form::model($post, ['files'=>'true','method'=>'PATCH', 'route'=>['admin.posts.update', $post->id]]) !!}
                        <div class="card-body">
                            <div class="form-group">
                                {!! Form::label('title', 'Title:') !!}
                                {!! Form::text('title', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('body', 'Body:') !!}
                                {!! Form::text('body', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('category', 'Category:') !!}
                                {!! Form::select('category_id', [''=>'Select Category'] + $categories, null, ['class'=>'form-control']) !!}
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
        </div>
    </section>
    <!-- /.content -->
@endsection
