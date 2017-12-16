<script>
    @if(Session::has('success'))
        Materialize.toast("{{ Session::get('success') }}", 4000, "grey");
    @endif

    @if( (count($errors) > 0) )
        var delay = 1000;
        var time = 0;
        @foreach($errors->all() as $error)
        setTimeout(function(){
            Materialize.toast("{{ $error }} ", 4000, "red");
        }, time);
        time += delay;
        @endforeach
    @endif
</script>

