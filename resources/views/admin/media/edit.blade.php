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
                        <img  width="300" src="{{$image->path}}"></img>
                    </div>

                </div>
                <div class="col-md-5 offset-1 ">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Image: {{$image->name}}</h3>
                        </div>
                        {!! Form::open(['files'=>'true','method'=>'PATCH', 'route'=>['admin.media.update', $image->id]]) !!}
                        <div class="card-body">
                            <div class="form-group">
                                {!! Form::label('name', 'Name:') !!}
                                {!! Form::text('name', null, ['class'=>'form-control']) !!}
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
