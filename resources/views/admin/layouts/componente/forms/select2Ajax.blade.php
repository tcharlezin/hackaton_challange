<div class="{{ $colmdx  }}">
    <div class="form-group">
        {!! Form::label($name, $label) !!}
        <br/>
        {!! Form::select($name, $list, null, ['id'=>$id, 'class'=>'form-control js-states']) !!}
    </div>
</div>

@push('scripts')
<script>
    $(function()
    {
        $('#{{$id}}').select2(
        {
            language: 'pt-BR',
            placeholder: "{{$placeholder}}",
            escapeMarkup: function (text) { return text; },
            minimumInputLength: {{$minLength}},
            tags: true,
            ajax:
            {
                url: '{{route("$routeSearch")}}',
                delay: 500,
                dataType: 'json',
                data: function (params)
                {
                    return {q: $.trim(params.term)};
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            },
            current: function (callback)
            {
                var data = [];
                var currentVal = this.$element.val();

                if (!this.$element.prop('multiple')) {
                    currentVal = [currentVal];
                }

                for (var v = 0; v < currentVal.length; v++) {
                    data.push({
                        id: currentVal[v],
                        text: currentVal[v]
                    });
                }
                callback(data);
            },
        });
    });
</script>
@endpush