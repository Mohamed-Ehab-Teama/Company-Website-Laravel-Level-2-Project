
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
    <script>
        function confirmDelete(id) {
            if (confirm('Are You Sure You wanna delete this Item ?')) 
            {
                document.getElementById('formToDelete-'+id).submit()
            }
        }
    </script>
</body>

</html>
