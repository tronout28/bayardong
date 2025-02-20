

<?php $__env->startSection('title', __('accounting::lang.transfer')); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('accounting::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get( 'accounting::lang.transfer' ); ?></h1>
</section>
<section class="content no-print">
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('transfer_from_filter', __( 'lang_v1.transfer_from' ) . ':'); ?>

                        <?php echo Form::select('transfer_from_filter', [], null,
                            ['class' => 'form-control accounts-dropdown', 'style' => 'width:100%', 
                            'id' => 'transfer_from_filter', 'placeholder' => __('lang_v1.all')]); ?>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('transfer_to_filter', __( 'account.transfer_to' ) . ':'); ?>

                        <?php echo Form::select('transfer_to_filter', [], null,
                            ['class' => 'form-control accounts-dropdown', 'style' => 'width:100%', 
                            'id' => 'transfer_to_filter', 'placeholder' => __('lang_v1.all')]); ?>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('transfer_date_range_filter', __('report.date_range') . ':'); ?>

                        <?php echo Form::text('transfer_date_range_filter', null, 
                            ['placeholder' => __('lang_v1.select_a_date_range'), 
                            'class' => 'form-control', 'readonly']); ?>

                    </div>
                </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('accounting.add_transfer')): ?>
                    <?php $__env->slot('tool'); ?>
                        <div class="box-tools">
                            <button type="button" class="btn btn-block btn-primary btn-modal" 
                                data-href="<?php echo e(action([\Modules\Accounting\Http\Controllers\TransferController::class, 'create']), false); ?>" 
                                data-container="#create_transfer_modal" >
                                <i class="fas fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></a>
                        </div>
                    <?php $__env->endSlot(); ?>
                <?php endif; ?>
                <table class="table table-bordered table-striped" id="transfer_table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('messages.action'); ?></th>
                            <th><?php echo app('translator')->get( 'messages.date' ); ?></th>
                            <th><?php echo app('translator')->get('purchase.ref_no'); ?></th>
                            <th><?php echo app('translator')->get('account.from'); ?></th>
                            <th><?php echo app('translator')->get('account.to'); ?></th>
                            <th><?php echo app('translator')->get('sale.amount'); ?></th>
                            <th><?php echo app('translator')->get('lang_v1.added_by'); ?></th>
                            <th><?php echo app('translator')->get('lang_v1.additional_notes'); ?></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
</section>
<div class="modal fade" id="create_transfer_modal" tabindex="-1" role="dialog">
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<?php echo $__env->make('accounting::accounting.common_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script type="text/javascript">
    $(document).ready( function(){
        $(document).on('shown.bs.modal', '#create_transfer_modal', function(){
            $('#operation_date').datetimepicker({
                format: moment_date_format + ' ' + moment_time_format,
                ignoreReadonly: true,
            });
            $('#transfer_form').submit(function(e) {
                e.preventDefault();
            }).validate({
                submitHandler: function(form) {
                    var data = $(form).serialize();

                    $.ajax({
                        method: 'POST',
                        url: $(form).attr('action'),
                        dataType: 'json',
                        data: data,
                        beforeSend: function(xhr) {
                            __disable_submit_button($(form).find('button[type="submit"]'));
                        },
                        success: function(result) {
                            if (result.success == true) {
                                $('div#create_transfer_modal').modal('hide');
                                toastr.success(result.msg);
                                transfer_table.ajax.reload();
                            } else {
                                toastr.error(result.msg);
                            }
                        },
                    });
                },
            })
        });
        
        //Transfer table
        transfer_table = $('#transfer_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?php echo e(action([\Modules\Accounting\Http\Controllers\TransferController::class, 'index']), false); ?>",
                data: function(d) {
                    var start = '';
                    var end = '';
                    if ($('#transfer_date_range_filter').val()) {
                        start = $('input#transfer_date_range_filter')
                            .data('daterangepicker')
                            .startDate.format('YYYY-MM-DD');
                        end = $('input#transfer_date_range_filter')
                            .data('daterangepicker')
                            .endDate.format('YYYY-MM-DD');
                    }
                    d.start_date = start;
                    d.end_date = end;
                    d.transfer_from = $('#transfer_from_filter').val();
                    d.transfer_to = $('#transfer_to_filter').val();
                },
            },
            aaSorting: [[1, 'desc']],
            columns: [
                { data: 'action', name: 'action', orderable: false, searchable: false },
                { data: 'operation_date', name: 'operation_date' },
                { data: 'ref_no', name: 'ref_no' },
                { data: 'from_account_name', name: 'from_account.name' },
                { data: 'to_account_name', name: 'to_account.name' },
                { data: 'amount', name: 'from_transaction.amount' },
                { data: 'added_by', name: 'added_by' },
                { data: 'note', name: 'accounting_acc_trans_mappings.note' }
            ]
        });
        $(document).on('change', '#transfer_from_filter, #transfer_to_filter', function(){
            transfer_table.ajax.reload();
        })
        $('#transfer_date_range_filter').daterangepicker(
            dateRangeSettings,
            function (start, end) {
                $('#transfer_date_range_filter').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
                transfer_table.ajax.reload();
            }
        );
        $('#transfer_date_range_filter').on('cancel.daterangepicker', function(ev, picker) {
            $('#transfer_date_range_filter').val('');
            transfer_table.ajax.reload();
        });

        //Delete Sale
        $(document).on('click', '.delete_transfer_button', function(e) {
            e.preventDefault();
            swal({
                title: LANG.sure,
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then(willDelete => {
                if (willDelete) {
                    var href = $(this).attr('data-href');
                    $.ajax({
                        method: 'DELETE',
                        url: href,
                        dataType: 'json',
                        success: function(result) {
                            if (result.success == true) {
                                toastr.success(result.msg);
                                transfer_table.ajax.reload();
                            } else {
                                toastr.error(result.msg);
                            }
                        },
                    });
                }
            });
        });

	});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/Accounting/Providers/../Resources/views/transfer/index.blade.php ENDPATH**/ ?>