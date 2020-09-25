<div class="row">
    {!! Form::select2Ajax('col-md-12', 'instituicao_ensino_id', 'Nome da empresa / instituição de ensino / escola:', [], 'pesquisa-instituicao-ensino', 'Qual foi a instituição de ensino?', 2) !!}

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('curso_id', 'Nome do curso: (Ex. Engenharia Elétrica, Técnico de Informática, Ensino Médio...)') !!}
            <br/>
            {!! Form::select('curso_id', [], null, ['id'=>'curso_id', 'class'=>'form-control js-states']) !!}
        </div>
    </div>
</div>

@push('scripts')
<script>

    $('select[name=instituicao_ensino_id]').change(function ()
    {
        removerCursos();
    });

    function removerCursos()
    {
        $('select[name=curso_id]').empty();
    }

    $(function ()
    {
        $('#curso_id').select2(
        {
            language          : 'pt-BR',
            placeholder       : "",
            escapeMarkup      : function (text)
            {
                return text;
            },
            minimumInputLength: 2,
            tags              : true,
            ajax              : {
                url           : '{{route("pesquisa-curso")}}',
                delay         : 500,
                dataType      : 'json',
                data          : function (params)
                {
                    return {
                        q                 : $.trim(params.term),
                        instituicao_ensino: $('select[name=instituicao_ensino_id]').val()
                    };

                },
                processResults: function (data)
                {
                    return {
                        results: data
                    };
                },
                cache         : true
            },
            current           : function (callback)
            {
                var data = [];
                var currentVal = this.$element.val();

                if (!this.$element.prop('multiple'))
                {
                    currentVal = [currentVal];
                }

                for (var v = 0; v < currentVal.length; v++)
                {
                    data.push({
                        id  : currentVal[v],
                        text: currentVal[v]
                    });
                }
                callback(data);
            },
        });
    });
</script>
@endpush