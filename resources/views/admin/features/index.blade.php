@extends('admin.master')

@section('title', __('keywords.features'))


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-4">
                    <div class="col">
                        <h2 class="h5 page-title"> {{ __('keywords.features') }}! </h2>
                    </div>

                    {{-- Add New Button --}}
                    <div class="page-title-right">
                        {{-- <a href=" {{ route('admin.features.create') }} " class="btn btn-primary">
                        {{ __('keywords.add_new') }}
                    </a> --}}
                        <x-action-button-component href="{{ route('admin.features.create') }}"
                            type="create"></x-action-button-component>
                    </div>

                </div>

                <x-success-alert-component></x-success-alert-component>

                <!-- Table -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="10%"> # </th>
                            <th width="20%"> {{ __('keywords.features') }} </th>
                            <th width="30%"> {{ __('keywords.icon') }} </th>
                            <th> {{ __('keywords.action') }} </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($features) > 0)
                            @foreach ($features as $key => $feature)
                                <tr>
                                    <td> {{ $features->firstItem() + $loop->index }} </td>
                                    <td> {{ $feature->name }} </td>
                                    <td> {{ $feature->icon }} </td>
                                    <td>

                                        <!-- Show -->
                                        <x-action-button-component
                                            href=" {{ route('admin.features.show', ['feature' => $feature]) }} "
                                            type="show"></x-action-button-component>
                                        {{-- <a href=" {{ route('admin.features.show', ['feature' => $feature]) }} " class="btn btn-primary btn-sm mx-2">
                                <i class="fe fe-eye fe-16"></i>
                            </a> --}}


                                        <!-- Edit -->
                                        <x-action-button-component
                                            href=" {{ route('admin.features.edit', ['feature' => $feature]) }} "
                                            type="edit"></x-action-button-component>
                                        {{-- <a href=" {{ route('admin.features.edit', ['feature' => $feature]) }} " class="btn btn-success btn-sm mx-2">
                                <i class="fe fe-edit fe-16"></i>
                            </a> --}}


                                        <!-- Delete -->
                                        <x-delete-button-component
                                            href="{{ route('admin.features.destroy', ['feature' => $feature]) }}"
                                            id="{{ $feature->id }}"></x-delete-button-component>



                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <x-empty-alert-component></x-empty-alert-component>
                        @endif
                    </tbody>
                </table>

                {{ $features->render('pagination::bootstrap-4') }}

            </div>
        </div>


    @endsection
