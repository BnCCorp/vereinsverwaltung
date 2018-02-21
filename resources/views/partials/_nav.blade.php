<header>
    <div class="navbar-fixed">
        <div class="nav-wrapper">
            <nav class="light-green lighten-1" role="navigation">
                <div class="nav-wrapper">
                    <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
                    <a href="{!! action('PageController@index') !!}" class="brand-logo left"><strong>NAJU</strong> Ahlen</a>
                </div>
            </nav>
        </div>
    </div>
</header>

{{--<aside>--}}
    <ul id="slide-out" class="side-nav fixed">
        <li>
            <div class="col col s4 m4 l4">
                <img src="{!! asset('images/wald.jpg') !!}" alt="" class="responsive-img valign profile-image">
            </div>
        </li>
        <li><a href="#!"><i class="material-icons">dashboard</i>Dashboard</a></li>
        <li><a href="{!! route('members.index') !!}"><i class="material-icons">group</i>Mitglieder</a> </li>
        <li>
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a class="collapsible-header"><i class="material-icons">euro_symbol</i>Finanzen</a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a class="nav-collapse-element" href="#!">Transaktionen</a></li>
                            <li><a class="nav-collapse-element" href="{!! route('finance.bankaccounts.index') !!}">Konten</a></li>
                            <li><a class="nav-collapse-element" href="{!! route('finance.categories.index') !!}">Kategorien</a></li>
                            <li><a class="nav-collapse-element" href="#!">Tags</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        <li><a href="#!"><i class="material-icons">chat</i>Angelegenheiten</a></li>
        <li><a href="#!"><i class="material-icons">loop</i>Fortwährende Tasks</a></li>
        <li>
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a href="#!" class="collapsible-header"><i class="material-icons">move_to_inbox</i>Inventar</a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="#!"><i class="material-icons">format_list_numbered</i>Inventuren</a></li> {{--or archive--}}
                            <li><a href="#!"><i class="material-icons">restore</i>Ausleihe</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        <li><a href="#!"><i class="material-icons">insert_drive_file</i>Dateiablage</a></li>
        <li><a href="#!"><i class="material-icons">show_chart</i>Statistiken</a></li>
        <li><a href="#!"><i class="material-icons">perm_contact_calendar</i>Kalender</a></li>
        <li><a href="#!"><i class="material-icons">format_align_justify</i>Log</a></li>
    </ul>
{{--</aside>--}}