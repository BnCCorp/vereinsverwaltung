@if(Session::has('success'))

    <div class="row">
        <div class="col s12 m12 l12">
            <div class="card green lighten-2">
                <div class="card-content white-text">
                    <span class="card-title">Erfolg!</span>
                    <p>{{ Session::get('success') }}</p>
                </div>

            </div>
        </div>
    </div>

@endif

@if( (count($errors) > 0) )

    <div class="row">
        <div class="col s12 m12 l12">
            <div class="card red lighten-2">
                <div class="card-content white-text">
                    <span class="card-title">Fehler!</span>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>

@endif