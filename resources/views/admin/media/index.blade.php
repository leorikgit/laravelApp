@extends('layouts/admin')
@section('title')@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Media</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Orginal name</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Size</th>
                                <th>Created</th>
                                <th>Updated</th>
                            </tr>
                            </thead>
                            <tbody>

                                @if($images)
                                    @foreach($images as $image)
                                        <tr>
                                            <td>{{$image->id}}</td>
                                            <td><img width="100" src="{{$image->path}}"></img></td>
                                            <td>{{$image->name}}</td>
                                            <td>{{$image->orginal_name}}</td>
                                            <td>{{$image->type}}</td>
                                            <td>{{$image->size}}</td>
                                            <td>{{$image->created_at->diffforhumans()}}</td>
                                            <td>{{$image->updated_at->diffforhumans()}}</td>
                                            <td>
                                                {!! Form::open(['method'=>'DELETE','route'=>['admin.media.destroy', $image->id]]) !!}
                                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
        </div>
    </section>
    <!-- /.content -->
@endsection
