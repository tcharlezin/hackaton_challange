<div class="form-group {{ $colmdx  }}">
    {!! Form::label($name, $label) !!}
    <br/>
    {!! Form::select($name."[]", $list, $selectedIds, ['id'=>$name, 'class'=>'form-control js-states', 'multiple' => 'multiple']) !!}
</div>

@push('scripts')
<script>
    $(function()
    {
        $('#{{ $name }}').select2(
        {
            language: 'pt-BR',
            tags: true,
            tokenSeparators: [';', ','],
            escapeMarkup: function (text) { return text; },
        });
    });
</script>
@endpush