@extends('layouts.layoutAdmin')
@section('custom')
    <div class="container mt-5 d-flex justify-content-center ">
        <div class="row col-lg-8 mt-5  ">


            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success!</strong> Indicates a successful or positive action.
                </div>
            @endif


            <form action="{{ url('submit') }}" class='mt-5 shadow-lg p-3 mb-5 bg-body rounded ' method='POST'
                enctype="multipart/form-data">
                @csrf
                <div id="preview" class="text-center">
                </div>
                <div class="mb-2">
                    <label for="name" class="form-label  justify-content-start">Book Name </label>
                    <input type="text" value="{{ old('book_name') }}" name="book_name" class="form-control  "
                        id="name" aria-describedby="emailHelp">

                    <span class='text-danger'>
                        @error('book_name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="mb-2">
                    <label for="roll" class="form-label">Book Author</label>
                    <input type="text" value="{{ old('book_author') }}" name="book_author" class="form-control"
                        id="roll">
                    <span class='text-danger'>
                        @error('book_author')
                            {{ $message }}
                        @enderror
                    </span>

                </div>

                <div class="mb-2">
                    <label for="image" class="form-label">Book Image</label>

                    <input type="file" value="{{ old('bookImage') }}" onchange="getImagePreview(event)" name="bookImage"
                        class="form-control" id="image">
                    <span class='text-danger'>
                        @error('bookImage')
                            {{ $message }}
                        @enderror
                    </span>

                </div>

                <button type="submit" class=" btn btn-primary ">Submit</button>

            </form class='mt-5'>
        </div>
    </div>
    <script>
        function getImagePreview(event) {
            var image = URL.createObjectURL(event.target.files[0]);
            var imagediv = document.getElementById('preview');
            var newimg = document.createElement('img');
            imagediv.innerHTML = '';
            newimg.src = image;
            newimg.width = "200";
            newimg.height = "150";
            // newimg.{{ old('bookImage') }}
            imagediv.appendChild(newimg);
        }
    </script>
@endsection
