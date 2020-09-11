@extends('layouts.personal')
@section('content')
<!-- TITULO -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="p-title">Ficha Social</h4>
    </div>
</div>

<!-- COMIENZO DEL FORMULARIO -->
<form id="contrato" action="{{route('registro.store')}}" method="post">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <div class="form-body">
                    <h3 class="card-title">Datos del Usuario</h3>
                    <hr>
                    <div class="row" style="margin-left: 15px; margin-right: 15px">
                        <!--/Nombre de Usuario-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nombres</label>
                                <div class="input-group">
                                    <input type="text" name="name" id="name" value="{{ old( 'name') }}"
                                        class="form-control" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="mdi mdi-account-check"></i></span>
                                    </div>
                                </div>
                                <small class="form-control-feedback"> Ingrese sus Nombres </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Apellidos</label>
                                <div class="input-group">
                                    <input type="text" name="surname" id="surname" value="{{ old( 'surname') }}"
                                        class="form-control" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="mdi mdi-account-check"></i></span>
                                    </div>
                                </div>
                                <small class="form-control-feedback"> Ingrese sus Apellidos </small>
                            </div>
                        </div>
                        <!--/Nombre de Usuario-->
                        <!--/Nombre de Usuario-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tipo de Documento</label>
                                <select class="form-control custom-select" name="type_document">
                                    <option value="" disabled selected>Tipo de Documento?</option>
                                    @foreach ($documents as $document)
                                    <option value="{{$document->id}}">{{$document->name}}</option>
                                    @endforeach
                                </select>
                                <small class="form-control-feedback"> Seleccione tipo de documento </small>
                            </div>
                        </div>
                        <!--/Nombre de Usuario-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Documento</label>
                                <div class="input-group">
                                    <input type="text" name="document" id="document" value="{{ old( 'document') }}"
                                        class="form-control" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="mdi mdi-file-document-box "></i></span>
                                    </div>
                                </div>
                                <small class="form-control-feedback"> Ingrese digitos de documento </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <div class="form-body">
                    <h3 class="card-title">Datos de Contacto</h3>
                    <hr>
                    <div class="row" style="margin-left: 15px; margin-right: 15px">
                        <!--/Nombre de Usuario-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Departamento</label>
                                <select class="form-control custom-select" id="departament" name="departament">
                                    <option value="" disabled selected>Departamento</option>
                                    @foreach ($departaments as $departament)
                                    <option value="{{$departament->id}}">{{$departament->name}}</option>
                                    @endforeach
                                </select>
                                <small class="form-control-feedback"> Ingrese departamento de residencia </small>
                            </div>
                        </div>
                        <!--/Nombre de Usuario-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Provincia</label>
                                <select class="form-control custom-select" name="province" id="province">
                                </select>
                                <small class="form-control-feedback"> Ingrese provincia de residencia </small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Distrito</label>
                                <select class="form-control custom-select" name="district" id="district">
                                </select>
                                <small class="form-control-feedback"> Ingrese distrito de residencia</small>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 15px; margin-right: 15px">
                        <!--/Nombre de Usuario-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Dirección</label>
                                <div class="input-group">
                                    <input type="text" name="address" id="address" value="{{ old( 'age') }}"
                                        class="form-control" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="mdi mdi-routes"></i></span>
                                    </div>
                                </div>
                                <small class="form-control-feedback"> Ingrese dirección </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">correo</label>
                                <div class="input-group">
                                    <input type="email" name="email" id="email" value="{{ old( 'age') }}"
                                        class="form-control" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class=" mdi mdi-email "></i></span>
                                    </div>
                                </div>
                                <small class="form-control-feedback"> Ingrese correo </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <div class="form-actions" style="text-align:right">
                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Crear</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@push('scripts')
<script>
    $(function(){
            $('#birthday').on('change', calcularEdad);
            $('#departament').on('change', seleccionDepartament);
            $('#province').on('change', seleccionProvince);
        });
        function calcularEdad() {

            fecha = $(this).val();
            var hoy = new Date();
            var cumpleanos = new Date(fecha);
            var edad = hoy.getFullYear() - cumpleanos.getFullYear();
            var m = hoy.getMonth() - cumpleanos.getMonth();

            if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                edad--;
            }
            $('#age').val(edad);
        }

        function seleccionDepartament() {

            var departament_id = $(this).val();
            console.log(departament_id);
            $.ajax({
                type: "GET",
                url: "{{ route('busca.provincia', '/') }}/" + departament_id,
                success : function(data){
                    console.log(data);
                    $('#province').empty();
                    $('#province').append('<option value="" disabled selected >Provincia</option>');
                    for (let i = 0; i < data.length; i++) {
                        $('#province').append('<option value="' + data[i].id + '">' + data[i].name + '</option>');
                    }
                },
                error: function(data) {
                alert('error');
                }
            });
        }

        function seleccionProvince() {

            var province_id = $('#province').val();
            console.log(province_id);
            $.ajax({
                type: "GET",
                url: "{{ route('busca.distrito', '/') }}/" + province_id,
                success : function(data){
                    $('#district').empty();
                    $('#district').append('<option value="" disabled selected >Distrito</option>');
                    console.log(Object.keys(data).length);
                    for (let i = 0; i < Object.keys(data).length; i++) {
                        $('#district').append('<option value="' + data[i].id + '">' + data[i].name + '</option>');
                    }
                },
                error: function(data) {
                alert('error');
                }
            });
        }

</script>




@endpush
