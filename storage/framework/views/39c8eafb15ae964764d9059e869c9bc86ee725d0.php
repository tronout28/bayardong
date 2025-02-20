<tr>
    <?php if(empty($payment->parent_id)): ?>
    <td <?php if($count_child_payments > 0): ?> rowspan="<?php echo e($count_child_payments + 1, false); ?>" style="vertical-align:middle;" <?php endif; ?>>
        <?php echo e(\Carbon::createFromTimestamp(strtotime($payment->paid_on))->format(session('business.date_format') . ' ' . 'H:i'), false); ?>

    </td>
    <?php endif; ?>
    <td <?php if($count_child_payments > 0): ?> class="bg-gray" <?php endif; ?>>
        <?php echo e($payment->payment_ref_no, false); ?>

        <?php if(!empty($parent_payment_ref_no)): ?>
            <br><?php echo app('translator')->get('lang_v1.parent_payment'); ?>: <?php echo e($parent_payment_ref_no, false); ?>

        <?php endif; ?>
    </td>
    <td <?php if($count_child_payments > 0): ?> class="bg-gray" <?php endif; ?>>
        <span class="display_currency paid-amount" data-orig-value=" <?php echo e($payment->amount, false); ?>" data-currency_symbol ="true"><?php echo e($payment->amount, false); ?></span>
    </td>
    <td <?php if($count_child_payments > 0): ?> class="bg-gray" <?php endif; ?>>
        <?php
            $method = !empty($payment_types[$payment->method]) ? $payment_types[$payment->method] : '';
            if ($payment->method == 'cheque') {
                $method .= '<br>(' . __('lang_v1.cheque_no') . ': ' . $payment->cheque_number . ')';
            } elseif ($payment->method == 'card') {
                $method .= '<br>(' . __('lang_v1.card_transaction_no') . ': ' . $payment->card_transaction_number . ')';
            } elseif ($payment->method == 'bank_transfer') {
                $method .= '<br>(' . __('lang_v1.bank_account_no') . ': ' . $payment->bank_account_number . ')';
            } elseif ($payment->method == 'custom_pay_1') {
                $method .= '<br>(' . __('lang_v1.transaction_no') . ': ' . $payment->transaction_no . ')';
            } elseif ($payment->method == 'custom_pay_2') {
                $method .= '<br>(' . __('lang_v1.transaction_no') . ': ' . $payment->transaction_no . ')';
            } elseif ($payment->method == 'custom_pay_3') {
                $method .= '<br>(' . __('lang_v1.transaction_no') . ': ' . $payment->transaction_no . ')';
            }
            if ($payment->is_return == 1) {
                $method .= '<br><small>(' . __('lang_v1.change_return') . ')</small>';
            }
        ?>
        <?php echo $method ?? ''; ?>

    </td>
    <td <?php if($count_child_payments > 0): ?> class="bg-gray" <?php endif; ?>>
        <?php
            $transaction_type = $payment->transaction->type ?? $payment->transaction_type;
            $transaction_id = $payment->transaction->id ?? $payment->transaction_id;
            $invoice_no = $payment->transaction->invoice_no ?? $payment->invoice_no;
            $return_parent_id = $payment->transaction->return_parent_id ?? $payment->return_parent_id;
            $ref_no = $payment->transaction->ref_no ?? $payment->ref_no;
        ?>
        <?php if($transaction_type == 'sell'): ?>
            <a data-href="<?php echo e(action([\App\Http\Controllers\SellController::class, 'show'], [$transaction_id]), false); ?>" href="#" data-container=".view_modal" class="btn-modal"><?php echo e($invoice_no, false); ?></a> <br> <small>(<?php echo e(__('sale.sale'), false); ?>) </small>

        <?php elseif($transaction_type == 'sell_return'): ?>
            <a data-href="<?php echo e(action([\App\Http\Controllers\SellReturnController::class, 'show'], [$return_parent_id]), false); ?>" href="#" data-container=".view_modal" class="btn-modal"><?php echo e($invoice_no, false); ?></a> <br> <small>(<?php echo e(__('lang_v1.sell_return'), false); ?>) </small>
        <?php elseif($transaction_type == 'purchase_return'): ?>
            <a data-href="<?php echo e(action([\App\Http\Controllers\PurchaseReturnController::class, 'show'], [$return_parent_id]), false); ?>" href="#" data-container=".view_modal" class="btn-modal"><?php echo e($ref_no, false); ?></a> <br> <small>(<?php echo e(__('lang_v1.purchase_return'), false); ?>) </small>
        <?php elseif($transaction_type == 'purchase'): ?>
            <a data-href="<?php echo e(action([\App\Http\Controllers\PurchaseController::class, 'show'], [$transaction_id]), false); ?>" href="#" data-container=".view_modal" class="btn-modal"><?php echo e($ref_no, false); ?></a> <br> <small>(<?php echo e(__('lang_v1.purchase'), false); ?>) </small>
        <?php else: ?> 
            <?php if(!empty($transaction_id)): ?>
                <?php echo e($ref_no, false); ?> <br> <small>(<?php echo e(__('lang_v1.' . $transaction_type), false); ?>) </small>
            <?php endif; ?>
        <?php endif; ?>
    </td>
    <td <?php if($count_child_payments > 0): ?> class="bg-gray" <?php endif; ?>>
        <button type="button" class="tw-dw-btn tw-dw-btn-xs tw-dw-btn-outline  tw-dw-btn-primary btn-modal" data-href="<?php echo e(action([\App\Http\Controllers\TransactionPaymentController::class, 'viewPayment'], [$payment->id]), false); ?>" data-container=".view_modal"><i class="fas fa-eye"></i><?php echo e(__('messages.view'), false); ?></button>

        <?php if(!empty($transaction_id)): ?>
            <?php if(( in_array($transaction_type, ['purchase', 'purchase_return']) && auth()->user()->can('edit_purchase_payment')) || (in_array($transaction_type, ['sell', 'sell_return']) && auth()->user()->can('edit_sell_payment')) ): ?>
                <button type="button" class="tw-dw-btn tw-dw-btn-xs tw-dw-btn-outline  tw-dw-btn-info btn-modal" data-href="<?php echo e(action([\App\Http\Controllers\TransactionPaymentController::class, 'edit'], [$payment->id]), false); ?>" data-container=".view_modal"><i class="fas fa-edit"></i> <?php echo e(__('messages.edit'), false); ?></button>
             <?php endif; ?>
        <?php endif; ?>

        <?php if((in_array($transaction_type, ['purchase', 'purchase_return']) && auth()->user()->can('delete_purchase_payment')) || (in_array($transaction_type, ['sell', 'sell_return']) && auth()->user()->can('delete_sell_payment')) || ((empty($transaction_type)|| $transaction_type=='opening_balance') && (auth()->user()->can('customer.create') || auth()->user()->can('customer.update') || auth()->user()->can('supplier.create') || auth()->user()->can('supplier.update') ) )): ?>
            <button type="button" class="tw-dw-btn tw-dw-btn-xs tw-dw-btn-outline  tw-dw-btn-error delete_payment" data-href="<?php echo e(action([\App\Http\Controllers\TransactionPaymentController::class, 'destroy'], [$payment->id]), false); ?>" > <i class="fas fa-trash"></i><?php echo e(__('messages.delete'), false); ?></button>
        <?php endif; ?>
    </td>
</tr><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/contact/partials/payment_row.blade.php ENDPATH**/ ?>