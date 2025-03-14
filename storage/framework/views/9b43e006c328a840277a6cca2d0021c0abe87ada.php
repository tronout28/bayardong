<!--Purchase related settings -->
<div class="pos-tab-content">
    <div class="row">
    <?php if(!config('constants.disable_purchase_in_other_currency', true)): ?>
    <div class="col-sm-4">
        <div class="form-group">
            <div class="checkbox">
                <label>
                <?php echo Form::checkbox('purchase_in_diff_currency', 1, $business->purchase_in_diff_currency , 
                [ 'class' => 'input-icheck', 'id' => 'purchase_in_diff_currency']); ?> <?php echo e(__( 'purchase.allow_purchase_different_currency' ), false); ?>

                </label>
              <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.purchase_different_currency') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="col-sm-4 <?php if($business->purchase_in_diff_currency != 1): ?> hide <?php endif; ?>" id="settings_purchase_currency_div">
        <div class="form-group">
            <?php echo Form::label('purchase_currency_id', __('purchase.purchase_currency') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fas fa-money-bill-alt"></i>
                </span>
                <?php echo Form::select('purchase_currency_id', $currencies, $business->purchase_currency_id, ['class' => 'form-control select2', 'placeholder' => __('business.currency'), 'required', 'style' => 'width:100% !important']); ?>

            </div>
        </div>
    </div>
    <div class="col-sm-4 <?php if($business->purchase_in_diff_currency != 1): ?> hide <?php endif; ?>" id="settings_currency_exchange_div">
        <div class="form-group">
            <?php echo Form::label('p_exchange_rate', __('purchase.p_exchange_rate') . ':'); ?>

            <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.currency_exchange_factor') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-info"></i>
                </span>
                <?php echo Form::number('p_exchange_rate', $business->p_exchange_rate, ['class' => 'form-control', 'placeholder' => __('business.p_exchange_rate'), 'required', 'step' => '0.001']); ?>

            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="clearfix"></div>
    <div class="col-sm-6">
        <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('enable_editing_product_from_purchase', 1, $business->enable_editing_product_from_purchase , 
                [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.enable_editing_product_from_purchase' ), false); ?>

              </label>
              <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.enable_updating_product_price_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <div class="checkbox">
                <label>
                <?php echo Form::checkbox('enable_purchase_status', 1, $business->enable_purchase_status , [ 'class' => 'input-icheck', 'id' => 'enable_purchase_status']); ?> <?php echo e(__( 'lang_v1.enable_purchase_status' ), false); ?>

                </label>
              <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.tooltip_enable_purchase_status') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            </div>
        </div>
    </div>
<div class="clearfix"></div>
    <div class="col-sm-6">
        <div class="form-group">
            <div class="checkbox">
                <label>
                <?php echo Form::checkbox('enable_lot_number', 1, $business->enable_lot_number , [ 'class' => 'input-icheck', 'id' => 'enable_lot_number']); ?> <?php echo e(__( 'lang_v1.enable_lot_number' ), false); ?>

                </label>
              <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.tooltip_enable_lot_number') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <div class="checkbox">
                <label>
                <?php echo Form::checkbox('common_settings[enable_purchase_order]', 1, !empty($common_settings['enable_purchase_order']) , [ 'class' => 'input-icheck', 'id' => 'enable_purchase_order']); ?> <?php echo e(__( 'lang_v1.enable_purchase_order' ), false); ?>

                </label>
              <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.purchase_order_help_text') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-sm-6">
        <div class="form-group">
            <div class="checkbox">
                <label>
                <?php echo Form::checkbox('common_settings[enable_purchase_requisition]', 1, !empty($common_settings['enable_purchase_requisition']) , [ 'class' => 'input-icheck', 'id' => 'enable_purchase_requisition']); ?> <?php echo e(__( 'lang_v1.enable_purchase_requisition' ), false); ?>

                </label>
              <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.purchase_requisition_help_text') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            </div>
        </div>
    </div>

    </div>
</div><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/business/partials/settings_purchase.blade.php ENDPATH**/ ?>