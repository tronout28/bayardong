<?php $__env->startSection('title', __('expense.expenses')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"><?php echo app('translator')->get('expense.expenses'); ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
                <?php if(auth()->user()->can('all_expense.access')): ?>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('location_id',  __('purchase.business_location') . ':'); ?>

                            <?php echo Form::select('location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%']); ?>

                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <?php echo Form::label('expense_for', __('expense.expense_for').':'); ?>

                            <?php echo Form::select('expense_for', $users, null, ['class' => 'form-control select2', 'style' => 'width:100%']); ?>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('expense_contact_filter',  __('contact.contact') . ':'); ?>

                            <?php echo Form::select('expense_contact_filter', $contacts, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('expense_category_id',__('expense.expense_category').':'); ?>

                        <?php echo Form::select('expense_category_id', $categories, null, ['placeholder' =>
                        __('report.all'), 'class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'expense_category_id']); ?>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('expense_sub_category_id_filter',__('product.sub_category').':'); ?>

                        <?php echo Form::select('expense_sub_category_id_filter', $sub_categories, null, ['placeholder' =>
                        __('report.all'), 'class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'expense_sub_category_id_filter']); ?>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('expense_date_range', __('report.date_range') . ':'); ?>

                        <?php echo Form::text('date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'id' => 'expense_date_range', 'readonly']); ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('expense_payment_status',  __('purchase.payment_status') . ':'); ?>

                        <?php echo Form::select('expense_payment_status', ['paid' => __('lang_v1.paid'), 'due' => __('lang_v1.due'), 'partial' => __('lang_v1.partial')], null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

                    </div>
                </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __('expense.all_expenses')]); ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('expense.add')): ?>
                    <?php $__env->slot('tool'); ?>
                        <div class="box-tools">
                            
                            <a class="tw-dw-btn tw-bg-gradient-to-r tw-from-indigo-600 tw-to-blue-500 tw-font-bold tw-text-white tw-border-none tw-rounded-full pull-right"
                                href="<?php echo e(action([\App\Http\Controllers\ExpenseController::class, 'create']), false); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg> <?php echo app('translator')->get('messages.add'); ?>
                            </a>
                        </div>
                    <?php $__env->endSlot(); ?>
                <?php endif; ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="expense_table">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('messages.action'); ?></th>
                                <th><?php echo app('translator')->get('messages.date'); ?></th>
                                <th><?php echo app('translator')->get('purchase.ref_no'); ?></th>
                                <th><?php echo app('translator')->get('lang_v1.recur_details'); ?></th>
                                <th><?php echo app('translator')->get('expense.expense_category'); ?></th>
                                <th><?php echo app('translator')->get('product.sub_category'); ?></th>
                                <th><?php echo app('translator')->get('business.location'); ?></th>
                                <th><?php echo app('translator')->get('sale.payment_status'); ?></th>
                                <th><?php echo app('translator')->get('product.tax'); ?></th>
                                <th><?php echo app('translator')->get('sale.total_amount'); ?></th>
                                <th><?php echo app('translator')->get('purchase.payment_due'); ?>
                                <th><?php echo app('translator')->get('expense.expense_for'); ?></th>
                                <th><?php echo app('translator')->get('contact.contact'); ?></th>
                                <th><?php echo app('translator')->get('expense.expense_note'); ?></th>
                                <th><?php echo app('translator')->get('lang_v1.added_by'); ?></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-gray font-17 text-center footer-total">
                                <td colspan="7"><strong><?php echo app('translator')->get('sale.total'); ?>:</strong></td>
                                <td class="footer_payment_status_count"></td>
                                <td></td>
                                <td class="footer_expense_total"></td>
                                <td class="footer_total_due"></td>
                                <td colspan="4"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>

</section>
<!-- /.content -->
<!-- /.content -->
<div class="modal fade payment_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>

<div class="modal fade edit_payment_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
 <script src="<?php echo e(asset('js/payment.js?v=' . $asset_v), false); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/expense/index.blade.php ENDPATH**/ ?>