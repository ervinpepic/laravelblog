@extends('layouts.admin')



@section('content')

@include('includes.tinyeditor')

    <h1>Post Edit</h1>



    <div class="row">

        <div class="col-sm-2">

            <img src="{{$post->photo ? $post->photo->file : $post->photoPlaceholder() }}" alt="" class="img-responsive" style="padding-top: 82px" >

        </div>

        <div class="col-sm-10">


            {!! Form::model($post, ['method'=>'PATCH', 'action'=> ['AdminPostsController@update', $post->id], 'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Post photo:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('body', 'Post text:') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">

                {!! Form::submit('Update data', ['class'=>'btn btn-primary']) !!}

                {!! Form::close() !!}

                {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminPostsController@destroy', $post->id],'class'=>'pull-right']) !!}

                {!! Form::submit('Delete post', ['class'=>'btn btn-danger']) !!}

            </div>

        </div>

        {!! Form::close() !!}

    </div>

    <div class="row">
        @include('includes.form_error')
    </div>

@endsection