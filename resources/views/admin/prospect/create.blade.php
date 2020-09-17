@push('styles')
@endpush
@extends('layouts.plantilla')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="col-12">
    <form method="POST" action={{route('prospect.store')}}>
        @csrf
        <div class="card">
            <div class="card-body">
                <h4 class="card-title m-b-20">Crear Cliente</h4>
                <hr>
                <br>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Nombres y Apellidos</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}"
                            value="{{ old('name') }}" id="name" placeholder="Nombres" name="name" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>TELEFONO</label>
                        <input type="text" minlength="5" maxlength="7"
                            class="form-control {{ $errors->has('phone') ? 'error' : '' }}" value="{{ old('phone') }}"
                            id="phone" name="phone" placeholder="Telefono" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>CELULAR</label>
                        <input type="text" minlength="9" maxlength="9"
                            class="form-control {{ $errors->has('cellphone') ? 'error' : '' }}"
                            value="{{ old('cellphone') }}" id="cellphone" name="cellphone" placeholder="Celular"
                            required>
                    </div>
                </div>

                <div class="form-row m-t-15">
                    <div class="col-md-3 mb-3">
                        <label>DEPARTAMENTO</label>
                        <select class="form-control custom-select"
                            class="form-control {{ $errors->has('department') ? 'error' : '' }}"
                            value="{{ old('department') }}" id="department" name="department">
                            @foreach ($departments as $depa)
                            <option value="{{$depa->id}}">{{$depa->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>DIRECCION</label>
                        <input type="text" class="form-control {{ $errors->has('address') ? 'error' : '' }}"
                            value="{{ old('address') }}" id="address" name="address" required>

                    </div>
                    <div class="col-md-3 mb-3">
                        <label>PRIORIDAD</label>
                        <select class="form-control custom-select"
                            class="form-control {{ $errors->has('priority') ? 'error' : '' }}"
                            value="{{ old('priority') }}" id="priority" name="priority">
                            <option value="1">MUY INTERESADO</option>
                            <option value="2">INTERESADO</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>VENDEDOR</label>
                        <select class="form-control custom-select"
                            class="form-control {{ $errors->has('seller') ? 'error' : '' }}" value="{{ old('seller') }}"
                            id="seller" name="seller">
                            @foreach ($sellers as $seller)
                            <option value="{{$seller->id}}">{{$seller->surname}} {{$seller->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button class="btn btn-primary" type="submit">CREAR PROSPECTO</button>
            </div>
        </div>
    </form>
</div>
@endsection
