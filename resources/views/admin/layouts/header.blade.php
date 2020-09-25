<header id="navbar">
    <div id="navbar-container" class="boxed">

        <div class="navbar-header">
            <a href="#" class="navbar-brand">
                <img src="{{asset("admin/img/logo.png")}}" alt="Nifty Logo" class="brand-icon">
                <div class="brand-title">
                    <span class="brand-text">{{env("APP_NAME")}}</span>
                </div>
            </a>
        </div>
        <!--================================-->
        <!--End brand logo & name-->

        <!--Navbar Dropdown-->
        <!--================================-->

        <div class="navbar-content clearfix">
            <ul class="nav navbar-top-links pull-left">

                <li class="tgl-menu-btn">
                    <a class="mainnav-toggle">
                        <i class="demo-pli-view-list"></i>
                    </a>
                </li>

            </ul>
            <ul class="nav navbar-top-links pull-right">

                <!--Language selector-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li class="dropdown">
                    @include("admin.layouts.componente.languages")
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End language selector-->

                <!--User dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li id="dropdown-user" class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                        <span class="pull-right">
                            <i class="demo-pli-male ic-user"></i>
                        </span> @if(Auth::check())
                            <div class="username hidden-xs">{{ Auth::user()->name }}</div>
                        @else
                            <div class="username hidden-xs">Usuário</div>
                        @endif
                    </a>

                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right panel-default">

                        <!-- User dropdown menu -->
                        <ul class="head-list">
                            <li>
                                <a href="#">
                                    <span class="badge badge-danger pull-right">0</span>
                                    <i class="demo-pli-mail icon-lg icon-fw"></i> Mensagens
                                </a>
                            </li>
                        </ul>

                        <!-- Dropdown footer -->
                        <div class="pad-all text-right">
                            <form method="POST" action="{{route("logout")}}" id="frmLogoutProfile">
                                {!! csrf_field() !!}
                                <button type="submit" class="btn btn-primary" id="btnLogout">
                                    <i class="demo-pli-unlock"></i> Sair
                                </button>
                            </form>
                        </div>
                    </div>
                </li>

                @if(env("ADMIN_LAYOUT_DISPLAY_ASIDE_BAR"))
                    <li>
                        <a href="#" class="aside-toggle navbar-aside-icon">
                            <i class="pci-ver-dots"></i>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</header>
