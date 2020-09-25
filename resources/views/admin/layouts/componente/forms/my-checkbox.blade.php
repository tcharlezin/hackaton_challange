<div class="checkbox pad-btm text-left">
    {!! Form::hidden($name, 0) !!}
    {!! Form::checkbox($name, 1, $default, ['class'=>'magic-checkbox', 'id'=>$name]) !!}
    {!! Form::label($name, $label, ['for' => $id]) !!}
</div>