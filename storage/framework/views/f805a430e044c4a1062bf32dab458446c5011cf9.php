<?php $__env->startSection('title', __('lang_v1.payment_accounts')); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"><?php echo app('translator')->get('lang_v1.payment_accounts'); ?>
            <small class="tw-text-sm md:tw-text-base tw-text-gray-700 tw-font-semibold"><?php echo app('translator')->get('account.manage_your_account'); ?></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if(!empty($not_linked_payments)): ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-danger">
                        <ul>
                            <?php if(!empty($not_linked_payments)): ?>
                                <li><?php echo __('account.payments_not_linked_with_account', ['payments' => $not_linked_payments]); ?> <a
                                        href="<?php echo e(action([\App\Http\Controllers\AccountReportsController::class, 'paymentAccountReport']), false); ?>"><?php echo app('translator')->get('account.view_details'); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('account.access')): ?>
            <div class="row">
                <?php $__env->startComponent('components.widget'); ?>
                    <div class="col-sm-12">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#other_accounts" data-toggle="tab">
                                        <i class="fa fa-book"></i> <strong><?php echo app('translator')->get('account.accounts'); ?></strong>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="#account_types" data-toggle="tab">
                                        <i class="fa fa-list"></i> <strong>
                                            <?php echo app('translator')->get('lang_v1.account_types'); ?> </strong>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="other_accounts">
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                            <div class="col-md-4">
                                                <?php echo Form::select(
                                                    'account_status',
                                                    ['active' => __('business.is_active'), 'closed' => __('account.closed')],
                                                    null,
                                                    ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'account_status'],
                                                ); ?>

                                            </div>
                                            <div class="col-md-8">
                                                    <button type="button" class="tw-dw-btn tw-bg-gradient-to-r tw-from-indigo-600 tw-to-blue-500 tw-font-bold tw-text-white tw-border-none tw-rounded-full btn-modal pull-right"
                                                        data-container=".account_model"
                                                        data-href="<?php echo e(action([\App\Http\Controllers\AccountController::class, 'create']), false); ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M12 5l0 14" />
                                                            <path d="M5 12l14 0" />
                                                        </svg> <?php echo app('translator')->get('messages.add'); ?>
                                                    </button>
                                            </div>
                                            
                                        </div>
                                        <div class="col-sm-12">
                                            <br>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped" id="other_account_table">
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo app('translator')->get('lang_v1.name'); ?></th>
                                                            <th><?php echo app('translator')->get('lang_v1.account_type'); ?></th>
                                                            <th><?php echo app('translator')->get('lang_v1.account_sub_type'); ?></th>
                                                            <th><?php echo app('translator')->get('account.account_number'); ?></th>
                                                            <th><?php echo app('translator')->get('brand.note'); ?></th>
                                                            <th><?php echo app('translator')->get('lang_v1.balance'); ?></th>
                                                            <th><?php echo app('translator')->get('lang_v1.account_details'); ?></th>
                                                            <th><?php echo app('translator')->get('lang_v1.added_by'); ?></th>
                                                            <th><?php echo app('translator')->get('messages.action'); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr class="bg-gray font-17 footer-total text-center">
                                                            <td colspan="5"><strong><?php echo app('translator')->get('sale.total'); ?>:</strong></td>
                                                            <td class="footer_total_balance"></td>
                                                            <td colspan="3"></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tab-pane" id="account_types">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="button" class="tw-dw-btn tw-bg-gradient-to-r tw-from-indigo-600 tw-to-blue-500 tw-font-bold tw-text-white tw-border-none tw-rounded-full btn-modal pull-right"
                                                data-href="<?php echo e(action([\App\Http\Controllers\AccountTypeController::class, 'create']), false); ?>"
                                                data-container="#account_type_modal">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
													stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
													class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
													<path stroke="none" d="M0 0h24v24H0z" fill="none" />
													<path d="M12 5l0 14" />
													<path d="M5 12l14 0" />
												</svg> <?php echo app('translator')->get('messages.add'); ?>
											</button>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered" id="account_types_table"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo app('translator')->get('lang_v1.name'); ?></th>
                                                        <th><?php echo app('translator')->get('messages.action'); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $account_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr class="account_type_<?php echo e($account_type->id, false); ?>">
                                                            <th><?php echo e($account_type->name, false); ?></th>
                                                            <td>

                                                                <?php echo Form::open([
                                                                    'url' => action([\App\Http\Controllers\AccountTypeController::class, 'destroy'], $account_type->id),
                                                                    'method' => 'delete',
                                                                ]); ?>

                                                                <button type="button" class="tw-dw-btn tw-dw-btn-primary tw-dw-btn-outline tw-dw-btn-xs btn-modal"
                                                                    data-href="<?php echo e(action([\App\Http\Controllers\AccountTypeController::class, 'edit'], $account_type->id), false); ?>"
                                                                    data-container="#account_type_modal">
                                                                    <i class="fa fa-edit"></i> <?php echo app('translator')->get('messages.edit'); ?></button>

                                                                <button type="button"
                                                                    class="tw-dw-btn tw-dw-btn-xs tw-dw-btn-outline  tw-dw-btn-error delete_account_type">
                                                                    <i class="fa fa-trash"></i> <?php echo app('translator')->get('messages.delete'); ?></button>
                                                                <?php echo Form::close(); ?>

                                                            </td>
                                                        </tr>
                                                        <?php $__currentLoopData = $account_type->sub_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td>&nbsp;&nbsp;-- <?php echo e($sub_type->name, false); ?></td>
                                                                <td>


                                                                    <?php echo Form::open([
                                                                        'url' => action([\App\Http\Controllers\AccountTypeController::class, 'destroy'], $sub_type->id),
                                                                        'method' => 'delete',
                                                                    ]); ?>

                                                                    <button type="button" class="tw-dw-btn tw-dw-btn-xs tw-dw-btn-outline  tw-dw-btn-primary btn-modal"
                                                                        data-href="<?php echo e(action([\App\Http\Controllers\AccountTypeController::class, 'edit'], $sub_type->id), false); ?>"
                                                                        data-container="#account_type_modal">
                                                                        <i class="fa fa-edit"></i> <?php echo app('translator')->get('messages.edit'); ?></button>
                                                                    <button type="button"
                                                                        class="tw-dw-btn tw-dw-btn-xs tw-dw-btn-outline  tw-dw-btn-error delete_account_type">
                                                                        <i class="fa fa-trash"></i> <?php echo app('translator')->get('messages.delete'); ?></button>
                                                                    <?php echo Form::close(); ?>

                                                                </td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php echo $__env->renderComponent(); ?>
            </div>
        <?php endif; ?>

        <div class="modal fade account_model" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel"
            id="account_type_modal">
        </div>
    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script>
        $(document).ready(function() {

            $(document).on('click', 'button.close_account', function() {
                swal({
                    title: LANG.sure,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var url = $(this).data('url');

                        $.ajax({
                            method: "get",
                            url: url,
                            dataType: "json",
                            success: function(result) {
                                if (result.success == true) {
                                    toastr.success(result.msg);
                                    capital_account_table.ajax.reload();
                                    other_account_table.ajax.reload();
                                } else {
                                    toastr.error(result.msg);
                                }

                            }
                        });
                    }
                });
            });

            $(document).on('submit', 'form#edit_payment_account_form', function(e) {
                e.preventDefault();
                var data = $(this).serialize();
                $.ajax({
                    method: "POST",
                    url: $(this).attr("action"),
                    dataType: "json",
                    data: data,
                    success: function(result) {
                        if (result.success == true) {
                            $('div.account_model').modal('hide');
                            toastr.success(result.msg);
                            capital_account_table.ajax.reload();
                            other_account_table.ajax.reload();
                        } else {
                            toastr.error(result.msg);
                        }
                    }
                });
            });

            $(document).on('submit', 'form#payment_account_form', function(e) {
                e.preventDefault();
                var data = $(this).serialize();
                $.ajax({
                    method: "post",
                    url: $(this).attr("action"),
                    dataType: "json",
                    data: data,
                    success: function(result) {
                        if (result.success == true) {
                            $('div.account_model').modal('hide');
                            toastr.success(result.msg);
                            capital_account_table.ajax.reload();
                            other_account_table.ajax.reload();
                        } else {
                            toastr.error(result.msg);
                        }
                    }
                });
            });

            // capital_account_table
            capital_account_table = $('#capital_account_table').DataTable({
                processing: true,
                serverSide: true,
				fixedHeader:false,
                ajax: '/account/account?account_type=capital',
                columnDefs: [{
                    "targets": 5,
                    "orderable": false,
                    "searchable": false
                }],
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'account_number',
                        name: 'account_number'
                    },
                    {
                        data: 'note',
                        name: 'note'
                    },
                    {
                        data: 'balance',
                        name: 'balance',
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ],
                "fnDrawCallback": function(oSettings) {
                    __currency_convert_recursively($('#capital_account_table'));
                }
            });
            // capital_account_table
            other_account_table = $('#other_account_table').DataTable({
                processing: true,
                serverSide: true,
				fixedHeader:false,
                ajax: {
                    url: '/account/account?account_type=other',
                    data: function(d) {
                        d.account_status = $('#account_status').val();
                    }
                },
                columnDefs: [{
                    "targets": [6, 8],
                    "orderable": false,
                    "searchable": false
                }],
                columns: [{
                        data: 'name',
                        name: 'accounts.name'
                    },
                    {
                        data: 'parent_account_type_name',
                        name: 'pat.name'
                    },
                    {
                        data: 'account_type_name',
                        name: 'ats.name'
                    },
                    {
                        data: 'account_number',
                        name: 'accounts.account_number'
                    },
                    {
                        data: 'note',
                        name: 'accounts.note'
                    },
                    {
                        data: 'balance',
                        name: 'balance',
                        searchable: false
                    },
                    {
                        data: 'account_details',
                        name: 'account_details'
                    },
                    {
                        data: 'added_by',
                        name: 'u.first_name'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ],
                "fnDrawCallback": function(oSettings) {
                    __currency_convert_recursively($('#other_account_table'));
                },
                "footerCallback": function(row, data, start, end, display) {
                    var footer_total_balance = 0;
                    for (var r in data) {
                        footer_total_balance += $(data[r].balance).data('orig-value') ? parseFloat($(
                            data[r].balance).data('orig-value')) : 0;
                    }

                    $('.footer_total_balance').html(__currency_trans_from_en(footer_total_balance));
                }
            });

        });

        $('#account_status').change(function() {
            other_account_table.ajax.reload();
        });

        $(document).on('submit', 'form#deposit_form', function(e) {
            e.preventDefault();
            var data = $(this).serialize();

            $.ajax({
                method: "POST",
                url: $(this).attr("action"),
                dataType: "json",
                data: data,
                success: function(result) {
                    if (result.success == true) {
                        $('div.view_modal').modal('hide');
                        toastr.success(result.msg);
                        capital_account_table.ajax.reload();
                        other_account_table.ajax.reload();
                    } else {
                        toastr.error(result.msg);
                    }
                }
            });
        });

        $('.account_model').on('shown.bs.modal', function(e) {
            $('.account_model .select2').select2({
                dropdownParent: $(this)
            })
        });

        $(document).on('click', 'button.delete_account_type', function() {
            swal({
                title: LANG.sure,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $(this).closest('form').submit();
                }
            });
        })

        $(document).on('click', 'button.activate_account', function() {
            swal({
                title: LANG.sure,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willActivate) => {
                if (willActivate) {
                    var url = $(this).data('url');
                    $.ajax({
                        method: "get",
                        url: url,
                        dataType: "json",
                        success: function(result) {
                            if (result.success == true) {
                                toastr.success(result.msg);
                                capital_account_table.ajax.reload();
                                other_account_table.ajax.reload();
                            } else {
                                toastr.error(result.msg);
                            }

                        }
                    });
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/account/index.blade.php ENDPATH**/ ?>