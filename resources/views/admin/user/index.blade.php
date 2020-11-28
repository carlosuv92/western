@extends('layouts.plantilla')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex m-b-30 no-block">
                    <div>
                        <h4 class="d-md-flex align-items-center">Lista de Usuarios</h4>
                    </div>
                    <div class="ml-auto">
                        <div class="dl">
                            <form action="{{route('usuarios.create')}}">
                                <button type="submit" class="btn btn-secondary">Nuevo Usuario</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="t_contratos" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="display: none;">ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Rol</th>
                                <th>Documento</th>
                                <th>Correo</th>
                                <th>Estado</th>
                                <th style="width:10%">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="display: none;">ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Rol</th>
                                <th>Documento</th>
                                <th>Correo</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    var url = '{{ route("get.usuarios", ":id") }}';
        url = url.replace(':id', {{\Auth::user()->id}});
        var table = $('#t_contratos').DataTable({
        serverSide: false,
        dom: 'lBfrtip',
        "lengthMenu": [ [15, 25, 50, -1], [15, 25, 50, "All"] ],
        buttons: [
                { extend: 'copy', className: 'btn btn-success' },
                { extend: 'csv', className: 'btn btn-success' },
                { extend: 'excel', className: 'btn btn-success'},
                { extend: 'pdf', className: 'btn btn-success'},
                { extend: 'print', className: 'btn btn-success' }
            ],
        /*searchPane: {
        columns: [':contains("Ciudad")', ':contains("Estado")', ':contains("Rol")'],
        threshold: 0
        },*/
        'ajax': {
            'url': url,
            'dataType': 'json',
            'type': 'get'
        },'columns': [
            { 'data': 'iduser',"visible": false},
            { 'data': 'name'},
            { 'data': 'surname'},
            { 'data': 'roles'},
            { 'data': 'document'},
            { 'data': 'email'},
            { 'data': 'active',
                render: function(data,row,index) {
                    if(data=="ACTIVO"){
                        return '<div style="text-align: center;font-size: 14px;" class="card m-b-20 text-white bg-success text-xs-center">ACTIVO</div>'
                    }else if(data=="DE BAJA"){
                        return '<div style="text-align: center;font-size: 14px;" class="card m-b-20 text-white bg-danger text-xs-center">DE BAJA</div>'
                    }
                }
            },
            { 'defaultContent': '<div style="text-align:center"><button class="btn btn-success btn-xs" id="act"><i class="fa fa-thumbs-up"></i></button>'+'&nbsp;'+
                                '<button class="btn btn-danger btn-xs" id="des"><i class="fa fa-thumbs-down"></i></button>'+'&nbsp;'+
                                '<button class="btn btn-info btn-xs d-none" id="edit"><i class="fa fa-edit"></i></button></div>'},
        ],
        "order": [
            [0, "desc"]
        ]
    });


    $('#t_contratos').on('click', 'tr td #edit', function () {
        var row = $(this).parents('tr')[0];
        var mydata = (table.row(row).data());
        var idData =mydata["iduser"];
        var url = '{{ route("usuarios.edit", ":id") }}';
        url = url.replace(':id', idData);
        location.href=url;
    });

    $('#t_contratos').on('click', 'tr td #act', function () {
            var row = $(this).parents('tr')[0];
            var mydata = (table.row(row).data());
            var idData =mydata["iduser"];
            $.ajax({
                type:'GET',
                url:'usuarios/act/'+idData,
                success: function(response)
                {
                    table.ajax.reload();
                }
            });
       });

    $('#t_contratos').on('click', 'tr td #des', function () {
        var row = $(this).parents('tr')[0];
        var mydata = (table.row(row).data());
        var idData =mydata["iduser"];
        $.ajax({
            type:'GET',
            url:'usuarios/des/'+idData,
            success: function(response)
            {
                table.ajax.reload();
            }
        });
    });
</script>

@endpush
