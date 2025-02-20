<div class="row">
	<div class="col-sm-12">
		<?php $__empty_1 = true; $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
		<div class="box box-solid">
			<div class="box-header">
	            <h3 class="box-title"><?php echo app('translator')->get('sale.location'); ?>: <?php echo e($value, false); ?></h3>
	        </div>
			<div class="box-body">
				<div class="row tw-overflow-scroll">
					<div class="col-sm-12">
						<table class="table table-condensed table-bordered text-center table-responsive table-striped add_opening_stock_table">
								<thead>
								<tr class="bg-green">
									<th><?php echo app('translator')->get( 'product.product_name' ); ?></th>
									<th><?php echo app('translator')->get( 'lang_v1.quantity_left' ); ?></th>
									<th><?php echo app('translator')->get( 'purchase.unit_cost_before_tax' ); ?></th>
									<?php if($enable_expiry == 1 && $product->enable_stock == 1): ?>
										<th><?php echo app('translator')->get('lang_v1.expiry_date'); ?></th>
									<?php endif; ?>
									<?php if($enable_lot == 1): ?>
										<th><?php echo app('translator')->get( 'lang_v1.lot_number' ); ?></th>
									<?php endif; ?>
									<th><?php echo app('translator')->get( 'purchase.subtotal_before_tax' ); ?></th>
									<th><?php echo app('translator')->get( 'lang_v1.date' ); ?></th>
									<th><?php echo app('translator')->get( 'brand.note' ); ?></th>
									<th>&nbsp;</th>
								</tr>
								</thead>
								<tbody>
<?php
	$subtotal = 0;
?>
<?php $__currentLoopData = $product->variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php if(empty($purchases[$key][$variation->id])): ?>
		<?php
			$purchases[$key][$variation->id][] = ['quantity' => 0, 
			'purchase_price' => $variation->default_purchase_price,
			'purchase_line_id' => null,
			'lot_number' => null,
			'transaction_date' => null,
			'purchase_line_note' => null,
			'secondary_unit_quantity' => 0
			]
		?>
	<?php endif; ?>

