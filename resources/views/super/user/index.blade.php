@extends('layouts.plantilla')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="margin-bottom:2%;">Lista de Usuarios
                </h4>
                <div class="table-responsive">
                    <table id="t_contratos" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{_('ID')}}</th>
                                <th>{{_('Nombre')}}</th>
                                <th>{{_('Apellido')}}</th>
                                <th>{{_('Documento')}}</th>
                                <th>{{_('Correo')}}</th>
                                <th>{{_('Ciudad')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>

    var url = '{{ route("get.usuarios_sup", ":id") }}';
        url = url.replace(':id', {{\Auth::user()->id}});
        var table = $('#t_contratos').DataTable({
        serverSide: true,
        'ajax': {
            'url': url,
            'dataType': 'json',
            'type': 'get'
        },'columns': [
            { 'data': 'iduser'},
            { 'data': 'name'},
            { 'data': 'surname'},
            { 'data': 'document'},
            { 'data': 'email'},
            { 'data': 'address'},
        ],
        "order": [
            [0, "desc"]
        ]
    });
</script>

@endpush
