@extends('admin.master')

@section('title', __('keywords.members'))


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-4">
                    <div class="col">
                        <h2 class="h5 page-title"> {{ __('keywords.members') }}! </h2>
                    </div>

                    {{-- Add New Button --}}
                    <div class="page-title-right">
                        <x-action-button-component href="{{ route('admin.members.create') }}"
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
                        @if (count($members) > 0)
                            @foreach ($members as $key => $member)
                                <tr>
                                    <td> {{ $members->firstItem() + $loop->index }} </td>
                                    <td> {{ $member->name }} </td>
                                    <td> {{ $member->position }} </td>
                                    <td>
                                        <img src="{{ asset("storage/members/$member->image") }}" alt="" width="80px">
                                    </td>
                                    <td>

                                        <!-- Show -->
                                        <x-action-button-component
                                            href=" {{ route('admin.members.show', ['member' => $member]) }} "
                                            type="show"></x-action-button-component>


                                        <!-- Edit -->
                                        <x-action-button-component
                                            href=" {{ route('admin.members.edit', ['member' => $member]) }} "
                                            type="edit"></x-action-button-component>


                                        <!-- Delete -->
                                        <x-delete-button-component
                                            href="{{ route('admin.members.destroy', ['member' => $member]) }}"
                                            id="{{ $member->id }}"></x-delete-button-component>



                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <x-empty-alert-component></x-empty-alert-component>
                        @endif
                    </tbody>
                </table>

                {{ $members->render('pagination::bootstrap-4') }}

            </div>
        </div>


    @endsection
