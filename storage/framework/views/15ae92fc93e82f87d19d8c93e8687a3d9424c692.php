<div class="pos-tab-content">
     <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <?php
                    $purchase_prefix = '';
                    if(!empty($business->ref_no_prefixes['purchase'])){
                        $purchase_prefix = $business->ref_no_prefixes['purchase'];
                    }
                ?>
                <?php echo Form::label('ref_no_prefixes[purchase]', __('lang_v1.purchase') . ':'); ?>

                <?php echo Form::text('ref_no_prefixes[purchase]', $purchase_prefix, ['class' => 'form-control']); ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php
                    $purchase_return = '';
                    if(!empty($business->ref_no_prefixes['purchase_return'])){
                        $purchase_return = $business->ref_no_prefixes['purchase_return'];
                    }
                ?>
                <?php echo Form::label('ref_no_prefixes[purchase_return]', __('lang_v1.purchase_return') . ':'); ?>

                <?php echo Form::text('ref_no_prefixes[purchase_return]', $purchase_return, ['class' => 'form-control']); ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php
                    $purchase_requisition_prefix = !empty($business->ref_no_prefixes['purchase_requisition']) ? $business->ref_no_prefixes['purchase_requisition'] : '';
                ?>
                <?php echo Form::label('ref_no_prefixes[purchase_requisition]', __('lang_v1.purchase_requisition') . ':'); ?>

                <?php echo Form::text('ref_no_prefixes[purchase_requisition]', $purchase_requisition_prefix, ['class' => 'form-control']); ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php
                    $purchase_order_prefix = !empty($business->ref_no_prefixes['purchase_order']) ? $business->ref_no_prefixes['purchase_order'] : '';
                ?>
                <?php echo Form::label('ref_no_prefixes[purchase_order]', __('lang_v1.purchase_order') . ':'); ?>

                <?php echo Form::text('ref_no_prefixes[purchase_order]', $purchase_order_prefix, ['class' => 'form-control']); ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php
                    $stock_transfer_prefix = '';
                    if(!empty($business->ref_no_prefixes['stock_transfer'])){
                        $stock_transfer_prefix = $business->ref_no_prefixes['stock_transfer'];
                    }
                ?>
                <?php echo Form::label('ref_no_prefixes[stock_transfer]', __('lang_v1.stock_transfer') . ':'); ?>

                <?php echo Form::text('ref_no_prefixes[stock_transfer]', $stock_transfer_prefix, ['class' => 'form-control']); ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php
                    $stock_adjustment_prefix = '';
                    if(!empty($business->ref_no_prefixes['stock_adjustment'])){
                        $stock_adjustment_prefix = $business->ref_no_prefixes['stock_adjustment'];
                    }
                ?>
                <?php echo Form::label('ref_no_prefixes[stock_adjustment]', __('stock_adjustment.stock_adjustment') . ':'); ?>

                <?php echo Form::text('ref_no_prefixes[stock_adjustment]', $stock_adjustment_prefix, ['class' => 'form-control']); ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php
                    $sell_return_prefix = '';
                    if(!empty($business->ref_no_prefixes['sell_return'])){
                        $sell_return_prefix = $business->ref_no_prefixes['sell_return'];
                    }
                ?>
                <?php echo Form::label('ref_no_prefixes[sell_return]', __('lang_v1.sell_return') . ':'); ?>

                <?php echo Form::text('ref_no_prefixes[sell_return]', $sell_return_prefix, ['class' => 'form-control']); ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php
                    $expenses_prefix = '';
                    if(!empty($business->ref_no_prefixes['expense'])){
                        $expenses_prefix = $business->ref_no_prefixes['expense'];
                    }
                ?>
                <?php echo Form::label('ref_no_prefixes[expense]', __('expense.expenses') . ':'); ?>

                <?php echo Form::text('ref_no_prefixes[expense]', $expenses_prefix, ['class' => 'form-control']); ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php
                    $contacts_prefix = '';
                    if(!empty($business->ref_no_prefixes['contacts'])){
                        $contacts_prefix = $business->ref_no_prefixes['contacts'];
                    }
                ?>
                <?php echo Form::label('ref_no_prefixes[contacts]', __('contact.contacts') . ':'); ?>

                <?php echo Form::text('ref_no_prefixes[contacts]', $contacts_prefix, ['class' => 'form-control']); ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php
                    $purchase_payment = '';
                    if(!empty($business->ref_no_prefixes['purchase_payment'])){
                        $purchase_payment = $business->ref_no_prefixes['purchase_payment'];
                    }
                ?>
                <?php echo Form::label('ref_no_prefixes[purchase_payment]', __('lang_v1.purchase_payment') . ':'); ?>

                <?php echo Form::text('ref_no_prefixes[purchase_payment]', $purchase_payment, ['class' => 'form-control']); ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php
                    $sell_payment = '';
                    if(!empty($business->ref_no_prefixes['sell_payment'])){
                        $sell_payment = $business->ref_no_prefixes['sell_payment'];
                    }
                ?>
                <?php echo Form::label('ref_no_prefixes[sell_payment]', __('lang_v1.sell_payment') . ':'); ?>

                <?php echo Form::text('ref_no_prefixes[sell_payment]', $sell_payment, ['class' => 'form-control']); ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php
                    $expense_payment = '';
                    if(!empty($business->ref_no_prefixes['expense_payment'])){
                        $expense_payment = $business->ref_no_prefixes['expense_payment'];
                    }
                ?>
                <?php echo Form::label('ref_no_prefixes[expense_payment]', __('lang_v1.expense_payment') . ':'); ?>

                <?php echo Form::text('ref_no_prefixes[expense_payment]', $expense_payment, ['class' => 'form-control']); ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php
                    $business_location_prefix = '';
                    if(!empty($business->ref_no_prefixes['business_location'])){
                        $business_location_prefix = $business->ref_no_prefixes['business_location'];
                    }
                ?>
                <?php echo Form::label('ref_no_prefixes[business_location]', __('business.business_location') . ':'); ?>

                <?php echo Form::text('ref_no_prefixes[business_location]', $business_location_prefix, ['class' => 'form-control']); ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php
                    $username_prefix = !empty($business->ref_no_prefixes['username']) ? $business->ref_no_prefixes['username'] : '';
                ?>
                <?php echo Form::label('ref_no_prefixes[username]', __('business.username') . ':'); ?>

                <?php echo Form::text('ref_no_prefixes[username]', $username_prefix, ['class' => 'form-control']); ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php
                    $subscription_prefix = !empty($business->ref_no_prefixes['subscription']) ? $business->ref_no_prefixes['subscription'] : '';
                ?>
                <?php echo Form::label('ref_no_prefixes[subscription]', __('lang_v1.subscription_no') . ':'); ?>

                <?php echo Form::text('ref_no_prefixes[subscription]', $subscription_prefix, ['class' => 'form-control']); ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php
                    $draft_prefix = !empty($business->ref_no_prefixes['draft']) ? $business->ref_no_prefixes['draft'] : '';
                ?>
                <?php echo Form::label('ref_no_prefixes[draft]', __('sale.draft') . ':'); ?>

                <?php echo Form::text('ref_no_prefixes[draft]', $draft_prefix, ['class' => 'form-control']); ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php
                    $sales_order_prefix = !empty($business->ref_no_prefixes['sales_order']) ? $business->ref_no_prefixes['sales_order'] : '';
                ?>
                <?php echo Form::label('ref_no_prefixes[sales_order]', __('lang_v1.sales_order') . ':'); ?>

                <?php echo Form::text('ref_no_prefixes[sales_order]', $sales_order_prefix, ['class' => 'form-control']); ?>

            </div>
        </div>
    </div>
</div><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/business/partials/settings_prefixes.blade.php ENDPATH**/ ?>