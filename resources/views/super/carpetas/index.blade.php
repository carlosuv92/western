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
                                <th>{{_('Documento')}}</th>
                                <th>{{_('RUC')}}</th>
                                <th>{{_('Serie')}}</th>
                                <th>{{_('Orden')}}</th>
                                <th>{{_('Vendedor')}}</th>
                                <th style="width:13%">{{_('Status')}}</th>
                                <th style="width:25%">{{_('Status Supervisor')}}</th>
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
    var url = '{{ route("get.carpetas", ":id") }}';
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
            { 'data': 'document'},
            { 'data': 'ruc'},
            { 'data': 'serie'},
            { 'data': 'orden'},
            { 'data': 'vendedor'},
            { 'data': 'folder',
                render: function(data) {
                    if(data==1) {
                        return '<label class="label label-danger">No entregado</label>'
                    }else if(data==2){
                        return '<label class="label label-warning">En Visual</label>'
                    }else if(data==3){
                        return '<label class="label label-success">En Visa</label>'
                    }else if(data==5){
                        return '<label class="label label-info">Esperando Confirmar...</label>'
                    }
                }
            },
            { 'data': 'folder_sup',
                render: function(data) {
                    if(data==1) {
                        return '<div style="text-align:center"><button class="btn btn-success btn-xs" id="entregado">Entregado <i class="ti-upload"></i></button>'+'<br>'+
                                '<button class="btn btn-warning btn-xs" id="enviado">Enviado <i class="ti-trash"></i></button>'
                    }else if(data==4){
                        return '<div style="text-align:center"><button class="btn btn-secondary btn-xs" id="entregado" disabled>Entregado <i class="ti-upload"></i></button>'+'<br>'+
                                '<button class="btn btn-warning btn-xs" id="enviado">Enviado <i class="ti-trash"></i></button>'
                    }else if(data==5){
                        return '<div style="text-align:center"><button class="btn btn-secondary btn-xs" id="enviado" disabled>Enviado <i class="ti-trash"></i></button>'
                    }
                }
            },
        ],
        "order": [
            [0, "desc"]
        ]
    });


    $('#t_contratos').on('click', 'tr td #entregado', function () {
            var row = $(this).parents('tr')[0];
            var mydata = (table.row(row).data());
            var idData =mydata["id"];
            $.ajax({
                type:'GET',
                url:'folder/entregado/'+idData,
                success: function(response)
                {
                    table.ajax.reload();
                }
            });
       });
    $('#t_contratos').on('click', 'tr td #enviado', function () {
        var row = $(this).parents('tr')[0];
        var mydata = (table.row(row).data());
        var idData =mydata["id"];
        $.ajax({
            type:'GET',
            url:'folder/enviado/'+idData,
            success: function(response)
            {
                table.ajax.reload();
            }
        });
    });
</script>

@endpush
