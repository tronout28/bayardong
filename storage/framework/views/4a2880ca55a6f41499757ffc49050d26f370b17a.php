<?php $__env->startSection('title', __('report.register_report')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"><?php echo e(__('report.register_report'), false); ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
              <?php echo Form::open(['url' => action([\App\Http\Controllers\ReportController::class, 'getStockReport']), 'method' => 'get', 'id' => 'register_report_filter_form' ]); ?>

                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('register_user_id',  __('report.user') . ':'); ?>

                        <?php echo Form::select('register_user_id', $users, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('report.all_users')]); ?>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('register_status',  __('sale.status') . ':'); ?>

                        <?php echo Form::select('register_status', ['open' => __('cash_register.open'), 'close' => __('cash_register.close')], null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('report.all')]); ?>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('register_report_date_range', __('report.date_range') . ':'); ?>

                        <?php echo Form::text('register_report_date_range', null , ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'id' => 'register_report_date_range', 'readonly']); ?>

                    </div>
                </div>
                <?php echo Form::close(); ?>

            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
                <table class="table table-bordered table-striped" id="register_report_table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('report.open_time'); ?></th>
                            <th><?php echo app('translator')->get('report.close_time'); ?></th>
                            <th><?php echo app('translator')->get('sale.location'); ?></th>
                            <th><?php echo app('translator')->get('report.user'); ?></th>
                            <th><?php echo app('translator')->get('cash_register.total_card_slips'); ?></th>
                            <th><?php echo app('translator')->get('cash_register.total_cheques'); ?></th>
                            <th><?php echo app('translator')->get('cash_register.total_cash'); ?></th>
                            <th><?php echo app('translator')->get('lang_v1.total_bank_transfer'); ?></th>
                            <th><?php echo app('translator')->get('lang_v1.total_advance_payment'); ?></th>
                            <th><?php echo e($payment_types['custom_pay_1'], false); ?></th>
                            <th><?php echo e($payment_types['custom_pay_2'], false); ?></th>
                            <th><?php echo e($payment_types['custom_pay_3'], false); ?></th>
                            <th><?php echo e($payment_types['custom_pay_4'], false); ?></th>
                            <th><?php echo e($payment_types['custom_pay_5'], false); ?></th>
                            <th><?php echo e($payment_types['custom_pay_6'], false); ?></th>
                            <th><?php echo e($payment_types['custom_pay_7'], false); ?></th>
                            <th><?php echo app('translator')->get('cash_register.other_payments'); ?></th>
                            <th><?php echo app('translator')->get('sale.total'); ?></th>
                            <th><?php echo app('translator')->get('messages.action'); ?></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="bg-gray font-17 text-center footer-total">
                            <td colspan="4"><strong><?php echo app('translator')->get('sale.total'); ?>:</strong></td>
                            <td class="footer_total_card_payment"></td>
                            <td class="footer_total_cheque_payment"></td>
                            <td class="footer_total_cash_payment"></td>
                            <td class="footer_total_bank_transfer_payment"></td>
                            <td class="footer_total_advance_payment"></td>'
                            <td class="footer_total_custom_pay_1"></td>
                            <td class="footer_total_custom_pay_2"></td>
                            <td class="footer_total_custom_pay_3"></td>
                            <td class="footer_total_custom_pay_4"></td>
                            <td class="footer_total_custom_pay_5"></td>
                            <td class="footer_total_custom_pay_6"></td>
                            <td class="footer_total_custom_pay_7"></td>
                            <td class="footer_total_other_payments"></td>
                            <td class="footer_total"></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
</section>
<!-- /.content -->
<div class="modal fade view_register" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/report.js?v=' . $asset_v), false); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/report/register_report.blade.php ENDPATH**/ ?>