<!doctype html>
<html lang="{{ app()->getLocale() }}">

    @include('partials._head')

    <body>
        <!-- jQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

        {{-- jQuery UI --}}
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="{!! asset('css/jquery-ui.min.css') !!}">

        <!-- Materialize Javascript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

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