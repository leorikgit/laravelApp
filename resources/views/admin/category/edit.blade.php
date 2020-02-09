@extends('layouts/admin')
@section('title')@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">New Category</h3>
                        </div>
                        {!! Form::model($category, ['method'=>'PATCH','route'=>['admin.category.update', $category->id]]) !!}
                        <div class="card-body">
                            <div class="form-group">
                                {!! Form::label('category', 'Category:') !!}
                                {!! Form::text('name', null,['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>

                </div>

            </div>
            <!-- /.row -->
        </div>
    </section>
    <!-- /.content -->
@endsection
