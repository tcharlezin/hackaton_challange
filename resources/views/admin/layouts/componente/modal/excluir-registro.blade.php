<div class="modal modal-info fade" id="modalConfirmarExclusao" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i>
                </button>
                <h4 class="modal-title">Atenção</h4>
            </div>

            <div class="modal-body">
                <div class="media">
                    <div class="media-left pad-rgt">
                        <button class="btn btn-icon btn-circle">
                            <i class="fa fa-trash fa-2x"></i>
                        </button>
                    </div>
                    <div class="media-body pad-lft">
                        <p class="text-semibold text-main">Você tem certeza que quer excluir este registro?</p>
                        A operação não poderá ser defeita.
                    </div>
                </div>
                <input type="hidden" id="idRegistroExclusao" value="">
            </div>

            <div class="modal-footer">
                <button class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary pull-right" id="confirmarExclusao">Confirmar exclusão do registro
                </button>
            </div>
        </div>
    </div>

</div>

@push("scripts")
    <script type="text/javascript">

        function DefinirRegistroExclusao(idRegistroListagem)
        {
            $("#idRegistroExclusao").val(idRegistroListagem);
        }

        $(function ()
        {
            $('#confirmarExclusao').click(function ()
            {
                var idRegistroExclusao = $("#idRegistroExclusao").val();
                $('#formDeleteRegistro' + idRegistroExclusao).submit();
            });
        });

    </script>
@endpush