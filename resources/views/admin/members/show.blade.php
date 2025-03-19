@extends('admin.master')

@section('title', __('keywords.show_member'))


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-4">
                    <div class="col">
                        <h2 class="h5 page-title"> {{ __('keywords.members') }}! </h2>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">

                        <!-- Title -->
                        <div class="col-md-5">
                            <div class="form-group mb-3">
                                <x-form-lable field="name"></x-form-lable>
                                <label for="name" class="form-control"> {{ $member->name }} </label>
                            </div>
                        </div>

                        <!-- position -->
                        <div class="col-md-5">
                            <div class="form-group mb-3">
                                <x-form-lable field="position"></x-form-lable>
                                <label for="position" class="form-control"> {{ $member->position }} </label>
                            </div>
                        </div>

                        <!-- image -->
                        <div class="col-md-2">
                            <div class="form-group mb-3">
                                <x-form-lable field="image"></x-form-lable>
                                <div>
                                    <img src="{{ asset("storage/members/$member->image") }}" alt="" width="100px">
                                </div>
                            </div>
                        </div>

                        <!-- facebook -->
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <x-form-lable field="facebook"></x-form-lable>
                                <label for="facebook" class="form-control"> {{ $member->facebook }} </label>
                            </div>
                        </div>

                        <!-- twitter -->
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <x-form-lable field="twitter"></x-form-lable>
                                <label for="twitter" class="form-control"> {{ $member->twitter }} </label>
                            </div>
                        </div>

                        <!-- linkedin -->
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <x-form-lable field="linkedin"></x-form-lable>
                                <label for="linkedin" class="form-control"> {{ $member->linkedin }} </label>
                            </div>
                        </div>
                    </div>

                    <!-- Go Back Button -->
                    <x-go-back-button href="{{ route('admin.members.index') }}"></x-go-back-button>

                </div>


            </div>
        </div>

    @endsection
