@extends('admin.master')

@section('title', __('keywords.show_service'))


@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-4">
                <div class="col">
                    <h2 class="h5 page-title"> {{__('keywords.services')}}! </h2>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="simpleinput"> {{ __('keywords.service') }} </label>
                            <label for="simpleinput" class="form-control"> {{ $service->name }} </label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="example-helping"> {{ __('keywords.icon') }} </label>
                            <label for="simpleinput" class="form-control"> {{ $service->icon }} </label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="example-email"> {{__('keywords.description')}} </label>
                            <label for="simpleinput" class="form-control"> {{ $service->description }} </label>
                        </div>
                    </div>
                </div>

            <a class="btn btn-warning" href="{{ route('admin.services.index') }}"> Go Back </a>

            </div>


        </div>
    </div>

    @endsection