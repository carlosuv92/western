@extends('layouts.plantilla')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="margin-bottom:2%;">Lista de Ventas POS
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
                                <th>{{_('RUC')}}</th>
                                <th>{{_('Orden')}}</th>
                                <th>{{_('Vendedor')}}</th>
                                <th>{{_('Supervisor')}}</th>
                                <th>{{_('Estado')}}</th>
                                <th>{{_('Fecha LLamada')}}</th>
                                <th>{{_('Comentario')}}</th>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Seleccionar Status</label>
                                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;"
                                        id="estado_llamada" name="estado_llamada">
                                        <option value='1'>PENDIENTE</option>
                                        <option value='2'>INSTALADO</option>
                                        <option value='3'>AGENDADO</option>
                                        <option value='4'>REAGENDADO</option>
                                        <option value='4'>RECHAZADO</option>
                                    </select>
                                    <small class="form-control-feedback">Seleccionar Status</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">INGRESE FECHA DE LLAMADA</label>
                                <input type="date" class="form-control" id="fecha_llamada" name="fecha_llamada"
                                    required>
                                <small class="form-control-feedback">INGRESE FECHA DE LLAMADA</small>
                            </div>
                        </div>
                        <div class="row p-t-20">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Comentario</label>
                                    <textarea class="form-control" rows="4" name="comentario" id="comentario"></textarea>
                                    <span class="bar"></span>
                                    <small class="form-control-feedback">Comentario</small>
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
        serverSide: true,
        'ajax': {
            'url': '{{ route("get.pos") }}',
            'dataType': 'json',
            'type': 'get'
        },'columns': [
            { 'data': 'idcont'},
            { 'data': 'fecha'},
            { 'data': 'name'},
            { 'data': 'phone'},
            { 'data': 'document'},
            { 'data': 'ruc'},
            { 'data': 'orden'},
            { 'data': 'vendedor'},
            { 'data': 'super'},
            { 'data': 'estado_llamada',
            render: function(data,row,index) {
                        if(data == "1"){
                            return '<div class="card m-b-20 text-white bg-info text-xs-center" style="text-align: center;font-size: 12px;">PENDIENTE</div>'
                        }else if(data == "2"){
                            return '<div class="card m-b-20 text-white bg-success text-xs-center" style="text-align: center;font-size: 12px;">INSTALADO</div>'
                        }else if(data == "3"){
                            return '<div class="card m-b-20 text-white bg-warning text-xs-center" style="text-align: center;font-size: 12px;">AGENDADO</div>'
                        }else if(data == "4"){
                            return '<div class="card m-b-20 text-white bg-purple text-xs-center" style="text-align: center;font-size: 12px;">REAGENDADO</div>'
                        }else{
                            return '<div class="card m-b-20 text-white bg-info text-xs-center" style="text-align: center;font-size: 12px;">PENDIENTE</div>'
                        }
                    }
            },
            { 'data': 'llamada'},
            { 'data': 'comentario'},
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


    $(document).ready(function () {
        $(".rem #ajaxSubmit").on('click',enviaDataVendedor);
    });

    function enviaDataVendedor(h){
    h.preventDefault();
    var url4 = "{{route('contract.comentario')}}";
    swal({
        title: 'Estas segura de activar?',
        text: 'Piensalo y continua!',
        icon: 'warning',
        buttons: {
            cancel: {
                text: 'No, cancela plx!',
                value: null,
                visible: true,
                className: "",
                closeModal: false
            },
            confirm: {
                text: 'Si, Actualizalo!',
                value: true,
                visible: true,
                className: "bg-success",
                closeModal: false
            }
        }
    }).then(function(isConfirm) {
        if (isConfirm) {
            $.ajax({
            cache: false,
            url: url4,        // Only URL changed from your code
            method: 'POST',
            data: {"_token": "{{ csrf_token() }}",data:$('.rem #modalForm').serialize()},
            success: function (data) {
                $('.rem #close-modal-info').click()
                $('.rem #modalForm').trigger("reset");
                swal('Felicidades!', 'El Usuario fue Actualizado.', 'success');
                //table.ajax.reload();
                location.reload();
            },
            error: function(result) {
                swal('Cancelado', 'Completa todos los cuadros', 'error');
            },
        });
        } else {
            $('.rem #close-modal-info').click()
            swal('Cancelado', 'Aqui no paso nada! :)', 'error');
        }
    });

};



</script>

@endpush
