<?php $__env->startSection('title', __('lang_v1.import_opening_stock')); ?>

<?php $__env->startSection('content'); ?>
<br/>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"><?php echo app('translator')->get('lang_v1.import_opening_stock'); ?></h1>
</section>

<!-- Main content -->
<section class="content">
    
<?php if(session('notification') || !empty($notification)): ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php if(!empty($notification['msg'])): ?>
                    <?php echo e($notification['msg'], false); ?>

                <?php elseif(session('notification.msg')): ?>
                    <?php echo e(session('notification.msg'), false); ?>

                <?php endif; ?>
              </div>
          </div>  
      </div>     
<?php endif; ?>
    <div class="row">
        <div class="col-sm-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
                <?php echo Form::open(['url' => action([\App\Http\Controllers\ImportOpeningStockController::class, 'store']), 'method' => 'post', 'enctype' => 'multipart/form-data' ]); ?>

                    <div class="row">
                        <div class="col-sm-6">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <?php echo Form::label('name', __( 'product.file_to_import' ) . ':'); ?>

                                <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.tooltip_import_opening_stock') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                                <?php echo Form::file('products_csv', ['accept'=> '.xls', 'required' => 'required']); ?>

                              </div>
                        </div>
                        <div class="col-sm-4">
                        <br>
                            <button type="submit" class="tw-dw-btn tw-dw-btn-primary tw-text-white"><?php echo app('translator')->get('messages.submit'); ?></button>
                        </div>
                        </div>
                    </div>

                <?php echo Form::close(); ?>

                <br><br>
                <div class="row">
                    <div class="col-sm-4">
                        <a href="<?php echo e(asset('files/import_opening_stock_csv_template.xls'), false); ?>" class="tw-dw-btn tw-dw-btn-success tw-text-white" download><i class="fa fa-download"></i> <?php echo app('translator')->get('lang_v1.download_template_file'); ?></a>
                    </div>
                </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __('lang_v1.instructions')]); ?>
            <strong><?php echo app('translator')->get('lang_v1.instruction_line1'); ?></strong><br><?php echo app('translator')->get('lang_v1.instruction_line2'); ?>
            <br><br>
            <table class="table table-striped">
                <tr>
                    <th><?php echo app('translator')->get('lang_v1.col_no'); ?></th>
                    <th><?php echo app('translator')->get('lang_v1.col_name'); ?></th>
                    <th><?php echo app('translator')->get('lang_v1.instruction'); ?></th>
                </tr>
                <tr>
                    <td>1</td>
                    <td><?php echo app('translator')->get('product.sku'); ?><small class="text-muted">(<?php echo app('translator')->get('lang_v1.required'); ?>)</small></td>
                    <td></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><?php echo app('translator')->get('business.location'); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.optional'); ?>) <br><?php echo app('translator')->get('lang_v1.location_ins'); ?></small></td>
                    <td><?php echo app('translator')->get('lang_v1.location_ins1'); ?><br>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><?php echo app('translator')->get('lang_v1.quantity'); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.required'); ?>)</small></td>
                    <td></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td><?php echo app('translator')->get('purchase.unit_cost_before_tax'); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.required'); ?>)</small></td>
                    <td></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td><?php echo app('translator')->get('lang_v1.lot_number'); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.optional'); ?>)</small></td>
                    <td></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td><?php echo app('translator')->get('lang_v1.expiry_date'); ?> <small class="text-muted">(<?php echo app('translator')->get('lang_v1.optional'); ?>)</small></td>
                    <td><?php echo __('lang_v1.expiry_date_in_business_date_format'); ?> <br/> <b><?php echo e($date_format, false); ?></b>, <?php echo app('translator')->get('lang_v1.type'); ?>: <b>text</b>, <?php echo app('translator')->get('lang_v1.example'); ?>: <b><?php echo e(\Carbon::createFromTimestamp(strtotime('today'))->format(session('business.date_format')), false); ?></b></td>
                </tr>
            </table>
        <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/import_opening_stock/index.blade.php ENDPATH**/ ?>