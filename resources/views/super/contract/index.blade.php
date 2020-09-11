@extends('layouts.plantilla')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="margin-bottom:2%;">Lista de Contratos
                </h4>
                <div class="table-responsive">
                    <table id="t_contratos" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>{{_('ID')}}</th>
                                <th>{{_('Fecha de Ingreso')}}</th>
                                <th>{{_('Nombre Cliente')}}</th>
                                <th>{{_('Negocio')}}</th>
                                <th>{{_('Documento')}}</th>
                                <th>{{_('Serie')}}</th>
                                <th>{{_('Orden')}}</th>
                                <th>{{_('Vendedor')}}</th>
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

    var url = '{{ route("get.supcontratos", ":id") }}';
        url = url.replace(':id', {{\Auth::user()->id}});
        var table = $('#t_contratos').DataTable({
        serverSide: true,
        'ajax': {
            'url': url,
            'dataType': 'json',
            'type': 'get'
        },'columns': [
            { 'data': 'idcont'},
            { 'data': 'fecha'},
            { 'data': 'name'},
            { 'data': 'negocio'},
            { 'data': 'document'},
            { 'data': 'serie'},
            { 'data': 'orden'},
            { 'data': 'vendedor'},
        ],
        "order": [
            [0, "desc"]
        ]
    });
</script>

@endpush
