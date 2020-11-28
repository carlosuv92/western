
<hr>
<!--Prospectos-->
<div class="card-body" style="background-color:#9e9e9ea3;">
    <div class="row">
        <div class="col-12">
            <div class="d-flex no-block" style="padding-bottom: 1.25em;">
                <div>
                    <h4 class="d-md-flex align-items-center">PROSPECTOS WESTERN UNION</h4>
                </div>
                <div class="ml-auto">
                    <div class="dl">
                        <select class="custom-select" id="cambio_card_pros">
                            <option value="0">Mensual</option>
                            <option value="1">Diario</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="mes_pro">

        <div class="col-lg-3 col-md-6">
            <div class="card" data-toggle="modal" data-target="#Prospecto-modal-4" style="cursor:pointer;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <div class="d-flex">
                                        <h3>{{$prospectos['mes'][4]->total}}</h3>
                                        <h6>MES</h6>
                                    </div>
                                    <h6 class="card-subtitle">{{$prospectos['mes'][4]->name}}</h6>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-success display-6"><img class="rounded-circle float-right"
                                            style="margin-top:-50%;"
                                            src="{{asset('files/assets/images/icons-dashboard/trujillo.png')}}"
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
        <div class="col-lg-3 col-md-6">
            <div class="card" data-toggle="modal" data-target="#Prospecto-modal-1" style="cursor:pointer;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <div class="d-flex">
                                        <h3>{{$prospectos['mes'][1]->total}}</h3>
                                        <h6>MES</h6>
                                    </div>
                                    <h6 class="card-subtitle">{{$prospectos['mes'][1]->name}}</h6>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-success display-6"><img class="rounded-circle float-right"
                                            style="margin-top:-50%;"
                                            src="{{asset('files/assets/images/icons-dashboard/chimbote.png')}}"
                                            width='48px' height='48px' />
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-red" role="progressbar" style="width: 26%; height: 6px;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card" data-toggle="modal" data-target="#Prospecto-modal-0" style="cursor:pointer;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <div class="d-flex">
                                        <h3>{{$prospectos['mes'][0]->total}}</h3>
                                        <h6>MES</h6>
                                    </div>
                                    <h6 class="card-subtitle">{{$prospectos['mes'][0]->name}}</h6>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-success display-6"><img class="rounded-circle float-right"
                                            style="margin-top:-50%;"
                                            src="{{asset('files/assets/images/icons-dashboard/chiclayo.png')}}"
                                            width='48px' height='48px' />
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-red" role="progressbar" style="width: 26%; height: 6px;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card" data-toggle="modal" data-target="#Prospecto-modal-2" style="cursor:pointer;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <div class="d-flex">
                                        <h3>{{$prospectos['mes'][2]->total}}</h3>
                                        <h6>MES</h6>
                                    </div>
                                    <h6 class="card-subtitle">{{$prospectos['mes'][2]->name}}</h6>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-success display-6"><img class="rounded-circle float-right"
                                            style="margin-top:-50%;"
                                            src="{{asset('files/assets/images/icons-dashboard/ica.png')}}" width='48px'
                                            height='48px' />
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-red" role="progressbar" style="width: 26%; height: 6px;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="display: none;" id="dia_pro">
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body" style="background: #607D8B;color: white;">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <div class="d-flex">
                                        <h3>{{$prospectos['dia'][4]->total}}</h3>
                                        <h6>DIA</h6>
                                    </div>
                                    <h6 class="card-subtitle" style="color: white;">{{$prospectos['dia'][4]->name}}</h6>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-success display-6"><img class="rounded-circle float-right"
                                            style="margin-top:-50%;"
                                            src="{{asset('files/assets/images/icons-dashboard/trujillo.png')}}"
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
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body" style="background: #607D8B;color: white;">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <div class="d-flex">
                                        <h3>{{$prospectos['dia'][1]->total}}</h3>
                                        <h6>DIA</h6>
                                    </div>
                                    <h6 class="card-subtitle" style="color: white;">{{$prospectos['dia'][1]->name}}</h6>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-success display-6"><img class="rounded-circle float-right"
                                            style="margin-top:-50%;"
                                            src="{{asset('files/assets/images/icons-dashboard/chimbote.png')}}"
                                            width='48px' height='48px' />
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-red" role="progressbar" style="width: 26%; height: 6px;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body" style="background: #607D8B;color: white;">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <div class="d-flex">
                                        <h3>{{$prospectos['dia'][0]->total}}</h3>
                                        <h6>DIA</h6>
                                    </div>
                                    <h6 class="card-subtitle" style="color: white;">{{$prospectos['dia'][0]->name}}</h6>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-success display-6"><img class="rounded-circle float-right"
                                            style="margin-top:-50%;"
                                            src="{{asset('files/assets/images/icons-dashboard/chiclayo.png')}}"
                                            width='48px' height='48px' />
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-red" role="progressbar" style="width: 26%; height: 6px;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body" style="background: #607D8B;color: white;">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <div class="d-flex">
                                        <h3>{{$prospectos['dia'][2]->total}}</h3>
                                        <h6>DIA</h6>
                                    </div>
                                    <h6 class="card-subtitle" style="color: white;">{{$prospectos['dia'][2]->name}}</h6>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-success display-6"><img class="rounded-circle float-right"
                                            style="margin-top:-50%;"
                                            src="{{asset('files/assets/images/icons-dashboard/ica.png')}}" width='48px'
                                            height='48px' />
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-red" role="progressbar" style="width: 26%; height: 6px;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
