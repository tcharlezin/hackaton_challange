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

