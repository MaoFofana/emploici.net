<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid ">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="{{url('/')}}">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{url('/')}}">Accueil</a></li>
                                        <li><a href="{{url('/emplois')}}">Emplois</a></li>
                                        <li><a href="{{url('/contactez-nous')}}">Contact</a></li>
                                        <!--li><a href="#">pages <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="candidate.html">Candidates </a></li>
                                                <li><a href="job_details.html">job details </a></li>
                                                <li><a href="elements.html">elements</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">blog <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">blog</a></li>
                                                <li><a href="single-blog.html">single-blog</a></li>
                                            </ul>
                                        </li-->
                                        @if (Route::has('login'))
                                                @auth
                                                <li>
                                                    <a href="#">Compte<i class="ti-angle-down"></i></a>
                                                    <ul class="submenu">
                                                        <li><a href="{{url('/information')}}">Information</a></li>
                                                        @if(Auth::user()->role == 'RECRUTEUR')
                                                            <li><a href="{{url('/offres')}}">Mes offres</a></li>
                                                        @endif
                                                        <li>
                                                            <a href="{{ url('/logout') }}"
                                                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                                Deconnection
                                                            </a>
                                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                                {!! csrf_field() !!}
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </li>
                                                @else
                                                    <li>
                                                        <a href="#">Compte<i class="ti-angle-down"></i></a>
                                                        <ul class="submenu">
                                                            <li><a href="{{url('/login')}}">Connexion</a></li>
                                                            <li><a href="{{url('/register')}}">Inscription</a></li>
                                                        </ul>
                                                    </li>
                                                @endauth
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="Appointment">
                                <div class="d-lg-block">

                                        <a class="boxed-btn3" href="{{url('/poster')}}">Poster un job</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>