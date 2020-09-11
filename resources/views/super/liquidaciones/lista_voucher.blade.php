@extends('layouts.plantilla')

@section('content')
<div class="row">
    <form id="assign" action="{{route('contract.pagar',$assigned)}}" method="post">
        @csrf
        <div class="col-md-12">
            <div class="card card-body printableArea">
                <input type="text" class="d-none form-control" id="contador" name="contador" value="{{$contador}}">
                <h3><b>PAGO VOUCHER NRO: {{$voucher}} </b> <span class="pull-right"></span></h3>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-left">
                            <address>
                                <h3> &nbsp;<b class="text-danger">REGISTRO DE PAGOS</b></h3>
                            </address>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive m-t-40" style="clear: both;">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Cliente</th>
                                        <th class="text-right">Tipo</th>
                                        <th class="text-right">Modelo</th>
                                        <th class="text-right">Total</th>
                                        <th class="text-right" style="width:10%;">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assigned as $indexKey => $a)
                                    <tr>
                                        <td class="text-center">{{$a->id}}</td>
                                        <td>{{$a->cliente}}</td>
                                        <td class="text-right">{{$a->tipo}}</td>
                                        <td class="text-right"> {{$a->modelo}} </td>
                                        <td class="text-right"> {{$a->precio}} </td>
                                        <td class="text-right"> <input type="text" class="form-control"
                                                id="monto-{{$a->id}}" name="monto-{{$indexKey}}" value="{{$a->monto}}">
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="pull-right m-t-30 text-right">
                            <h3><b>Total :</b> S/2.00</h3>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="text-right">
                            <button class="btn btn-danger" type="submit"> Proceder a Pagar </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
