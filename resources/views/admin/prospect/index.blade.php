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
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="margin-bottom:2%;">Lista de Visitas
                </h4>
                <div class="table-responsive">
                    <table id="t_prospect" class="table table-striped table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Creado</th>
                                <th>Departamento</th>
                                <th>Asesor</th>
                                <th>Nombre Cliente</th>
                                <th>Telefono</th>
                                <th>Celular</th>
                                <th>Nivel Interes</th>
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

jQuery.ajaxSetup({
        beforeSend: function() {
            $('#cover-spin').show();
        },
        complete: function(){
            $('#cover-spin').hide();
        },
        success: function() {}
        });


    var url = '{{ route("get.prospect", ":id") }}';
        url = url.replace(':id', {{\Auth::user()->id}});
        var table = $('#t_prospect').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf'
        ],
        serverSide: false,
        'ajax': {
            'url': url,
            'dataType': 'json',
            'type': 'get'
        },'columns': [
            { 'data': 'id'},
            { 'data': 'created_at'},
            { 'data': 'department'},
            { 'data': 'seller'},
            { 'data': 'name'},
            { 'data': 'phone'},
            { 'data': 'cellphone'},
            { 'data': 'priority'},
        ],
        "order": [
            [0, "desc"]
        ]
    });

</script>

@endpush
