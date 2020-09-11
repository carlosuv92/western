@push('styles')
@endpush
@extends('layouts.plantilla')

@section('content')
<div class="col-12">
    <form method="POST" action={{route('contract.store')}} class="needs-validation" novalidate>
        @csrf
        <div class="card">
            <div class="card-body">
                <h4 class="card-title m-b-20">Crear Cliente</h4>
                <hr>
                <br>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom01">NOMBRES Y APELLIDOS *</label>
                        <input type="text" class="form-control" placeholder="NOMBRES Y APELLIDOS" id="name" name="name"
                            required>
                        <div class="valid-feedback">
                            Genial!
                        </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="validationCustom02">TIPO DOC *</label>
                        <select class="form-control custom-select" id="t_doc" name="t_doc">
                            @foreach ($t_docs as $t_doc)
                            <option value="{{$t_doc->id}}">{{$t_doc->name}}</option>
                            @endforeach
                        </select>
                        <div class="valid-feedback">
                            Genial!
                        </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="validationCustom02">DOCUMENTO *</label>
                        <input type="text" class="form-control" id="document" name="document" placeholder="DOCUMENTO"
                            required>
                        <div class="valid-feedback">
                            Genial!
                        </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="validationCustom02">RUC </label>
                        <input type="text" class="form-control" id="ruc" name="ruc" placeholder="RUC">
                        <div class="valid-feedback">
                            Genial!
                        </div>
                    </div>
                </div>

                <div class="form-row m-t-15">
                    <div class="col-md-2 mb-3">
                        <label for="validationCustom03">BANKS</label>
                        <select class="form-control custom-select" id="bank" name="bank">
                            @foreach ($banks as $bank)
                            <option value="{{$bank->id}}">{{$bank->name}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Ingresa Telefono.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">NOMBRE NEGOCIO *</label>
                        <input type="text" class="form-control" placeholder="NEGOCIO" id="negocio" name="negocio"
                            required>
                        <div class="valid-feedback">
                            Genial!
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom02">GIRO NEGOCIO *</label>
                        <input type="text" class="form-control" placeholder="GIRO NEGOCIO" id="giro" name="giro"
                            required>
                        <div class="valid-feedback">
                            Genial!
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom03">TELEFONO 1 *</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="CELULAR" >
                        <div class="invalid-feedback">
                            Ingresa Telefono.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3 d-none">
                        <label for="validationCustom03">DISTRITO</label>
                        <input type="text" class="form-control" id="district" name="district"
                            value="{{$user->district}}" required>
                        <div class="invalid-feedback">
                            Ingresa Telefono.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title m-b-20">Datos de Equipo</h4>
                <hr>
                <br>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom01">Modelo</label>
                        <select class="form-control custom-select" id="model" name="model">
                            @foreach ($models as $model)
                            <option value="{{$model->id}}">{{$model->name}}</option>
                            @endforeach
                        </select>
                        <div class="valid-feedback">
                            Genial!
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom01">Tipo de Equipo</label>
                        <select class="form-control custom-select" id="tipo" name="tipo">
                            @foreach ($tipos as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->name}}</option>
                            @endforeach
                        </select>
                        <div class="valid-feedback">
                            Genial!
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom02">Orden</label>
                        <input type="text" class="form-control" placeholder="Orden" id="orden" name="orden" disabled>
                        <div class="valid-feedback">
                            Genial!
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom02">Serie</label>
                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" id="serie"
                            name="serie" required>
                            <option></option>
                            @foreach ($ware as $w)
                            <option value={{$w->serie}}>{{$w->serie}}</option>
                            @endforeach
                        </select>
                        <div class="valid-feedback">
                            Genial!
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </div>
    </form>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
    </script>
</div>
@endsection

@push('scripts')
<script>
    $(function(){
            $('#departamento').on('change', seleccionDepartament);
            $('#provincia').on('change', seleccionProvince);
            $('#model').on('change', seleccionModel);
        });

        $('#serie').select2({
    placeholder: "Please select a serie"
});
        function seleccionModel() {
            console.log("HOLA");
        var data = $(this).val();
        if(data ==1){
            $('#serie').attr("required", true);
            $('#serie').attr("disabled",false);
            $('#orden').attr("disabled", true);
            $('#orden').attr("required", false);
            $('#tipo').attr("readonly", false);
            }else{
            $('#serie').attr("required", false);
            $('#serie').attr("disabled",true);
            $('#orden').attr("disabled", false);
            $('#orden').attr("required", true);
            $('#tipo').attr("readonly", true);
        }
    }




    //Departamentos y Distritos
    function seleccionDepartament() {
        var departament_id = $(this).val();
        console.log(departament_id);
        $.ajax({
            type: "GET",
            url: "{{ route('busca.provincia', '/') }}/" + departament_id,
            success : function(data){
                $('#provincia').empty();
                $('#provincia').append('<option value="" disabled selected >Provincia</option>');
                $('#distrito').empty();
                $('#distrito').append('<option value="" disabled selected >Distrito</option>');
                for (let i = 0; i < data.length; i++) {
                    $('#provincia').append('<option value="' + data[i].id + '">' + data[i].name + '</option>');
                }
            },
            error: function(data) {
            alert('error');
            }
        });
    }

    function seleccionProvince() {

        var province_id = $('#provincia').val();
        console.log(province_id);
        $.ajax({
            type: "GET",
            url: "{{ route('busca.distrito', '/') }}/" + province_id,
            success : function(data){
                $('#distrito').empty();
                $('#distrito').append('<option value="" disabled selected >Distrito</option>');
                console.log(Object.keys(data).length);
                for (let i = 0; i < Object.keys(data).length; i++) {
                    $('#distrito').append('<option value="' + data[i].id + '">' + data[i].name + '</option>');
                }
            },
            error: function(data) {
            alert('error');
            }
        });
    }

</script>
@endpush
