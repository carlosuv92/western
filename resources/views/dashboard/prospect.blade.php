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
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Prospectos por Mes</h4>
                    <div>
                        <canvas id="bar-chart-horizontal" height="189"> </canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Prospecto Mes</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-success text-white">
                                <tr>
                                    <th>Departamento</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prospectos['mes'] as $i =>$mes)
                                <tr>
                                    <td>{{$mes->name}}</td>
                                    <td>{{$mes->total}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Prospectos por Dia</h4>
                    <div>
                        <canvas id="bar-chart-horizontal-dia" height="189"> </canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Prospecto Dia</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-success text-white">
                                <tr>
                                    <th>Departamento</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prospectos['dia'] as $i =>$dia)
                                <tr>
                                    <td>{{$dia->name}}</td>
                                    <td>{{$dia->total}}</td>
                                </tr>
                                @endforeach
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
        $(function () {
    "use strict";
    // Horizental Bar Chart
	new Chart(document.getElementById("bar-chart-horizontal"), {
		type: 'horizontalBar',
		data: {
		  labels: ['{{$prospectos['mes'][0]->name}}','{{$prospectos['mes'][3]->name}}','{{$prospectos['mes'][2]->name}}','{{$prospectos['mes'][1]->name}}'],
		  datasets: [
			{
			  label: "Prospectos (mes)",
			  backgroundColor: ["#03a9f4", "#e861ff","#08ccce","#e2b35b"],
			  data: ['{{$prospectos['mes'][0]->total}}','{{$prospectos['mes'][3]->total}}','{{$prospectos['mes'][2]->total}}','{{$prospectos['mes'][1]->total}}']
			}
		  ]
		},
		options: {
		  legend: { display: false },
		  title: {
			display: true,
			text: 'Prospectos Mensuales'
		  }
		}
    });

    // Horizental Bar Chart
	new Chart(document.getElementById("bar-chart-horizontal-dia"), {
		type: 'horizontalBar',
		data: {
            labels: ['{{$prospectos['dia'][0]->name}}','{{$prospectos['dia'][3]->name}}','{{$prospectos['dia'][2]->name}}','{{$prospectos['dia'][1]->name}}'],
		  datasets: [
			{
			  label: "Prospectos (dia)",
			  backgroundColor: ["#03a9f4", "#e861ff","#08ccce","#e2b35b"],
			  data: ['{{$prospectos['dia'][0]->total}}','{{$prospectos['dia'][3]->total}}','{{$prospectos['dia'][2]->total}}','{{$prospectos['dia'][1]->total}}']
			}
		  ]
		},
		options: {
		  legend: { display: false },
		  title: {
			display: true,
			text: 'Prospectos Diarios'
		  }
		}
    });
});
    </script>
    @endpush
