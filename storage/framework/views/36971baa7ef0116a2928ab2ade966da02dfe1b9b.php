<?php
	$subtype = '';
?>
<?php if(!empty($transaction_sub_type)): ?>
	<?php
		$subtype = '?sub_type='.$transaction_sub_type;
	?>
<?php endif; ?>

<?php if(!empty($transactions)): ?>
	<table class="table">
		<?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr class="cursor-pointer" 
	    		title="Customer: <?php echo e($transaction->contact?->name, false); ?> 
		    		<?php if(!empty($transaction->contact->mobile) && $transaction->contact->is_default == 0): ?>
		    			<br/>Mobile: <?php echo e($transaction->contact->mobile, false); ?>

		    		<?php endif; ?>
	    		" >
				<td>
					<?php echo e($loop->iteration, false); ?>.
				</td>
				<td class="col-md-4">
					<?php echo e($transaction->invoice_no, false); ?> (<?php echo e($transaction->contact?->name, false); ?>)
					<?php if(!empty($transaction->table)): ?>
						- <?php echo e($transaction->table->name, false); ?>

					<?php endif; ?>
				</td>
				<td class="display_currency col-md-2">
					<?php echo e($transaction->final_total, false); ?>

				</td>
				<td class="col-md-6 tw-flex tw-flex-col md:tw-flex-row tw-space-x-0 md:tw-space-x-2 tw-space-y-1 md:tw-space-y-0">
					<?php if(auth()->user()->can('sell.update') || auth()->user()->can('direct_sell.update')): ?>
					<a href="<?php echo e(action([\App\Http\Controllers\SellPosController::class, 'edit'], [$transaction->id]).$subtype, false); ?>" class="tw-dw-btn tw-dw-btn-outline tw-dw-btn-info">
	    				<i class="fas fa-pen text-muted" aria-hidden="true" title="<?php echo e(__('lang_v1.click_to_edit'), false); ?>"></i>
                        <?php echo app('translator')->get('messages.edit'); ?>
	    			</a>
	    			<?php endif; ?>

					<?php if(!auth()->user()->can('sell.update') && auth()->user()->can('edit_pos_payment')): ?>
						<a href="<?php echo e(route('edit-pos-payment', ['id' => $transaction->id]), false); ?>" 
						title="<?php echo app('translator')->get('lang_v1.add_edit_payment'); ?>" class="tw-dw-btn tw-dw-btn-outline tw-dw-btn-info">
						    <i class="fas fa-money-bill-alt text-muted"></i>
						</a>
					<?php endif; ?>

	    			<a href="<?php echo e(action([\App\Http\Controllers\SellPosController::class, 'printInvoice'], [$transaction->id]), false); ?>" class="print-invoice-link tw-dw-btn tw-dw-btn-outline tw-dw-btn-success">
	    				<i class="fa fa-print text-muted" aria-hidden="true" title="<?php echo e(__('lang_v1.click_to_print'), false); ?>"></i>
                        <?php echo app('translator')->get('messages.print'); ?>
	    			</a>

                    <?php if(auth()->user()->can('sell.delete') || auth()->user()->can('direct_sell.delete')): ?>
	    			    <a href="<?php echo e(action([\App\Http\Controllers\SellPosController::class, 'destroy'], [$transaction->id]), false); ?>" class="delete-sale tw-dw-btn tw-dw-btn-outline tw-dw-btn-error">
                            <i class="fa fa-trash text-danger" title="<?php echo e(__('lang_v1.click_to_delete'), false); ?>"></i>
                            <?php echo app('translator')->get('messages.delete'); ?>
                        </a>
	    			<?php endif; ?>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</table>
<?php else: ?>
	<p><?php echo app('translator')->get('sale.no_recent_transactions'); ?></p>
<?php endif; ?><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/sale_pos/partials/recent_transactions.blade.php ENDPATH**/ ?>