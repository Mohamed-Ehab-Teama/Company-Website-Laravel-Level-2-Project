@extends('admin.master')

@section('title', __('keywords.show_testimonial'))


@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-4">
                <div class="col">
                    <h2 class="h5 page-title"> {{__('keywords.testimonials')}}! </h2>
                </div>
            </div>

            <div class="card-body">
                <div class="row">

                    <!-- Title -->
                    <div class="col-md-5">
                        <div class="form-group mb-3">
                            <x-form-lable field="name"></x-form-lable>
                            <label for="name" class="form-control"> {{ $testimonial->name }} </label>
                        </div>
                    </div>

                    <!-- position -->
                    <div class="col-md-5">
                        <div class="form-group mb-3">
                            <x-form-lable field="position"></x-form-lable>
                            <label for="position" class="form-control"> {{ $testimonial->position }} </label>
                        </div>
                    </div>
                    
                    <!-- image -->
                    <div class="col-md-2">
                        <div class="form-group mb-3">
                            <x-form-lable field="image"></x-form-lable>
                            <div>
                                <img src="{{ asset("storage/testimonials/$testimonial->image") }}" alt="" width="100px">
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <x-form-lable field="description"></x-form-lable>
                            <label for="description" class="form-control"> {{ $testimonial->description }} </label>
                        </div>
                    </div>
                </div>

                <!-- Go Back Button -->
                <x-go-back-button href="{{ route('admin.testimonials.index') }}" ></x-go-back-button>

            </div>


        </div>
    </div>

    @endsection