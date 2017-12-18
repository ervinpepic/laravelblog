@extends('layouts.blog-post')

@section('content')

<!-- Blog Post -->

<!-- Title -->
<h1>{{$post->title}}</h1>

<!-- Author -->
<p class="lead">
  by <a href="#">{{$post->user->name}}</a>
</p>

<hr>

<!-- Date/Time -->
<p><span class="glyphicon glyphicon-time"></span> {{$post->created_at->diffForHumans()}}</p>

<hr>

<!-- Preview Image -->
<img class="img-responsive" src="{{$post->photo->file}}" alt="">

<hr>
@if(Session::has('comment_message'))

{{session('comment_message')}}

@endif

<!-- Post Content -->
<p class="lead">{{$post->body}}</p>

<hr>

<!-- Blog Comments -->

<!-- Comments Form -->
@if(Auth::check())
<div class="well">

  <h4>Leave a Comment:</h4>
  {!! Form::open(['method'=>'POST', 'action'=> 'PostCommentController@store']) !!}

  <input type="hidden" name="post_id" value="{{$post->id}}">

  <div class="form-group">
    {!! Form::label('body', 'Comment text') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>'3']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Leave a comment', ['class'=>'btn btn-primary']) !!}
</div>

{!! Form::close() !!}

</div>
@endif

<hr>

<!-- Posted Comments -->

@if(count($comments) > 0)

@foreach($comments as $comment)

<!-- Comment -->
<div class="media">
  <a class="pull-left" href="#">
    <img height="64" width="64" class="media-object" src="{{Auth::user()->gravatar}}" alt="">
</a>
<div class="media-body">
    <h4 class="media-heading">{{$comment->author}}
      <small>{{$comment->created_at->diffForHumans()}}</small>
  </h4>
  {{$comment->body}}
   <div class="comment-reply-container">

      <button class="toggle-reply btn btn-primary pull-right">Reply</button>

      <div class="comment-reply">
        {!! Form::open(['method'=>'POST', 'action'=> 'CommentRepliesController@createReply']) !!}


        <div class="form-group">
          <input type="hidden" name="comment_id" value="{{$comment->id}}">
          <br>
          <br>
          {!! Form::label('body', 'Reply text') !!}
          {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>'3']) !!}
        </div>

        <div class="form-group">
          {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
      </div>

</div>

  <!-- Nested Comment -->
  @if(count($comment->replies) > 0)

  @foreach($comment->replies as $reply)
  
  @if($reply->is_active == 1)

  <div class="media">
      <a class="pull-left" href="#">
        <img height="64" width="64" class="media-object" src="{{$reply->photo}}" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">{{$reply->author}}
          <small>{{$reply->created_at->diffForHumans()}}</small>
      </h4>
      {{$reply->body}}
  </div>
</div>

@endif 

@endforeach

@endif

<!-- End Nested Comment -->
</div>
</div>

@endforeach

@endif

@section('scripts')

<script>
  $(".comment-reply-container .toggle-reply").click(function () {

    $(this).next().slideToggle("slow");

});
</script>

@endsection
@endsection









