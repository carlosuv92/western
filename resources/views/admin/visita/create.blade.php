@push('styles')
@endpush
@extends('layouts.plantilla')

@section('content')
<div class="col-12">
    <form method="POST" action={{route('visita.store')}} class="needs-validation" novalidate>
        @csrf
        <div class="card">
            <div class="card-body">
                <h4 class="card-title m-b-20">Crear Cliente</h4>
                <hr>
                <br>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Nombres y Apellidos</label>
                        <input type="text" class="form-control" placeholder="Nombres" id="name" name="name" required>
                        <div class="valid-feedback">
                            Genial!
                        </div>
                    </div>
                </div>
                <div class="form-row m-t-15">
                    <div class="col-md-2 mb-3">
                        <label for="validationCustom02">Tipo</label>
                        <select class="form-control custom-select" id="t_doc" name="t_doc">
                            @foreach ($t_docs as $t_doc)
                            <option value="{{$t_doc->id}}">{{$t_doc->name}}</option>
                            @endforeach
                        </select>
                        <div class="valid-feedback">
                            Genial!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Documento</label>
                        <input type="text" class="form-control" id="document" name="document" placeholder="Documento"
                            required>
                        <div class="valid-feedback">
                            Genial!
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom03">Telefono 1</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Celular" required>
                        <div class="invalid-feedback">
                            Ingresa Telefono.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom03">Telefono 2</label>
                        <input type="text" class="form-control" id="phone2" name="phone2" placeholder="Celular"
                            required>
                        <div class="invalid-feedback">
                            Ingresa Telefono.
                        </div>
                    </div>
                </div>
                <div class="form-row m-t-15">

                    <div class="col-md-3 mb-3">
                        <label for="validationCustom03">DISTRITO</label>
                        <input type="text" class="form-control" id="district" name="district"
                            value="{{$user->district}}" required>
                        <div class="invalid-feedback">
                            Ingresa Telefono.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom04">Direccion</label>
                        <input type="text" class="form-control" id="validationCustom04" id="address" name="address"
                            required>
                        <div class="invalid-feedback">
                            Ingresa Direccion.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom02">Prioridad</label>
                        <select class="form-control custom-select" id="prioridad" name="prioridad">
                            <option value="MEDIA">MUY INTERESADO</option>
                            <option value="ALTA">INTERESADO</option>
                        </select>
                        <div class="valid-feedback">
                            Genial!
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">CREAR PROSPECTO</button>
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
        });


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