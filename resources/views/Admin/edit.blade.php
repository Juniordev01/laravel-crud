@extends('layouts.layoutAdmin')
@section('custom')
<div class="container mt-5 d-flex justify-content-center ">
    <div class="row col-lg-8 mt-5  ">


    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> Indicates a successful or positive action.
        </div>
        @endif
        <form action="{{url('update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div  id="preview" class="text-center ">
                <img src='{{"/public/uploads/".$data['Pic']}}'
                    width='150px' height='150px' />
                <input type="hidden" name="id" value={{$data["id"]}} id="">
            </div>
            <div class="mb-2">
                <label for="name" class="form-label  justify-content-start">Book Name </label>
                <input type="text" name="book_name"  value="{{$data['BookName']}}" class="form-control" id="name"
                    aria-describedby="emailHelp">

                <span class='text-danger'>@error('book_name'){{$message}}@enderror</span>
            </div>

            <div class="mb-2">
                <label for="roll" class="form-label">Author Name</label>
                <input type="text" name="book_author" value="{{$data['BookAuthor']}}" class="form-control" id="roll">
                <span class='text-danger'>@error('book_author'){{$message}}@enderror</span>

            </div>

            <div class="mb-2">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" name="bookImage" onchange="getImagePreview(event)" value="{{"/public/uploads/".$data['p_image']}}"
                    class="form-control" id="image">
                <span class='text-danger'>@error('bookImage'){{$message}}@enderror</span>
            </div class='d-flex '>

            <button type="submit" class=" btn btn-primary ">Update</button>
            <div>
        </form>
    </div>
</div>
@endsection