<?php $__env->startSection('title', __('stock_adjustment.add')); ?>

<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <br>
        <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"><?php echo app('translator')->get('stock_adjustment.add'); ?></h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol> -->
    </section>

    <!-- Main content -->
    <section class="content no-print">
        <?php echo Form::open([
            'url' => action([\App\Http\Controllers\StockAdjustmentController::class, 'store']),
            'method' => 'post',
            'id' => 'stock_adjustment_form',
        ]); ?>


        <?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <?php echo Form::label('location_id', __('purchase.business_location') . ':*'); ?>

                        <?php echo Form::select('location_id', $business_locations, null, [
                            'class' => 'form-control select2',
                            'placeholder' => __('messages.please_select'),
                            'required',
                        ]); ?>

                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <?php echo Form::label('ref_no', __('purchase.ref_no') . ':'); ?>

                        <?php echo Form::text('ref_no', null, ['class' => 'form-control']); ?>

                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <?php echo Form::label('transaction_date', __('messages.date') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <?php echo Form::text('transaction_date', \Carbon::createFromTimestamp(strtotime('now'))->format(session('business.date_format') . ' ' . 'H:i'), ['class' => 'form-control', 'readonly', 'required']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <?php echo Form::label('adjustment_type', __('stock_adjustment.adjustment_type') . ':*'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.adjustment_type') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                        <?php echo Form::select(
                            'adjustment_type',
                            ['normal' => __('stock_adjustment.normal'), 'abnormal' => __('stock_adjustment.abnormal')],
                            null,
                            ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required'],
                        ); ?>

                    </div>
                </div>
            </div>
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-search"></i>
                            </span>
                            <?php echo Form::text('search_product', null, [
                                'class' => 'form-control',
                                'id' => 'search_product_for_srock_adjustment',
                                'placeholder' => __('stock_adjustment.search_product'),
                                'disabled',
                            ]); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <input type="hidden" id="product_row_index" value="0">
                    <input type="hidden" id="total_amount" name="final_total" value="0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-condensed" id="stock_adjustment_product_table">
                            <thead>
                                <tr>
                                    <th class="col-sm-4 text-center">
                                        <?php echo app('translator')->get('sale.product'); ?>
                                    </th>
                                    <th class="col-sm-2 text-center">
                                        <?php echo app('translator')->get('sale.qty'); ?>
                                    </th>
                                    <th class="col-sm-2 text-center show_price_with_permission">
                                        <?php echo app('translator')->get('sale.unit_price'); ?>
                                    </th>
                                    <th class="col-sm-2 text-center show_price_with_permission">
                                        <?php echo app('translator')->get('sale.subtotal'); ?>
                                    </th>
                                    <th class="col-sm-2 text-center"><i class="fa fa-trash" aria-hidden="true"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr class="text-center show_price_with_permission">
                                    <td colspan="3"></td>
                                    <td>
                                        <div class="pull-right"><b><?php echo app('translator')->get('stock_adjustment.total_amount'); ?>:</b> <span
                                                id="total_adjustment">0.00</span></div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <?php echo Form::label('total_amount_recovered', __('stock_adjustment.total_amount_recovered') . ':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.total_amount_recovered') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                        <?php echo Form::text('total_amount_recovered', 0, [
                            'class' => 'form-control input_number',
                            'placeholder' => __('stock_adjustment.total_amount_recovered'),
                        ]); ?>

                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <?php echo Form::label('additional_notes', __('stock_adjustment.reason_for_stock_adjustment') . ':'); ?>

                        <?php echo Form::textarea('additional_notes', null, [
                            'class' => 'form-control',
                            'placeholder' => __('stock_adjustment.reason_for_stock_adjustment'),
                            'rows' => 3,
                        ]); ?>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <button type="submit" class="tw-dw-btn tw-dw-btn-primary tw-dw-btn-lg tw-text-white"><?php echo app('translator')->get('messages.save'); ?></button>
                </div>
            </div>
        <?php echo $__env->renderComponent(); ?>
        <?php echo Form::close(); ?>

    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/stock_adjustment.js?v=' . $asset_v), false); ?>"></script>
    <script type="text/javascript">
        __page_leave_confirmation('#stock_adjustment_form');
    </script>
<?php $__env->stopSection(); ?>


<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('view_purchase_price')): ?>
    <style>
        .show_price_with_permission {
            display: none !important;
        }
    </style>
<?php endif; ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/stock_adjustment/create.blade.php ENDPATH**/ ?>