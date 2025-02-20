<?php $__env->startSection('title', __('stock_adjustment.stock_adjustments')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"><?php echo app('translator')->get('stock_adjustment.stock_adjustments'); ?>
        <small></small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __('stock_adjustment.all_stock_adjustments')]); ?>
        <?php $__env->slot('tool'); ?>
            <div class="box-tools">
                <?php if(auth()->user()->can('purchase.create')): ?>
                    <a class="tw-dw-btn tw-bg-gradient-to-r tw-from-indigo-600 tw-to-blue-500 tw-font-bold tw-text-white tw-border-none tw-rounded-full pull-right"
                        href="<?php echo e(action([\App\Http\Controllers\StockAdjustmentController::class, 'create']), false); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg> <?php echo app('translator')->get('messages.add'); ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php $__env->endSlot(); ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped ajax_view" id="stock_adjustment_table">
                <thead>
                    <tr>
                        <th><?php echo app('translator')->get('messages.action'); ?></th>
                        <th><?php echo app('translator')->get('messages.date'); ?></th>
                        <th><?php echo app('translator')->get('purchase.ref_no'); ?></th>
                        <th><?php echo app('translator')->get('business.location'); ?></th>
                        <th><?php echo app('translator')->get('stock_adjustment.adjustment_type'); ?></th>
                        <th><?php echo app('translator')->get('stock_adjustment.total_amount'); ?></th>
                        <th><?php echo app('translator')->get('stock_adjustment.total_amount_recovered'); ?></th>
                        <th><?php echo app('translator')->get('stock_adjustment.reason_for_stock_adjustment'); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.added_by'); ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    <?php echo $__env->renderComponent(); ?>

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
	<script src="<?php echo e(asset('js/stock_adjustment.js?v=' . $asset_v), false); ?>"></script>
<?php $__env->stopSection(); ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('view_purchase_price')): ?>
    <style>
        .show_price_with_permission {
            display: none !important;
        }
    </style>
<?php endif; ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/stock_adjustment/index.blade.php ENDPATH**/ ?>