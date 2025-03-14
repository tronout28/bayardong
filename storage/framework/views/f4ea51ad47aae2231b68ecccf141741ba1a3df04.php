
<?php $__env->startSection('title', __('essentials::lang.attendance')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('essentials::layouts.nav_hrm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="content-header">
    <h1><?php echo app('translator')->get('essentials::lang.attendance'); ?>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <?php if(session('notification') || !empty($notification)): ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php if(!empty($notification['msg'])): ?>
                        <?php echo e($notification['msg'], false); ?>

                    <?php elseif(session('notification.msg')): ?>
                        <?php echo e(session('notification.msg'), false); ?>

                    <?php endif; ?>
                </div>
            </div>  
        </div>     
    <?php endif; ?>
    <?php if($is_employee_allowed): ?>
        <div class="row">
            <div class="col-md-12 text-center">
                <button 
                    type="button" 
                    class="btn btn-app bg-blue clock_in_btn
                        <?php if(!empty($clock_in)): ?>
                            hide
                        <?php endif; ?>
                    "
                    data-type="clock_in"
                    >
                    <i class="fas fa-arrow-circle-down"></i> <?php echo app('translator')->get('essentials::lang.clock_in'); ?>
                </button>
            &nbsp;&nbsp;&nbsp;
                <button 
                    type="button" 
                    class="btn btn-app bg-yellow clock_out_btn
                        <?php if(empty($clock_in)): ?>
                            hide
                        <?php endif; ?>
                    "  
                    data-type="clock_out"
                    >
                    <i class="fas fa-hourglass-half fa-spin"></i> <?php echo app('translator')->get('essentials::lang.clock_out'); ?>
                </button>
                <?php if(!empty($clock_in)): ?>
                    <br>
                    <small class="text-muted"><?php echo app('translator')->get('essentials::lang.clocked_in_at'); ?>: <?php echo e(\Carbon::createFromTimestamp(strtotime($clock_in->clock_in_time))->format(session('business.date_format') . ' ' . 'H:i'), false); ?></small>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('essentials.crud_all_attendance')): ?>
                        <li class="active">
                            <a href="#shifts_tab" data-toggle="tab" aria-expanded="true">
                                <i class="fas fa-user-clock" aria-hidden="true"></i>
                                <?php echo app('translator')->get('essentials::lang.shifts'); ?>
                                <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('essentials::lang.shift_datatable_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                            </a>
                        </li>
                    <?php endif; ?>
                    <li <?php if(!auth()->user()->can('essentials.crud_all_attendance')): ?> class="active" <?php endif; ?>>
                        <a href="#attendance_tab" data-toggle="tab" aria-expanded="true"><i class="fas fa-check-square" aria-hidden="true"></i> <?php echo app('translator')->get( 'essentials::lang.all_attendance' ); ?></a>
                    </li>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('essentials.crud_all_attendance')): ?>
                    <li>
                        <a href="#attendance_by_shift_tab" data-toggle="tab" aria-expanded="true"><i class="fas fa-user-check" aria-hidden="true"></i> <?php echo app('translator')->get('essentials::lang.attendance_by_shift'); ?></a>
                    </li>
                    <li>
                        <a href="#attendance_by_date_tab" data-toggle="tab" aria-expanded="true"><i class="fas fa-calendar" aria-hidden="true"></i> <?php echo app('translator')->get('essentials::lang.attendance_by_date'); ?></a>
                    </li>
                    <li>
                        <a href="#import_attendance_tab" data-toggle="tab" aria-expanded="true"><i class="fas fa-download" aria-hidden="true"></i> <?php echo app('translator')->get('essentials::lang.import_attendance'); ?></a>
                    </li>
                    <?php endif; ?>
                </ul>
                <div class="tab-content">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('essentials.crud_all_attendance')): ?>
                        <div class="tab-pane active" id="shifts_tab">
                            <button type="button" class="btn btn-primary pull-right"  data-toggle="modal" data-target="#shift_modal"> <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></button>
                            <br>
                            <br>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="shift_table">
                                    <thead>
                                        <tr>
                                            <th><?php echo app('translator')->get( 'lang_v1.name' ); ?></th>
                                            <th><?php echo app('translator')->get( 'essentials::lang.shift_type' ); ?></th>
                                            <th><?php echo app('translator')->get( 'restaurant.start_time' ); ?></th>
                                            <th><?php echo app('translator')->get( 'restaurant.end_time' ); ?></th>
                                            <th><?php echo app('translator')->get( 'essentials::lang.holiday' ); ?></th>
                                            <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="tab-pane <?php if(!auth()->user()->can('essentials.crud_all_attendance')): ?> active <?php endif; ?>" id="attendance_tab">
                        <div class="row">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('essentials.crud_all_attendance')): ?>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo Form::label('employee_id', __('essentials::lang.employee') . ':'); ?>

                                        <?php echo Form::select('employee_id', $employees, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo Form::label('date_range', __('report.date_range') . ':'); ?>

                                    <?php echo Form::text('date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'readonly']); ?>

                                </div>
                            </div>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('essentials.crud_all_attendance')): ?>
                            <div class="col-md-6 spacer">
                                <button type="button" class="btn btn-primary btn-modal pull-right" data-href="<?php echo e(action([\Modules\Essentials\Http\Controllers\AttendanceController::class, 'create']), false); ?>" data-container="#attendance_modal">
                                    <i class="fa fa-plus"></i>
                                    <?php echo app('translator')->get( 'essentials::lang.add_latest_attendance' ); ?>
                                </button>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div id="user_attendance_summary" class="hide">
                            <h3>
                                <strong><?php echo app('translator')->get('essentials::lang.total_work_hours'); ?>:</strong>
                                <span id="total_work_hours"></span>
                            </h3>
                        </div>
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="attendance_table" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get( 'lang_v1.date' ); ?></th>
                                        <th><?php echo app('translator')->get('essentials::lang.employee'); ?></th>
                                        <th><?php echo app('translator')->get('essentials::lang.clock_in'); ?></th>
                                        <th><?php echo app('translator')->get('essentials::lang.clock_out'); ?></th>
                                        <th><?php echo app('translator')->get('essentials::lang.work_duration'); ?></th>
                                        <th><?php echo app('translator')->get('essentials::lang.ip_address'); ?></th>
                                        <th><?php echo app('translator')->get('essentials::lang.shift'); ?></th>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('essentials.crud_all_attendance')): ?>
                                            <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    
                    <div class="tab-pane" id="attendance_by_shift_tab">
                        <?php echo $__env->make('essentials::attendance.attendance_by_shift', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="tab-pane" id="attendance_by_date_tab">
                        <?php echo $__env->make('essentials::attendance.attendance_by_date', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('essentials.crud_all_attendance')): ?>
                        <div class="tab-pane" id="import_attendance_tab">
                            <?php echo $__env->make('essentials::attendance.import_attendance', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
</section>
<!-- /.content -->
<div class="modal fade" id="attendance_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel"></div>
<div class="modal fade" id="edit_attendance_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel"></div>
<div class="modal fade" id="user_shift_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel"></div>
<div class="modal fade" id="edit_shift_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel"></div>
<div class="modal fade" id="shift_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    <?php echo $__env->make('essentials::attendance.shift_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            attendance_table = $('#attendance_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "<?php echo e(action([\Modules\Essentials\Http\Controllers\AttendanceController::class, 'index']), false); ?>",
                    "data" : function(d) {
                        if ($('#employee_id').length) {
                            d.employee_id = $('#employee_id').val();
                        }
                        if($('#date_range').val()) {
                            var start = $('#date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
                            var end = $('#date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');
                            d.start_date = start;
                            d.end_date = end;
                        }
                    }
                },
                columns: [
                    { data: 'date', name: 'clock_in_time' },
                    { data: 'user', name: 'user' },
                    { data: 'clock_in', name: 'clock_in', orderable: false, searchable: false},
                    { data: 'clock_out', name: 'clock_out', orderable: false, searchable: false},
                    { data: 'work_duration', name: 'work_duration', orderable: false, searchable: false},
                    { data: 'ip_address', name: 'ip_address'},
                    { data: 'shift_name', name: 'es.name'},
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('essentials.crud_all_attendance')): ?>
                        { data: 'action', name: 'action', orderable: false, searchable: false},
                    <?php endif; ?>
                ],
            });

            $('#date_range').daterangepicker(
                dateRangeSettings,
                function (start, end) {
                    $('#date_range').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
                }
            );
            $('#date_range').on('cancel.daterangepicker', function(ev, picker) {
                $('#date_range').val('');
                attendance_table.ajax.reload();
            });

            $(document).on('change', '#employee_id, #date_range', function() {
                attendance_table.ajax.reload();
            });

            $(document).on('submit', 'form#attendance_form', function(e) {
                e.preventDefault();
                if($(this).valid()) {
                    $(this).find('button[type="submit"]').attr('disabled', true);
                    var data = $(this).serialize();
                    $.ajax({
                        method: $(this).attr('method'),
                        url: $(this).attr('action'),
                        dataType: 'json',
                        data: data,
                        success: function(result) {
                            if (result.success == true) {
                                $('div#attendance_modal').modal('hide');
                                $('div#edit_attendance_modal').modal('hide');
                                toastr.success(result.msg);
                                attendance_table.ajax.reload();
                            } else {
                                toastr.error(result.msg);
                            }
                        },
                    });
                }
            });

            $(document).on( 'change', '#employee_id, #date_range', function() {
                get_attendance_summary();
            });

            <?php if(!auth()->user()->can('essentials.crud_all_attendance')): ?>
                get_attendance_summary();
            <?php endif; ?>

            shift_table = $('#shift_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "<?php echo e(action([\Modules\Essentials\Http\Controllers\ShiftController::class, 'index']), false); ?>",
                },
                columnDefs: [
                    {
                        targets: 4,
                        orderable: false,
                        searchable: false,
                    },
                ],
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'type', name: 'type' },
                    { data: 'start_time', name: 'start_time'},
                    { data: 'end_time', name: 'end_time' },
                    { data: 'holidays', name: 'holidays'},
                    { data: 'action', name: 'action' },
                ],
            });

            $('#shift_modal, #edit_shift_modal').on('shown.bs.modal', function(e) {
                $('form#add_shift_form').validate();
                $('#shift_modal #start_time, #shift_modal #end_time, #edit_shift_modal #start_time, #edit_shift_modal #end_time').datetimepicker({
                    format: moment_time_format,
                    ignoreReadonly: true,
                });
                $('#shift_modal .select2, #edit_shift_modal .select2').select2();

                if ($('select#shift_type').val() == 'fixed_shift') {
                    $('div.time_div').show();
                } else if ($('select#shift_type').val() == 'flexible_shift') {
                    $('div.time_div').hide();
                }

                $('select#shift_type').change(function() {
                    var shift_type = $(this).val();
                    if (shift_type == 'fixed_shift') {
                        $('div.time_div').fadeIn();
                    } else if (shift_type == 'flexible_shift') {
                        $('div.time_div').fadeOut();
                    }
                });

                //toggle auto clockout
                if($('#is_allowed_auto_clockout').is(':checked')) {
                    $("div.enable_auto_clock_out_time").show();
                } else {
                    $("div.enable_auto_clock_out_time").hide(); 
                }

                $('#is_allowed_auto_clockout').on('change', function(){
                    if ($(this).is(':checked')) {
                        $("div.enable_auto_clock_out_time").show();
                    } else {
                       $("div.enable_auto_clock_out_time").hide(); 
                    }
                });
                
                $('#shift_modal #auto_clockout_time, #edit_shift_modal #auto_clockout_time').datetimepicker({
                    format: moment_time_format,
                    stepping: 30,
                    ignoreReadonly: true,
                });
            });
            $('#shift_modal, #edit_shift_modal').on('hidden.bs.modal', function(e) {
                $('#shift_modal #start_time').data("DateTimePicker").destroy();
                $('#shift_modal #end_time').data("DateTimePicker").destroy();
                $('#add_shift_form')[0].reset();
                $('#add_shift_form').find('button[type="submit"]').attr('disabled', false);

                $('#is_allowed_auto_clockout').attr('checked', false);
                $('#auto_clockout_time').data("DateTimePicker").destroy();
                $("div.enable_auto_clock_out_time").hide(); 
            });
            $('#user_shift_modal').on('shown.bs.modal', function(e) {
                $('#user_shift_modal').find('.date_picker').each( function(){
                    $(this).datetimepicker({
                        format: moment_date_format,
                        ignoreReadonly: true,
                    });
                });
            });

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('essentials.crud_all_attendance')): ?>
                get_attendance_by_shift();
                $('#attendance_by_shift_date_filter').datetimepicker({
                    format: moment_date_format,
                    ignoreReadonly: true,
                });
                var attendanceDateRangeSettings = dateRangeSettings;
                attendanceDateRangeSettings.startDate = moment().subtract(6, 'days');
                attendanceDateRangeSettings.endDate = moment();
                $('#attendance_by_date_filter').daterangepicker(
                    dateRangeSettings,
                    function (start, end) {
                        $('#attendance_by_date_filter').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
                    }
                );
                get_attendance_by_date();
                $(document).on('change', '#attendance_by_date_filter', function(){
                    get_attendance_by_date();
                });
            <?php endif; ?>

            $('a[href="#attendance_tab"]').click(function(){
                attendance_table.ajax.reload();
            });
            $('a[href="#attendance_by_shift_tab"]').click(function(){
                get_attendance_by_shift();
            });
            $('a[href="#attendance_by_date_tab"]').click(function(){
                get_attendance_by_date();
            });
        });

        $(document).on('click', 'button.delete-attendance', function() {
            swal({
                title: LANG.sure,
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then(willDelete => {
                if (willDelete) {
                    var href = $(this).data('href');
                    var data = $(this).serialize();
                    $.ajax({
                        method: 'DELETE',
                        url: href,
                        dataType: 'json',
                        data: data,
                        success: function(result) {
                            if (result.success == true) {
                                toastr.success(result.msg);
                                attendance_table.ajax.reload();
                            } else {
                                toastr.error(result.msg);
                            }
                        },
                    });
                }
            });
        });
        $('#edit_attendance_modal').on('hidden.bs.modal', function(e) {
            $('#edit_attendance_modal #clock_in_time').data("DateTimePicker").destroy();
            $('#edit_attendance_modal #clock_out_time').data("DateTimePicker").destroy();
        });

        $('#attendance_modal').on('shown.bs.modal', function(e) {
            $('#attendance_modal .select2').select2();
        });
        $('#edit_attendance_modal').on('shown.bs.modal', function(e) {
            $('#edit_attendance_modal .select2').select2();
            $('#edit_attendance_modal #clock_in_time, #edit_attendance_modal #clock_out_time').datetimepicker({
                format: moment_date_format + ' ' + moment_time_format,
                ignoreReadonly: true,
            });

            validate_clockin_clock_out = {
                url: '/hrm/validate-clock-in-clock-out',
                type: 'post',
                data: {
                    user_ids: function() {
                        return $('#employees').val();
                    },
                    clock_in_time: function() {
                        return $('#clock_in_time').val();
                    },
                    clock_out_time: function() {
                        return $('#clock_out_time').val();
                    },
                    attendance_id: function() {
                        if($('form#attendance_form #attendance_id').length) {
                           return $('form#attendance_form #attendance_id').val();
                        } else {
                            return '';
                        }
                    },
                },
            };

            $('form#attendance_form').validate({
                rules: {
                    clock_in_time: {
                        remote: validate_clockin_clock_out,
                    },
                    clock_out_time: {
                        remote: validate_clockin_clock_out,
                    },
                },
                messages: {
                    clock_in_time: {
                        remote: "<?php echo e(__('essentials::lang.clock_in_clock_out_validation_msg'), false); ?>",
                    },
                    clock_out_time: {
                        remote: "<?php echo e(__('essentials::lang.clock_in_clock_out_validation_msg'), false); ?>",
                    },
                },
            });
        });

        function get_attendance_summary() {
            $('#user_attendance_summary').addClass('hide');
            var user_id = $('#employee_id').length ? $('#employee_id').val() : '';
            
            var start = $('#date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
            var end = $('#date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');
            $.ajax({
                url: '<?php echo e(action([\Modules\Essentials\Http\Controllers\AttendanceController::class, 'getUserAttendanceSummary']), false); ?>?user_id=' + user_id + '&start_date=' + start + '&end_date=' + end ,
                dataType: 'html',
                success: function(response) {
                    $('#total_work_hours').html(response);
                    $('#user_attendance_summary').removeClass('hide');
                },
            });
        }

    //Set mindate for clockout time greater than clockin time
    $('#attendance_modal').on('dp.change', '#clock_in_time', function(){
        if ($('#clock_out_time').data("DateTimePicker")) {
            $('#clock_out_time').data("DateTimePicker").options({minDate: $(this).data("DateTimePicker").date()});
            $('#clock_out_time').data("DateTimePicker").clear();
        }
    });

    $(document).on('submit', 'form#add_shift_form', function(e) {
        e.preventDefault();
        $(this).find('button[type="submit"]').attr('disabled', true);
        var data = $(this).serialize();

        $.ajax({
            method: $(this).attr('method'),
            url: $(this).attr('action'),
            dataType: 'json',
            data: data,
            success: function(result) {
                if (result.success == true) {
                    if ($('div#edit_shift_modal').hasClass('in')) {
                        $('div#edit_shift_modal').modal("hide");
                    } else if ($('div#shift_modal').hasClass('in')) {
                        $('div#shift_modal').modal('hide');    
                    }
                    toastr.success(result.msg);
                    shift_table.ajax.reload();
                } else {
                    toastr.error(result.msg);
                }
            },
        });
    });

    $(document).on('submit', 'form#add_user_shift_form', function(e) {
        e.preventDefault();
        $(this).find('button[type="submit"]').attr('disabled', true);
        var data = $(this).serialize();

        $.ajax({
            method: $(this).attr('method'),
            url: $(this).attr('action'),
            dataType: 'json',
            data: data,
            success: function(result) {
                if (result.success == true) {
                    $('div#user_shift_modal').modal('hide');
                    toastr.success(result.msg);
                } else {
                    toastr.error(result.msg);
                }
                $('form#add_user_shift_form').find('button[type="submit"]').attr('disabled', false);
            },
        });
    });

    function get_attendance_by_shift() {
        data = {date: $('#attendance_by_shift_date_filter').val()};
        $.ajax({
            url: "<?php echo e(action([\Modules\Essentials\Http\Controllers\AttendanceController::class, 'getAttendanceByShift']), false); ?>",
            data: data,
            dataType: 'html',
            success: function(result) {
                $('table#attendance_by_shift_table tbody').html(result);
            },
        });
    }
    function get_attendance_by_date() {
        data = {
                start_date: $('#attendance_by_date_filter').data('daterangepicker').startDate.format('YYYY-MM-DD'),
                end_date: $('#attendance_by_date_filter').data('daterangepicker').endDate.format('YYYY-MM-DD')
            };
        $.ajax({
            url: "<?php echo e(action([\Modules\Essentials\Http\Controllers\AttendanceController::class, 'getAttendanceByDate']), false); ?>",
            data: data,
            dataType: 'html',
            success: function(result) {
                $('table#attendance_by_date_table tbody').html(result);
            },
        });
    }
    $(document).on('dp.change', '#attendance_by_shift_date_filter', function(){
        get_attendance_by_shift();
    });
    $(document).on('change', '#select_employee', function(e) {
        var user_id = $(this).val();
        var count = 0;
        $('table#employee_attendance_table tbody').find('tr').each( function(){
            if ($(this).data('user_id') == user_id) {
                count++;
            }
        });
        
        if (user_id && count == 0) {
            $.ajax({
                url: "/hrm/get-attendance-row/" + user_id,
                dataType: 'html',
                success: function(result) {
                    $('table#employee_attendance_table tbody').append(result);
                    var tr = $('table#employee_attendance_table tbody tr:last');

                    tr.find('.date_time_picker').each( function(){
                        $(this).datetimepicker({
                            format: moment_date_format + ' ' + moment_time_format,
                            ignoreReadonly: true,
                            maxDate: moment(),
                            widgetPositioning: {
                                horizontal: 'auto',
                                vertical: 'bottom'
                             }
                        });
                        $(this).val('');
                    });
                    $('#select_employee').val('').change();
                },
            });
        }
    });
    $(document).on('click', 'button.remove_attendance_row', function(e) {
        $(this).closest('tr').remove();
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/Essentials/Providers/../Resources/views/attendance/index.blade.php ENDPATH**/ ?>