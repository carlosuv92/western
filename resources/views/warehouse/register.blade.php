@extends('layouts.plantilla')

@section('content')
<h4 class="card-title m-t-10">Equipos</h4>
<!-- Row -->
<div class="card-group">
    <!-- Column -->
    <div class="card">
        <div class="card-body text-center">
            <h4 class="text-center text-info">{{__('Pocket')}}</h4>
            <h2>{{$values['pockets']['total']}}</h2>
            <div class="row p-t-10 p-b-10">
                <!-- Column -->
                <div class="col text-center align-self-center">
                    <div data-label="20%" class="css-bar m-b-0 css-bar-primary css-bar-20"><i
                            class="display-6 mdi mdi-account-circle"></i></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <h4 class="font-medium m-b-0"><i class="ti-angle-up text-success"></i> <br>
                        {{$values['pockets']['registered']}}</h4>
                </div>
                <div class="col-md-6 col-sm-12">
                    <h4 class="font-medium m-b-0"><i class="ti-angle-down text-danger"></i> <br>
                        {{$values['pockets']['faltantes']}}</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="card">
        <div class="card-body text-center">
            <h4 class="text-center text-danger">{{__('Pos')}}</h4>
            <h2>-</h2>
            <div class="row p-t-10 p-b-10">
                <!-- Column -->
                <div class="col text-center align-self-center">
                    <div data-label="100%" class="css-bar m-b-0 css-bar-danger css-bar-100"><i
                            class="display-6 mdi mdi-star-circle"></i></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <h4 class="font-medium m-b-0"><i class="ti-angle-up text-success"></i> <br> -</h4>
                </div>
                <div class="col-md-6 col-sm-12">
                    <h4 class="font-medium m-b-0"><i class="ti-angle-down text-danger"></i> <br> -</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="card">
        <div class="card-body text-center">
            <h4 class="text-center text-cyan">{{__('Otros')}}</h4>
            <h2>-</h2>
            <div class="row p-t-10 p-b-10">
                <!-- Column -->
                <div class="col text-center align-self-center">
                    <div data-label="100%" class="css-bar m-b-0 css-bar-success css-bar-100"><i
                            class="display-6 mdi mdi-briefcase-check"></i></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <h4 class="font-medium m-b-0"><i class="ti-angle-up text-success"></i> <br> -</h4>
                </div>
                <div class="col-md-6 col-sm-12">
                    <h4 class="font-medium m-b-0"><i class="ti-angle-down text-danger"></i> <br> -</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
<!-- End Row -->



<div class="card-group">
    <!-- Column -->
    <div class="card">
        <div class="card-body text-center">
            <h4 class="text-center text-info">
                @if(!$values['pockets']['complete'])
                <form action="{{route( 'pocket.register', $guide)}}">
                    <button class="btn btn-primary btn-rounded">
                        <i class="fas fa-check"></i> {{__('Agregar Equipos')}}
                    </button>
                </form>
                @else
                <button disabled type="button" class="btn btn-primary btn-rounded">
                    <i class="fas fa-check"></i> {{__('Agregar Equipos')}}
                </button>
                @endif
            </h4>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="card">
        <div class="card-body text-center">
            <h4 class="text-center text-info">
                <button type="button" class="btn btn-danger btn-rounded" disabled>
                    <i class="fas fa-check"></i> {{__('Agregar Equipos')}}
                </button>
            </h4>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="card">
        <div class="card-body text-center">
            <h4 class="text-center text-info">
                <button type="button" class="btn btn-info btn-rounded" disabled>
                    <i class="fas fa-check"></i> {{__('Agregar Equipos')}}
                </button>
            </h4>
        </div>
    </div>
    <!-- Column -->
</div>
<!-- End Row -->
@endsection

@push('scripts')
@endpush
