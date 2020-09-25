<div class="form-group {{ $colmdx  }}">
    {!! Form::label($name, $label) !!}
    <br/>
    {!! Form::select($name."[]",
                    $list,
                    null,
                    ['id'=>$name,
                     'class'=>'form-control js-states',
                     'multiple' => 'multiple',
                     'style' => 'width: 100%'
                    ]) !!}
</div>

@push('scripts')
<script>
    $(function ()
    {
        $('#{{ $name }}').select2(
                {
                    language          : 'pt-BR',
                    placeholder       : "{{$placeholder}}",
                    minimumInputLength: {{$minLength}},
                    tokenSeparators   : [';', ','],
                    tags              : true,
                    ajax              : {
                        url           : '{{route("$routeSearch")}}',
                        delay         : 500,
                        dataType      : 'json',
                        data          : function (params)
                        {
                            return {q: $.trim(params.term)};
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