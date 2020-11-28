@push('styles')
<style>
    .wizard>.steps>ul>li {
        width: 50%;
    }
</style>
@endpush
@extends('layouts.plantilla')

@section('content')
<form id='form-contract' method="POST" action={{route('contract.store')}}>
    @csrf
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title m-b-20">DATOS DE VENDEDOR</h4>
                <hr>
                <div class="form-row">
                    <div class="col-md-4 mb-4">
                        <label>DEPARTAMENTO</label>
                        <select class="form-control custom-select" id="department" name="department" required>
                            <option value="" selected disabled hidden>SELECCIONA DEPARTAMENTO</option>
                            @foreach ($departments as $depa)
                            <option value="{{$depa->id}}">{{$depa->surname}} {{$depa->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-4 mb-4">
                        <label>VENDEDOR</label>
                        <select class="form-control custom-select" id="seller" name="seller" required>
                        </select>
                    </div>

                    <div class="col-md-4 mb-4">
                        <label>FECHA VENTA </label>
                        <input type="date" class="form-control" id="created_at" name="created_at" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">DATOS DE LA VENTA</h4>
                <h6 class="card-subtitle"></h6>
                <div id="example-vertical" class="m-t-40">
                    <h3>LOCAL</h3>
                    <section>
                        <div class="form-row">
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>NUMERO RUC</label>
                                <input type="text" class="form-control" id="ruc" name="ruc" placeholder="RUC">
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>NOMBRE COMERCIAL</label>
                                <input type="text" class="form-control" placeholder="NEGOCIO" id="negocio"
                                    name="negocio" required>
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>RAZON SOCIAL</label>
                                <input type="text" class="form-control" placeholder="NEGOCIO" id="razon_social"
                                    name="razon_social" required>
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>ANTIGÜEDAD</label>
                                <input type="text" class="form-control" id="antique" name="antique"
                                    placeholder="ANTIGÜEDAD">
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>GIRO AUTORIZADO</label>
                                <input type="text" class="form-control" placeholder="GIRO NEGOCIO" id="giro"
                                    name="giro">
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>DEPARTAMENTO</label>
                                <select class="form-control custom-select" id="neg_department" name="neg_department"
                                    required>
                                    <option value="" selected disabled hidden>SELECCIONA DEPARTAMENTO</option>
                                    @foreach ($departments as $depa)
                                    <option value="{{$depa->id}}">{{$depa->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>PROVINCIA</label>
                                <select class="form-control custom-select" id="neg_province" name="neg_province"
                                    required>
                                </select>
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>DISTRITO</label>
                                <select class="form-control custom-select" id="neg_district" name="neg_district"
                                    required>
                                </select>
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>DIRECCION DEL LOCAL</label>
                                <input type="text" class="form-control" placeholder="DIRECCION NEGOCIO"
                                    id="neg_direccion" name="neg_direccion" required>
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>REFERENCIA</label>
                                <input type="text" class="form-control" placeholder="REFERENCIA" id="neg_reference"
                                    name="neg_reference">
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>TELEFONO FIJO/CELULAR</label>
                                <input type="text" class="form-control" placeholder="TELEFONO" id="neg_phone"
                                    name="neg_phone" required>
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>EMAIL</label>
                                <input type="email" class="form-control" placeholder="EMAIL" id="neg_correo"
                                    name="neg_correo" required>
                            </div>

                            <div class="col-md-6 mb-6 m-t-10">
                                <label>GEOLOCALIZACION</label>
                                <input type="text" class="form-control" placeholder="COORDENADAS" id="geo" name="geo">
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>LOCAL PROPIO O ALQ.</label>
                                <select class="form-control custom-select" id="type_local" name="type_local">
                                    <option value="1">PROPIO</option>
                                    <option value="2">ALQUILADO</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>FECHA DE INSCRIPCION</label>
                                <input type="date" class="form-control" id="inscription" name="inscription">
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>CODIGO POSTAL</label>
                                <input type="text" class="form-control" id="cod_postal" name="cod_postal">
                            </div>
                        </div>
                    </section>
                    <h3>RRLL</h3>
                    <section>
                        <div class="form-row">
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>NOMBRE Y APELLIDOS</label>
                                <input type="text" class="form-control" id="rrll_name" name="rrll_name"
                                    placeholder="NOMBRE Y APELLIDOS">
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>DEPARTAMENTO</label>
                                <select class="form-control custom-select" id="rrll_department" name="rrll_department"
                                    required>
                                    <option value="" selected disabled hidden>SELECCIONA DEPARTAMENTO</option>
                                    @foreach ($departments as $depa)
                                    <option value="{{$depa->id}}">{{$depa->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>PROVINCIA</label>
                                <select class="form-control custom-select" id="rrll_province" name="rrll_province"
                                    required>
                                </select>
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>DISTRITO</label>
                                <select class="form-control custom-select" id="rrll_district" name="rrll_district"
                                    required>
                                </select>
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>DIRECCION</label>
                                <input type="text" class="form-control" id="rrll_address" name="rrll_address"
                                    placeholder="DIRECCION">
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>EMAIL</label>
                                <input type="email" class="form-control" placeholder="EMAIL" id="rrll_correo"
                                    name="rrll_correo" required>
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>CELULAR</label>
                                <input type="text" class="form-control" placeholder="CELULAR" id="rrll_phone"
                                    name="rrll_phone" required>
                            </div>

                            <div class="col-md-6 mb-6 m-t-10">
                                <label>TIPO DOC</label>
                                <select class="form-control custom-select" id="rrll_doc" name="rrll_doc">
                                    @foreach ($documents as $doc)
                                    <option value="{{$doc->id}}">{{$doc->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>DOCUMENTO</label>
                                <input type="text" class="form-control" id="rrll_document" name="rrll_document"
                                    placeholder="DOCUMENTO">
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>FECHA NACIMIENTO </label>
                                <input type="date" class="form-control" id="rrll_fech_nac" name="rrll_fech_nac">
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>ESTADO CIVIL</label>
                                <select class="form-control custom-select" id="rrll_estado_civil"
                                    name="rrll_estado_civil">
                                    <option value="1">SOLTERO</option>
                                    <option value="2">CASADO</option>
                                    <option value="3">VIUDO</option>
                                    <option value="4">DIVORCIADO</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row d-none" id="conyuge">
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>NOMBRES Y APELLIDOS (CONYUGE)</label>
                                <input placeholder="NOMBRES Y APELLIDOS (CONYUGE)" type="text" class="cony form-control"
                                    id="cony_name" name="cony_name">
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>DEPARTAMENTO (CONYUGE)</label>
                                <select class="cony form-control custom-select" id="cony_department"
                                    name="cony_department">
                                    <option value="" selected disabled hidden>SELECCIONA DEPARTAMENTO</option>
                                    @foreach ($departments as $depa)
                                    <option value="{{$depa->id}}">{{$depa->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>PROVINCIA (CONYUGE)</label>
                                <select class="cony form-control custom-select" id="cony_province" name="cony_province">
                                </select>
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>DISTRITO (CONYUGE)</label>
                                <select class="cony form-control custom-select" id="cony_district" name="cony_district">
                                </select>
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>DIRECCION (CONYUGE)</label>
                                <input placeholder="DIRECCION (CONYUGE)" type="text" class="cony form-control"
                                    id="cony_address" name="cony_address">
                            </div>

                            <div class="col-md-6 mb-6 m-t-10">
                                <label>CORREO (CONYUGE)</label>
                                <input placeholder="CORREO (CONYUGE)" type="text" class="cony form-control"
                                    id="cony_correo" name="cony_correo">
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>CELULAR (CONYUGE)</label>
                                <input placeholder="CELULAR (CONYUGE)" type="text" class="cony form-control"
                                    id="cony_phone" name="cony_phone">
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>DNI (CONYUGE)</label>
                                <input placeholder="DNI (CONYUGE)" type="text" class="cony form-control" id="cony_document"
                                    name="cony_document">
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>FECHA DE NACIMIENTO (CONYUGE)</label>
                                <input type="date" class="cony form-control" id="cony_fech_nac" name="cony_fech_nac">
                            </div>
                            <div class="col-md-6 mb-6 m-t-10">
                                <label>ESTADO CIVIL (CONYUGE)</label>
                                <select class="cony form-control custom-select" id="cony_estado_civil"
                                    name="cony_estado_civil">
                                    <option value="1">SOLTERO</option>
                                    <option value="2">CASADO</option>
                                    <option value="3">VIUDO</option>
                                    <option value="4">DIVORCIADO</option>
                                </select>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</form>

</div>
@endsection
@push('scripts')
<script>
    var form = $('#form-contract');

    $("#example-vertical").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        //stepsOrientation: "vertical",
        onFinished: function (event, currentIndex) {
            if(form[0].reportValidity()){
                form.submit();
            }
        }
    });

    $('#department').on('change', function(){
        var url = '{{ route("get.dseller", ":id") }}';
    url = url.replace(':id', this.value);
    $.ajax({
        url: url,
        type: "GET",
        success: function(data){
            $.each(data,function(key, data) {
                $("#seller").append('<option value="" selected disabled hidden>SELECCIONA VENDEDOR</option>');
                $("#seller").append('<option value='+data.id+'>'+data.surname+' '+data.name+'</option>');
            });
        }
    });
   })

   // SELECT NEGOCIO
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
//SELECT CLIENTE
    $('#rrll_department').on('change', function(){
    var url = '{{ route("get.provincia", ":id") }}';
    url = url.replace(':id', this.value);
    $.ajax({
        url: url,
        type: "GET",
        success: function(data){
            $.each(data,function(key, data) {
                $("#rrll_province").append('<option value="" selected disabled hidden>SELECCIONA PROVINCIA</option>');
                $("#rrll_province").append('<option value='+data.id+'>'+data.name+'</option>');
            });
        }
    });
   })

   $('#rrll_province').on('change', function(){
    var url = '{{ route("get.distrito", ":id") }}';
    url = url.replace(':id', this.value);
    $.ajax({
        url: url,
        type: "GET",
        success: function(data){
            $.each(data,function(key, data) {
                $("#rrll_district").append('<option value="" selected disabled hidden>SELECCIONA DISTRITO</option>');
                $("#rrll_district").append('<option value='+data.id+'>'+data.name+'</option>');
            });
        }
    });
   })
   //SELECT CONYUGUE
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
    $('#rrll_estado_civil').on('change', function(){
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
