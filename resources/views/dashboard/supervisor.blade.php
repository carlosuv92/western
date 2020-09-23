@extends('layouts.plantilla')

@section('content')

<div class="card-body">
    <div class="row">
        <div class="col-12">
            <div class="d-flex no-block" style="padding-bottom: 1.25em;">
                <div>
                    <h4 class="d-md-flex align-items-center">DETALLE PROSPECTO</h4>
                </div>
                <div class="ml-auto">
                    <div class="dl">
                        <select class="custom-select d-none" id="cambio_card">
                            <option value="0">Mensual</option>
                            <option value="1">Diario</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="mes">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <div class="d-flex">
                                        <h3>{{$contratos['mes']->total}}</h3>
                                        <h6>MES</h6>
                                    </div>
                                    <h6 class="card-subtitle">{{$contratos['mes']->name}} VENTAS</h6>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-success display-6"><img class="rounded-circle float-right"
                                            style="margin-top:-50%;"
                                            src="https://www.iconfinder.com/data/icons/miscellaneous-90-mix/168/economics_business_grow_rise_investment_sales_commercial_statistic_analysis_profit_-512.png"
                                            width='48px' height='48px' />
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-cyan" role="progressbar" style="width: 56%; height: 6px;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <div class="d-flex">
                                        <h3>{{$prospectos['mes']->total}}</h3>
                                        <h6>MES</h6>
                                    </div>
                                    <h6 class="card-subtitle">{{$prospectos['mes']->name}} PROSPECTOS</h6>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-success display-6"><img class="rounded-circle float-right"
                                            style="margin-top:-50%;"
                                            src="https://image.flaticon.com/icons/png/512/2248/2248814.png" width='48px'
                                            height='48px' />
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-cyan" role="progressbar" style="width: 56%; height: 6px;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <div class="d-flex">
                                        <h3>{{$contratos['mes']->total}}</h3>
                                        <h6>DIA</h6>
                                    </div>
                                    <h6 class="card-subtitle">{{$contratos['mes']->name}} VENTAS</h6>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-success display-6"><img class="rounded-circle float-right"
                                            style="margin-top:-50%;"
                                            src="https://www.iconfinder.com/data/icons/miscellaneous-90-mix/168/economics_business_grow_rise_investment_sales_commercial_statistic_analysis_profit_-512.png"
                                            width='48px' height='48px' />
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-cyan" role="progressbar" style="width: 56%; height: 6px;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <div class="d-flex">
                                        <h3>{{$prospectos['mes']->total}}</h3>
                                        <h6>DIA</h6>
                                    </div>
                                    <h6 class="card-subtitle">{{$prospectos['mes']->name}} PROSPECTOS</h6>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-success display-6"><img class="rounded-circle float-right"
                                            style="margin-top:-50%;"
                                            src="https://image.flaticon.com/icons/png/512/2248/2248814.png" width='48px'
                                            height='48px' />
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-cyan" role="progressbar" style="width: 56%; height: 6px;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Prospecto Mes</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-danger text-white">
                                <tr>
                                    <th></th>
                                    @foreach ($cant['fecha'] as $fecha)
                                    <th>{{$fecha->fecha}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>TOTALES</td>
                                    @foreach ($cant['fecha'] as $i =>$array)
                                    <td>{{$array->total}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>MUY INTERESADO</td>
                                    @foreach ($cant['fecha'] as $i =>$array)
                                    <td>{{$array->pr_mi}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>INTERESADO</td>
                                    @foreach ($cant['fecha'] as $i =>$array)
                                    <td>{{$array->pr_i}}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection
