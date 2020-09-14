<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>WESTERN UNION</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="Visual Connections." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('horizontal/assets/images/favicon.ico')}}">

    <!-- Plugins css-->
    <link href="{{asset('horizontal/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}"
        rel="stylesheet" />
    <link href="{{asset('horizontal/assets/plugins/multiselect/css/multi-select.css')}}" rel="stylesheet"
        type="text/css" />
    <link href="{{asset('horizontal/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('horizontal/assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}"
        rel="stylesheet" />
    <link href="{{asset('horizontal/assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet" />
    <link href="{{asset('horizontal/assets/plugins/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
    <link
        href="{{asset('horizontal/assets/plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}"
        rel="stylesheet">
    <link href="{{asset('horizontal/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}"
        rel="stylesheet">
    <link href="{{asset('horizontal/assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <!-- App css -->
    <link href="{{asset('horizontal/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('horizontal/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('horizontal/assets/css/style.css')}}" rel="stylesheet" type="text/css" />

    <script src="{{asset('horizontal/assets/js/modernizr.min.js')}}"></script>

    <!-- DataTables -->
    <link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet"
        type="text/css" />
    <link href="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet"
        type="text/css" />
    <!-- Multi Item Selection examples -->
    <link href="{{asset('assets/plugins/datatables/select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    @stack('styles')
    <!-- Circlifull chart css -->
    <link href="{{asset('assets/plugins/jquery-circliful/css/jquery.circliful.css')}}" rel="stylesheet"
        type="text/css" />
    <style>
        #topnav .topbar-main .logo {
            text-align: center !important;
            float: inherit !important;
        }
    </style>
</head>

