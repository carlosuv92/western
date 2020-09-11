@push('styles')
@endpush
@extends('layouts.plantilla')

@section('content')
<div class="col-12">
    <form method="POST" action={{route('prospect.store')}} class="needs-validation" novalidate>
        @csrf
        <div class="card">
            <div class="card-body">
                <h4 class="card-title m-b-20">Crear Cliente</h4>
                <hr>
                <br>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom01">Nombres y Apellidos</label>
                        <input type="text" class="form-control" placeholder="Nombres" id="name" name="name" required>
                        <div class="valid-feedback">
                            Genial!
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom02">Tipo</label>
                        <select class="form-control custom-select" id="doc" name="doc">
                            @foreach ($documents as $doc)
                            <option value="{{$doc->id}}">{{$doc->name}}</option>
                            @endforeach
                        </select>
                        <div class="valid-feedback">
                            Genial!
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom02">Documento</label>
                        <input type="text" class="form-control" id="document" name="document" placeholder="Documento"
                            required>
                        <div class="valid-feedback">
                            Genial!
                        </div>
                    </div>
                </div>

                <div class="form-row m-t-15">
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom03">Telefono 1</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Celular" required>
                        <div class="invalid-feedback">
                            Ingresa Telefono.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom03">DEPARTAMENTO</label>
                        <select class="form-control custom-select" id="department" name="department">
                            @foreach ($departments as $depa)
                            <option value="{{$depa->id}}">{{$depa->name}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Ingresa departamento.
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
            </div>

            <div class="form-row m-t-15">
                <div class="col-md-3 mb-3">
                    <label for="validationCustom03">TIPO SERVICIO</label>
                    <select class="form-control custom-select" id="service" name="service">
                        @foreach ($services as $serv)
                        <option value="{{$serv->id}}">{{$serv->name}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Ingresa Telefono.
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationCustom02">PRIORIDAD</label>
                    <select class="form-control custom-select" id="priority" name="priority">
                        <option value="1">MUY INTERESADO</option>
                        <option value="2">INTERESADO</option>
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
