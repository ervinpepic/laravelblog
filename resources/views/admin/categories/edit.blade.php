@extends('layouts.admin')


@section('content')

    <h1 class="lead">Categories</h1>


    <div class="col-sm-6">

        {!! Form::model($category, ['method'=>'PATCH', 'action'=> ['AdminCategoriesController@update', $category->id]]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Category name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">

            {!! Form::submit('Update data', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminCategoriesController@update', $category->id], 'class'=>'pull-right']) !!}

            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

        </div>
    </div>

@endsection


