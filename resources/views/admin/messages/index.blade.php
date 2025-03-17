@extends('admin.master')

@section('title', __('keywords.messages'))


@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-4">
                <div class="col">
                    <h2 class="h5 page-title"> {{__('keywords.messages')}}! </h2>
                </div>


            </div>

            <x-success-alert-component></x-success-alert-component>

            <!-- Table -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th> # </th>
                        <th> {{ __('keywords.name') }} </th>
                        <th> {{ __('keywords.email') }} </th>
                        <th> {{ __('keywords.subject') }} </th>
                        <th> {{ __('keywords.created_at') }} </th>
                        <th> {{ __('keywords.action') }} </th>
                    </tr>
                </thead>
                <tbody>
                    @if ( count($messages) > 0)
                    @foreach ($messages as $key => $message )
                    <tr>
                        <td> {{ $messages->firstItem() + $loop->index }} </td>
                        <td> {{ $message->name }} </td>
                        <td> {{ $message->email }} </td>
                        <td> {{ $message->subject }} </td>
                        <td> {{ $message->created_at->format('Y-M-d') }} </td>
                        <td>

                            <!-- Show -->
                            <x-action-button-component href=" {{ route('admin.messages.show', ['message' => $message]) }} " type="show" ></x-action-button-component>
                            {{-- <a href=" {{ route('admin.messages.show', ['message' => $message]) }} " class="btn btn-primary btn-sm mx-2">
                                <i class="fe fe-eye fe-16"></i>
                            </a> --}}


                            <!-- Delete -->
                            <x-delete-button-component href="{{ route('admin.messages.destroy', ['message' => $message]) }}" id="{{ $message->id }}" ></x-delete-button-component>
                            
                            

                        </td>
                    </tr>
                    @endforeach
                    @else
                    <x-empty-alert-component></x-empty-alert-component>
                    @endif
                </tbody>
            </table>

            {{ $messages->render('pagination::bootstrap-4') }}

        </div>
    </div>


    @endsection