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
                        <label>VENDEDOR</label>
                        <select class="form-control custom-select" id="department" name="department">
                            <option value="" selected disabled hidden>SELECCIONA DEPARTAMENTO</option>
                            @foreach ($departments as $depa)
                            <option value="{{$depa->id}}">{{$depa->surname}} {{$depa->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-6 mb-6">
                        <label>DEPARTAMENTO</label>
                        <select class="form-control custom-select" id="seller" name="seller">
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title m-b-20">DATOS EMPPRESA</h4>
                <hr>
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <label>RAZON SOCIAL</label>
                        <input type="text" class="form-control" placeholder="NEGOCIO" id="razon_social"
                            name="razon_social" required>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label>NOMBRE COMERCIAL (LICENCIA Y RUC)</label>
                        <input type="text" class="form-control" placeholder="NEGOCIO" id="negocio" name="negocio"
                            required>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label>LOCAL PROPIO O ALQ.</label>
                        <select class="form-control custom-select" id="tipo_local" name="tipo_local">
                            <option value="1">PROPIO</option>
                            <option value="2">ALQUILADO</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label>NUMERO RUC</label>
                        <input type="text" class="form-control" id="ruc" name="ruc" placeholder="RUC" required>
                    </div>

                    <div class="col-md-6 mb-6 m-t-10">
                        <label>FECHA DE INICIO ACTIVIDADES</label>
                        <input type="date" class="form-control" id="ant_sunat" name="ant_sunat">
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label>GIRO NEGOCIO</label>
                        <input type="text" class="form-control" placeholder="GIRO NEGOCIO" id="giro" name="giro"
                            required>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label>DIRECCION (LICENCIA DE FUNCIONAMIENTO)</label>
                        <input type="text" class="form-control" placeholder="DIRECCION NEGOCIO" id="neg_direccion"
                            name="neg_direccion" required>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label>DEPARTAMENTO</label>
                        <select class="form-control custom-select" id="neg_department" name="neg_department" required>
                            <option value="" selected disabled hidden>SELECCIONA DEPARTAMENTO</option>
                            @foreach ($v_departments as $depa)
                            <option value="{{$depa->id}}">{{$depa->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label>PROVINCIA</label>
                        <select class="form-control custom-select" id="neg_province" name="neg_province" required>
                        </select>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label>DISTRITO</label>
                        <select class="form-control custom-select" id="neg_district" name="neg_district" required>
                        </select>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label>REFERENCIA</label>
                        <input type="text" class="form-control" placeholder="REFERENCE" id="referencia"
                            name="referencia" required>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label>GEOLOCALIZACION</label>
                        <input type="text" class="form-control" placeholder="COORDENADAS" id="geo" name="geo">
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label>TELEFONO</label>
                        <input type="text" class="form-control" placeholder="TELEFONO" id="cellphone" name="cellphone"
                            required>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label>EMAIL</label>
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
                        <label>TIPO DOC</label>
                        <select class="form-control custom-select" id="doc" name="doc">
                            @foreach ($documents as $doc)
                            <option value="{{$doc->id}}">{{$doc->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label>DOCUMENTO</label>
                        <input type="text" class="form-control" id="document" name="document" placeholder="DOCUMENTO"
                            required>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label>DIRECCION (SEGÚN DNI)</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="DIRECCION (SEGÚN DNI)" required>
                    </div>

                    <div class="col-md-6 mb-6 m-t-10">
                        <label>DEPARTAMENTO (SEGÚN DNI)</label>
                        <select class="form-control custom-select" id="cli_department" name="cli_department" required>
                            <option value="" selected disabled hidden>SELECCIONA DEPARTAMENTO</option>
                            @foreach ($v_departments as $depa)
                            <option value="{{$depa->id}}">{{$depa->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label>PROVINCIA (SEGÚN DNI)</label>
                        <select class="form-control custom-select" id="cli_province" name="cli_province" required>
                        </select>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label>DISTRITO (SEGÚN DNI)</label>
                        <select class="form-control custom-select" id="cli_district" name="cli_district" required>
                        </select>
                    </div>

                    <div class="col-md-6 mb-6 m-t-10">
                        <label>FECHA NACIMIENTO </label>
                        <input type="date" class="form-control" id="fech_nac" name="fech_nac">
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label>FECHA DE VENCIMIENTO (DNI)O </label>
                        <input type="date" class="form-control" id="fech_venc" name="fech_venc">
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label>ESTADO CIVIL (DNI)</label>
                        <select class="form-control custom-select" id="estado_civil" name="estado_civil">
                            <option value="1">SOLTERO</option>
                            <option value="2">CASADO</option>
                            <option value="3">VIUDO</option>
                            <option value="4">DIVORCIADO</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="form-row d-none" id="conyuge">

                    <div class="col-md-6 mb-6 m-t-10">
                        <label>NOMBRES Y APELLIDOS (CONYUGE)</label>
                        <input placeholder="NOMBRES Y APELLIDOS (CONYUGE)" type="text" class="cony form-control" id="cony_nom" name="cony_nom" >
                    </div>

                    <div class="col-md-6 mb-6 m-t-10">
                        <label>DIRECCION (CONYUGE)</label>
                        <input placeholder="DIRECCION (CONYUGE)" type="text" class="cony form-control" id="cony_direccion" name="cony_direccion" >
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label>DEPARTAMENTO (CONYUGE)</label>
                        <select class="cony form-control custom-select" id="cony_department" name="cony_department" required>
                            <option value="" selected disabled hidden>SELECCIONA DEPARTAMENTO</option>
                            @foreach ($v_departments as $depa)
                            <option value="{{$depa->id}}">{{$depa->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label>PROVINCIA (CONYUGE)</label>
                        <select class="cony form-control custom-select" id="cony_province" name="cony_province" required>
                        </select>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label>DISTRITO (CONYUGE)</label>
                        <select class="cony form-control custom-select" id="cony_district" name="cony_district" required>
                        </select>
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label>CORREO (CONYUGE)</label>
                        <input placeholder="CORREO (CONYUGE)" type="text" class="cony form-control" id="cony_correo" name="cony_correo" >
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label>NRO DE CELULAR (CONYUGE)</label>
                        <input placeholder="NRO DE CELULAR (CONYUGE)" type="text" class="cony form-control" id="cony_cellphone" name="cony_cellphone" >
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label>DNI (CONYUGE)</label>
                        <input placeholder="DNI (CONYUGE)" type="text" class="cony form-control" id="cony_dni" name="cony_dni" >
                    </div>
                    <div class="col-md-6 mb-6 m-t-10">
                        <label>FECHA DE NACIMIENTO (CONYUGE)</label>
                        <input type="date" class="cony form-control" id="cony_fech_nac" name="cony_fech_nac" >
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
@push('scripts')
<script>
    $('#department').on('change', function(){
        var url = '{{ route("get.dseller", ":id") }}';
    url = url.replace(':id', this.value);
    $.ajax({
        url: url,
        type: "GET",
        success: function(data){
            $.each(data,function(key, data) {
                $("#seller").append('<option value="" selected disabled hidden>SELECCIONA VENDEDOR</option>');
                $("#seller").append('<option value='+data.id+'>'+data.name+'</option>');
            });
        }
    });
   })
</script>

{{-- SELECT NEGOCIO --}}
<script>
    $('#neg_department').on('change', function(){
    var url = '{{ route("get.provincia", ":id") }}';
    url = url.replace(':id', this.value);
    $.ajax({
        url: url,
        type: "GET",
        success: function(data){
            $.each(data,function(key, data) {
                $("#neg_province").append('<option value="" selected disabled hidden>SELECCIONA PROVINCIA</option>');
                $("#neg_province").append('<option value='+data.id+'>'+data.name+'</option>');
            });
        }
    });
   })

   $('#neg_province').on('change', function(){
    var url = '{{ route("get.distrito", ":id") }}';
    url = url.replace(':id', this.value);
    $.ajax({
        url: url,
        type: "GET",
        success: function(data){
            $.each(data,function(key, data) {
                $("#neg_district").append('<option value="" selected disabled hidden>SELECCIONA DISTRITO</option>');
                $("#neg_district").append('<option value='+data.id+'>'+data.name+'</option>');
            });
        }
    });
   })
</script>


{{-- SELECT CLIENTE --}}
<script>
    $('#cli_department').on('change', function(){
    var url = '{{ route("get.provincia", ":id") }}';
    url = url.replace(':id', this.value);
    $.ajax({
        url: url,
        type: "GET",
        success: function(data){
            $.each(data,function(key, data) {
                $("#cli_province").append('<option value="" selected disabled hidden>SELECCIONA PROVINCIA</option>');
                $("#cli_province").append('<option value='+data.id+'>'+data.name+'</option>');
            });
        }
    });
   })

   $('#cli_province').on('change', function(){
    var url = '{{ route("get.distrito", ":id") }}';
    url = url.replace(':id', this.value);
    $.ajax({
        url: url,
        type: "GET",
        success: function(data){
            $.each(data,function(key, data) {
                $("#cli_district").append('<option value="" selected disabled hidden>SELECCIONA DISTRITO</option>');
                $("#cli_district").append('<option value='+data.id+'>'+data.name+'</option>');
            });
        }
    });
   })
</script>

{{-- SELECT CONYUGUE --}}
<script>
    $('#cony_department').on('change', function(){
    var url = '{{ route("get.provincia", ":id") }}';
    url = url.replace(':id', this.value);
    $.ajax({
        url: url,
        type: "GET",
        success: function(data){
            $.each(data,function(key, data) {
                $("#cony_province").append('<option value="" selected disabled hidden>SELECCIONA PROVINCIA</option>');
                $("#cony_province").append('<option value='+data.id+'>'+data.name+'</option>');
            });
        }
    });
   })

   $('#cony_province').on('change', function(){
    var url = '{{ route("get.distrito", ":id") }}';
    url = url.replace(':id', this.value);
    $.ajax({
        url: url,
        type: "GET",
        success: function(data){
            $.each(data,function(key, data) {
                $("#cony_district").append('<option value="" selected disabled hidden>SELECCIONA DISTRITO</option>');
                $("#cony_district").append('<option value='+data.id+'>'+data.name+'</option>');
            });
        }
    });
   })
</script>
<script>
    $('#estado_civil').on('change', function(){
    $(".cony").val("");
    id=this.value;
    if(id==2){
        $("#conyuge").removeClass('d-none');
    }else{
        $("#conyuge").addClass('d-none');
    }
   })
</script>

@endpush
