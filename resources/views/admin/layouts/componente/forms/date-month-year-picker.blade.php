<div class="{{ $colmdx  }}">
    <div class="form-group">
        {!! Form::label($name, $label, ['class'=>'control-label']) !!}

        @if(isset($tooltip["title"]) || isset($tooltip["message"]))

            &nbsp;<a class="add-tooltip demo-pli-question-circle icon-lg unselectable"
               data-html="true"
               data-title="<h4>{{$tooltip["title"]}}</h4>
               <p style='{{$tooltip["style"]}}'>{{$tooltip["message"]}}</p>"
               data-original-title=""
               title=""></a>

        @endif

        {!! Form::text($name, null, ['class'=>'form-control', 'id' => $name]) !!}

        @push('scripts')
        <script>

            $(function() {
                $("#{{$name}}").datepicker({
                    format: "MM/yyyy",
                    language: 'pt-BR',
                    startView: "year",
                    minViewMode: "months"
                });

                $('#{{$name}}').mask("99/9999");
            });

        </script>
        @endpush
    </div>
</div>