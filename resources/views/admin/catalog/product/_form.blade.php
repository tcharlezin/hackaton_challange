<div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Geral</h3>
        </div>
        <div class="panel-body">

            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('name', 'Nome:', ['class'=>'control-label']) !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>
            </div>

            {!! Form::money("col-sm-6", "price", "Preço") !!}

            {!! Form::select2('col-sm-6',
                              'category_id',
                              'Selecione a categoria:',
                              \App\Models\Catalog\Category::orderBy("name")->get()->pluck("name", "id"),
                              "Selecione a categoria") !!}

            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('ref', 'Ref:', ['class'=>'control-label']) !!}
                    {!! Form::text('ref', null, ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('description', 'Descrição:', ['class'=>'control-label']) !!}
                    {!! Form::textArea('description', null, ['class'=>'form-control']) !!}
                </div>
            </div>

        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Fotos</h3>
        </div>
        <div class="panel-body">
            <div class="col-sm-6">
                {!! Form::uploader("arquivos", "temporarias", "produtos", isset($registro) ? $registro : null) !!}
            </div>

            <div class="col-sm-6">
                @if(isset($registro))
                    <img src="{{$registro->getImagem()}}" style="max-height: 400px; max-width: 400px">
                @endif
            </div>
        </div>
    </div>
</div>


@push("scripts")
<script type="text/javascript">

    $(function () {

        var faIcon = {
            valid: 'fa fa-check-circle fa-lg text-success',
            invalid: 'fa fa-times-circle fa-lg',
            validating: 'fa fa-refresh'
        };

        $('#frmTag').bootstrapValidator({
            feedbackIcons: faIcon,
            trigger: 'change keyup blur',
            fields: {
                name: {validators: {notEmpty: {}}},
            }
        }).on('success.field.bv', function (e, data) {
            var $parent = data.element.parents('.form-group');
            $parent.removeClass('has-success');
        });
    });

</script>
@endpush

