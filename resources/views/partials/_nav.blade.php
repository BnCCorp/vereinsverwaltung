<script>
    // SIDEBAR
    $(document).ready(function(){
        $('.button-collapse').sideNav({
                menuWidth: 250, // Default is 300
                edge: 'left', // Choose the horizontal origin
                closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
                draggable: true // Choose whether you can drag to open on touch screens
            }
        );
        // $('.collapsible').collapsible();
        // START OPEN
        // $('.button-collapse').sideNav('show');
    });
</script>

<nav class="light-green lighten-1" role="navigation">
    <div class="nav-wrapper">
        <header>
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
            <a href="{!! action('PageController@index') !!}" class="brand-logo left"><strong>NAJU</strong> Ahlen</a>
        </header>
        <ul id="slide-out" class="side-nav fixed">
            <li>
                <div class="col col s4 m4 l4">
                    <img src="{!! asset('images/wald.jpg') !!}" alt="" class="responsive-img valign profile-image">
                </div>
            </li>
            <li><a href="#!" class="waves-effect waves-teal"><i class="material-icons">dashboard</i>Dashboard</a></li>
            <li><a href="{!! route('members.index') !!}" class="waves-effect waves-teal"><i class="material-icons">group</i>Mitglieder</a> </li>
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a href="#!" class="collapsible-header waves-effect waves-teal"><i class="material-icons">euro_symbol</i>Finanzen<i class="material-icons right" style="margin-right:0;">arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a class="waves-effect" href="{!! route('finance.transactions.index') !!}"><i class="material-icons">credit_card</i>Transaktionen</a></li>
                                <li><a class="waves-effect" href="{!! route('finance.accounts.index') !!}"><i class="material-icons">account_balance</i>Konten</a></li>
                                <li><a class="waves-effect" href="{!! route('finance.category.index') !!}"><i class="material-icons">inbox</i>Kategorien</a></li>
                                <li><a class="waves-effect" href="{!! route('finance.tag.index') !!}"><i class="material-icons">local_offer</i>Tags</a></li>
                                <li><a class="waves-effect" href="#!"><i class="material-icons">playlist_add_check</i>Auswertungen</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <li><a href="{!! route('volunteerwork.index') !!}" class="waves-effect waves-teal"><i class="material-icons">work</i>Ehrenamtliche Arbeit</a></li>
            <li><a href="#!" class="waves-effect waves-teal"><i class="material-icons">forum</i>Angelegenheiten</a></li> {{--or chat--}}
            <li><a href="#!" class="waves-effect waves-teal"><i class="material-icons">loop</i>Fortwährende Tasks</a></li>
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a href="#!" class="collapsible-header waves-effect waves-teal"><i class="material-icons">move_to_inbox</i>Inventar<i class="material-icons right" style="margin-right:0;">arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a class="waves-effect" href="#!"><i class="material-icons">format_list_numbered</i>Inventuren</a></li> {{--or archive--}}
                                <li><a class="waves-effect" href="#!"><i class="material-icons">restore</i>Ausleihe</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <li><a href="#!" class="waves-effect waves-teal"><i class="material-icons">attach_file</i>Dateiablage</a></li> {{--or insert_drive_file--}}
            <li><a href="#!" class="waves-effect waves-teal"><i class="material-icons">show_chart</i>Statistiken</a></li>
            <li><a href="#!" class="waves-effect waves-teal"><i class="material-icons">perm_contact_calendar</i>Kalender</a></li>
            <li><a href="#!" class="waves-effect waves-teal"><i class="material-icons">format_align_justify</i>Log</a></li>
        </ul>
    </div>
</nav>