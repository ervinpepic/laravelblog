@extends('layouts.blog-post')



@section('content')




    <h1 class="mt-4">{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by
        <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p>Posted on {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    @if(Session::has('comment_message'))

        {{session('comment_message')}}

    @endif

    <!-- Post Content -->
    <p class="lead">{{$post->body}}</p>



    <blockquote class="blockquote">
    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
    <footer class="blockquote-footer">Someone famous in
    <cite title="Source Title">Source Title</cite>
    </footer>
    </blockquote>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam
    sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur
    ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui,
    necessitatibus, est!</p>

    <hr>









    <!-- Comments Form -->
    @if(Auth::check())

        <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">


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
        </div>
    @endif


    @if(count($comments) > 0)

        @foreach($comments as $comment)

    <div class="media">
        <a class="pull-left" href="#">
            <img height="64" width="64" class="media-object" src="{{$comment->photo}}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at}}</small>
            </h4>
            {{$comment->body}}
        </div>
    </div>


        @endforeach

    @endif



            <div class="media">
                <a class="pull-left" href="#">
                    <img height="64" width="64" class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Naslov
                        <small>Datum</small>
                    </h4>
                tijelo


                <!-- Nested Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Nested Start Bootstrap
                                <small>August 25, 2014 at 9:30 PM</small>
                            </h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                            commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce
                            condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>
                    <!-- End Nested Comment -->
                </div>

            </div>


@endsection