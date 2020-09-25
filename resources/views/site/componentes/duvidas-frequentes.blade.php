<div class="panel-inner col-md-12">
    <div class="col-md-7">
        <h2>Duvidas frequentes</h2>

        <ul class="text-justify">
            <li onclick="exibirDuvida(1);" class="duvida" id="duvida-1"><i class="fa fa-circle-o duvida"></i>
                <a href="#" onclick="return false;">Qual o custo para ter um perfil?</a>
            </li>
            <li onclick="exibirDuvida(2);" class="duvida" id="duvida-2"><i class="fa fa-circle-o "></i>
                <a href="#" onclick="return false;">Qualquer pessoa pode criar uma empresa e anunciar vagas?</a>
            </li>
            <li onclick="exibirDuvida(3);" class="duvida" id="duvida-3"><i class="fa fa-circle-o "></i>
                <a href="#" onclick="return false;">Quem tem um trabalho, pode ter um perfil?</a>
            </li>
            <li onclick="exibirDuvida(4);" class="duvida" id="duvida-4"><i class="fa fa-circle-o "></i>
                <a href="#" onclick="return false;">Profissionais autônomos, também podem ter um perfil?</a>
            </li>
            <li onclick="exibirDuvida(5);" class="duvida" id="duvida-5"><i class="fa fa-circle-o "></i>
                <a href="#" onclick="return false;">Quanto custa ter uma empresa na plataforma?</a>
            </li>
        </ul>
    </div>
    <div class="col-md-5 text-justify">

        @include("site.componentes.duvidas-frequentes.question-1")
        @include("site.componentes.duvidas-frequentes.question-2")
        @include("site.componentes.duvidas-frequentes.question-3")
        @include("site.componentes.duvidas-frequentes.question-4")
        @include("site.componentes.duvidas-frequentes.question-5")

    </div>

</div>


@push("scripts")

<script type="text/javascript">

    function exibirDuvida($id)
    {
        esconderDuvidas();
        $("#question-" + $id).fadeIn();
        $("#duvida-" + $id).css("font-weight", "bold");
    }

    function esconderDuvidas()
    {
        $(".duvida-frequente").each(function (index, item)
        {
            $(this).hide();
        });

        $(".duvida").each(function (index, item)
        {
            $(this).css("font-weight", "normal");
        });
    }

    // Exibe a dúvida default
    exibirDuvida(1);

</script>
@endpush