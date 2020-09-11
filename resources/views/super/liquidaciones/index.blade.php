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

<form id="assign" action="{{route('contract.assignvoucher')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Liquidacion de Contratos</h4>
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table id="l_contratos" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>{{_('ID')}}</th>
                                    <th>{{_('Fecha Contrato')}}</th>
                                    <th>{{_('Nombre Cliente')}}</th>
                                    <th>{{_('Documento')}}</th>
                                    <th>{{_('Telefono')}}</th>
                                    <th>{{_('Tipo')}}</th>
                                    <th>{{_('Marca')}}</th>
                                    <th>{{_('A Pagar')}}</th>
                                    <th>{{_('Pagado')}}</th>
                                    <th>{{_('Operacion - Transferencia')}}</th>
                                    <th>{{_('Monto')}}</th>
                                    <th>{{_('Comentario')}}</th>
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
    <hr>
    <br>
    <div class="row">
        <div class="col-12">
            <div class="card-body" style="padding: 0 !important;">
                <h4>Para los elementos seleccionados:</h4>
                <div class="form-group row">
                    <div class="col-md-3">
                        <input type="text" class="form-control" placeholder="voucher" id="voucher" name="voucher" required>
                    </div>
                    <div class="col-md-3">
                        <input type="submit" name="action" value="Pagar" class="btn btn-primary"
                            style="text-align: center;" aria-label="{{ __('Pagar') }}" />
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@push('scripts')
<script>
    var url = '{{ route("get.supliqui", ":id") }}';
        url = url.replace(':id', {{\Auth::user()->id}});
        var table = $('#l_contratos').DataTable({
        serverSide: true,
        'ajax': {
            'url': url,
            'dataType': 'json',
            'type': 'get'
        },'columns': [
            { 'data': 'idcont'},
            { 'data': 'created_at'},
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
            { 'data': 'num_voucher'},
            { 'data': 'monto'},
            { 'data': 'comentario'},
        ],
        "order": [
            [0, "desc"]
        ]
    });

    jQuery(function($){
          $('table tbody').on('click', 'tr', function(){
            $(this).toggleClass('selected');
            $('#assign [name^=check_list]').remove();
            var rows = table.rows('.selected').data();
            for (var i = rows.length - 1; i >= 0; i--) {
              $('#assign').append('<input type="hidden" name="check_list[]" value="'+rows[i].id+'" />');
            }
          });
        });
</script>

@endpush
