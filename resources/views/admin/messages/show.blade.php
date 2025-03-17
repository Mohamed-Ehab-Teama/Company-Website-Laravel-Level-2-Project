@extends('admin.master')

@section('title', __('keywords.show_message'))


@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-4">
                <div class="col">
                    <h2 class="h5 page-title"> {{__('keywords.messages')}}! </h2>
                </div>
            </div>

            <div class="card-body">
                <div class="row">

                    <!-- Title -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <x-form-lable field="name"></x-form-lable>
                            <label for="name" class="form-control"> {{ $message->name }} </label>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <x-form-lable field="email"></x-form-lable>
                            <label for="email" class="form-control"> {{ $message->email }} </label>
                        </div>
                    </div>

                    <!-- Subject -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <x-form-lable field="subject"></x-form-lable>
                            <label for="subject" class="form-control"> {{ $message->subject }} </label>
                        </div>
                    </div>

                    <!-- Message -->
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <x-form-lable field="message"></x-form-lable>
                            <label for="message" class="form-control"> {{ $message->message }} </label>
                        </div>
                    </div>
                </div>

                <!-- Go Back Button -->
                <x-go-back-button href="{{ route('admin.messages.index') }}" ></x-go-back-button>

            </div>


        </div>
    </div>

    @endsection