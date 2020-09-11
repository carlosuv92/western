@extends('layouts.plantilla')

@section('content')
<!-- Row -->
<div class="row">
    <div class="col-lg-3">
        <div class="card bg-inverse text-white">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <a href="JavaScript: void(0);"><i class="display-6 fas fa-calculator text-white"
                            title="JR"></i></i></a>
                    <div class="m-l-15 m-t-10">
                        <h4 class="font-medium m-b-0">Poket Jr.
                            ({{$total['all']==0?0:round(($total['jr']/$total['all'])*100,1)}}%)</h4>
                        <h5>{{$total['jr']}}</h5>
                    </div>
                </div>
                <div class="col">
                    <div class="progress">
                        <div class="progress-bar bg-cyan" role="progressbar" style="width: 56%; height: 6px;"
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card bg-cyan text-white">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <a href="JavaScript: void(0);"><i class="display-6 fas fa-calculator text-white"
                            title="PRO"></i></a>
                    <div class="m-l-15 m-t-10">
                        <h4 class="font-medium m-b-0">Poket Pro
                            ({{$total['all']==0?0:round(($total['pro']/$total['all'])*100,1)}}%)</h4>
                        <h5>{{$total['pro']}}</h5>
                    </div>
                </div>
                <div class="col">
                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 56%; height: 6px;"
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card bg-orange text-white">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <a href="JavaScript: void(0);"><i class="display-6 fas fa-calculator text-white"
                            title="POS"></i></a>
                    <div class="m-l-15 m-t-10">
                        <h4 class="font-medium m-b-0">POS
                            ({{$total['all']==0?0:round(($total['pos']/$total['all'])*100,1)}}%)</h4>
                        <h5>{{$total['pos']}}</h5>
                    </div>
                </div>
                <div class="col">
                    <div class="progress">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 56%; height: 6px;"
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card bg-info text-white">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <a href="JavaScript: void(0);"><i class="display-6 fa fa-box text-white" title="OTROS"></i></a>
                    <div class="m-l-15 m-t-10">
                        <h4 class="font-medium m-b-0">Poket Full
                            ({{$total['all']==0?0:round(($total['otros']/$total['all'])*100,1)}}%)</h4>
                        <h5>{{$total['otros']}}</h5>
                    </div>
                </div>
                <div class="col">
                    <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 56%; height: 6px;"
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<h4 class="card-title m-t-30">Liquidaciones</h4>
<!-- Row -->
<div class="row">
    <!-- Column -->
    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round align-self-center round-success"><i class="ti-wallet"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h4 class="m-b-0">Poket Jr.</h4>
                        <span class="text-muted">Total Generado</span>
                    </div>
                    <div class="ml-auto align-self-center">
                        <h2 class="font-medium m-b-0">S/.{{$cash_pre}}.00</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round align-self-center round-info"><i class="ti-wallet"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h4 class="m-b-0">Pocket Pro</h4>
                        <span class="text-muted">Total Generado</span>
                    </div>
                    <div class="ml-auto align-self-center">
                        <h2 class="font-medium m-b-0">S/.{{$cash_pro}}.00</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round align-self-center round-warning"><i class="ti-wallet"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h4 class="m-b-0">Total A Liquidar</h4>
                        <span class="text-muted">Jr. + Pro</span>
                    </div>
                    <div class="ml-auto align-self-center">
                        <h2 class="font-medium m-b-0">S/.{{$cash_pro + $cash_pre}}.00</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round align-self-center round-danger"><i class="ti-wallet"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h4 class="m-b-0">Pendiente Liquid.</h4>
                        <span class="text-muted">pending</span>
                    </div>
                    <div class="ml-auto align-self-center">
                        <h2 class="font-medium m-b-0">S/.{{$a_liqui}}.00</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>



<h4 class="card-title m-t-30">Estado entrega de Carpetas POS</h4>
<!-- Row -->
<div class="row">
    <!-- Column -->
    <div class="col-sm-12 col-md-4">
        <div class="card bg-success">
            <div class="card-body text-white">
                <div class="d-flex flex-row">
                    <div class="align-self-center display-6"><i class="ti-settings"></i></div>
                    <div class="p-10 align-self-center">
                        <h4 class="m-b-0">Total Contratos</h4>
                        <span>POS</span>
                    </div>
                    <div class="ml-auto align-self-center">
                        <h2 class="font-medium m-b-0">{{$contratos_pos}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-sm-12 col-md-4">
        <div class="card bg-info">
            <div class="card-body text-white">
                <div class="d-flex flex-row">
                    <div class="display-6 align-self-center"><i class="ti-settings"></i></div>
                    <div class="p-10 align-self-center">
                        <h4 class="m-b-0">Entregados</h4>
                        <span>Entregados</span>
                    </div>
                    <div class="ml-auto align-self-center">
                        <h2 class="font-medium m-b-0">{{$enviado_pos}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-sm-12 col-md-4">
        <div class="card bg-cyan">
            <div class="card-body text-white">
                <div class="d-flex flex-row">
                    <div class="display-6 align-self-center"><i class="ti-settings"></i></div>
                    <div class="p-10 align-self-center">
                        <h4 class="m-b-0">Pendientes</h4>
                        <span>Pendientes</span>
                    </div>
                    <div class="ml-auto align-self-center">
                        <h2 class="font-medium m-b-0">{{$contratos_pend}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <!-- title -->
                <div class="d-md-flex align-items-center">
                    <div>
                        <h4 class="card-title">Top Vendedores</h4>
                        <h5 class="card-subtitle">Listado de los 5 mejores del mes.</h5>
                    </div>
                </div>
                <!-- title -->
            </div>
            <div class="table-responsive">
                <table class="table v-middle">
                    <thead>
                        <tr class="bg-light">
                            <th class="border-top-0">Nombre y Apellido</th>
                            <th style="text-align:center;" class="border-top-0">Total Mensual</th>
                            <th style="text-align:center;" class="border-top-0">Total Diario</th>
                            <th style="text-align:center;" class="border-top-0">Zona</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($querys as $q)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="m-r-10">
                                        @if ($q->zona=="AREQUIPA")
                                        <a class="btn btn-circle btn-warning text-white">AQ</a>
                                        @elseif ($q->zona=="TRUJILLO")
                                        <a class="btn btn-circle btn-info text-white">TR</a>
                                        @elseif ($q->zona=="ICA")
                                        <a class="btn btn-circle btn-danger text-white">IC</a>
                                        @elseif ($q->zona=="CHIMBOTE")
                                        <a class="btn btn-circle btn-success text-white">CH</a>
                                        @endif
                                    </div>
                                    <div class="">
                                        <h4 class="m-b-0 font-16">{{$q->full_name}}</h4>
                                    </div>
                                </div>
                            </td>
                            <td style="text-align:center;">{{$q->total}}</td>
                            <td style="text-align:center;">{{$q->suma}}</td>
                            <td style="text-align:center;">
                                @if ($q->zona=="AREQUIPA")
                                <label class="label label-warning">{{$q->zona}}</label>
                                @elseif ($q->zona=="TRUJILLO")
                                <label class="label label-info">{{$q->zona}}</label>
                                @elseif ($q->zona=="ICA")
                                <label class="label label-danger">{{$q->zona}}</label>
                                @elseif ($q->zona=="CHIMBOTE")
                                <label class="label label-success">{{$q->zona}}</label>
                                @endif

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')

@endpush
