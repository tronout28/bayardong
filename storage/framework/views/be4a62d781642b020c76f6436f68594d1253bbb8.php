<div class="row">
    <div class="option-div-group">
        <div class="col-md-12">
            <label class="form-check-label" for="sku"><?php echo app('translator')->get('product.variation_sku_format'); ?> </label><?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('product.variation_sku_format_help_text') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
        </div>
            <div class="col-sm-4">
                <input class="form-check-input" type="radio" name="sku_type" checked id="with_out_variation" value="with_out_variation">
                <label class="form-check-label" for="with_out_variation"><?php echo app('translator')->get('product.sku_number'); ?></label>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <input class="form-check-input" type="radio" name="sku_type" id="with_variation"
                        value="with_variation">
                    <label class="form-check-label" for="with_variation"><?php echo app('translator')->get('product.sku_variation_number'); ?></label>
                </div>
            </div>
    </div>
</div>


<div class="col-sm-12">
    <h4><?php echo app('translator')->get('product.add_variation'); ?>:* <button type="button" class="tw-dw-btn tw-dw-btn-primary tw-text-white tw-dw-btn-sm" id="add_variation"
            data-action="add">+</button></h4>
</div>
<div class="col-sm-12">
    <div class="table-responsive">
        <table class="table table-bordered add-product-price-table table-condensed" id="product_variation_form_part">
            <thead>
                <tr>
                    <th></th>
                    <th class="col-sm-2"><?php echo app('translator')->get('lang_v1.variation'); ?></th>
                    <th class="col-sm-10"><?php echo app('translator')->get('product.variation_values'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if($action == 'add'): ?>
                    <?php echo $__env->make('product.partials.product_variation_row', ['row_index' => 0], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php else: ?>
                    <?php $__empty_1 = true; $__currentLoopData = $product_variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php echo $__env->make('product.partials.edit_product_variation_row', [
                            'row_index' => $action == 'edit' ? $product_variation->id : $loop->index,
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php echo $__env->make('product.partials.product_variation_row', ['row_index' => 0], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>

                <?php endif; ?>

            </tbody>
        </table>
    </div>
</div>
<?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/product/partials/variable_product_form_part.blade.php ENDPATH**/ ?>