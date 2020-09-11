@extends('layouts.plantilla')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="margin-bottom:2%;">Lista de Guias de Equipos
                    <a href="javascript:void(0)" id="to-recover" class="float-right" style="margin-bottom:4%;">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#guiaModal"
                            data-whatever="@guia">Crear nueva @guia</button>
                    </a>
                </h4>
                <h6 class="card-subtitle">Crea y modifica guías, en caso de inconvenientes comunicarse con el
                    administrador de Sistemas.
                </h6>
                <div class="table-responsive">
                    <table id="t_guias" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>{{_('ID')}}</th>
                                <th>{{_('Fecha')}}</th>
                                <th>{{_('Guia')}}</th>
                                <th>{{_('Pockets')}}</th>
                                <th>{{_('POS')}}</th>
                                <th>{{_('Recibido Por')}}</th>
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

<!-- sample modal content -->
<div class="modal fade" id="guiaModal" tabindex="-1" role="dialog" aria-labelledby="guiaModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="guiaModalLabel">Nueva Guia</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="FormGuia">
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="guia-name" class="control-label">Guia:</label>
                                <input type="text" class="form-control" id="guia-name" name="guia-name">
                            </div>
                            <div class="col">
                                <label for="date-name" class="control-label">Fecha Recepción:</label>
                                <input type="text" class="form-control" id="date-name" name="date-name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="pocket-mount" class="control-label">Pockets:</label>
                                <input type="number" min="0" value="0" class="form-control" id="pocket-mount"
                                    name="pocket-mount">
                            </div>
                            <div class="col">
                                <label for="pos-mount" class="control-label">POS:</label>
                                <input type="number" min="0" value="0" class="form-control" id="pos-mount"
                                    name="pos-mount">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="close-modal">Close</button>
                <button type="button" class="btn btn-primary" id="crear-guia">Crear</button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
@endsection

@push('scripts')
<script>
    //Inicio de Funciones
    $(document).ready(function () {
        $("#crear-guia").on('click',enviaGuia);
    });


    //Generando calendario Fecha
    $("#date-name").datetimepicker({
        lang:'ru'
    });
    //Generando Tabla Guias
    var table = $('#t_guias').DataTable({
        serverSide: true,
        'ajax': {
            'url': '{{ route("get.guias") }}',
            'dataType': 'json',
            'type': 'get'
        },'columns': [
            { 'data': 'id'},
            { 'data': 'received_at'},
            { 'data': 'guide'},
            { 'data': 'pockets'},
            { 'data': 'pos'},
            { 'data': 'full_name'},
            { 'defaultContent': '<div style="text-align:center"><button class="btn btn-success btn-xs" id="register"><i class="ti-upload"></i></button>'+'&nbsp;'+
                                '<button class="btn btn-danger btn-xs" id="delete"><i class="ti-trash"></i></button>'+'&nbsp;'+
                                '<button class="btn btn-info btn-xs" id="edit"><i class="ti-pencil"></i></button></div>'},
        ],
        "order": [
            [0, "desc"]
        ]
    });

    //Registrar Data Guia
    $('#t_guias').on('click', 'tr td #register', function () {
        var row = $(this).parents('tr')[0];
        var mydata = (table.row(row).data());
        var idData =mydata["id"];
        var url = '{{ route("warehouse.register", ":id") }}';
        url = url.replace(':id', idData);
        location.href=url;
    });

    //Eliminar Guia
    $('#t_guias').on('click', 'tr td #delete', function () {
        var row = $(this).parents('tr')[0];
        var mydata = (table.row(row).data());
        var idData =mydata["id"];
        var url = '{{ route("warehouse.delete", ":id") }}';
        url = url.replace(':id', idData);
        swal({
            title: 'Estas seguro de eliminar esta Guia?',
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
                    text: 'Si, Crealo!',
                    value: true,
                    visible: true,
                    className: "bg-success",
                    closeModal: false
                }
            }
        }).then(function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                type:'GET',
                url:url,
                data: { id: idData},
                success: function(data)
                {
                    swal('Correcto!', 'Guia Eliminada correctamente.', 'success');
                    table.ajax.reload();
                },
                error: function(result) {
                    swal('Error','','error');
                },
            });
         } else {
                swal('Cancelado', 'Aqui no paso nada! :', 'error');
            }
        });
    });

    //Creando Funcion de creado
    function enviaGuia(g){
        g.preventDefault();
        var url3 = "{{route('warehouse.crear')}}";
        swal({
            title: 'Estas seguro de crear esta Guia?',
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
                    text: 'Si, Crealo!',
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
                url: url3,        // Only URL changed from your code
                method: 'POST',
                data: {"_token": "{{ csrf_token() }}",data:$('#FormGuia').serialize()},
                success: function (data) {
                    $('#close-modal').click()
                    $('#FormGuia').trigger("reset");
                    swal('Felicidades!', 'La guia fue creada.', 'success');
                    table.ajax.reload();
                },
                error: function(result) {
                    swal('Error',
                    'Posibles fallos:'+
                    '\n*Recuadros Vacios (Rellene Cuadros)'+
                    '\n*Sesion Expirada (F5)'+
                    '\n*Data Erronea (Verifique valores)',
                    'error');
                },
            });
            } else {
                $('#close-modal').click();
                swal('Cancelado', 'Aqui no paso nada! :', 'error');
            }
        });
    };
</script>

@endpush
