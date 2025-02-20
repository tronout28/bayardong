<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
		    <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      <h4 class="modal-title" id="modalTitle"><?php echo e($product->name, false); ?></h4>
	    </div>
	    <div class="modal-body">
      		<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table bg-gray">
							<tr class="bg-green">
								<?php if($product->type == 'variable'): ?>
									<th><?php echo app('translator')->get('product.variations'); ?></th>
								<?php endif; ?>
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access_default_selling_price')): ?>
							        <th><?php echo app('translator')->get('product.default_selling_price'); ?> (<?php echo app('translator')->get('product.inc_of_tax'); ?>)</th>
						        <?php endif; ?>
						        <?php if(!empty($allowed_group_prices)): ?>
						        	<th><?php echo app('translator')->get('lang_v1.group_prices'); ?></th>
						        <?php endif; ?>
							</tr>
							<?php $__currentLoopData = $product->variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<?php if($product->type == 'variable'): ?>
									<td>
										<?php echo e($variation->product_variation->name, false); ?> - <?php echo e($variation->name, false); ?>

									</td>
								<?php endif; ?>
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access_default_selling_price')): ?>
									<td>
										<span class="display_currency" data-currency_symbol="true"><?php echo e($variation->sell_price_inc_tax, false); ?></span>
									</td>
								<?php endif; ?>
								<?php if(!empty($allowed_group_prices)): ?>
						        	<td class="td-full-width">
						        		<?php $__currentLoopData = $allowed_group_prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						        			<strong><?php echo e($value, false); ?></strong> - <?php if(!empty($group_price_details[$variation->id][$key])): ?>
						        				<span class="display_currency" data-currency_symbol="true"><?php echo e($group_price_details[$variation->id][$key], false); ?></span>
						        			<?php else: ?>
						        				0
						        			<?php endif; ?>
						        			<br>
						        		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						        	</td>
						        <?php endif; ?>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</table>
					</div>
				</div>
			</div>
      	</div>
      	<div class="modal-footer">
	      	<button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white no-print" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
	    </div>
	</div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    var element = $('div.view_modal');
    __currency_convert_recursively(element);
  });
</script>
<?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/product/view-product-group-prices.blade.php ENDPATH**/ ?>