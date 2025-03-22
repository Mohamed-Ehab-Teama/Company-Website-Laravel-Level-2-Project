@extends('front.master')

@section('title', 'Services')

@section('services-active', 'active')


@section('hero')
    <x-hero-component title="Services" subtitle="Services"></x-hero-component>
@endsection

@section('content')
    <!-- Service Start -->
    <x-front-services></x-front-services>
    <!-- Service End -->


    <!-- Testimonial Start -->
    <x-front-testimonials></x-front-testimonials>
    <!-- Testimonial End -->
@endsection
