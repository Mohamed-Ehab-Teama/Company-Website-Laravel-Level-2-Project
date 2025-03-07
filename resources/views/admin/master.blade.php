
<!doctype html>
<html lang="en">

@include('admin.partials.head')


<body class="vertical  light @if (Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale() == 'ar') rtl @endif  ">
    <div class="wrapper">
        @include('admin.partials.nav')

        @include('admin.partials.sidebar')


        <main role="main" class="main-content">
            @yield('content')
        </main>

    </div>

    @include('admin.partials.scripts')
</body>

</html>
