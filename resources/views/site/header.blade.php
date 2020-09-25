<div class="header-wrapper">
    <div class="header">
        <div class="header-top">
            <div class="container">
                <div class="header-brand">
                    <div class="header-logo">
                        <a href="#">
                            <i class="profession profession-logo"></i>
                            <span class="header-logo-text">{{env("APP_NAME")}}</span>
                        </a>
                    </div>
                    <div class="header-slogan">
                        <span class="header-slogan-slash">/</span>
                        <span class="header-slogan-text">{{env("APP_SLOGAN")}}</span>
                    </div>
                </div>
                <ul class="header-actions nav nav-pills">
                    @if( Auth::guest())
                        <li><a href="#" id="btnLogin">Login</a></li>
                        <li><a href="#" id="btnCriarConta" class="primary">Create a acount</a></li>
                    @else
                        <li>
                            <div style="position: relative; display: block;">
                                <a href="{{route("home")}}" class="btn btn-default">Entrar</a>
                            </div>
                        </li>
                    @endif
                </ul>
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse"
                        data-target=".header-nav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
        </div>

            <div class="header-bottom">
                <div class="container">
                    <ul class="header-nav nav nav-pills collapse">

                        @if (\Route::current()->getName() == 'site.principal')
                            <li class="active">
                                <a href="#">Home</a>
                            </li>
                            <li class="">
                                <a href="#">Shop</a>
                            </li>
                        @else
                            <li class="active">
                                <a href="#">Home</a>
                            </li>
                            <li class="">
                                <a href="#">Shop</a>
                            </li>
                        @endif


                    </ul>
                    <div class="header-search hidden-sm">
                        <form method="get" action="?">
                            <input type="text" class="form-control" placeholder="Search ...">
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
