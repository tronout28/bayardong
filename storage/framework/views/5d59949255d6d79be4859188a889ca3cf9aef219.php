<?php $__env->startSection('title', __('unit.units')); ?>

<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"><?php echo app('translator')->get('unit.units'); ?>
            <small class="tw-text-sm md:tw-text-base tw-text-gray-700 tw-font-semibold"><?php echo app('translator')->get('unit.manage_your_units'); ?></small>
        </h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __('unit.all_your_units')]); ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('unit.create')): ?>
                <?php $__env->slot('tool'); ?>
                    <div class="box-tools">
                        
                        <a class="tw-dw-btn tw-bg-gradient-to-r tw-from-indigo-600 tw-to-blue-500 tw-font-bold tw-text-white tw-border-none tw-rounded-full btn-modal pull-right"
                            data-href="<?php echo e(action([\App\Http\Controllers\UnitController::class, 'create']), false); ?>" 
                            data-container=".unit_modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg> <?php echo app('translator')->get('messages.add'); ?>
                        </a>
                    </div>
                <?php $__env->endSlot(); ?>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('unit.view')): ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="unit_table">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('unit.name'); ?></th>
                                <th><?php echo app('translator')->get('unit.short_name'); ?></th>
                                <th><?php echo app('translator')->get('unit.allow_decimal'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.unit_allow_decimal') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                                <th><?php echo app('translator')->get('messages.action'); ?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            <?php endif; ?>
        <?php echo $__env->renderComponent(); ?>

        <div class="modal fade unit_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        </div>

    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/unit/index.blade.php ENDPATH**/ ?>