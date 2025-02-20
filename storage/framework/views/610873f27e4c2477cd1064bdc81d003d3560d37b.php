<?php $__env->startSection('title', __('messages.business_location_settings')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"><?php echo app('translator')->get( 'messages.business_location_settings' ); ?> - <?php echo e($location->name, false); ?></h1>
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
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true"><?php echo app('translator')->get('receipt.receipt_settings'); ?></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="row">
                        <div class="col-md-12">
                            <h4><?php echo app('translator')->get( 'receipt.receipt_settings'); ?>
                                <small><?php echo app('translator')->get( 'receipt.receipt_settings_mgs'); ?></small>
                            </h4>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo Form::open(['url' => route('location.settings_update', [$location->id]), 'method' => 'post', 'id' => 'bl_receipt_setting_form']); ?>


                        <div class="col-sm-4">
                            <div class="form-group">
                                <?php echo Form::label('print_receipt_on_invoice', __('receipt.print_receipt_on_invoice') . ':'); ?>

                                <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.print_receipt_on_invoice') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-file-alt"></i>
                                    </span>
                                    <?php echo Form::select('print_receipt_on_invoice', $printReceiptOnInvoice, $location->print_receipt_on_invoice, ['class' => 'form-control select2', 'required']); ?>

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <?php echo Form::label('receipt_printer_type', __('receipt.receipt_printer_type') . ':*'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.receipt_printer_type') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-print"></i>
                                    </span>
                                    <?php echo Form::select('receipt_printer_type', $receiptPrinterType, $location->receipt_printer_type, ['class' => 'form-control select2', 'required']); ?>

                                </div>
                                <?php if(config('app.env') == 'demo'): ?>
                                    <span class="help-block">Only Browser based option is enabled in demo.</span>
                                <?php endif; ?>
                                
                            </div>
                        </div>

                        <div class="col-sm-4" 
                            id="location_printer_div">
                            <div class="form-group">
                                <?php echo Form::label('printer_id', __('printer.receipt_printers') . ':*'); ?>

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-share-alt"></i>
                                    </span>
                                    <?php echo Form::select('printer_id', $printers, $location->printer_id, ['class' => 'form-control select2', 'required']); ?>

                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br/>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <?php echo Form::label('invoice_layout_id', __('invoice.invoice_layout') . ':*'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.invoice_layout') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-info"></i>
                                    </span>
                                    <?php echo Form::select('invoice_layout_id', $invoice_layouts, $location->invoice_layout_id, ['class' => 'form-control select2', 'required']); ?>

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <?php echo Form::label('invoice_scheme_id', __('invoice.invoice_scheme') . ':*'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.invoice_scheme') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-info"></i>
                                    </span>
                                    <?php echo Form::select('invoice_scheme_id', $invoice_schemes, $location->invoice_scheme_id, ['class' => 'form-control select2', 'required']); ?>

                                </div>
                            </div>
                        </div>


                        

                        <div class="row">
                            <div class="col-sm-12">
                                <button class="tw-dw-btn tw-dw-btn-primary tw-text-white pull-right" type="submit"><?php echo app('translator')->get('messages.update'); ?></button>
                            </div>
                        </div>
                        <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
    </div>
	
    <div class="modal fade invoice_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade invoice_edit_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/location_settings/index.blade.php ENDPATH**/ ?>