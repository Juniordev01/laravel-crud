@extends('layouts.layoutAdmin')
@section('custom')
<div class="container-fluid  d-flex justify-content-center">
    <div class="row col-lg-8 ">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                    </div>
                </div>
                <div class="card-body">
                    <div class="row ">
                       <div class = "d-flex justify-content-center">
                       <img src='{{"/public/uploads/".$data->Pic}}' width='450px' height='350px' alt="" class=" rounded">
                       </div>
                    </div>
                    <hr class="horizontal dark">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label"> Book Name</label>
                                <p>{{$data->BookName}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Book Author</label>
                                <p>{{$data->BookAuthor}}</p>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection