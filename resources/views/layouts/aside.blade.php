<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img-circle" src="{{ asset('img/1.png') }}" />
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->nom.' '.Auth::user()->prenom }}</strong>
                     </span> <span class="text-muted text-xs block">{{ Auth::user()->role->name }}<b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="/profile">Profile</a></li>

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
                    FTCK
                </div>
            </li>

            <li>
                <a href="/"><i class="fa fa-home"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            {{-- <li>
                <a href="/unites"><i class="fa fa-hotel"></i> <span class="nav-label">Unités</span></a>
            </li>
            <li>
                <a href="/caisses"><i class="fa fa-bitcoin"></i> <span class="nav-label">Caisses</span></a>
            </li> --}}
            {{-- <li>
                <a href="/typeSorties"><i class="fa fa-paperclip"></i> <span class="nav-label">Types Sorties</span></a>
            </li> --}}
            <li>
                <a href="/sorties"><i class="fa fa-circle-o-notch"></i> <span class="nav-label">Operation</span></a>
            </li>
            <li>
                <a href="/employes"><i class="fa fa-users"></i> <span class="nav-label">Employés</span></a>
            </li>
            <li>
                <a href="/salaires"><i class="fa fa-money"></i> <span class="nav-label">Salaires</span></a>
            </li>
            <li>
                <a href="/rapports"><i class="fa fa-book"></i> <span class="nav-label">Rapports</span></a>
            </li>
            <li>
                <a href="/rapports/general"><i class="fa fa-book"></i> <span class="nav-label">Rapports Général</span></a>
            </li>
            <li class="inactive">
                <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Parametrages</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="active"><a href="/users">Utilisateurs</a></li>
                </ul>
                <ul class="nav nav-second-level">
                    <li class="active"><a href="/assurances">Entites</a></li>
                </ul>
                <ul class="nav nav-second-level">
                    <li class="active"><a href="/typeSorties">Types opérations</a></li>
                </ul>
                {{-- <ul class="nav nav-second-level">
                    <li class="active"><a href="/typeEntrees">Catégorie entrées</a></li>
                </ul> --}}

            </li>

        </ul>

    </div>
</nav>
