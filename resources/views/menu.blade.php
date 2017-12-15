<!doctype html>
<html lang="{{ app()->getLocale() }}">

    @include('partials._head')

    <body>
        @include('partials._nav')
        <div class="content">
            @include('partials._messages')
            @yield('content')
        </div>

        <!-- jQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

        <!-- Materialize Javascript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

        <!-- Script for nav -->
        <script type="text/javascript" src="{!! asset('js/nav.js') !!}"></script>

        <!-- additional scripts -->
        @yield('scripts')
    </body>
</html>