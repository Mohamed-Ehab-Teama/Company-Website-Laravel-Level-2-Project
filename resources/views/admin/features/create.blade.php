@extends('admin.master')

@section('title', __('keywords.create_feature'))


@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-4">
                <div class="col">
                    <h2 class="h5 page-title"> {{__('keywords.features')}}! </h2>
                </div>

            </div>

            <form action=" {{ route('admin.features.store') }} " method="POST">
                @csrf

                <div class="card-body">
                    <div class="row">

                        <!-- Title -->
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <x-form-lable field="title"></x-form-lable>
                                <input type="text" id="title" class="form-control" name="name">
                            </div>
                            <x-error-message field="name"></x-error-message>
                        </div>

                        <!-- Icon -->
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <x-form-lable field="icon"></x-form-lable>
                                <input type="text" id="icon" class="form-control" name="icon">
                            </div>
                            <x-error-message field="icon"></x-error-message>
                        </div>

                        <!-- Description -->
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <x-form-lable field="description"></x-form-lable>
                                <textarea type="email" id="description" class="form-control" name="description"></textarea>
                            </div>
                            <x-error-message field="description"></x-error-message>
                        </div>
                    </div>

                    <!-- Submit -->
                    <x-submit-button text="{{ __('keywords.create_feature') }}"></x-submit-button>
                </div>
            </form>

            <!-- Go Back Button -->
            <x-go-back-button href="{{ route('admin.features.index') }}" ></x-go-back-button>


        </div>
    </div>

    @endsection