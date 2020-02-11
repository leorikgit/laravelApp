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
                            <h3 class="card-title">Comments</h3>

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
                        @if($comments)

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Post</th>
                                        <th>User</th>
                                        <th>Content</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $comment)
                                        <tr>
                                            <td>{{$comment->id}}</td>
                                            <td>{{$comment->post->title}}</td>
                                            <td>{{$comment->user->name}}</td>
                                            <td>{{$comment->content}}</td>
                                            <td>{{$comment->created_at->diffforhumans()}}</td>
                                            <td>{{$comment->updated_at->diffforhumans()}}</td>
                                            <td><a href="{{route('home.post', $comment->post_id)}}">View Post</a></td>
                                            <td>
                                                @if($comment->status == 0)
                                                    {!! Form::open(['method'=>'PATCH', 'route'=>['admin.comments.update', $comment->id]]) !!}
                                                    {!! Form::hidden('status', 1) !!}
                                                    {!! Form::submit('Approve',['class'=>'btn btn-success']) !!}
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
                                                                                <h3 class="card-title">Comments</h3>

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
                                                                            @if($comments)

                                                                                <div class="card-body table-responsive p-0">
                                                                                    <table class="table table-hover">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th>ID</th>
                                                                                            <th>Post</th>
                                                                                            <th>User</th>
                                                                                            <th>Content</th>
                                                                                            <th>Created</th>
                                                                                            <th>Updated</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                        @foreach($comments as $comment)
                                                                                            <tr>
                                                                                                <td>{{$comment->id}}</td>
                                                                                                <td>{{$comment->post->title}}</td>
                                                                                                <td>{{$comment->user->name}}</td>
                                                                                                <td>{{$comment->content}}</td>
                                                                                                <td>{{$comment->created_at->diffforhumans()}}</td>
                                                                                                <td>{{$comment->updated_at->diffforhumans()}}</td>
                                                                                                <td><a href="{{route('home.post', $comment->post_id)}}">View Post</a></td>
                                                                                                <td>
                                                                                                    @if($comment->status == 0)
                                                                                                        {!! Form::open(['method'=>'PATCH', 'route'=>['admin.comments.update', $comment->id]]) !!}
                                                                                                        {!! Form::hidden('status', 1) !!}
                                                                                                        {!! Form::submit('Approve',['class'=>'btn btn-success']) !!}
                                                                                                        {!! Form::close() !!}
                                                                                                    @else
                                                                                                        {!! Form::open(['method'=>'PATCH', 'route'=>['admin.comments.update', $comment->id]]) !!}
                                                                                                        {!! Form::hidden('status', 0) !!}
                                                                                                        {!! Form::submit('Un-Approve', ['class'=>'btn btn-warning']) !!}
                                                                                                        {!! Form::close() !!}
                                                                                                    @endif
                                                                                                </td>
                                                                                                <td>
                                                                                                    {!! Form::open(['method'=>'DELETE','route'=>['admin.comments.destroy', $comment->id]]) !!}
                                                                                                    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                                                                                    {!! Form::close() !!}
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach

                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            @else
                                                                                <h1>NO COMMENTS</h1>

                                                                        @endif
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
                                                    {!! Form::close() !!}
                                                @else
                                                    {!! Form::open(['method'=>'PATCH', 'route'=>['admin.comments.update', $comment->id]]) !!}
                                                    {!! Form::hidden('status', 0) !!}
                                                    {!! Form::submit('Un-Approve', ['class'=>'btn btn-warning']) !!}
                                                    {!! Form::close() !!}
                                                @endif
                                            </td>
                                            <td>
                                                {!! Form::open(['method'=>'DELETE','route'=>['admin.comments.destroy', $comment->id]]) !!}
                                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        @else
                            <h1>NO COMMENTS</h1>

                    @endif
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
