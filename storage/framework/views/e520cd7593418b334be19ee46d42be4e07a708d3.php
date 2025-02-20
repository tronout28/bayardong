<?php $__env->startSection('title', __( 'tax_rate.tax_rates' )); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"><?php echo app('translator')->get( 'tax_rate.tax_rates' ); ?>
        <small class="tw-text-sm md:tw-text-base tw-text-gray-700 tw-font-semibold"><?php echo app('translator')->get( 'tax_rate.manage_your_tax_rates' ); ?></small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __( 'tax_rate.all_your_tax_rates' )]); ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tax_rate.create')): ?>
            <?php $__env->slot('tool'); ?>
                <div class="box-tools">
                    <button class="tw-dw-btn tw-bg-gradient-to-r tw-from-indigo-600 tw-to-blue-500 tw-font-bold tw-text-white tw-border-none tw-rounded-full btn-modal pull-right"
                        data-href="<?php echo e(action([\App\Http\Controllers\TaxRateController::class, 'create']), false); ?>" 
                        data-container=".tax_rate_modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg> <?php echo app('translator')->get('messages.add'); ?>
                    </button>
                </div>
            <?php $__env->endSlot(); ?>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tax_rate.view')): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="tax_rates_table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get( 'tax_rate.name' ); ?></th>
                            <th><?php echo app('translator')->get( 'tax_rate.rate' ); ?></th>
                            <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
                        </tr>
                    </thead>
                </table>
            </div>
        <?php endif; ?>
    <?php echo $__env->renderComponent(); ?>

    <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get( 'tax_rate.tax_groups' ); ?> ( <?php echo app('translator')->get('lang_v1.combination_of_taxes'); ?> ) <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.tax_groups') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
        <?php $__env->endSlot(); ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tax_rate.create')): ?>
            <?php $__env->slot('tool'); ?>
                <div class="box-tools">
                    
                    <button class="tw-dw-btn tw-bg-gradient-to-r tw-from-indigo-600 tw-to-blue-500 tw-font-bold tw-text-white tw-border-none tw-rounded-full btn-modal pull-right"
                        data-href="<?php echo e(action([\App\Http\Controllers\GroupTaxController::class, 'create']), false); ?>" 
                        data-container=".tax_group_modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 5l0 14" />
                        <path d="M5 12l14 0" />
                    </svg> <?php echo app('translator')->get('messages.add'); ?>
                </button>
                </div>
            <?php $__env->endSlot(); ?>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tax_rate.view')): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="tax_groups_table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get( 'tax_rate.name' ); ?></th>
                            <th><?php echo app('translator')->get( 'tax_rate.rate' ); ?></th>
                            <th><?php echo app('translator')->get( 'tax_rate.sub_taxes' ); ?></th>
                            <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
                        </tr>
                    </thead>
                </table>
            </div>
        <?php endif; ?>
    <?php echo $__env->renderComponent(); ?>
    
    <div class="modal fade tax_rate_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade tax_group_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/tax_rate/index.blade.php ENDPATH**/ ?>