<body>

    <!-- Navigation Bar-->
    <header id="topnav">
        <div class="topbar-main">
            <div class="container-fluid">

                <!-- Logo container-->
                <div class="logo" style="text-align: center !important;">
                    <!-- Text Logo -->
                    <!--<a href="#" class="logo">-->
                    <!--<span class="logo-small"><i class="mdi mdi-radar"></i></span>-->
                    <!--<span class="logo-large"><i class="mdi mdi-radar"></i> Adminto</span>-->
                    <!--</a>-->
                    <!-- Image Logo -->
                    <a href="#" class="logo">
                        <img src="{{asset('files/assets/images/logo-icon.png')}}" alt="" height="26" class="logo-small">
                        <img src="{{asset('files/assets/images/logo-icon.png')}}" alt="" height="24" class="logo-large">
                    </a>
                </div>
                <!-- End Logo container-->

                <!-- end menu-extras -->

                <div class="clearfix"></div>

            </div>
            <!-- end container -->
        </div>
        <!-- end topbar-main -->

    </header>
    <!-- End Navigation Bar-->


    <div class="wrapper">
        <div class="container-fluid">

            @yield('content')
        </div>
    </div>
    <!-- end wrapper -->


    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    2019 Visual Connections SAC º
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->



    <!-- jQuery  -->
    <script src="{{asset('horizontal/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('horizontal/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('horizontal/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('horizontal/assets/js/waves.js')}}"></script>
    <script src="{{asset('horizontal/assets/js/jquery.slimscroll.js')}}"></script>

    <!-- Plugins Js -->
    <script src="{{asset('horizontal/assets/plugins/switchery/switchery.min.js')}}"></script>
    <script src="{{asset('horizontal/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('horizontal/assets/plugins/multiselect/js/jquery.multi-select.js')}}">
    </script>
    <script type="text/javascript"
        src="{{asset('horizontal/assets/plugins/jquery-quicksearch/jquery.quicksearch.js')}}"></script>
    <script src="{{asset('horizontal/assets/plugins/select2/js/select2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('horizontal/assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}"
        type="text/javascript"></script>
    <script src="{{asset('horizontal/assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js')}}"
        type="text/javascript"></script>
    <script src="{{asset('horizontal/assets/plugins/moment/moment.js')}}"></script>
    <script src="{{asset('horizontal/assets/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
    <script
        src="{{asset('horizontal/assets/plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}">
    </script>
    <script src="{{asset('horizontal/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}">
    </script>
    <script src="{{asset('horizontal/assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('horizontal/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"
        type="text/javascript"></script>

    <!-- Required datatable js -->
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script src="{{asset('assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/jszip.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/buttons.print.min.js')}}"></script>

    <!-- Key Tables -->
    <script src="{{asset('assets/plugins/datatables/dataTables.keyTable.min.js')}}"></script>

    <!-- Responsive examples -->
    <script src="{{asset('assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

    <!-- Selection table -->
    <script src="{{asset('assets/plugins/datatables/dataTables.select.min.js')}}"></script>

    <!-- Toastr js -->
    <script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>

    <!-- Validation js (Parsleyjs) -->
    <script type="text/javascript" src="{{asset('assets/plugins/parsleyjs/dist/parsley.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
                $('form').parsley();
            });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {

                // Default Datatable
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                // Key Tables

                $('#key-table').DataTable({
                    keys: true
                });

                // Responsive Datatable
                $('#responsive-datatable').DataTable();

                // Multi Selection Datatable
                $('#selection-datatable').DataTable({
                    select: {
                        style: 'multi'
                    }
                });

                table.buttons().container()
                    .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            });


            $('img').each(function () {
            if (!this.complete || typeof this.naturalWidth == "undefined" || this.naturalWidth == 0) {
                this.src = '{{asset('assets/images/users/avatar-1.jpg')}}';
            }
            });

    </script>

    <!-- App js -->
    <script src="{{asset('horizontal/assets/js/jquery.core.js')}}"></script>
    <script src="{{asset('horizontal/assets/js/jquery.app.js')}}"></script>
    <script src="{{asset('horizontal/assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js')}}"></script>
    <script src="{{asset('horizontal/assets/plugins/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <script>
        jQuery(document).ready(function() {

                    //advance multiselect start
                    $('#my_multi_select3').multiSelect({
                        selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                        selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                        afterInit: function (ms) {
                            var that = this,
                                    $selectableSearch = that.$selectableUl.prev(),
                                    $selectionSearch = that.$selectionUl.prev(),
                                    selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                                    selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                            that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                                    .on('keydown', function (e) {
                                        if (e.which === 40) {
                                            that.$selectableUl.focus();
                                            return false;
                                        }
                                    });

                            that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                                    .on('keydown', function (e) {
                                        if (e.which == 40) {
                                            that.$selectionUl.focus();
                                            return false;
                                        }
                                    });
                        },
                        afterSelect: function () {
                            this.qs1.cache();
                            this.qs2.cache();
                        },
                        afterDeselect: function () {
                            this.qs1.cache();
                            this.qs2.cache();
                        }
                    });

                    // Select2
                    $(".select2").select2();

                    $(".select2-limiting").select2({
                        maximumSelectionLength: 2
                    });

                });

                //Bootstrap-TouchSpin
                $(".vertical-spin").TouchSpin({
                    verticalbuttons: true,
                    buttondown_class: "btn btn-primary",
                    buttonup_class: "btn btn-primary",
                    verticalupclass: 'ti-plus',
                    verticaldownclass: 'ti-minus'
                });
                var vspinTrue = $(".vertical-spin").TouchSpin({
                    verticalbuttons: true
                });
                if (vspinTrue) {
                    $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
                }

                $("input[name='demo1']").TouchSpin({
                    min: 0,
                    max: 100,
                    step: 0.1,
                    decimals: 2,
                    boostat: 5,
                    maxboostedstep: 10,
                    buttondown_class: "btn btn-primary",
                    buttonup_class: "btn btn-primary",
                    postfix: '%'
                });
                $("input[name='demo2']").TouchSpin({
                    min: -1000000000,
                    max: 1000000000,
                    stepinterval: 50,
                    buttondown_class: "btn btn-primary",
                    buttonup_class: "btn btn-primary",
                    maxboostedstep: 10000000,
                    prefix: '$'
                });
                $("input[name='numerohijos']").TouchSpin({
                    buttondown_class: "btn btn-primary",
                    buttonup_class: "btn btn-primary"
                });
                $("input[name='demo3_21']").TouchSpin({
                    initval: 40,
                    buttondown_class: "btn btn-primary",
                    buttonup_class: "btn btn-primary"
                });
                $("input[name='demo3_22']").TouchSpin({
                    initval: 40,
                    buttondown_class: "btn btn-primary",
                    buttonup_class: "btn btn-primary"
                });

                $("input[name='demo5']").TouchSpin({
                    prefix: "pre",
                    postfix: "post",
                    buttondown_class: "btn btn-primary",
                    buttonup_class: "btn btn-primary"
                });
                $("input[name='demo0']").TouchSpin({
                    buttondown_class: "btn btn-primary",
                    buttonup_class: "btn btn-primary"
                });

                // Time Picker
                jQuery('#timepicker').timepicker({
                    defaultTIme : false,
                    icons: {
                        up: 'mdi mdi-chevron-up',
                        down: 'mdi mdi-chevron-down'
                    }
                });
                jQuery('#timepicker2').timepicker({
                    showMeridian : false,
                    icons: {
                        up: 'mdi mdi-chevron-up',
                        down: 'mdi mdi-chevron-down'
                    }
                });
                jQuery('#timepicker3').timepicker({
                    minuteStep : 15,
                    icons: {
                        up: 'mdi mdi-chevron-up',
                        down: 'mdi mdi-chevron-down'
                    }
                });

                //colorpicker start

                $('.colorpicker-default').colorpicker({
                    format: 'hex'
                });
                $('.colorpicker-rgba').colorpicker();

                // Date Picker
                jQuery('#datepicker').datepicker();
                jQuery('#datepicker-autoclose').datepicker({
                    autoclose: true,
                    todayHighlight: true
                });
                jQuery('#datepicker-inline').datepicker();
                jQuery('#datepicker-multiple-date').datepicker({
                    format: "mm/dd/yyyy",
                    clearBtn: true,
                    multidate: true,
                    multidateSeparator: ","
                });
                jQuery('#date-range').datepicker({
                    toggleActive: true
                });

                //Date range picker
                $('.input-daterange-datepicker').daterangepicker({
                    buttonClasses: ['btn', 'btn-sm'],
                    applyClass: 'btn-secondary',
                    cancelClass: 'btn-primary'
                });
                $('.input-daterange-timepicker').daterangepicker({
                    timePicker: true,
                    format: 'MM/DD/YYYY h:mm A',
                    timePickerIncrement: 30,
                    timePicker12Hour: true,
                    timePickerSeconds: false,
                    buttonClasses: ['btn', 'btn-sm'],
                    applyClass: 'btn-secondary',
                    cancelClass: 'btn-primary'
                });
                $('.input-limit-datepicker').daterangepicker({
                    format: 'MM/DD/YYYY',
                    minDate: '06/01/2016',
                    maxDate: '06/30/2016',
                    buttonClasses: ['btn', 'btn-sm'],
                    applyClass: 'btn-secondary',
                    cancelClass: 'btn-primary',
                    dateLimit: {
                        days: 6
                    }
                });

                $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

                $('#reportrange').daterangepicker({
                    format: 'MM/DD/YYYY',
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment(),
                    minDate: '01/01/2016',
                    maxDate: '12/31/2016',
                    dateLimit: {
                        days: 60
                    },
                    showDropdowns: true,
                    showWeekNumbers: true,
                    timePicker: false,
                    timePickerIncrement: 1,
                    timePicker12Hour: true,
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    opens: 'left',
                    drops: 'down',
                    buttonClasses: ['btn', 'btn-sm'],
                    applyClass: 'btn-success',
                    cancelClass: 'btn-secondary',
                    separator: ' to ',
                    locale: {
                        applyLabel: 'Submit',
                        cancelLabel: 'Cancel',
                        fromLabel: 'From',
                        toLabel: 'To',
                        customRangeLabel: 'Custom',
                        daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                        firstDay: 1
                    }
                }, function (start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                });

                //Bootstrap-MaxLength
                $('input#defaultconfig').maxlength({
                    warningClass: "badge badge-success",
                    limitReachedClass: "badge badge-danger"
                });

                $('input#thresholdconfig').maxlength({
                    threshold: 20,
                    warningClass: "badge badge-success",
                    limitReachedClass: "badge badge-danger"
                });

                $('input#moreoptions').maxlength({
                    alwaysShow: true,
                    warningClass: "badge badge-success",
                    limitReachedClass: "badge badge-danger"
                });

                $('input#alloptions').maxlength({
                    alwaysShow: true,
                    warningClass: "badge badge-success",
                    limitReachedClass: "badge badge-danger",
                    separator: ' out of ',
                    preText: 'You typed ',
                    postText: ' chars available.',
                    validate: true
                });

                $('textarea#textarea').maxlength({
                    alwaysShow: true,
                    warningClass: "badge badge-success",
                    limitReachedClass: "badge badge-danger"
                });

                $('input#placement').maxlength({
                    alwaysShow: true,
                    placement: 'top-left',
                    warningClass: "badge badge-success",
                    limitReachedClass: "badge badge-danger"
                });
    </script>
    @stack('scripts')
</body>

</html>
