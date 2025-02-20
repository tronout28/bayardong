<?php $__env->startSection('title', __('lang_v1.customer_groups')); ?>

<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"><?php echo app('translator')->get('lang_v1.customer_groups'); ?></h1>
        <!-- <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __('lang_v1.all_your_customer_groups')]); ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer.create')): ?>
                <?php $__env->slot('tool'); ?>
                    <div class="box-tools">
                        <a class="tw-dw-btn tw-bg-gradient-to-r tw-from-indigo-600 tw-to-blue-500 tw-font-bold tw-text-white tw-border-none tw-rounded-full btn-modal"
                            data-href="<?php echo e(action([\App\Http\Controllers\CustomerGroupController::class, 'create']), false); ?>"
                            data-container=".customer_groups_modal">
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
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer.view')): ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="customer_groups_table">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('lang_v1.customer_group_name'); ?></th>
                                <th><?php echo app('translator')->get('lang_v1.calculation_percentage'); ?></th>
                                <th><?php echo app('translator')->get('lang_v1.selling_price_group'); ?></th>
                                <th><?php echo app('translator')->get('messages.action'); ?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            <?php endif; ?>
        <?php echo $__env->renderComponent(); ?>

        <div class="modal fade customer_groups_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        </div>

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>

    <script type="text/javascript">
        $(document).on('change', '#price_calculation_type', function() {
            var price_calculation_type = $(this).val();

            if (price_calculation_type == 'percentage') {
                $('.percentage-field').removeClass('hide');
                $('.selling_price_group-field').addClass('hide');
            } else {
                $('.percentage-field').addClass('hide');
                $('.selling_price_group-field').removeClass('hide');
            }
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/customer_group/index.blade.php ENDPATH**/ ?>