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
                                <a href="{{route('shop.index')}}">Shop</a>
                            </li>
                        @else
                            <li class="active">
                                <a href="#">Home</a>
                            </li>
                            <li class="">
                                <a href="{{route('shop.index')}}">Shop</a>
                            </li>
                        @endif
                    </ul>
                    <div class="header-search hidden-sm">
                    </div>
                </div>
            </div>
    </div>
</div>
