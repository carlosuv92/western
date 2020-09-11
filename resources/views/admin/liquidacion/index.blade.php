@extends('layouts.plantilla')
@push('styles')
<style>
    table.dataTable tbody tr.selected {
        color: white !important;
        background-color: darkcyan !important;
        opacity: 0.5;
        filter: alpha(opacity=50);

    }
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center">
                    <div>
                        <h4 class="card-title">Liquidacion de Supervisores</h4>
                    </div>
                </div>
                <br>
                <div class="table-responsive">
                    <table id="p_contratos" class="table table-striped table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th>CIUDAD</th>
                                <th>MONTO</th>
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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Liquidacion de Supervisores</h4>
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table id="l_contratos" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Fecha</th>
                                    <th>Nombre Cliente</th>
                                    <th>Documento</th>
                                    <th>Telefono</th>
                                    <th>Tipo</th>
                                    <th>Modelo</th>
                                    <th>A Pagar</th>
                                    <th>Pagado</th>
                                    <th>Asesor</th>
                                    <th>Supervisor</th>
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
        var tablex = $('#p_contratos').DataTable({
            serverSide: false,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv','excel'
            ],
            'ajax': {
                'url': '{{ route("get.liquidaciond") }}',
                'dataType': 'json',
                'type': 'get'
            },'columns': [
                { 'data': 'lugar'},
                { 'data': 'precio'},
            ],
            "order": [
                [1, "desc"]
            ]
        });



        var table = $('#l_contratos').DataTable({
        serverSide: false,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv','excel'
        ],
        'ajax': {
            'url': '{{ route("get.liquidacion") }}',
            'dataType': 'json',
            'type': 'get'
        },'columns': [
            { 'data': 'idcont'},
            { 'data': 'fecha'},
            { 'data': 'name'},
            { 'data': 'document'},
            { 'data': 'phone'},
            { 'data': 'pok'},
            { 'data': 'marca'},
            { 'data': 'precio'},
            { 'data': 'pagado',
                render: function(data) {
                    if(data==1) {
                        return '<label class="label label-success">Pagado</label>'
                    }else{
                        return '<label class="label label-danger">Sin Pago</label>'
                    }
                }
            },
            { 'data': 'vendedor'},
            { 'data': 'super'},
        ],
        "order": [
            [0, "desc"]
        ]
    });

    $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
    table.order( [ 2, 'asc' ] ).draw();
</script>

@endpush
