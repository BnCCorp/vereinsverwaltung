<header>
    <div class="navbar-fixed">
        <div class="nav-wrapper">
            <nav class="light-green lighten-1" role="navigation">
                <div class="nav-wrapper">
                    <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
                    <a href="#!" class="brand-logo left"><strong>NAJU</strong> Ahlen</a>
                </div>
            </nav>
        </div>
    </div>
</header>

<aside>
    <ul id="slide-out" class="side-nav fixed">
        <li>
            <div class="col col s4 m4 l4">
                <img src="{!! asset('images/wald.jpg') !!}" alt="" class="responsive-img valign profile-image">
            </div>
        </li>
        <li><a href="#!"><i class="material-icons">dashboard</i>Dashboard</a></li>
        <li><a href="#!"><i class="material-icons">group</i>Mitglieder</a> </li>
        <li>
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a class="collapsible-header"><i class="material-icons">euro_symbol</i>Finanzen</a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="#!">Transaktionen</a></li>
                            <li><a href="#!">Konten</a></li>
                            <li><a href="{!! route('finance.categories.index') !!}">Kategorien</a></li>
                            <li><a href="#!">Tags</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</aside>