<?php $__env->startSection('title', __('invoice.invoice_settings')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1  class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"><?php echo app('translator')->get('invoice.invoice_settings'); ?>
        <small class="tw-text-sm md:tw-text-base tw-text-gray-700 tw-font-semibold"><?php echo app('translator')->get('invoice.manage_your_invoices'); ?></small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <?php $__env->startComponent('components.widget'); ?>
            <div class="">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true"><?php echo app('translator')->get('invoice.invoice_schemes'); ?></a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false"><?php echo app('translator')->get('invoice.invoice_layouts'); ?></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="row">
                            <div class="col-md-12">
                                <h4><?php echo app('translator')->get( 'invoice.all_your_invoice_schemes' ); ?>
                                        <button class="tw-dw-btn tw-bg-gradient-to-r tw-from-indigo-600 tw-to-blue-500 tw-font-bold tw-text-white tw-border-none tw-rounded-full pull-right tw-mb-2 btn-modal"
                                            data-href="<?php echo e(action([\App\Http\Controllers\InvoiceSchemeController::class, 'create']), false); ?>" 
                                            data-container=".invoice_modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 5l0 14" />
                                                <path d="M5 12l14 0" />
                                            </svg> <?php echo app('translator')->get('messages.add'); ?>
                                        </button>
                                </h4>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="invoice_table">
                                        <thead>
                                            <tr>
                                                <th><?php echo app('translator')->get( 'invoice.name' ); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.invoice_scheme_name') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                                                <th><?php echo app('translator')->get( 'invoice.prefix' ); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.invoice_scheme_prefix') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                                                <th><?php echo app('translator')->get( 'invoice.number_type' ); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('invoice.number_type_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                                                <th><?php echo app('translator')->get( 'invoice.start_number' ); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.invoice_scheme_start_number') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                                                <th><?php echo app('translator')->get( 'invoice.invoice_count' ); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.invoice_scheme_count') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                                                <th><?php echo app('translator')->get( 'invoice.total_digits' ); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.invoice_scheme_total_digits') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                                                <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <div class="row">
                            <div class="col-md-12">
                                <h4><?php echo app('translator')->get( 'invoice.all_your_invoice_layouts' ); ?>
										<a class="tw-dw-btn tw-bg-gradient-to-r tw-from-indigo-600 tw-to-blue-500 tw-font-bold tw-text-white tw-border-none tw-rounded-full pull-right tw-mb-2"
											href="<?php echo e(action([\App\Http\Controllers\InvoiceLayoutController::class, 'create']), false); ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 5l0 14" />
                                                <path d="M5 12l14 0" />
                                            </svg> <?php echo app('translator')->get('messages.add'); ?>
										</a>
								</h4>
                            </div>
                            <div class="col-md-12">
                                <?php $__currentLoopData = $invoice_layouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3">
                                    <div class="icon-link">
                                        <a href="<?php echo e(action([\App\Http\Controllers\InvoiceLayoutController::class, 'edit'], [$layout->id]), false); ?>">
                                            <i class="fa fa-file-alt fa-4x"></i>
                                            <?php echo e($layout->name, false); ?>

                                        </a>
                                        <?php if( $layout->is_default ): ?>
                                        <span class="badge bg-green"><?php echo app('translator')->get("barcode.default"); ?></span>
                                        <?php endif; ?>
                                        <?php if($layout->locations->count()): ?>
                                        <span class="link-des">
                                            <b><?php echo app('translator')->get('invoice.used_in_locations'); ?>: </b><br>
                                            <?php $__currentLoopData = $layout->locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($location->name, false); ?>

                                            <?php if(!$loop->last): ?>
                                            ,
                                            <?php endif; ?>
                                            &nbsp;
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php if( $loop->iteration % 4 == 0 ): ?>
                                <div class="clearfix"></div>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <br>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <?php echo $__env->renderComponent(); ?>
            <!-- nav-tabs-custom -->
        </div>
    </div>

    <div class="modal fade invoice_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade invoice_edit_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/invoice_scheme/index.blade.php ENDPATH**/ ?>