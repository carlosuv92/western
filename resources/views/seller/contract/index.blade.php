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
                                <th>{{_('Nombre Cliente')}}</th>
                                <th>{{_('Negocio')}}</th>
                                <th>{{_('Docuento')}}</th>
                                <th>{{_('Serie')}}</th>
                                <th>{{_('Orden')}}</th>
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

@endsection

@push('scripts')
<script>

    var url = '{{ route("get.sellcontratos", ":id") }}';
        url = url.replace(':id', {{\Auth::user()->id}});
        var table = $('#t_contratos').DataTable({
        serverSide: true,
        'ajax': {
            'url': url,
            'dataType': 'json',
            'type': 'get'
        },'columns': [
            { 'data': 'idcont'},
            { 'data': 'name'},
            { 'data': 'negocio'},
            { 'data': 'document'},
            { 'data': 'serie'},
            { 'data': 'orden'},
            { 'defaultContent': '<div style="text-align:center"><button class="btn btn-success btn-xs" id="register"><i class="ti-upload"></i></button>'+'&nbsp;'+
                                '<button class="btn btn-danger btn-xs" id="delete"><i class="ti-trash"></i></button>'+'&nbsp;'+
                                '<button class="btn btn-info btn-xs" id="edit"><i class="ti-pencil"></i></button></div>'},
        ],
        "order": [
            [0, "desc"]
        ]
    });

    //Registrar Data Guia
    /*
    $('#t_contratos').on('click', 'tr td #register', function () {
        var row = $(this).parents('tr')[0];
        var mydata = (table.row(row).data());
        var idData =mydata["id"];
        var url = '{{ route("warehouse.register", ":id") }}';
        url = url.replace(':id', idData);
        location.href=url;
    });
    */

    //Eliminar Guia
    /*
    $('#t_contratos').on('click', 'tr td #delete', function () {
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
    */
</script>

@endpush
