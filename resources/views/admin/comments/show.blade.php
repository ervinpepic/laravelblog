@extends('layouts.admin')



@section('content')

    <h1 class="lead">Comments</h1>
@if($comments)



        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Commented by</th>
                <th>Comment text</th>
                <th>Post</th>
                <th>Status of showing</th>
                <th>Actions</th>

            </tr>
            </thead>
            <tbody>

            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{str_limit($comment->body, 55)}}</td>
                    <td><a href="{{route('home.post', $comment->post->id)}}">View in post</a></td>
                    <td>

                        @if($comment->is_active == 1)

                            {!! Form::open(['method'=>'PATCH', 'action'=> ['PostCommentController@update', $comment->id]]) !!}

                            <input type="hidden" name="is_active" value="0">

                            <div class="form-group">
                                {!! Form::submit('Un-Approve', ['class'=>'btn btn-success']) !!}
                            </div>

                            {!! Form::close() !!}

                        @else

                            {!! Form::open(['method'=>'PATCH', 'action'=> ['PostCommentController@update', $comment->id]]) !!}

                            <input type="hidden" name="is_active" value="1">

                            <div class="form-group">
                                {!! Form::submit('Approve', ['class'=>'btn btn-info']) !!}
                            </div>

                            {!! Form::close() !!}

                        @endif

                    </td>

                    <td>


                        {!! Form::open(['method'=>'DELETE', 'action'=> ['PostCommentController@destroy', $comment->id]]) !!}

                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>

                        {!! Form::close() !!}
                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>


    @else
        <h1 class="text-center">No comments</h1>

@endif

@endsection