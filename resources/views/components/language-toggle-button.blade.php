@php
    use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
    $locale = LaravelLocalization::getCurrentLocale() == 'ar' ? 'en' : 'ar';
@endphp

<a class="nav-link text-muted my-2" id="langSwitcher" href="{{  LaravelLocalization::getLocalizedURL($locale) }} ">
    {{ strtoupper($locale) }}
</a>
