<div class="modal fade" id="update_purchase_status_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

		<?php echo Form::open(['url' => action([\App\Http\Controllers\PurchaseController::class, 'updateStatus']), 'method' => 'post', 'id' => 'update_purchase_status_form' ]); ?>


		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title"><?php echo app('translator')->get( 'lang_v1.update_status' ); ?></h4>
		</div>

		<div class="modal-body">
			<div class="form-group">
				<?php echo Form::label('status', __('purchase.purchase_status') . ':*'); ?> 
				<?php echo Form::select('status', $orderStatuses, null, ['class' => 'form-control', 'placeholder' => __('messages.please_select'), 'required']); ?>


				<?php echo Form::hidden('purchase_id', null, ['id' => 'purchase_id']); ?>

			</div>
		</div>

		<div class="modal-footer">
			<button type="submit" class="tw-dw-btn tw-dw-btn-primary tw-text-white"><?php echo app('translator')->get( 'messages.update' ); ?></button>
			<button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
		</div>

		<?php echo Form::close(); ?>


		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/purchase/partials/update_purchase_status_modal.blade.php ENDPATH**/ ?>