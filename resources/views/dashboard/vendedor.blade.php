@extends('layouts.plantilla')

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card" style="background-color:#{{$color_contrato}};color:aliceblue;">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3>{{$contract}}</h3>
                                <h6 class="card-subtitle" style="color:black;">Total Ventas</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="text-danger display-6"><i class="ti-layout-slider-alt"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{$contract}}%; height: 6px;"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3>{{$contract_jr}}</h3>
                                <h6 class="card-subtitle">Total Pocket Jr.</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="text-info display-6"><i class="ti-layout-media-left-alt"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 0%; height: 6px;"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3>{{$contract_pro + $contract_full}}</h3>
                                <h6 class="card-subtitle">Total Pocket Pro / Full.</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="text-info display-6"><i class="ti-layout-media-left-alt"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 0%; height: 6px;"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3>{{$contract_pos}}</h3>
                                <h6 class="card-subtitle">Total POS.</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="text-info display-6"><i class="ti-layout-media-left-alt"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 0%; height: 6px;"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card" style="background-color:#{{$color_visita}};color:aliceblue;">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3>{{$visitas}}</h3>
                                <h6 class="card-subtitle" style="color:black;">Total Visitas</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="text-danger display-6"><i class="ti-layout-slider-alt"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{$visitas}}%; height: 6px;"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card" style="background-color:#{{$color_visita_dia}};color:aliceblue;">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3>{{$visitas_dia}}</h3>
                                <h6 class="card-subtitle" style="color:black;">Total Visitas Diarias.</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="text-danger display-6"><i class="ti-layout-media-left-alt"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{$visitas_dia}}%; height: 6px;"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3>0</h3>
                                <h6 class="card-subtitle">Media Probabilidad</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="text-info display-6"><i class="ti-layout-media-left-alt"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 0%; height: 6px;"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3>0</h3>
                                <h6 class="card-subtitle">Alta Probabilidad</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="text-info display-6"><i class="ti-layout-media-left-alt"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 0%; height: 6px;"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@endpush
