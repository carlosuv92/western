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
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center">
                    <div>
                        <h4 class="card-title">Equipos por Lugar</h4>
                    </div>
                </div>
                <br>
                <div class="table-responsive">
                    <table id="p_contratos" class="table table-striped table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th>{{_('CIUDAD')}}</th>
                                <th>{{_('JR')}}</th>
                                <th>{{_('PRO')}}</th>
                                <th>{{_('FULL')}}</th>
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

<div class="row">
    <!-- Column -->
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round align-self-center round-danger"><i class="ti-wallet"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h4>{{$pos['almacen']}} JR. / {{$pro['almacen']}} PRO / {{$full['almacen']}} FULL</h4>
                        <span class="text-muted">ALMACEN</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round align-self-center round-danger"><i class="ti-wallet"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h4>{{$pos['arequipa']}} JR. / {{$pro['arequipa']}} PRO / {{$full['arequipa']}} FULL</h4>
                        <span class="text-muted">AREQUIPA</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round align-self-center round-danger"><i class="ti-wallet"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h4>{{$pos['chimbote']}} JR. / {{$pro['chimbote']}} PRO / {{$full['chimbote']}} FULL</h4>
                        <span class="text-muted">CHIMBOTE</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round align-self-center round-danger"><i class="ti-wallet"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h4>{{$pos['trujillo']}} JR. / {{$pro['trujillo']}} PRO / {{$full['trujillo']}} FULL</h4>
                        <span class="text-muted">TRUJILLO</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col d-none">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round align-self-center round-danger"><i class="ti-wallet"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h4>{{$pos['ica']}} JR. / {{$pro['ica']}} PRO / {{$full['ica']}} FULL</h4>
                        <span class="text-muted">ICA</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!-- Column -->
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round align-self-center round-danger"><i class="ti-wallet"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h4>{{$pos['cuzco']}} JR. / {{$pro['cuzco']}} PRO / {{$full['cuzco']}} FULL</h4>
                        <span class="text-muted">CUZCO</span>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Column -->
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round align-self-center round-danger"><i class="ti-wallet"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h4>{{$pos['chiclayo']}} JR. / {{$pro['chiclayo']}} PRO / {{$full['chiclayo']}} FULL</h4>
                        <span class="text-muted">CHICLAYO</span>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Column -->
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round align-self-center round-danger"><i class="ti-wallet"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h4>{{$pos['huancayo']}} JR. / {{$pro['huancayo']}} PRO / {{$full['huancayo']}} FULL</h4>
                        <span class="text-muted">HUANCAYO</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round align-self-center round-danger"><i class="ti-wallet"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h4>{{$pos['piura']}} JR. / {{$pro['piura']}} PRO / {{$full['piura']}} FULL</h4>
                        <span class="text-muted">PIURA</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<br>
<form id="assign" action="{{route('pocket.assignsup')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <table id="assign-table" class="table table-striped table-bordered display">
                    <thead>
                        <tr>
                            <th style="text-align: center">{{_('ID')}}</th>
                            <th style="text-align: center">{{_('GUIA ENTRADA')}}</th>
                            <th style="text-align: center">{{_('GUIA SALIDA')}}</th>
                            <th style="text-align: center">{{_('CAJA')}}</th>
                            <th style="text-align: center">{{_('MODELO')}}</th>
                            <th style="text-align: center">{{_('IMEI')}}</th>
                            <th style="text-align: center">{{_('TIPO')}}</th>
                            <th style="text-align: center">{{_('ULTIMA FECHA')}}</th>
                            <th style="text-align: center">{{_('SUPERVISOR')}}</th>
                            <th style="text-align: center">{{_('CIUDAD')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pockets as $pocket)
                        <tr>
                            <td style="text-align: center">{{$pocket->id}}</td>
                            <td style="text-align: center">{{$pocket->guia->guide}}</td>
                            <td style="text-align: center">{{$pocket->guia_vico}}</td>
                            <td style="text-align: center">{{$pocket->reference}}</td>
                            <td style="text-align: center">{{$pocket->marca->name}}</td>
                            <td>{{$pocket->serie}}</td>
                            <td style="text-align: center">{{$pocket->tipo->name}}</td>
                            <td style="text-align: center">{{$pocket->updated_at}}</td>
                            <td style="text-align: center">@if ($pocket->assigned_to == null) {{$pocket->assigned_to}}
                                @else {{$pocket->user_to->surname}} {{$pocket->user_to->name}} @endif
                            </td>
                            <td style="text-align: center">@if ($pocket->assigned_to == null) {{$pocket->assigned_to}}
                                @else {{$pocket->user_to->address}} @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
                    <div class="col-md-6">
                        <select class="form-control select-costos" id="user" name="user">
                            @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->surname}} {{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" name="action" value="Asignar" class="btn btn-primary"
                            style="text-align: center;" aria-label="{{ __('Asignar') }}" />
                    </div>
                    <div class="col-md-2">
                        <input type="submit" name="action" value="Almacen" class="btn btn-info"
                            style="text-align: center;" aria-label="{{ __('Almacen') }}" />
                    </div>
                    <div class="col-md-2">
                        <input type="submit" name="action" value="Robado" class="btn btn-danger"
                            style="text-align: center;" aria-label="{{ __('Robado') }}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@push('scripts')
<script>

var tablex = $('#p_contratos').DataTable({
            serverSide: false,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv','excel'
            ],
            'ajax': {
                'url': '{{ route("get.ware") }}',
                'dataType': 'json',
                'type': 'get'
            },'columns': [
                { 'data': 'lugar'},
                { 'data': 'totjr'},
                { 'data': 'totpro'},
                { 'data': 'totfull'},
            ],
            "order": [
                [1, "desc"]
            ]
        });



    var table = $('#assign-table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', [{
            extend: 'excel',
            exportOptions: {
                orthogonal: 'sort'
            },
            customizeData: function ( data ) {
                for (var i=0; i<data.body.length; i++){
                    for (var j=0; j<data.body[i].length; j++ ){
                        data.body[i][j] = '\u200C' + data.body[i][j];
                    }
                }
            }
            }], 'pdf', 'print'
        ]
    });

    $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
    table.order( [ 2, 'asc' ] ).draw();

    jQuery(function($){
          $('table tbody').on('click', 'tr', function(){
            $(this).toggleClass('selected');
            $('#assign [name^=check_list]').remove();
            var rows = table.rows('.selected').data();
            for (var i = rows.length - 1; i >= 0; i--) {
              $('#assign').append('<input type="hidden" name="check_list[]" value="'+rows[i][0]+'" />');
            }
          });
        });

</script>

@endpush
