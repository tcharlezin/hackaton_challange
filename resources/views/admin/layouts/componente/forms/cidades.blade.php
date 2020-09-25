<div class="row">

    {!! Form::select2('col-md-6', 'estado_id', 'Estado:', \App\Models\Localizacao\Estado::all()->pluck("descricao", "id"), "Selecione um estado...") !!}
    {!! Form::select2('col-md-6', 'cidade_id', 'Cidade:', [], "As cidades serão carregadas por estado...") !!}

</div>

@push("scripts")

<script type="text/javascript">

    $('select[name=estado_id]').change(function ()
    {
        carregarCidades();
    });

    function carregarCidades()
    {
        var idEstado = $('select[name=estado_id]').val();

        $.post("{{ route("pesquisa-cidade") }}",
                {estado: idEstado},
                function (cidades)
                {
                    $('select[name=cidade_id]').empty();

                    $.each(cidades, function (key, value)
                    {
                        $('select[name=cidade_id]').append('<option value=' + key + '>' + value + '</option>');
                    });
                });
    }

    $oldEstado = "{{$estado_id}}";
    $oldCidade = "{{$cidade_id}}";

    RestaurarValores();

    function RestaurarValores()
    {
        if ($oldEstado)
        {
            CarregarEstado();
            $oldEstado = null;
        }
    }

    function CarregarEstado()
    {
        if ($oldCidade)
        {
            $("#estado_id").val($oldEstado).trigger("change");
        }
    }

    var carregarCidadeAnterior = function ()
    {
        if ($oldCidade != null)
        {
            $("#cidade_id").val($oldCidade).trigger("change");
        }

        $oldCidade = null;
    };

    setTimeout(carregarCidadeAnterior, 2000);

</script>

@endpush
