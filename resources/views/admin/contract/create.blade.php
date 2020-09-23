@push('styles')
@endpush
@extends('layouts.plantilla')

@section('content')
<div class="col-12">
    <form method="POST" action={{route('contract.store')}}>
        @csrf
        <div class="card">
            <div class="card-body">
                <h4 class="card-title m-b-20">DATOS DE VENDEDOR</h4>
                <hr>
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="validationCustom03">VENDEDOR</label>
                        <select class="form-control custom-select" id="seller" name="seller">
                            @foreach ($sellers as $seller)
                            <option value="{{$seller->id}}">{{$seller->surname}} {{$seller->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="validationCustom03">DEPARTAMENTO</label>
                        <select class="form-control custom-select" id="department" name="department">
                            @foreach ($departments as $depa)
                            <option value="{{$depa->id}}">{{$depa->name}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title m-b-20">DATOS EMPRESA</h4>
                <hr>
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="validationCustom02">RAZON SOCIAL</label>
                        <input type="text" class="form-control" placeholder="NEGOCIO" id="razon_social"
                            name="razon_social" required>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="validationCustom02">NOMBRE COMERCIAL (LICENCIA Y RUC)</label>
                        <input type="text" class="form-control" placeholder="NEGOCIO" id="negocio" name="negocio"
                            required>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom02">LOCAL PROPIO O ALQ.</label>
                        <select class="form-control custom-select" id="tipo_local" name="tipo_local">
                            <option value="1">PROPIO</option>
                            <option value="2">ALQUILADO</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom02">NUMERO RUC</label>
                        <input type="text" class="form-control" id="ruc" name="ruc" placeholder="RUC" required>
                    </div>

                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom02">FECHA DE INICIO ACTIVIDADES</label>
                        <input type="date" class="form-control" id="ant_negocio" name="ant_negocio" required>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom02">GIRO NEGOCIO</label>
                        <input type="text" class="form-control" placeholder="GIRO NEGOCIO" id="giro" name="giro"
                            required>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom02">DIRECCION (LICENCIA DE FUNCIONAMIENTO)</label>
                        <input type="text" class="form-control" placeholder="DIRECCION NEGOCIO" id="neg_direccion"
                            name="neg_direccion" required>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom02">DEPARTAMENTO</label>
                        <select class="form-control custom-select" id="neg_department" name="neg_department">
                            @foreach ($departments as $depa)
                            <option value="{{$depa->id}}">{{$depa->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom02">PROVINCIA</label>
                        <select class="form-control custom-select" id="neg_province" name="neg_province">
                            @foreach ($departments as $depa)
                            <option value="{{$depa->id}}">{{$depa->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom02">DISTRITO</label>
                        <select class="form-control custom-select" id="neg_district" name="neg_district">
                            @foreach ($departments as $depa)
                            <option value="{{$depa->id}}">{{$depa->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom02">REFERENCIA</label>
                        <input type="text" class="form-control" placeholder="REFERENCE" id="referencia"
                            name="referencia" required>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom02">GEOLOCALIZACION</label>
                        <input type="text" class="form-control" placeholder="COORDENADAS" id="geo" name="geo" required>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom02">TELEFONO</label>
                        <input type="text" class="form-control" placeholder="TELEFONO" id="cellphone" name="cellphone"
                            required>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom02">EMAIL</label>
                        <input type="email" class="form-control" placeholder="EMAIL" id="neg_correo" name="neg_correo"
                            required>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">DATOS CLIENTE</h4>
                <hr>
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label for="validationCustom02">TIPO DOC</label>
                        <select class="form-control custom-select" id="doc" name="doc">
                            @foreach ($documents as $doc)
                            <option value="{{$doc->id}}">{{$doc->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="validationCustom02">DOCUMENTO</label>
                        <input type="text" class="form-control" id="document" name="document" placeholder="DOCUMENTO"
                            required>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom04">DIRECCION (SEGÚN DNI)</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>

                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom02">DEPARTAMENTO (SEGÚN DNI)</label>
                        <select class="form-control custom-select" id="cli_department" name="cli_department">
                            @foreach ($departments as $depa)
                            <option value="{{$depa->id}}">{{$depa->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom02">PROVINCIA (SEGÚN DNI)</label>
                        <select class="form-control custom-select" id="cli_province" name="cli_province">
                            @foreach ($departments as $depa)
                            <option value="{{$depa->id}}">{{$depa->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom02">DISTRITO (SEGÚN DNI)</label>
                        <select class="form-control custom-select" id="cli_district" name="cli_district">
                            @foreach ($departments as $depa)
                            <option value="{{$depa->id}}">{{$depa->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom02">FECHA NACIMIENTO </label>
                        <input type="date" class="form-control" id="fech_nac" name="fech_nac">
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom02">FECHA DE VENCIMIENTO (DNI)O </label>
                        <input type="date" class="form-control" id="fech_venc" name="fech_venc">
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom02">ESTADO CIVIL (DNI)</label>
                        <select class="form-control custom-select" id="estado_civil" name="estado_civil">
                            <option value="1">SOLTERO</option>
                            <option value="2">CASADO</option>
                            <option value="3">VIUDO</option>
                            <option value="4">DIVORCIADO</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="form-row">

                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom04">NOMBRES Y APELLIDOS (CONYUGE)</label>
                        <input type="text" class="form-control" id="cony_nom" name="cony_nom" required>
                    </div>

                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom04">DIRECCION (CONYUGE)</label>
                        <input type="text" class="form-control" id="cony_direccion" name="cony_direccion" required>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom02">DEPARTAMENTO (CONYUGE)</label>
                        <select class="form-control custom-select" id="cony_department" name="cony_department">
                            @foreach ($departments as $depa)
                            <option value="{{$depa->id}}">{{$depa->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom02">PROVINCIA (CONYUGE)</label>
                        <select class="form-control custom-select" id="cony_province" name="cony_province">
                            @foreach ($departments as $depa)
                            <option value="{{$depa->id}}">{{$depa->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom02">DISTRITO (CONYUGE)</label>
                        <select class="form-control custom-select" id="cony_district" name="cony_district">
                            @foreach ($departments as $depa)
                            <option value="{{$depa->id}}">{{$depa->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom04">CORREO (CONYUGE)</label>
                        <input type="text" class="form-control" id="cony_correo" name="cony_correo" required>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom04">NRO DE CELULAR CONYUGE)</label>
                        <input type="text" class="form-control" id="cony_cellphone" name="cony_cellphone" required>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom04">DNI (CONYUGE)</label>
                        <input type="text" class="form-control" id="cony_dni" name="cony_dni" required>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label for="validationCustom04">FECHA DE NACIMIENTO (CONYUGE)</label>
                        <input type="date" class="form-control" id="cony_fech_nac" name="cony_fech_nac" required>
                    </div>
                </div>
            </div>
        </div>
        <p align="right">
            <button class="btn btn-primary" type="submit">APLICAR VENTA</button>
        </p>
    </form>

</div>
@endsection
