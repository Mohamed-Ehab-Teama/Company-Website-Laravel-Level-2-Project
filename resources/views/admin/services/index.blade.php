@extends('admin.master')

@section('title', __('keywords.services'))


@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-4">
                <div class="col">
                    <h2 class="h5 page-title"> {{__('keywords.services')}}! </h2>
                </div>

                {{-- Add New Button --}}
                <div class="page-title-right">
                    {{-- <a href=" {{ route('admin.services.create') }} " class="btn btn-primary">
                        {{ __('keywords.add_new') }}
                    </a> --}}
                    <x-action-button-component href="{{ route('admin.services.create') }}" type="create"></x-action-button-component>
                </div>

            </div>

            <x-success-alert-component></x-success-alert-component>

            <!-- Table -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="10%"> # </th>
                        <th width="20%"> {{ __('keywords.services') }} </th>
                        <th width="30%"> {{ __('keywords.icon') }} </th>
                        <th> {{ __('keywords.action') }} </th>
                    </tr>
                </thead>
                <tbody>
                    @if ( count($services) > 0)
                    @foreach ($services as $key => $service )
                    <tr>
                        <td> {{ $services->firstItem() + $loop->index }} </td>
                        <td> {{ $service->name }} </td>
                        <td>
                            <i class="{{ $service->icon }} fe-16"></i>
                        </td>
                        <td>

                            <!-- Show -->
                            <x-action-button-component href=" {{ route('admin.services.show', ['service' => $service]) }} " type="show" ></x-action-button-component>
                            {{-- <a href=" {{ route('admin.services.show', ['service' => $service]) }} " class="btn btn-primary btn-sm mx-2">
                                <i class="fe fe-eye fe-16"></i>
                            </a> --}}


                            <!-- Edit -->
                            <x-action-button-component href=" {{ route('admin.services.edit', ['service' => $service]) }} " type="edit" ></x-action-button-component>
                            {{-- <a href=" {{ route('admin.services.edit', ['service' => $service]) }} " class="btn btn-success btn-sm mx-2">
                                <i class="fe fe-edit fe-16"></i>
                            </a> --}}


                            <!-- Delete -->
                            <x-delete-button-component href="{{ route('admin.services.destroy', ['service' => $service]) }}" id="{{ $service->id }}" ></x-delete-button-component>
                            {{-- <form id="formToDelete-{{ $service->id }}" class="d-inline" method="POST" action="{{ route('admin.services.destroy', ['service' => $service]) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm mx-2" type="button" onclick="confirmDelete( {{ $service->id }} )">
                                    <i class="fe fe-trash fe-16"></i>
                                </button>
                            </form> --}}
                            

                        </td>
                    </tr>
                    @endforeach
                    @else
                    <x-empty-alert-component></x-empty-alert-component>
                    @endif
                </tbody>
            </table>

            {{ $services->render('pagination::bootstrap-4') }}

        </div>
    </div>


    @endsection