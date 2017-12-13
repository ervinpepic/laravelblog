@extends('layouts.admin')



@section('content')

    <h1 class="lead">Media</h1>

    @if($photos)
        <table class="table">
            <thead>
            <tr>
                <th>Photo ID</th>
                <th>Name</th>
                <th>Created at</th>
            </tr>
            </thead>
            <tbody>

            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img height="50" src="{{$photo->file}}"></td>
                    <td>{{$photo->created_at ? $photo->created_at : 'No info.'}}</td>
                    <td>

                        {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminMediaController@destroy', $photo->id]]) !!}


                        <div class="form-group">
                            {!! Form::submit('Delete photo', ['class'=>'btn btn-danger']) !!}
                        </div>

                        {!! Form::close() !!}

                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
    @endif
@endsection