@extends('layouts.layoutAdmin')
@section('custom')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Bootstrap Simple Data Table</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />


        <script>
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </head>

    <body>
        <div class="container-fluide d-flex">
            @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success!</strong> Data Updated Successfully
                </div>
            @endif

            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <article class="filter-group">
                            <header class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse_aside2" data-abc="true"
                                    aria-expanded="false" class="collapsed">
                                    <i class="icon-control fa fa-chevron-down"></i>
                                    <h6 class="title">Price </h6>
                                </a>
                            </header>
                            <div class="filter-content collapse" id="collapse_aside2" style="">
                                <div class="card-body">
                                    <form action="{{ url('date_filter') }}" method="POST">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Min</label>
                                                <input class="form-control" name='start_date' placeholder="YYYY-MM-DD."
                                                    type="date">
                                            </div>
                                            <div class="form-group text-right col-md-6">
                                                <label>Max</label>
                                                <input class="form-control" name='end_date' placeholder="YYYY-MM-DD."
                                                    type="date">
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <button class="highlight-button btn btn-medium button xs-margin-bottom-five"
                                                type="submit">Apply Now</button>
                                            <a href="{{route('display')}}"
                                                class="highlight-button btn btn-medium button xs-margin-bottom-five"
                                                data-abc="true">Reset</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </article>


                    </div>

                </div>
                <div class="col-lg-8">
                    {{-- <div class="table-responsive"> --}}
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h2>Books Details</h2>
                                </div>
                                <div class="col-sm-4">
                                    <form action="{{ url('search') }}" method="post">
                                        @csrf
                                        <div class="d-flex">
                                            <input type="text" name="query" class="form-control"
                                                placeholder="Enter book Name&hellip;">
                                            <button class="material-symbols-outlined shadow-none btn" type="reset">close
                                            </button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class='text-center'>Sr</th>
                                    <th class='text-center'>Book Name </th>
                                    <th class='text-center'>Book Author</th>
                                    <th class='text-center'>Pics </th>
                                    <th class='text-center'>Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                    <tr>
                                        <td class='text-center'>{{ $loop->iteration }}</td>
                                        <td class='text-center'>{{ $data->BookName }}</td>
                                        <td class='text-center'>{{ $data->BookAuthor }}</td>

                                        <td class='text-center'> <img src='{{ 'public/uploads/' . $data['Pic'] }}'
                                                width='50px' height='50' /> </td>

                                        <td>
                                            <a href="{{ url('view_detail', $data->id) }}" class="view" title="View"
                                                data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                            <a href="{{ url('edit', $data->id) }}" class="edit" title="Edit"
                                                data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                            <a href="{{ url('delete', $data->id) }}" class="delete" title="Delete"
                                                data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- </div> --}}

            </div>

        </div>
    </body>

    </html>
@endsection
