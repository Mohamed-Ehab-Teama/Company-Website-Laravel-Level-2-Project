@extends('admin.master')

@section('title', __('keywords.edit_company'))


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-4">
                    <div class="col">
                        <h2 class="h5 page-title"> {{ __('keywords.companies') }}! </h2>
                    </div>

                </div>

                <form action=" {{ route('admin.companies.update', ['company' => $company]) }} " method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row">

                            <!-- Image -->
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <x-form-lable field="image"></x-form-lable>
                                    <input type="file" id="image" class="form-control-file" name="image">
                                </div>
                                <x-error-message field="image" ></x-error-message>
                            </div>


                        </div>

                        <!-- Submit -->
                        <div>
                            <x-submit-button text="{{ __('keywords.edit_company') }}"></x-submit-button>
                        </div>

                        <!-- Go Back Button -->
                        <div>
                            <x-go-back-button href="{{ route('admin.companies.index') }}"></x-go-back-button>
                        </div>

                </form>


            </div>
        </div>

    @endsection
