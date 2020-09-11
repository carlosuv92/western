@extends('layouts.plantilla')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="" id="phoneForm">
                    <div class="form-body">
                        <h3 class="card-title">Datos del Equipo</h3>
                        <hr>
                        <div class="form-group" style="display: none">
                            <label for="guide" class="col-md-4 col-form-label text-md-right">{{ __('Guía') }}</label>
                            <div class="col-md-6">
                                <p>{{ $guide->id }}</p>
                                <input id="guide" type="hidden" class="form-control" name="guide"
                                    value="{{ $guide->id }}" required>
                            </div>
                        </div>
                        <div class="row p-t-20">
                            <!--/Nombre de Usuario-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">SERIE</label>
                                    <input type="text" maxlength='20' name="serie" id="serie" class="form-control"
                                        required autofocus>
                                    <small class="form-control-feedback"> Ingrese Serie del Equpo </small>
                                </div>
                            </div>
                            <!--/Nombre de Usuario-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Caja</label>
                                    <input type="text" name="reference" id="reference" class="form-control" required>
                                    <small class="form-control-feedback"> Ingrese Caja a Asignar </small>
                                </div>
                            </div>
                            <!--/Nombre de Usuario-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Marca</label>
                                    <select class="form-control custom-select" id="brand" name="brand">
                                        @foreach ($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                    <small class="form-control-feedback"> Seleccione Marca del Equipo </small>
                                </div>
                            </div>
                        </div>
                        <div class="row p-t-20 pull-right">
                            <div class="form-actions">
                                <button class="btn btn-success" id="ajaxSubmit"> <i class="fa fa-check"></i>
                                    Crear</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <table id="ware-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>{{_('ID')}}</th>
                        <th>{{_('SERIE')}}</th>
                        <th>{{_('Guia')}}</th>
                        <th>{{_('Caja')}}</th>
                        <th>{{_('Marca')}}</th>
                        <th style="width: 18%">{{_('Fecha')}}</th>
                        <th style="text-align:center">{{_('Opciones')}}</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    var table = $('#ware-table').DataTable({
        "order": [[ 1, "desc" ]],
        dom: 'lBfrtip',
        "lengthMenu": [ [10, 15, 25, 50, -1], [10, 15, 25, 50, "All"] ],
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        serverSide: true,
        'ajax': {
            'url': '{{ route("get.pockets", $guide->id) }}',
            'dataType': 'json',
            'type': 'get'
        },
        'columns': [
            { 'data': 'id'},
            { 'data': 'serie'},
            { 'data': 'guia'},
            { 'data': 'reference'},
            { 'data': 'marca'},
            { 'data': 'created_at',
                /*"render": function (data) {
                    var date = new Date(data);
                    var month = date.getMonth() + 1;
                    return (month.length > 1 ? month : "0" + month) + "/" + date.getDate() + "/" + date.getFullYear();
                }*/
            },
            { 'data': 'action', orderable:false,searchable:false},
        ]
    });

    table.order( [ 0, 'desc' ] ).draw();

    $("#ajaxSubmit").click(function(e){
        e.preventDefault();

        var serie = $('#serie').val();
        var brand = $('#brand').val();
        var reference = $('#reference').val();
        var guide = $('#guide').val();
        var url = "{{route('pocket.store')}}";
            $.ajax({
                cache: false,
                url: url,        // Only URL changed from your code
                method: 'POST',
                data: {"_token": "{{ csrf_token() }}",serie:serie,brand:brand,reference:reference,guide:guide},
                success: function (data) {
                    $('#serie').val('');
                    $('#serie').focus();
                    table.ajax.reload();
                }
            });
    });

    $(document).on('click', '.delete', function(){
        var id = $(this).attr('id');
        console.log(id);
        if(confirm("Desea eliminar el registro?"))
        {
            $.ajax({
                url:"{{route('pocket.delete')}}",
                method:"get",
                data:{id:id},
                success:function(data)
                {
                    table.ajax.reload();
                }
            })
        }
        else
        {
            return false;
        }
    });
</script>
@endpush
