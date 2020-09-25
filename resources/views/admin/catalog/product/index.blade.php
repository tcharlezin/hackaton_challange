@extends('admin.layouts.componente.listagem.pagina')

@section('titulo', 'Lista de Produtos')

@section('rotaCreate') {{route("$rota.create")}} @stop

@section('tabela')

    <table id="tabela" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Imagem</th>
            <th>Criado em</th>
            <th>Categoria</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Referencia</th>
            <th>Action</th>
        </tr>
        </thead>
    </table>

@endsection

@push('scripts')

    <script type="text/javascript">
        $(function () {
            $('#tabela').DataTable({
                processing: true,
                ajax: '{!! route("$rota.index") !!}',
                columns: [
                    {
                        data: 'image', name: 'image',
                        render: function(data)
                        {
                            return "<img src='"+ data + "' style='max-height: 100px; max-width: 100px;'>";
                        }
                    },
                    {
                        data: 'created_at', name: 'created_at',
                        render: function(d)
                        {
                            return moment(d).format("DD/MM/YYYY HH:mm:ss");
                        }
                    },
                    {data: 'category.name', name: 'category.name'},
                    {data: 'name', name: 'name'},
                    {data: 'price', name: 'price'},
                    {data: 'ref', name: 'ref'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                language: {
                    url: '{{asset('admin/plugins/datatables/media/js/pt-BR.json')}}'
                }
            });
        });
    </script>

@endpush
