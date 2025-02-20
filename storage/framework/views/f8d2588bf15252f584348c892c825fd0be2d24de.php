<?php $__env->startSection('title', __('lang_v1.update_product_price')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"><?php echo app('translator')->get( 'lang_v1.update_product_price' ); ?>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
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
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __('lang_v1.import_export_product_price')]); ?>
            <div class="row">
                <div class="col-sm-6">
                    <a href="<?php echo e(action([\App\Http\Controllers\SellingPriceGroupController::class, 'export']), false); ?>" class="tw-dw-btn tw-dw-btn-primary tw-text-white"><?php echo app('translator')->get('lang_v1.export_product_prices'); ?></a>
                </div>
                <div class="col-sm-6">
                    <?php echo Form::open(['url' => action([\App\Http\Controllers\SellingPriceGroupController::class, 'import']), 'method' => 'post', 'enctype' => 'multipart/form-data' ]); ?>

                    <div class="form-group">
                        <?php echo Form::label('name', __( 'product.file_to_import' ) . ':'); ?>

                        <?php echo Form::file('product_group_prices', ['required' => 'required']); ?>

                    </div>
                    <div class="form-group">
                        <button type="submit" class="tw-dw-btn tw-dw-btn-primary tw-text-white"><?php echo app('translator')->get('messages.submit'); ?></button>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
                <div class="col-sm-12">
                    <h4><?php echo app('translator')->get('lang_v1.instructions'); ?>:</h4>
                    <ol>
                        <li><?php echo app('translator')->get('lang_v1.price_import_instruction_1'); ?></li>
                        <li><?php echo app('translator')->get('lang_v1.price_import_instruction_2'); ?></li>
                        <li><?php echo app('translator')->get('lang_v1.price_import_instruction_3'); ?></li>
                        <li><?php echo app('translator')->get('lang_v1.price_import_instruction_4'); ?></li>
                    </ol>
                    
                </div>
            </div>
    <?php echo $__env->renderComponent(); ?>
    

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/selling_price_group/update_product_price.blade.php ENDPATH**/ ?>