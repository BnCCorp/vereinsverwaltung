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
                            <li><a class="nav-collapse-element" href="{!! route('finance.transactions.index') !!}"><i class="material-icons">credit_card</i>Transaktionen</a></li>
                            <li><a class="nav-collapse-element" href="{!! route('finance.accounts.index') !!}"><i class="material-icons">account_balance</i>Konten</a></li>
                            <li><a class="nav-collapse-element" href="{!! route('finance.category.index') !!}"><i class="material-icons">inbox</i>Kategorien</a></li>
                            <li><a class="nav-collapse-element" href="{!! route('finance.tag.index') !!}"><i class="material-icons">local_offer</i>Tags</a></li>
                            <li><a class="nav-collapse-element" href="#!"><i class="material-icons">playlist_add_check</i>Auswertungen</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        <li><a href="#!"><i class="material-icons">forum</i>Angelegenheiten</a></li> {{--or chat--}}
        <li><a href="#!"><i class="material-icons">loop</i>Fortwährende Tasks</a></li>
        <li>
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a href="#!" class="collapsible-header"><i class="material-icons">move_to_inbox</i>Inventar</a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a class="nav-collapse-element" href="#!"><i class="material-icons">format_list_numbered</i>Inventuren</a></li> {{--or archive--}}
                            <li><a class="nav-collapse-element" href="#!"><i class="material-icons">restore</i>Ausleihe</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        <li><a href="#!"><i class="material-icons">attach_file</i>Dateiablage</a></li> {{--or insert_drive_file--}}
        <li><a href="#!"><i class="material-icons">show_chart</i>Statistiken</a></li>
        <li><a href="#!"><i class="material-icons">perm_contact_calendar</i>Kalender</a></li>
        <li><a href="#!"><i class="material-icons">format_align_justify</i>Log</a></li>
    </ul>
{{--</aside>--}}