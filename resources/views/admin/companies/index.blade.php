@extends('admin.master')

@section('title', __('keywords.companies'))


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-4">
                    <div class="col">
                        <h2 class="h5 page-title"> {{ __('keywords.companies') }}! </h2>
                    </div>

                    {{-- Add New Button --}}
                    <div class="page-title-right">
                        <x-action-button-component href="{{ route('admin.companies.create') }}"
                            type="create"></x-action-button-component>
                    </div>

                </div>

                <x-success-alert-component></x-success-alert-component>

                <!-- Table -->
                <table class="table table-hover bg-dark">
                    <thead>
                        <tr>
                            <th width="10%"> # </th>
                            <th> {{ __('keywords.image') }} </th>
                            <th width="20%"> {{ __('keywords.action') }} </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($companies) > 0)
                            @foreach ($companies as $key => $company)
                                <tr>
                                    <td> {{ $companies->firstItem() + $loop->index }} </td>
                                    <td>
                                        <img src="{{ asset("storage/companies/$company->image") }}" alt=""
                                            width="80px">
                                    </td>
                                    <td>

                                        <!-- Show -->
                                        <x-action-button-component
                                            href=" {{ route('admin.companies.show', ['company' => $company]) }} "
                                            type="show"></x-action-button-component>


                                        <!-- Edit -->
                                        <x-action-button-component
                                            href=" {{ route('admin.companies.edit', ['company' => $company]) }} "
                                            type="edit"></x-action-button-component>


                                        <!-- Delete -->
                                        <x-delete-button-component
                                            href="{{ route('admin.companies.destroy', ['company' => $company]) }}"
                                            id="{{ $company->id }}"></x-delete-button-component>



                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <x-empty-alert-component></x-empty-alert-component>
                        @endif
                    </tbody>
                </table>

                {{ $companies->render('pagination::bootstrap-4') }}

            </div>
        </div>


    @endsection
