@extends('layouts.admin')



@section('content')

<h1 class="lead">Media</h1>

@if($photos)
<form action="delete/media" method="POST" accept-charset="utf-8" class="form-inline">{{csrf_field()}}{{method_field('delete')}}

    <div class="form-group">
        <select name="checkBoxArray" class="form-control">
            <option value="">Delete</option>
        </select>
    </div>

    <div class="form-group">

        <input type="submit" name="delete_all" class="btn btn-danger" value="Delete">
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th><input type="checkbox" id="options"></th>
                <th>Photo ID</th>
                <th>Name</th>
                <th>Created at</th>
            </tr>
        </thead>
        <tbody>

            @foreach($photos as $photo)
            <tr>
                <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                <td>{{$photo->id}}</td>
                <td><img height="50" src="{{$photo->file}}"></td>
                <td>{{$photo->created_at ? $photo->created_at : 'No info.'}}</td>
                <td>


                    <input type="hidden" name="photo" value="{{$photo->id}}">

                    <div class="form-group">
                        <input type="submit" name="delete_single" value="Delete" class="btn btn-danger">
                    </div>

                    

                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>
</form>
@endif

@section('scripts')

<script>
    $(document).ready(function(){

        $('#options').click(function(){

            if (this.checked) {

                $('.checkBoxes').each(function(){

                    this.checked = true;

                });

            } else {

                $('.checkBoxes').each(function(){
                    this.checked = false;

                });  
            }
        });

        console.log('glavna konzole')

    });

</script>

@endsection


@endsection