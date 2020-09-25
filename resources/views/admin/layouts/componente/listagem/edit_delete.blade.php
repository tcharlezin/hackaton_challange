{!! Form::model($model, ['route' => [$rota.'.destroy', $model->id], 'id'=>'formDeleteRegistro'.$model->id ]) !!}

    {{ method_field('DELETE') }}

    <div class="row text-center">
        <a href="{{ route($rota.'.edit', $model->id) }}">
            <span><i class="fa fa-fw fa-edit fa-lg"></i></span>
        </a>
        <a href="#" data-toggle="modal" data-target="#modalConfirmarExclusao"
           onclick="DefinirRegistroExclusao({{$model->id}});">
            <span><i class="fa fa-fw fa-remove fa-lg"></i></span>
        </a>
    </div>

{!! Form::close() !!}
