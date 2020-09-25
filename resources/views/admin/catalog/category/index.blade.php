@extends('admin.layouts.componente.listagem.pagina')

@section('titulo', 'Lista de Categorias')

@section('rotaCreate') {{route("$rota.create")}} @stop

@section('tabela')

    <table id="tabela" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Criado em</th>
            <th>Nome</th>
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
                        data: 'created_at', name: 'created_at',
                        render: function(d)
                        {
                            return moment(d).format("DD/MM/YYYY HH:mm:ss");
                        }
                    },
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                language: {
                    url: '{{asset('admin/plugins/datatables/media/js/pt-BR.json')}}'
                }
            });
        });
    </script>

@endpush
