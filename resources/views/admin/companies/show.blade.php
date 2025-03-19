@extends('admin.master')

@section('title', __('keywords.show_company'))


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-4">
                    <div class="col">
                        <h2 class="h5 page-title"> {{ __('keywords.companies') }}! </h2>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">


                        <!-- image -->
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <x-form-lable field="image"></x-form-lable>
                                <div class=" bg-dark p-3">
                                    <img src="{{ asset("storage/companies/$company->image") }}" alt="" >
                                </div>
                            </div>
                        </div>


                    </div>
                    
                </div>
                
                <!-- Go Back Button -->
                <x-go-back-button href="{{ route('admin.companies.index') }}"></x-go-back-button>
            </div>

        @endsection
