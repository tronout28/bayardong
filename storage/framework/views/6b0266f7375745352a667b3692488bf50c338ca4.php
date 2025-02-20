<?php $__env->startSection('title', __('lang_v1.sales_commission_agents')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"><?php echo app('translator')->get( 'lang_v1.sales_commission_agents' ); ?>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.create')): ?>
            <?php $__env->slot('tool'); ?>
                <div class="box-tools">                
                        <a class="tw-dw-btn tw-bg-gradient-to-r tw-from-indigo-600 tw-to-blue-500 tw-font-bold tw-text-white tw-border-none tw-rounded-full btn-modal pull-right"
                        data-href="<?php echo e(action([\App\Http\Controllers\SalesCommissionAgentController::class, 'create']), false); ?>" data-container=".commission_agent_modal">
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
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.view')): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="sales_commission_agent_table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get( 'user.name' ); ?></th>
                            <th><?php echo app('translator')->get( 'business.email' ); ?></th>
                            <th><?php echo app('translator')->get( 'lang_v1.contact_no' ); ?></th>
                            <th><?php echo app('translator')->get( 'business.address' ); ?></th>
                            <th><?php echo app('translator')->get( 'lang_v1.cmmsn_percent' ); ?></th>
                            <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
                        </tr>
                    </thead>
                </table>
            </div>
        <?php endif; ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="modal fade commission_agent_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/sales_commission_agent/index.blade.php ENDPATH**/ ?>