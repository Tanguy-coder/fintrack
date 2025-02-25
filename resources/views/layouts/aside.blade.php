<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                     </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>

                        <li class="divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" style="display: none;" id="logout-form">
                                @csrf
                            </form>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                                Déconnexion
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            
            <li>
                <a href="/"><i class="fa fa-diamond"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <li>
                <a href="/unites"><i class="fa fa-diamond"></i> <span class="nav-label">Unités</span></a>
            </li>
            <li>
                <a href="/caisses"><i class="fa fa-diamond"></i> <span class="nav-label">Caisses</span></a>
            </li>
            <li>
                <a href="/typeSorties"><i class="fa fa-diamond"></i> <span class="nav-label">Types Sorties</span></a>
            </li>
            <li>
                <a href="/sorties"><i class="fa fa-diamond"></i> <span class="nav-label">Sortie</span></a>
            </li>
            <li class="inactive">
                <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Parametrages</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="active"><a href="/users">Utilisateurs</a></li>

                </ul>
            </li>

        </ul>

    </div>
</nav>
