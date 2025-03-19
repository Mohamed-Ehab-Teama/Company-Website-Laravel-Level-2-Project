@extends('admin.master')

@section('title', __('keywords.create_testimonial'))


@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-4">
                <div class="col">
                    <h2 class="h5 page-title"> {{__('keywords.testimonials')}}! </h2>
                </div>

            </div>

            <form action=" {{ route('admin.testimonials.store') }} " method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="row">

                        <!-- Name -->
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <x-form-lable field="name"></x-form-lable>
                                <input type="text" id="name" class="form-control" name="name" value="{{old('name')}}">
                            </div>
                            <x-error-message field="name"></x-error-message>
                        </div>

                        <!-- Position -->
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <x-form-lable field="position"></x-form-lable>
                                <input type="text" id="position" class="form-control" name="position" value="{{old('position')}}">
                            </div>
                            <x-error-message field="position"></x-error-message>
                        </div>
                        
                        <!-- Image -->
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <x-form-lable field="image"></x-form-lable>
                                <input type="file" id="image" class="form-control-file" name="image">
                            </div>
                            <x-error-message field="image"></x-error-message>
                        </div>

                        <!-- Description -->
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <x-form-lable field="description"></x-form-lable>
                                <textarea type="email" id="description" class="form-control" name="description">{{old('description')}}</textarea>
                            </div>
                            <x-error-message field="description"></x-error-message>
                        </div>
                    </div>

                    <!-- Submit -->
                    <x-submit-button text="{{ __('keywords.create_testimonial') }}"></x-submit-button>
                </div>
            </form>

            <!-- Go Back Button -->
            <x-go-back-button href="{{ route('admin.testimonials.index') }}" ></x-go-back-button>


        </div>
    </div>

    @endsection