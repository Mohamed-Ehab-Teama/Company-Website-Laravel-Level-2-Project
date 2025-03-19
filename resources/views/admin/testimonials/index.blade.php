@extends('admin.master')

@section('title', __('keywords.testimonials'))


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-4">
                    <div class="col">
                        <h2 class="h5 page-title"> {{ __('keywords.testimonials') }}! </h2>
                    </div>

                    {{-- Add New Button --}}
                    <div class="page-title-right">
                        {{-- <a href=" {{ route('admin.testimonials.create') }} " class="btn btn-primary">
                        {{ __('keywords.add_new') }}
                    </a> --}}
                        <x-action-button-component href="{{ route('admin.testimonials.create') }}"
                            type="create"></x-action-button-component>
                    </div>

                </div>

                <x-success-alert-component></x-success-alert-component>

                <!-- Table -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="10%"> # </th>
                            <th width="30%"> {{ __('keywords.name') }} </th>
                            <th width="20%"> {{ __('keywords.position') }} </th>
                            <th> {{ __('keywords.image') }} </th>
                            <th width="20%"> {{ __('keywords.action') }} </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($testimonials) > 0)
                            @foreach ($testimonials as $key => $testimonial)
                                <tr>
                                    <td> {{ $testimonials->firstItem() + $loop->index }} </td>
                                    <td> {{ $testimonial->name }} </td>
                                    <td> {{ $testimonial->position }} </td>
                                    <td>
                                        <img src="{{ asset("storage/testimonials/$testimonial->image") }}" alt="" width="80px">
                                    </td>
                                    <td>

                                        <!-- Show -->
                                        <x-action-button-component
                                            href=" {{ route('admin.testimonials.show', ['testimonial' => $testimonial]) }} "
                                            type="show"></x-action-button-component>


                                        <!-- Edit -->
                                        <x-action-button-component
                                            href=" {{ route('admin.testimonials.edit', ['testimonial' => $testimonial]) }} "
                                            type="edit"></x-action-button-component>


                                        <!-- Delete -->
                                        <x-delete-button-component
                                            href="{{ route('admin.testimonials.destroy', ['testimonial' => $testimonial]) }}"
                                            id="{{ $testimonial->id }}"></x-delete-button-component>



                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <x-empty-alert-component></x-empty-alert-component>
                        @endif
                    </tbody>
                </table>

                {{ $testimonials->render('pagination::bootstrap-4') }}

            </div>
        </div>


    @endsection
