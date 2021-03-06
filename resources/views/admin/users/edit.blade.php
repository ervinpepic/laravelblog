@extends('layouts.admin')


@section('content')

    <h1>Change user data</h1>

    <div class="row">

        <div class="col-sm-3">

            <img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt=""
                 class="img-responsive img-circle">

        </div>

        <div class="col-sm-9">


            {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id ], 'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, ['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                {!! Form::select('is_active', array(1 => 'Active', 0=> 'Inactive'), null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('photo_id', 'Upload Image:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role:') !!}
                {!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">

                {!! Form::submit('Update user data', ['class'=>'btn btn-primary']) !!}


                {!! Form::close() !!}


                {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminUsersController@destroy', $user->id], 'class'=>'pull-right']) !!}


                {!! Form::submit('Delete user', ['class'=>'btn btn-danger']) !!}

            </div>

            {!! Form::close() !!}

        </div>

    </div>

    <div class="row col-sm-6">

        @include('includes.form_error')

    </div>



@endsection