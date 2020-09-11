@extends('layouts.plantilla')

@section('content')
{{--
<div class="d-flex justify-content-center" style="text-align: center;">
    <div class="col-lg-3 col-md-6">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"
            data-whatever="@fat">Configurar Precio Pockets</button>
    </div>
</div>
<br>--}}
<div class="row">
    <div class="col-12">
        <div class="d-flex no-block" style="padding-bottom: 1.25em;">
            <div>
                <h4 class="d-md-flex align-items-center"></h4>
            </div>
            <div class="ml-auto">
                <div class="dl">
                    <select class="custom-select" id="cambio_card">
                        <option value="0">Mensual</option>
                        <option value="1">Diario</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row" id="mes">

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <div class="d-flex">
                                    <h3>{{$contracts['trujillo']}}</h3>
                                    <h6>MES</h6>
                                </div>
                                <h6 class="card-subtitle">TRUJILLO</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="text-success display-6"><img class="rounded-circle float-right"
                                        style="margin-top:-50%;"
                                        src="{{asset('files/assets/images/icons-dashboard/trujillo.png')}}" width='48px'
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
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <div class="d-flex">
                                    <h3>{{$contracts['chimbote']}}</h3>
                                    <h6>MES</h6>
                                </div>
                                <h6 class="card-subtitle">CHIMBOTE</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="text-success display-6"><img class="rounded-circle float-right"
                                        style="margin-top:-50%;"
                                        src="{{asset('files/assets/images/icons-dashboard/chimbote.png')}}" width='48px'
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

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <div class="d-flex">
                                    <h3>{{$contracts['chiclayo']}}</h3>
                                    <h6>MES</h6>
                                </div>
                                <h6 class="card-subtitle">CHICLAYO</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="text-success display-6"><img class="rounded-circle float-right"
                                        style="margin-top:-50%;"
                                        src="{{asset('files/assets/images/icons-dashboard/chiclayo.png')}}" width='48px'
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
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <div class="d-flex">
                                    <h3>{{$contracts['ica']}}</h3>
                                    <h6>MES</h6>
                                </div>
                                <h6 class="card-subtitle">ICA</h6>
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


<div class="row" style="display: none;" id="dia">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body" style="background: #607D8B;color: white;">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <div class="d-flex">
                                    <h3>{{$dias['trujillo']}}</h3>
                                    <h6>DIA</h6>
                                </div>
                                <h6 class="card-subtitle" style="color: white;">TRUJILLO</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="text-success display-6"><img class="rounded-circle float-right"
                                        style="margin-top:-50%;"
                                        src="{{asset('files/assets/images/icons-dashboard/trujillo.png')}}" width='48px'
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
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body" style="background: #607D8B;color: white;">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <div class="d-flex">
                                    <h3>{{$dias['chimbote']}}</h3>
                                    <h6>DIA</h6>
                                </div>
                                <h6 class="card-subtitle" style="color: white;">CHIMBOTE</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="text-success display-6"><img class="rounded-circle float-right"
                                        style="margin-top:-50%;"
                                        src="{{asset('files/assets/images/icons-dashboard/chimbote.png')}}" width='48px'
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
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body" style="background: #607D8B;color: white;">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <div class="d-flex">
                                    <h3>{{$dias['chiclayo']}}</h3>
                                    <h6>DIA</h6>
                                </div>
                                <h6 class="card-subtitle" style="color: white;">CHICLAYO</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="text-success display-6"><img class="rounded-circle float-right"
                                        style="margin-top:-50%;"
                                        src="{{asset('files/assets/images/icons-dashboard/chiclayo.png')}}" width='48px'
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
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body" style="background: #607D8B;color: white;">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <div class="d-flex">
                                    <h3>{{$dias['ica']}}</h3>
                                    <h6>DIA</h6>
                                </div>
                                <h6 class="card-subtitle" style="color: white;">ICA</h6>
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

<div class="row d-none">
    <!-- Column -->
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h4 class="card-title">Product Sales</h4>
                        <h5 class="card-subtitle">Overview of Latest Month</h5>
                    </div>
                    <div class="ml-auto">
                        <ul class="list-inline font-12 dl m-r-10">
                            <li class="list-inline-item">
                                <i class="fas fa-dot-circle text-info"></i> Ipad
                            </li>
                            <li class="list-inline-item">
                                <i class="fas fa-dot-circle text-danger"></i> Iphone</li>
                        </ul>
                    </div>
                </div>
                <div id="product-sales" style="height:200px"></div>
            </div>
        </div>

    </div>
