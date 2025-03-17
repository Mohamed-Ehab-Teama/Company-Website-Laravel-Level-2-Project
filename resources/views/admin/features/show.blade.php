@extends('admin.master')

@section('title', __('keywords.show_feature'))


@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-4">
                <div class="col">
                    <h2 class="h5 page-title"> {{__('keywords.features')}}! </h2>
                </div>
            </div>

            <div class="card-body">
                <div class="row">

                    <!-- Title -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <x-form-lable field="title"></x-form-lable>
                            <label for="title" class="form-control"> {{ $feature->name }} </label>
                        </div>
                    </div>

                    <!-- Icon -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <x-form-lable field="icon"></x-form-lable>
                            <label for="icon" class="form-control"> {{ $feature->icon }} </label>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <x-form-lable field="description"></x-form-lable>
                            <label for="description" class="form-control"> {{ $feature->description }} </label>
                        </div>
                    </div>
                </div>

                <!-- Go Back Button -->
                <x-go-back-button href="{{ route('admin.features.index') }}" ></x-go-back-button>

            </div>


        </div>
    </div>

    @endsection