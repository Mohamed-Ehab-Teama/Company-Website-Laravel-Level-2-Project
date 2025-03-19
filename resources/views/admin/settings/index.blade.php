@extends('admin.master')

@section('title', __('keywords.settings'))


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-4">
                    <div class="col">
                        <h2 class="h5 page-title"> {{ __('keywords.settings') }}! </h2>
                    </div>

                </div>

                <form action=" {{ route('admin.settings.update', ['setting' => $setting]) }} " method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row">

                            <!-- address -->
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <x-form-lable field="address"></x-form-lable>
                                    <input type="text" id="address" class="form-control" name="address"
                                        value="{{ $setting->address }}">
                                </div>
                                <x-error-message field="address"></x-error-message>
                            </div>
                            
                            <!-- phone -->
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <x-form-lable field="phone"></x-form-lable>
                                    <input type="text" id="phone" class="form-control" name="phone"
                                        value="{{ $setting->phone }}">
                                </div>
                                <x-error-message field="phone"></x-error-message>
                            </div>

                            <!-- email -->
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <x-form-lable field="email"></x-form-lable>
                                    <input type="text" id="email" class="form-control" name="email"
                                        value="{{ $setting->email }}">
                                </div>
                                <x-error-message field="email"></x-error-message>
                            </div>

                            <!-- facebook -->
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <x-form-lable field="facebook"></x-form-lable>
                                    <input type="text" id="facebook" class="form-control" name="facebook"
                                        value="{{ $setting->facebook }}" placeholder="Facebook">
                                </div>
                                <x-error-message field="facebook"></x-error-message>
                            </div>

                            <!-- twitter -->
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <x-form-lable field="twitter"></x-form-lable>
                                    <input type="text" id="twitter" class="form-control" name="twitter"
                                        value="{{ $setting->twitter }}" placeholder="Twitter">
                                </div>
                                <x-error-message field="twitter"></x-error-message>
                            </div>

                            <!-- linkedin -->
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <x-form-lable field="linkedin"></x-form-lable>
                                    <input type="text" id="linkedin" class="form-control" name="linkedin"
                                        value="{{ $setting->linkedin }}" placeholder="Linked In">
                                </div>
                                <x-error-message field="linkedin"></x-error-message>
                            </div>

                            <!-- youtube -->
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <x-form-lable field="youtube"></x-form-lable>
                                    <input type="text" id="youtube" class="form-control" name="youtube"
                                        value="{{ $setting->youtube }}" placeholder="YouTube">
                                </div>
                                <x-error-message field="youtube"></x-error-message>
                            </div>

                            <!-- instagram -->
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <x-form-lable field="instagram"></x-form-lable>
                                    <input type="text" id="instagram" class="form-control" name="instagram"
                                        value="{{ $setting->instagram }}" placeholder="Instagram">
                                </div>
                                <x-error-message field="instagram"></x-error-message>
                            </div>



                            <!-- Submit -->
                            <x-submit-button text="{{ __('keywords.update') }}"></x-submit-button>


                        </div>

                </form>


            </div>
        </div>

    @endsection
