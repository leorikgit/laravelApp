@extends('layouts/admin')
@section('title')@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Users</h3>

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
                                <th>Avatar</th>
                                <th>Role</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Created</th>
                                <th>Updated</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @if($users)
                                    @foreach($users as $user)
                                        <td>{{$user->id}}</td>
                                        <td><img width="100" src="{{$user->avatar ? $user->avatar->name : 'No avatar'}}"></img></td>
                                        <td>{{$user->role->name}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->password}}</td>
                                        <td>{{$user->created_at->diffforhumans()}}</td>
                                        <td>{{$user->updated_at->diffforhumans()}}</td>
                                        <td><a href="{{route('admin.users.edit', $user->id)}}">Edit</a></td>
                                        <td>
                                            {!! Form::open(['method'=>'DELETE','route'=>['admin.users.destroy', $user->id]]) !!}
                                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    @endforeach
                                @endif
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
@endsection
