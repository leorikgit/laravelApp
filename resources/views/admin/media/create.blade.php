@extends('layouts/admin')
@section('title')@endsection
@section('customStyles')<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">@endsection
@section('content')
    <!-- Main content -->
    @include('includes.errors')
    <section class="content">
        <div class="col-md-6 offset-md-3">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">New images</h3>
                </div>

                <div class="card-body">
                    {!! Form::open(['files'=>'true','route'=>['admin.media.store', 'method'=>'POST'], 'class'=>['dropzone']]) !!}

                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
