@extends('layouts.plantilla')
@section('content')

<!-- COMIENZO DEL FORMULARIO -->
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <form id="contrato" action="{{route('usuarios.store')}}" method="post">
                {{ csrf_field() }}
                <div class="form-body">
                    <h3 class="card-title">Datos del Usuario</h3>
                    <hr>
                    <div class="row" style="margin-left: 25px;">
                        <!--/Nombre de Usuario-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                                <small class="form-control-feedback"> Ingrese Nombre del Usuario </small>
                            </div>
                        </div>
                        <!--/Telefono de Usuario-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Apellido</label>
                                <input type="text" id="surname" name="surname" class="form-control" required>
                                <small class="form-control-feedback"> Ingrese Telefono del Usuario </small>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 25px;">
                        <!--/Correo de Usuario-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Correo</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                                <small class="form-control-feedback"> Ingrese Email </small>
                            </div>
                        </div>
                        <!--/Direccion de Usuario-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Ciudad</label>
                                <select class="form-control custom-select" name="address">
                                    <option value="35">AREQUIPA</option>
                                    <option value="25">CHIMBOTE</option>
                                    <option value="122">TRUJILLO</option>
                                    <option value="99">ICA</option>
                                    <option value="124">CHICLAYO</option>
                                    <option value="135">LIMA</option>
                                    <option value="106">HUANCAYO</option>
                                    <option value="157">PIURA</option>
                                    </option>
                                </select>
                                <small class="form-control-feedback"> Seleccione Ciudad</small>
                            </div>
                        </div>
                    </div>
                    <!--/row-->
                    <!--/Ingreso de documento-->
                    <div class="row" style="margin-left: 25px;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tipo de documento</label>
                                <select class="form-control custom-select" name="type_document">
                                    @foreach ($documents as $document)
                                    <option value="{{$document->id}}">{{$document->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--/Ingreso de documento-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Documento</label>
                                <input type="text" id="cdocument" name="document" class="form-control" required>
                                <small class="form-control-feedback"> Ingrese Documento del Usuario </small>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row" style="margin-left: 25px;">
                        <!--/Rol de Usuario-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Rol</label>
                                <select class="form-control custom-select" name="role">
                                    @foreach ($roles as $role)
                                    <option value="{{$role->id}}">{{$role->description}}</option>
                                    @endforeach
                                </select>
                                <small class="form-control-feedback"> Seleccione Tipo de rol </small>
                            </div>
                        </div>
                        <!--/Supervisor de Usuario-->
                        <div class="col-md-6">
                            <div class="form-group s">
                                <label class="control-label">Supervisor</label>
                                <select class="form-control custom-select" name="supervisor">
                                    @foreach ($supervisors as $supervisor)
                                    <option value="{{$supervisor->id}}">{{$supervisor->surname}} {{$supervisor->name}}
                                    </option>
                                    @endforeach
                                </select>
                                <small class="form-control-feedback"> Seleccione Supervisor</small>
                            </div>
                        </div>

                        <!--/span-->
                    </div>
                </div>
                <div class="row  p-t-20">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <div class="form-actions" style="text-align:right">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                    Crear</button>
                                <button type="button" class="btn btn-inverse" onclick="history.go(-1)">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
