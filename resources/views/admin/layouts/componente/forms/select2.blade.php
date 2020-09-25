<div class="{{ $colmdx  }}">
    <div class="form-group">
        {!! Form::label($name, $label, ['class'=>'control-label']) !!}
        {!! Form::select($name, $list, null, ['class'=>'form-control', 'placeholder' => "$placeholder", 'style' => 'width: 100%']) !!}
    </div>
</div>

@push('scripts')
<script>

    $(function ()
    {
        $('#{{$name}}').select2(
        {
            language : 'pt-BR',
            placeholder : "{{$placeholder}}",
            allowClear : true,
            escapeMarkup: function (text)
            {
                return text;
            }
        });
    });

</script>
@endpush