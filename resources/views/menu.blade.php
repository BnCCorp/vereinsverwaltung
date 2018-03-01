<!doctype html>
<html lang="{{ app()->getLocale() }}">

    @include('partials._head')

    <body>
        <!-- jQuery -->
        <script type="text/javascript" src="{!! asset('js/libs/jquery-3.2.1.min.js') !!}"></script>

        {{-- jQuery UI --}}
        <script src="{!! asset('js/libs/jquery-ui.min.js') !!}"></script>
        <link rel="stylesheet" href="{!! asset('css/jquery-ui.min.css') !!}">

        <!-- Materialize Javascript -->
        <script src="{!! asset('js/libs/materialize.min.js') !!}"></script>

        <!-- Script for nav -->
        <script type="text/javascript" src="{!! asset('js/nav.js') !!}"></script>


        <!-- additional scripts -->
        @yield('scripts')

        @include('partials._nav')
        <div class="content">
            @yield('content')
            @include('partials._messages')
        </div>


    </body>
</html>