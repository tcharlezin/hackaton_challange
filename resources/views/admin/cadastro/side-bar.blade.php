<div class="fixed-sm-200 fixed-lg-250 pull-sm-left hidden-xs">
    <div class="panel">

        <div class="text-center pad-all bord-btm">
            <div class="pad-ver">
                <img src="{{ Auth::user()->getProfilePicture() }}" class="img-lg img-border img-circle" alt="Profile Picture">
            </div>
            <h4 class="text-lg text-overflow mar-no">{{ Auth::user()->name }}</h4>

            @if(is_null(Auth::user()->cargo))
                <p class="text-sm text-muted">(Nenhum cargo definido)</p>
            @else
                <p class="text-sm text-muted">{{ Auth::user()->cargo->descricao }}</p>
            @endif

            <div class="pad-ver">
            </div>

            @yield("menu-esquerdo")

            <div class="pad-ver">
            </div>
        </div>

    </div>
</div>
