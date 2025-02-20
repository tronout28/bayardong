<table class="table table-striped">
    <tr>
        <th><?php echo e(__('report.closing_stock'), false); ?> <br><small class="text-muted">(<?php echo app('translator')->get('lang_v1.by_purchase_price'); ?>)</small>:</th>
        <td>
            <span class="display_currency" data-currency_symbol="true"><?php echo e($data['closing_stock'], false); ?></span>
        </td>
    </tr>
    <tr>
        <th><?php echo e(__('report.closing_stock'), false); ?> <br><small class="text-muted">(<?php echo app('translator')->get('lang_v1.by_sale_price'); ?>)</small>:</th>
        <td>
        <?php if(isset($stocks['closing_stock_by_sp'])): ?>
            <span class="display_currency" data-currency_symbol="true"><?php echo e($stocks['closing_stock_by_sp'], false); ?></span>
        <?php else: ?>
             <span id="closing_stock_by_sp"><i class="fa fa-sync fa-spin fa-fw "></i></span>
        <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th><?php echo e(__('home.total_sell'), false); ?>: <br>
            <!-- sub type for total sales -->
            <?php if(count($data['total_sell_by_subtype']) > 1): ?>
            <ul>
                <?php $__currentLoopData = $data['total_sell_by_subtype']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <span class="display_currency" data-currency_symbol="true">
                            <?php echo e($sell->total_before_tax, false); ?>    
                        </span>
                        <?php if(!empty($sell->sub_type)): ?>
                            &nbsp;<small class="text-muted">(<?php echo e(ucfirst($sell->sub_type), false); ?>)</small>
                        <?php endif; ?>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <?php endif; ?>
            <small class="text-muted"> 
                (<?php echo app('translator')->get('product.exc_of_tax'); ?>, <?php echo app('translator')->get('sale.discount'); ?>)
            </small>
        </th>
        <td>
            <span class="display_currency" data-currency_symbol="true"><?php echo e($data['total_sell'], false); ?></span>
        </td>
    </tr>
    <tr>
        <th><?php echo e(__('lang_v1.total_sell_shipping_charge'), false); ?>:</th>
        <td>
            <span class="display_currency" data-currency_symbol="true"><?php echo e($data['total_sell_shipping_charge'], false); ?></span>
        </td>
    </tr>
    <tr>
        <th><?php echo e(__('lang_v1.sell_additional_expense'), false); ?>:</th>
        <td>
            <span class="display_currency" data-currency_symbol="true"><?php echo e($data['total_sell_additional_expense'], false); ?></span>
        </td>
    </tr>
    <tr>
        <th><?php echo e(__('report.total_stock_recovered'), false); ?>:</th>
        <td>
             <span class="display_currency" data-currency_symbol="true"><?php echo e($data['total_recovered'], false); ?></span>
        </td>
    </tr>
    <tr>
        <th><?php echo e(__('lang_v1.total_purchase_return'), false); ?>:</th>
        <td>
             <span class="display_currency" data-currency_symbol="true"><?php echo e($data['total_purchase_return'], false); ?></span>
        </td>
    </tr>
    <tr>
        <th><?php echo e(__('lang_v1.total_purchase_discount'), false); ?>:</th>
        <td>
            <span class="display_currency" data-currency_symbol="true"><?php echo e($data['total_purchase_discount'], false); ?></span>
        </td>
    </tr>
    <tr>
        <th><?php echo e(__('lang_v1.total_sell_round_off'), false); ?>:</th>
        <td>
            <span class="display_currency" data-currency_symbol="true"><?php echo e($data['total_sell_round_off'], false); ?></span>
        </td>
    </tr>
    <tr>
        <td colspan="2">
        &nbsp;
        </td>
    </tr>
    <?php $__currentLoopData = $data['right_side_module_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th><?php echo e($module_data['label'], false); ?>:</th>
            <td>
                <span class="display_currency" data-currency_symbol="true"><?php echo e($module_data['value'], false); ?></span>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/report/partials/clossing_stock_report_table.blade.php ENDPATH**/ ?>