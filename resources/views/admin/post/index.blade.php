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
                        <h3 class="card-title">Posts</h3>

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
                                <th>Category</th>
                                <th>User</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Created</th>
                                <th>Updated</th>
                            </tr>
                            </thead>
                            <tbody>

                                @if($posts)
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td><img width="100" src="{{$post->image ? $post->image->path : 'No avatar'}}"></img></td>
                                            <td>{{$post->category->name}}</td>
                                            <td>{{$post->user->name}}</td>
                                            <td>{{$post->title}}</td>
                                            <td>{{$post->content}}</td>
                                            <td>{{$post->created_at->diffforhumans()}}</td>
                                            <td>{{$post->updated_at->diffforhumans()}}</td>
                                            <td><a href="{{route('home.post', $post->id)}}">View Post</a></td>
                                            <td><a href="{{route('admin.comments.show', $post->id)}}">View comments</a></td>
                                            <td><a href="{{route('admin.posts.edit', $post->id)}}">Edit</a></td>
                                            <td>
                                                {!! Form::open(['method'=>'DELETE','route'=>['admin.posts.destroy', $post->id]]) !!}
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
