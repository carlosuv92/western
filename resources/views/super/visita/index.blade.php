@extends('layouts.plantilla')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="margin-bottom:2%;">Lista de Visitas
                </h4>
                <div class="table-responsive">
                    <table id="t_visitas" class="table table-striped table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>{{_('ID')}}</th>
                                <th>{{_('Creado el')}}</th>
                                <th>{{_('Vendedor')}}</th>
                                <th>{{_('Nombre Cliente')}}</th>
                                <th>{{_('Documento')}}</th>
                                <th>{{_('Celular')}}</th>
                                <th>{{_('Direccion')}}</th>
                                <th>{{_('Prioridad')}}</th>
                                <th>{{_('Producto Interesado')}}</th>
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

    var url = '{{ route("get.supervisitas", ":id") }}';
        url = url.replace(':id', {{\Auth::user()->id}});
        var table = $('#t_visitas').DataTable({
        serverSide: true,
        'ajax': {
            'url': url,
            'dataType': 'json',
            'type': 'get'
        },'columns': [
            { 'data': 'id'},
            { 'data': 'vendedor'},
            { 'data': 'created_at'},
            { 'data': 'name'},
            { 'data': 'document'},
            { 'data': 'phone'},
            { 'data': 'address'},
            { 'data': 'prioridad'},
            { 'data': 'interesado'},
        ],
        "order": [
            [0, "desc"]
        ]
    });

    //Registrar Data Guia
    /*
    $('#t_visitas').on('click', 'tr td #register', function () {
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
    $('#t_visitas').on('click', 'tr td #delete', function () {
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
