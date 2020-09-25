<div class="{{ $colmdx  }}">
    <div class="form-group">
        {!! Form::label($name, $label, ['class'=>'control-label']) !!}
        {!! Form::text($name, null, ['class'=>'form-control', 'id' => $name]) !!}

        @push('scripts')
        <script>

            $(function() {
                $("#{{$name}}").datepicker({
                    format: 'dd/mm/yyyy',
                    language: 'pt-BR'
                });

                $('#{{$name}}').mask("99/99/9999");
            });

        </script>
        @endpush
    </div>
</div>