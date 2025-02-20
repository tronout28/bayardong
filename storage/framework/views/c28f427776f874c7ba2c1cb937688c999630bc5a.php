<a href="<?php echo e(action([\App\Http\Controllers\TransactionPaymentController::class, 'show'], [$id]), false); ?>" class="view_payment_modal payment-status-label tw-dw-btn tw-dw-btn-xs tw-dw-btn-outline <?php if($payment_status == 'partial'){
                echo 'tw-dw-btn-info';
            }elseif($payment_status == 'due'){
                echo 'tw-dw-btn-primary';
            }elseif ($payment_status == 'paid') {
                echo 'tw-dw-btn-success';
            }elseif ($payment_status == 'overdue') {
                echo 'tw-dw-btn-error';
            }elseif ($payment_status == 'partial-overdue') {
                echo 'tw-dw-btn-error';
            }?>" data-orig-value="<?php echo e($payment_status, false); ?>" data-status-name="<?php echo e(__('lang_v1.' . $payment_status), false); ?>">
	<?php echo e(__('lang_v1.' . $payment_status), false); ?>

</a><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/sell/partials/payment_status.blade.php ENDPATH**/ ?>