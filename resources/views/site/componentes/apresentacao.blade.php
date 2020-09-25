<div class="row">

        <div class="col-sm-6 col-md-6">
            <h1>Hackaton Falabella</h1>
            <h2>Enjoy this new purchase experience for Ecommerces!</h2>
            <div>
                Add more text about Hackaton...
            </div>
        </div>

    <div class="col-sm-5 col-md-5 col-md-offset-1">
        <div class="hero-content-carousel">
            <div class="form-group">

                @if( Auth::guest())
                    @include("site.componentes.usuario-deslogado.tela-inicial-apresentacao")
                @else
                    @include("site.componentes.usuario-logado.tela-inicial-apresentacao")
                @endif
            </div>
        </div>
    </div>
</div>