<?php $__currentLoopData = $purchases[$key][$variation->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_key => $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php

	$purchase_line_id = $var['purchase_line_id'];

	$qty = $var['quantity'];

	$purcahse_price = $var['purchase_price'];

	$row_total = $qty * $purcahse_price;

	$subtotal += $row_total;
	$lot_number = $var['lot_number'];
	$transaction_date = $var['transaction_date'];
	$purchase_line_note = $var['purchase_line_note'];
	?>

<tr>
	<td>
		<?php echo e($product->name, false); ?> <?php if( $product->type == 'variable' ): ?> (<b><?php echo e($variation->product_variation->name, false); ?></b> : <?php echo e($variation->name, false); ?>) <?php endif; ?>

		<?php if(!empty($purchase_line_id)): ?>
			<?php echo Form::hidden('stocks[' . $key . '][' . $variation->id . '][' . $sub_key . '][purchase_line_id]', $purchase_line_id); ?>

		<?php endif; ?>
	</td>
	<td>
		<div class="input-group">
		  <?php echo Form::text('stocks[' . $key . '][' . $variation->id . '][' . $sub_key . '][quantity]', number_format($qty, session('business.quantity_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']) , ['class' => 'form-control input-sm input_number purchase_quantity input_quantity', 'required']); ?>

		  <span class="input-group-addon">
		    <?php echo e($product->unit->short_name, false); ?>

		  </span>
		</div>
		<?php if(!empty($product->second_unit)): ?>
			<br>
            <span>
            <?php echo app('translator')->get('lang_v1.quantity_in_second_unit', ['unit' => $product->second_unit->short_name]); ?>*:</span><br>
            <?php echo Form::text('stocks[' . $key . '][' . $variation->id . '][' . $sub_key . '][secondary_unit_quantity]', number_format($var['secondary_unit_quantity'], session('business.quantity_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']) , ['class' => 'form-control input-sm input_number input_quantity', 'required']); ?>

		<?php endif; ?>
	</td>
<td>
	<?php echo Form::text('stocks[' . $key . '][' . $variation->id . '][' . $sub_key . '][purchase_price]', number_format($purcahse_price, session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']) , ['class' => 'form-control input-sm input_number unit_price', 'required']); ?>

</td>

<?php if($enable_expiry == 1 && $product->enable_stock == 1): ?>
	<td>
		<?php echo Form::text('stocks[' . $key . '][' . $variation->id . '][' . $sub_key . '][exp_date]', !empty($var['exp_date']) ? \Carbon::createFromTimestamp(strtotime($var['exp_date']))->format(session('business.date_format')) : null , ['class' => 'form-control input-sm os_exp_date', 'readonly']); ?>

	</td>
<?php endif; ?>

<?php if($enable_lot == 1): ?>
	<td>
		<?php echo Form::text('stocks[' . $key . '][' . $variation->id . '][' . $sub_key . '][lot_number]', $lot_number , ['class' => 'form-control input-sm']); ?>

	</td>
<?php endif; ?>
	<td>
		<span class="row_subtotal_before_tax"><?php echo e(number_format($row_total, session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?></span>
	</td>
	<td>
		<div class="input-group date">
		<?php echo Form::text('stocks[' . $key . '][' . $variation->id . '][' . $sub_key . '][transaction_date]', $transaction_date , ['class' => 'form-control input-sm os_date', 'readonly']); ?>

		</div>
	</td>
	<td>
		<?php echo Form::textarea('stocks[' . $key . '][' . $variation->id . '][' . $sub_key . '][purchase_line_note]', $purchase_line_note , ['class' => 'form-control input-sm', 'rows' => 3 ]); ?>

	</td>
	<td>
		<?php if($loop->index == 0): ?>
			<button type="button" class="tw-dw-btn tw-dw-btn-xs tw-dw-btn-outline  tw-dw-btn-primary add_stock_row" data-sub-key="<?php echo e(count($purchases[$key][$variation->id]), false); ?>" 
				data-row-html='<tr>
					<td>
						<?php echo e($product->name, false); ?> <?php if( $product->type == "variable" ): ?> (<b><?php echo e($variation->product_variation->name, false); ?></b> : <?php echo e($variation->name, false); ?>) <?php endif; ?>
					</td>
					<td>
					<div class="input-group">
	              		<input class="form-control input-sm input_number purchase_quantity" required="" name="stocks[<?php echo e($key, false); ?>][<?php echo e($variation->id, false); ?>][__subkey__][quantity]" type="text" value="0">
			              <span class="input-group-addon">
			                <?php echo e($product->unit->short_name, false); ?>

			              </span>
	        			</div>
					</td>
	<td>
		<input class="form-control input-sm input_number unit_price" required="" name="stocks[<?php echo e($key, false); ?>][<?php echo e($variation->id, false); ?>][__subkey__][purchase_price]" type="text" value="<?php echo e(number_format($purcahse_price, session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>">
	</td>

	<?php if($enable_expiry == 1 && $product->enable_stock == 1): ?>
	<td>
		<input class="form-control input-sm os_exp_date" required="" name="stocks[<?php echo e($key, false); ?>][<?php echo e($variation->id, false); ?>][__subkey__][exp_date]" type="text" readonly>
	</td>
	<?php endif; ?>

	<?php if($enable_lot == 1): ?>
	<td>
		<input class="form-control input-sm" name="stocks[<?php echo e($key, false); ?>][<?php echo e($variation->id, false); ?>][__subkey__][lot_number]" type="text">
	</td>
	<?php endif; ?>
	<td>
		<span class="row_subtotal_before_tax">
			0.00
		</span>
	</td>
	<td>
		<div class="input-group date">
			<input class="form-control input-sm os_date" name="stocks[<?php echo e($key, false); ?>][<?php echo e($variation->id, false); ?>][__subkey__][transaction_date]" type="text" readonly>
		</div>
	</td>
	<td>
		<textarea rows="3" class="form-control input-sm" name="stocks[<?php echo e($key, false); ?>][<?php echo e($variation->id, false); ?>][__subkey__][purchase_line_note]"></textarea>
	</td>
	<td>&nbsp;</td></tr>'
	><i class="fa fa-plus"></i></button>
	<?php else: ?>
		&nbsp;
	<?php endif; ?>
			</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
								<tfoot>
								<tr>
									<td colspan="<?php if($enable_expiry == 1 && $product->enable_stock == 1 && $enable_lot == 1): ?> 5 <?php elseif(($enable_expiry == 1 && $product->enable_stock == 1) || $enable_lot == 1): ?> <?php else: ?> 3 <?php endif; ?>"></td>
									<td><strong><?php echo app('translator')->get( 'lang_v1.total_amount_exc_tax' ); ?>: </strong> <span id="total_subtotal"><?php echo e(number_format($subtotal, session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?></span>
									<input type="hidden" id="total_subtotal_hidden" value=0>
									</td>
								</tr>
								</tfoot>
						</table>
						
					</div>
				</div>
			</div>
		</div> <!--box end-->
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    		<h3><?php echo app('translator')->get( 'lang_v1.product_not_assigned_to_any_location' ); ?></h3>
		<?php endif; ?>
	</div>
</div><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/opening_stock/form-part.blade.php ENDPATH**/ ?>