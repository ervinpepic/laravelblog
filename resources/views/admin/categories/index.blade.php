@extends('layouts.admin')


@section('content')

    <h1 class="lead">Categories</h1>

    <div class="col-sm-6">


        @if($categories)

            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'No date...'}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        @endif

    </div>

    <div class="col-sm-6">

        {!! Form::open(['method'=>'POST', 'action'=> 'AdminCategoriesController@store']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Category name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Add', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@endsection


