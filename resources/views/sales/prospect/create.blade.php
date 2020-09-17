@push('styles')
@endpush
@extends('layouts.personal')

@section('content')
@if (\Session::has('success'))
<div class="alert alert-success" style="color: #0d483c;">
    {!! \Session::get('success') !!}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="row">
    <div class="col-xl-12">
        <div class="card-box pb-0">
            <div class="dropdown pull-right d-none">
                <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-dots-vertical"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                </div>
            </div>

            <h4 class="header-title m-t-0 m-b-30">Crear Prospecto</h4>

            <form id="commentForm" method="POST" action={{route('prospecto.store')}} class="form-horizontal">
                @csrf
                <div id="rootwizard" class="pull-in">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="nav-item"><a href="#first" data-toggle="tab" class="nav-link">Selección Vendedor</a>
                        </li>
                        <li class="nav-item"><a href="#second" data-toggle="tab" class="nav-link">Datos de Cliente</a>
                        </li>
                        <li class="nav-item"><a href="#third" data-toggle="tab" class="nav-link">Finalizar</a></li>
                    </ul>
                    <div class="tab-content mb-0 b-0">
                        <div class="tab-pane fade" id="first">
                            <div class="control-group">
                                <label class="control-label">DEPARTAMENTO</label>

                                <div class="controls">
                                    <select class="form-control custom-select" id="department" name="department"
                                        required>
                                        <option value="" selected disabled hidden>SELECCIONA DEPARTAMENTO</option>
                                        @foreach ($departments as $depa)
                                        <option value="{{$depa->id}}">{{$depa->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">VENDEDOR</label>

                                <div class="controls">
                                    <select class="form-control custom-select" id="seller" name="seller" required>
                                        <option value="" selected disabled hidden>SELECCIONA VENDEDOR</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="second">
                            <div class="control-group">
                                <label class="control-label" for="name">NOMBRES Y APELLIDOS</label>
                                <div class="controls">
                                    <input class="form-control" type="text" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="phone">TELEFONO</label>
                                <div class="controls">
                                    <input class="form-control" type="number" id="phone" name="phone">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="cellphone">CELLPHONE</label>
                                <div class="controls">
                                    <input class="form-control" type="number" id="cellphone" name="cellphone" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="address">DIRECCION</label>
                                <div class="controls">
                                    <input class="form-control" type="text" id="address" name="address" required>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="third">
                            <div class="form-group row clearfix">
                                <div class="col-lg-12">
                                    <div class="control-group">
                                        <label class="control-label">PRIORIDAD</label>

                                        <div class="controls">
                                            <select class="form-control custom-select" id="priority" name="priority"
                                                required>
                                                <option value="" selected disabled hidden>SELECCIONA PRIORIDAD</option>
                                                <option value="1">MUY INTERESADO</option>
                                                <option value="2">INTERESADO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-inline wizard mb-0 mt-4">
                            <li class="previous list-inline-item"><a href="#"
                                    class="btn btn-primary waves-effect waves-light">ANTERIOR</a>
                            </li>
                            <li class="next list-inline-item float-right" id="next"><a href="#"
                                    class="btn btn-primary waves-effect waves-light">SIGUIENTE</a></li>
                            <button class="btn btn-success float-right d-none" id="sub" type="submit">CREAR
                                PROSPECTO</button>
                        </ul>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!-- end col -->

</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        var $validator = $("#commentForm").validate({
            rules: {
                department: {
                    required: true,
                },
                seller: {
                    required: true,
                },
                name: {
                    required: true,
                },
                phone: {
                    required: true,
                },
                address: {
                    required: true,
                },
                priority: {
                    required: true,
                },
            }
        });

        var $i=0;
        $('#rootwizard').bootstrapWizard({
            'tabClass': 'nav nav-tabs navtab-wizard nav-justified bg-muted',
            'onTabClick':function(tab, navigation, index) {
                        return false;
                },
            'onNext': function (tab, navigation, index) {
                var $valid = $("#commentForm").valid();
                if (!$valid) {
                    $validator.focusInvalid();
                    return false;
                }else{
                    $i++;
                }
                if($i>=2 ){
                    $("#next").addClass('d-none');
                    $("#sub").removeClass('d-none');
                }else{
                    $("#next").removeClass('d-none');
                    $("#sub").addClass('d-none');
                }
            }
        });
    });
</script>

<script>
    $(function(){
        $('#department').on('change', seleccionSeller);
    });
    function seleccionSeller() {
        var departament_id = $(this).val();
        $.ajax({
            type: "GET",
            url: "{{ route('get.seller', '/') }}/" + departament_id,
            success : function(data){
                console.log(data);
                $('#seller').empty();
                $('#seller').append('<option value="" disabled selected >SELECCIONA VENDEDOR</option>');
                for (let i = 0; i < data.length; i++) {
                    $('#seller').append('<option value="' + data[i].id + '">' + data[i].name +' '+data[i].surname + '</option>');
                }
            },
            error: function(data) {
            alert('error');
            }
        });
    }
</script>

<script>
    $(document).ready(function(){
  $('.alert').fadeIn().delay(5000).fadeOut();
    });
</script>
@endpush
