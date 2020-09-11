@extends('layouts.plantilla')
@push('styles')
<style>
#cover-spin {
    position:fixed;
    width:100%;
    left:0;right:0;top:0;bottom:0;
    background-color: rgba(255,255,255,0.7);
    z-index:9999;
    display:none;
}

@-webkit-keyframes spin {
	from {-webkit-transform:rotate(0deg);}
	to {-webkit-transform:rotate(360deg);}
}

@keyframes spin {
	from {transform:rotate(0deg);}
	to {transform:rotate(360deg);}
}

#cover-spin::after {
    content:'';
    display:block;
    position:absolute;
    left:48%;top:40%;
    width:40px;height:40px;
    border-style:solid;
    border-color:black;
    border-top-color:transparent;
    border-width: 4px;
    border-radius:50%;
    -webkit-animation: spin .8s linear infinite;
    animation: spin .8s linear infinite;
}
</style>


@endpush

@section('content')
<div id='cover-spin'></div>
<div class="card">
    <div class="card-header">
        <h3 class="header-title">Filtro de Fecha</h3>
    </div>
    <div class="card-body">
        <div class="row" id="filterRow">
            <div class="input-daterange input-group" id="report-date-filter">

                <div class="col-md-2">
                </div>
                <div class="col-md-3">
                    <input id="Min-Date" type="text" class="input-sm form-control" placeholder="Fecha de Inicio"
                        name="Min-Date" />
                </div>
                <div class="col-md-2" style="text-align:center;margin: auto;">
                    <b>
                        <p style="margin: auto;">HASTA</p>
                    </b>
                </div>
                <div class="col-md-3">
                    <input id="Max-Date" type="text" class="input-sm form-control" placeholder="Fecha de fin"
                        name="Max-Date" />
                </div>

                <div class="col-md-2">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="margin-bottom:2%;">Lista de Ventas
                </h4>
                <div class="table-responsive">
                    <table id="t_contratos" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>{{_('ID')}}</th>
                                <th>{{_('Fecha')}}</th>
                                <th>{{_('Nombre Cliente')}}</th>
                                <th>{{_('Telefono Cliente')}}</th>
                                <th>{{_('Documento')}}</th>
                                <th>{{_('Negocio')}}</th>
                                <th>{{_('RUC')}}</th>
                                <th>{{_('Tipo')}}</th>
                                <th>{{_('Vendedor')}}</th>
                                <th>{{_('Supervisor')}}</th>
                                <th style="width:20%">{{_('Opciones')}}</th>
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

<!-- Modal -->
<div class="modal fade rem" id="modal-cont" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="titulo"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modalForm">
                <div class="modal-body">
                    <input type="text" name="id" id="id" class="d-none form-control" required>
                    <div class="form-body">
                        <div class="row p-t-20">
                            <!--/Nombre de Usuario-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Seleccionar Vendedor</label>

                                    <small class="form-control-feedback">Seleccionar Vendedor</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="close-modal-info" type="button" class="btn btn-secondary"
                        data-dismiss="modal">Cancelar</button>
                    <button id="ajaxSubmit" class="btn btn-success">Asignar</button>
                </div>
        </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $('#report-date-filter').on('changeDate', function(e) {
        var cases = ["Min-Date", "Max-Date"];
        reportFilterRange[cases.indexOf(e.target.id)] = Date.parse(e.date);
        console.log(reportFilterRange[cases.indexOf(e.target.id)]);
        table.draw();
    });

    $("#report-date-filter").datepicker({
        format: 'yyyy/mm/dd',
        clearBtn: true
    });



    var table = $('#t_contratos').DataTable({
        dom: 'Bfrtip',
        lengthMenu: [
        [ 10, 25, 50, -1 ],
        [ '10 filas', '25 filas', '50 filas', 'Ver Todo' ]
        ],
        buttons: [
            'copy', 'csv', [{
            extend: 'excel',
            exportOptions: {
                orthogonal: 'sort'
            },
            customizeData: function ( data ) {
                for (var i = 0; i < data.body.length; i++){
                    for (var j=0; j<data.body[i].length; j++ ){
                    data.body[i][8] = '\u200C' + data.body[i][8];
                    }
                }
            }
            }], 'pdf', 'pageLength'
        ],
        serverSide: false,
        'ajax': {
            'url': '{{ route("get.contratos") }}',
            'dataType': 'json',
            'type': 'get'
        },'columns': [
            { 'data': 'idcont'},
            { 'data': 'fecha'},
            { 'data': 'name'},
            { 'data': 'phone'},
            { 'data': 'document'},
            { 'data': 'negocio'},
            { 'data': 'ruc'},
            { 'data': 'tipo'},
            { 'data': 'vendedor'},
            { 'data': 'super'},
            { 'defaultContent': '<div style="text-align:center"><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-cont" id="edit"><i class="ti-pencil"></i></button></div>'},
        ],
        "order": [
            [0, "desc"]
        ]
    });

    var reportFilterRange = [null, null];
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
        var date = Date.parse(data[1]);
        console.log("ksadhjas");
        console.log(date);
        if (reportFilterRange[0] && date < reportFilterRange[0]) return false;
        if (reportFilterRange[1] && date > reportFilterRange[1]) return false;
        return true;
        }
    );

   // $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-collection, .dt-button.button-page-length , .buttons-excel').addClass('btn btn-primary mr-1');


    $('#t_contratos').on('click', 'tr td #edit', function () {
    var row = $(this).parents('tr')[0];
    var mydata = (table.row(row).data());
    var id =mydata["idcont"];
    var name =mydata["name"];
    $('.rem #titulo').html("CLIENTE "+ name)
    $('.rem #id').val(function() {
        return id;
    });
    });


</script>

@endpush
