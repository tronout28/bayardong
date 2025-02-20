<div class="modal-dialog modal-xl" role="document">
	<div class="modal-content">
	<?php echo Form::open(['url' => action([\App\Http\Controllers\OpeningStockController::class, 'save']), 'method' => 'post', 'id' => 'add_opening_stock_form' ]); ?>

	<?php echo Form::hidden('product_id', $product->id); ?>

		<div class="modal-header">
		    <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      <h4 class="modal-title" id="modalTitle"><?php echo app('translator')->get('lang_v1.add_opening_stock'); ?></h4>
	    </div>
	    <div class="modal-body">
			<?php echo $__env->make('opening_stock.form-part', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>
		<div class="modal-footer">
			<button type="button" class="tw-dw-btn tw-dw-btn-primary tw-text-white" id="add_opening_stock_btn"><?php echo app('translator')->get('messages.save'); ?></button>
		    <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white no-print" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
		 </div>
	 <?php echo Form::close(); ?>

	</div>
</div>
<?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/opening_stock/ajax_add.blade.php ENDPATH**/ ?>