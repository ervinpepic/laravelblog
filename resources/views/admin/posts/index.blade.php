@extends('layouts.admin')



@section('content')

    @if(Session::has('post_delete'))

        <p class="bg-danger">{{session('post_delete')}}</p>

    @endif

    <h1>Posts</h1>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Created by</th>
            <th>Category</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Body</th>
            <th>Post</th>
            <th>Comments in posts</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category ? $post->category->name : 'Other'}}</td>
                    <td><img height="50" src="{{$post->photo_id ? $post->photo->file : 'http://placehold.it/400x400'}}"></td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
                    <td>{{str_limit($post->body, 10)}}</td>
                    <td><a href="{{route('home.post', $post->slug)}}">Go to post</a></td>
                    <td><a href="{{route('admin.comments.show', $post->id)}}">Go to Comment</a></td>
                    <td>{{$post->created_at->diffForhumans()}}</td>
                    <td>{{$post->updated_at->diffForhumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>

@endsection