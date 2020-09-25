<div class="{{ $colmdx  }}">
    <div class="form-group">
        {!! Form::label($name, $label, ['class'=>'control-label']) !!}

        <div class="input-group">
            <span class="input-group-addon">R$</span>
            {!! Form::text($name, null, ['class'=>'form-control text-right', 'id' => $name]) !!}
        </div>

        @push('scripts')
        <script>

            $("#{{$name}}").maskMoney({thousands:'.', decimal:','});
            $("#{{$name}}").trigger('mask.maskMoney');

        </script>
        @endpush
    </div>
</div>