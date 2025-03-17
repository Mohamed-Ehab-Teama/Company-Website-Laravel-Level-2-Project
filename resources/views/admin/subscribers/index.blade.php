@extends('admin.master')

@section('title', __('keywords.subscribers'))


@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-4">
                <div class="col">
                    <h2 class="h5 page-title"> {{__('keywords.subscribers')}}! </h2>
                </div>


            </div>

            <x-success-alert-component></x-success-alert-component>

            <!-- Table -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th> # </th>
                        <th> {{ __('keywords.email') }} </th>
                        <th> {{ __('keywords.subscribtion_date') }} </th>
                        <th> {{ __('keywords.action') }} </th>
                    </tr>
                </thead>
                <tbody>
                    @if ( count($subscribers) > 0)
                    @foreach ($subscribers as $key => $subscriber )
                    <tr>
                        <td> {{ $subscribers->firstItem() + $loop->index }} </td>
                        <td> {{ $subscriber->email }} </td>
                        <td> {{ $subscriber->created_at->format('Y-M-d') }} </td>
                        <td>

                            <!-- Delete -->
                            <x-delete-button-component href="{{ route('admin.subscribers.destroy', ['subscriber' => $subscriber]) }}" id="{{ $subscriber->id }}"></x-delete-button-component>

                        </td>
                    </tr>
                    @endforeach
                    @else
                    <x-empty-alert-component></x-empty-alert-component>
                    @endif
                </tbody>
            </table>

            {{ $subscribers->render('pagination::bootstrap-4') }}

        </div>
    </div>


    @endsection