@extends('admin.master')

@section('title', __('keywords.edit_service'))


@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-4">
                <div class="col">
                    <h2 class="h5 page-title"> {{__('keywords.services')}}! </h2>
                </div>

            </div>

            <form action=" {{ route('admin.services.update', ['service' => $service]) }} " method="POST">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="simpleinput"> {{ __('keywords.service') }} </label>
                                <input type="text" id="simpleinput" class="form-control" name="name" value="{{ $service->name }}">
                            </div>
                            @error('name')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="example-helping"> {{ __('keywords.icon') }} </label>
                                <input type="text" id="example-helping" class="form-control" name="icon" value="{{ $service->icon }}">
                            </div>
                            @error('icon')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="example-email"> {{__('keywords.description')}} </label>
                                <textarea type="email" id="example-email" class="form-control" name="description">{{ $service->description }}</textarea>
                            </div>
                            @error('description')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-primary my-3" type="submit"> {{ __('keywords.edit_service') }} </button>
                    <br>
                    <a class="btn btn-warning" href="{{ route('admin.services.index') }}"> Go Back </a>
                </div>

            </form>


        </div>
    </div>

    @endsection