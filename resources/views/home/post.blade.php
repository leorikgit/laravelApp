@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">
            <!-- Title -->
            <h1 class="mt-4">{{$post->title}}</h1>
            <!-- Author -->
            <p class="lead">by<a href="#">{{$post->user->name}}</a></p>
            <hr>
            <!-- Date/Time -->
            <p>Posted {{$post->created_at->diffForHumans()}}</p>
            <hr>
            <!-- Preview Image -->
            <img class="img-fluid rounded" src="{{$post->image->path}}" alt="">
            <hr>
            {{$post->body}}
            <hr>
            @if(Auth::check())
                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                        {!! Form::open( ['method'=>'POST', 'route'=>['user.post.comment.store']]) !!}
                        {!! Form::hidden('post_id', $post->id) !!}
                        <div class="form-group">
                            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('submit', ['class' => ' btn btn-secondary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            @endif
            <!-- Single Comment -->
            @if(count($post->comments) > 0)
               @foreach($post->comments as $comment)
                    <div class="media mb-4">
                        <img height="64" class="d-flex mr-3 rounded-circle" src="{{$comment->user->avatar ? $comment->user->avatar->name : $comment->user->gravatar}}" alt="">
                        <div class="media-body">
                            <h5 class="mt-0">{{$comment->user->name}} ({{ $comment->created_at->diffForHumans() }})</h5>
                            {{$comment->content}}
                            <button class="show-replay-textarea float-right btn btn-outline-secondary">Replay</button>
                            <div class="replay-comment col-sm-10" style="display: none;margin-top: 20px">
                                {!! Form::open( ['method'=>'POST', 'route'=>['user.comment.replay.store']]) !!}
                                {!! Form::hidden('comment_id', $comment->id) !!}
                                <div class="form-group">
                                    {!! Form::textarea('body', null, ['class' => 'form-control', 'rows'=>'2']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::submit('replay', ['class' => ' btn btn-secondary']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                            @foreach($comment->replays as $replay)
                                <div class="media mt-4">
                                    <img height="64" class="d-flex mr-3 rounded-circle" src="{{$replay->user->avatar ? $replay->user->avatar->name : $replay->user->gravatar}}" alt="">
                                    <div class="media-body">
                                        <h5 class="mt-0">{{$comment->user->name}} ({{ $comment->created_at->diffForHumans() }})</h5>
                                        {{$comment->content}}
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
               @endforeach
            @endif

            </div>
                <!-- Comment with nested comments -->

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
                    </div>
                </div>
            </div>
            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">Web Design</a>
                                </li>
                                <li>
                                    <a href="#">HTML</a>
                                </li>
                                <li>
                                    <a href="#">Freebies</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">JavaScript</a>
                                </li>
                                <li>
                                    <a href="#">CSS</a>
                                </li>
                                <li>
                                    <a href="#">Tutorials</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Side Widget</h5>
                <div class="card-body">
                    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

@endsection
@section('scripts')
    <script>
        $( document ).ready(function() {
            $('.show-replay-textarea').on('click', function($event){
                $(this).next().slideToggle('slow');
            })
        });


    </script>
@endsection
