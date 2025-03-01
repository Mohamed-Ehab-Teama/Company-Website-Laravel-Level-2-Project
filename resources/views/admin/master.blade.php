<!doctype html>
<html lang="en">

@include('admin.partials.head')


<body class="vertical  light  ">
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
