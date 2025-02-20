<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action([\App\Http\Controllers\AccountReportsController::class, 'postLinkAccount']), 'method' => 'post', 'id' => 'link_account_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->get( 'account.link_account' ); ?> - <?php echo app('translator')->get( 'account.payment_ref_no' ); ?>: - <?php echo e($payment->payment_ref_no, false); ?></h4>
    </div>

    <div class="modal-body">
        <div class="form-group">
            <?php echo Form::hidden('transaction_payment_id', $payment->id); ?>

            <?php echo Form::label('account_id', __( 'account.account' ) .":"); ?>

            <?php echo Form::select('account_id', $accounts, $payment->account_id, ['class' => 'form-control', 'required']); ?>

        </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="tw-dw-btn tw-dw-btn-primary tw-text-white"><?php echo app('translator')->get( 'messages.save' ); ?></button>
      <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/account_reports/link_account_modal.blade.php ENDPATH**/ ?>