</div>

<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-md-12">
        <div class="row">
            <!-- Column -->
            <div class="col-md-12">
                <div class="card bg-light-info no-card-border">
                    <div class="card-body">
                        <h5 class="card-title">Total Monto Vendido</h5>
                        <div class="d-flex no-block">
                            <div class="align-self-center no-shrink">
                                <h3 class="m-b-0">S/.{{$cash_tot}}.00</h3>
                                {{--<h6 style="color:darkred;">S/.{{$cash_pre}} Jr.</h6>
                                <h6 style="color:darkred;">S/.{{$cash_pro}} Pro</h6>--}}
                                <h6 style="color:darkgreen;">LIQUIDADO : S/.0.00</h6>
                                <h6 style="color:darkred;">PENDIENTE : S/.0.00</h6>
                            </div>
                            <div class="ml-auto">
                                <div id="sales" class="" style=" width:150px; height:140px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-12">
                <div class="card bg-light-success no-card-border">
                    <div class="card-body">
                        <h5 class="card-title">Proyeccion de Ventas</h5>
                        <h6>HC: {{$usuarios}} </h6>
                        <h6>Departamentos: 6 </h6>
                        <div class="d-flex no-block" style="height: 110px;">
                            <div class="align-self-end no-shrink">
                                <h5 style="color:darkgreen;" class="m-b-0">
                                    {{$contracts['arequipa']+$contracts['ica']+$contracts['trujillo']+$contracts['chimbote']}}
                                    produccion.</h5>
                                <h5 style="color:darkred;" class="m-b-0">{{$cuota}} necesarias.</h5>
                                <h6 style="color:darkred;">
                                    ({{$totcontratos['cuota']-5}}-{{$totcontratos['cuota']}}
                                    Ventas)
                                </h6>
                            </div>
                            <div class="ml-auto">
                                <div id="prediction"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    </div>
    <!-- Column -->
    <div class="col-lg-8 col-md-12">
        <div class="card o-income">
            <div class="card-body">
                <div class="d-flex m-b-30 no-block">
                    <div>
                        <h5 class="d-md-flex align-items-center">Ventas por Zona</h5>
                    </div>
                    <div class="ml-auto">
                        <div class="dl">
                            <select class="custom-select">
                                <option value="0" selected="">Mensual</option>
                                <option value="1">Diario</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="income" style="height:300px; width:100%;"></div>
                <ul class="list-inline m-t-30 text-center font-12">
                    <li class="list-inline-item">
                        <i class="fa fa-circle text-success"></i> SERVICIOS</li>
                    <li class="list-inline-item">
                        <i class="fa fa-circle text-info"></i> REMESAS</li>
                    <li class="list-inline-item">
                        <i class="fa fa-circle text-warning"></i> AMBOS</li>
                </ul>
            </div>
        </div>
    </div>

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
                    <div class="ml-auto">
                        <div class="dl">
                            <select class="custom-select">
                                <option value="0" selected="">Mensual</option>
                                <option value="1">Diario</option>
                            </select>
                        </div>
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
                                        @elseif ($q->zona=="CHICLAYO")
                                        <a class="btn btn-circle btn-purple text-white">CC</a>
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
                                @elseif ($q->zona=="CHICLAYO")
                                <label class="label label-purple">{{$q->zona}}</label>
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
@include('dashboard.config')
@endsection
@push('scripts')
<script>
    /*
Template Name: Adminbite Admin
Author: Wrappixel
Email: niravjoshi87@gmail.com
File: js
*/
$(function() {
'use strict';
// ==============================================================
// Product Sales
// ==============================================================
Morris.Area({
element: 'product-sales',
data: [
{
period: '2012',
iphone: 50,
ipad: 80,
itouch: 20
},
{
period: '2013',
iphone: 130,
ipad: 100,
itouch: 80
},
{
period: '2014',
iphone: 80,
ipad: 60,
itouch: 70
},
{
period: '2015',
iphone: 70,
ipad: 200,
itouch: 140
},
{
period: '2016',
iphone: 180,
ipad: 150,
itouch: 140
},
{
period: '2017',
iphone: 105,
ipad: 100,
itouch: 80
},
{
period: '2018',
iphone: 250,
ipad: 150,
itouch: 200
}
],
xkey: 'period',
ykeys: ['iphone', 'ipad'],
labels: ['iPhone', 'iPad'],
pointSize: 2,
fillOpacity: 0,
pointStrokeColors: ['#ccc', '#4798e8', '#9675ce'],
behaveLikeLine: true,
gridLineColor: '#e0e0e0',
lineWidth: 2,
hideHover: 'auto',
lineColors: ['#ccc', '#4798e8', '#9675ce'],
resize: true
});
// ==============================================================
// City weather
// ==============================================================
var chart = new Chartist.Line(
'#ct-weather',
{
labels: ['1PM', '2PM', '3PM', '4PM', '5PM', '6PM'],
series: [[2, 0, 5, 2, 5, 2]]
},
{
showArea: true,
showPoint: false,

chartPadding: {
left: -35
},
axisX: {
showLabel: true,
showGrid: false
},
axisY: {
showLabel: false,
showGrid: true
},
fullWidth: true
}
);
// ==============================================================
// Ct Barchart
// ==============================================================
new Chartist.Bar(
'#weeksales-bar',
{
labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
series: [[50, 40, 30, 70, 50, 20, 30]]
},
{
axisX: {
showLabel: false,
showGrid: false
},

chartPadding: {
top: 15,
left: -25
},
axisX: {
showLabel: true,
showGrid: false
},
axisY: {
showLabel: false,
showGrid: false
},
fullWidth: true,
plugins: [Chartist.plugins.tooltip()]
}
);

// ==============================================================
// Our Income
// ==============================================================
var chart = c3.generate({
bindto: '#income',
data: {
columns: [
['SERVICIOS', {{$pocket['trujillo']}}, {{$pocket['chimbote']}}, {{$pocket['trujillo']}}, {{$pocket['chimbote']}}],
['REMESAS', {{$pro['trujillo']}}, {{$pro['chimbote']}}, {{$pro['trujillo']}}, {{$pro['chimbote']}}],
['AMBOS', {{$otros['trujillo']}}, {{$otros['chimbote']}}, {{$otros['trujillo']}}, {{$otros['chimbote']}}]
],
type: 'bar',
},
bar: {
space: 0.2,
// or
width: 15 // this makes bar width 100px
},
axis: {
    x: {
        type: 'category',
        categories: ['TRUJILLO', 'CHIMBOTE', 'CHICLAYO', 'ICA']
    },
    y: {
    tick: {
        count: 3,
        outer: false
    }
}
},
legend: {
hide: true
//or hide: 'data1'
//or hide: ['data1', 'data2']
},
grid: {
x: {
show: false
},
y: {
show: true
}
},
size: {
height: 300
},
color: {
pattern: ['#22c6ab', '#4798e8', '#ffbc34']
}
});

// ==============================================================
// Sales Different
// ==============================================================

var chart = c3.generate({
bindto: '#sales',
data: {
columns: [ ['Pocket Jr', {{$pre_pocket}}], ['Pocket Pro', {{$pro_pocket}}],['POS', {{$pos_otros}}]],

type: 'donut',
onclick: function(d, i) {
console.log('onclick', d, i);
},
onmouseover: function(d, i) {
console.log('onmouseover', d, i);
},
onmouseout: function(d, i) {
console.log('onmouseout', d, i);
}
},
donut: {
label: {
show: false
},
title: '',
width: 18
},
size: {
height: 150
},
legend: {
hide: true
//or hide: 'data1'
//or hide: ['data1', 'data2']
},
color: {
pattern: [ '#ffbc34', '#24d2b5', '#20aee3']
}
});
// ==============================================================
// Sales Prediction
// ==============================================================

var chart = c3.generate({
bindto: '#prediction',
data: {
columns: [['TERMINARA AL:', {{$percent['proyectado']}}]],
type: 'gauge',
onclick: function(d, i) {
console.log('onclick', d, i);
},
onmouseover: function(d, i) {
console.log('onmouseover', d, i);
},
onmouseout: function(d, i) {
console.log('onmouseout', d, i);
}
},

color: {
pattern: ['#20aee3', '#20aee3', '#20aee3', '#24d2b5'], // the three color levels for the percentage values.
threshold: {
// unit: 'value', // percentage is default
// max: 200, // 100 is default
values: [30, 60, 90, 100]
}
},
gauge: {
width: 22
},
size: {
height: 120,
width: 150
}
});
});

</script>
<script>
    $('#cambio_card').on('change', function() {
        var i = this.value;
        if(i == 0){
            $("#dia").css("display",'none');
            $("#mes").css("display",'');
        }else if(i == 1){
            $("#mes").css("display",'none');
            $("#dia").css("display",'');
        }
    });

</script>
@endpush