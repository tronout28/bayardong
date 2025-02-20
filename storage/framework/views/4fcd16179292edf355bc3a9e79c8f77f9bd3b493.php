<style>
@media print {
  #scrollable-container {
    position: absolute;
  }
}
</style>

<div class="row" style="color: #000000 !important;">
		<?php if(empty($receipt_details->letter_head)): ?>
			<!-- Logo -->
			<?php if(!empty($receipt_details->logo)): ?>
				<img style="max-height: 120px; width: auto;" src="<?php echo e($receipt_details->logo, false); ?>" class="img img-responsive center-block">
			<?php endif; ?>

			<div class="col-md-12 col-sm-12 width-100">
				<!-- Header text -->
				<?php if(!empty($receipt_details->header_text)): ?>
					<?php echo $receipt_details->header_text; ?>

				<?php endif; ?>

				<!-- Shop & Location Name  -->
				<?php if(!empty($receipt_details->display_name)): ?>
					<h3 class="text-center" style="text-align: center; color: #000000 !important">
						<?php echo e($receipt_details->display_name, false); ?>

					</h3>
				<?php endif; ?>

				<!-- Sub heading -->
				<p class="text-center">
				<?php if(!empty($receipt_details->sub_heading_line1)): ?>
					<?php echo e($receipt_details->sub_heading_line1, false); ?>

				<?php endif; ?>
				<?php if(!empty($receipt_details->sub_heading_line2)): ?>
					<br><?php echo e($receipt_details->sub_heading_line2, false); ?>

				<?php endif; ?>
				<?php if(!empty($receipt_details->sub_heading_line3)): ?>
					<br><?php echo e($receipt_details->sub_heading_line3, false); ?>

				<?php endif; ?>
				<?php if(!empty($receipt_details->sub_heading_line4)): ?>
					<br><?php echo e($receipt_details->sub_heading_line4, false); ?>

				<?php endif; ?>		
				<?php if(!empty($receipt_details->sub_heading_line5)): ?>
					<br><?php echo e($receipt_details->sub_heading_line5, false); ?>

				<?php endif; ?>
				</p>
			</div>
		<?php else: ?>
			<div class="col-md-12 col-sm-12 width-100 text-center">
				<img style="max-width: 100%; height:auto; margin-bottom: 10px;" src="<?php echo e($receipt_details->letter_head, false); ?>">
			</div>
		<?php endif; ?>

		<!-- Title of receipt -->
		<div class="col-md-12 col-sm-12 width-100 text-center">
		<?php if(!empty($receipt_details->invoice_heading)): ?>
			<h2 class="text-center" style="text-align: center; color: #000000 !important">
				<?php echo $receipt_details->invoice_heading; ?>

			</h2>
		<?php endif; ?>
		</div>

	<div class="col-md-12 col-sm-12 width-100 text-center">
		<!-- Invoice  number, Date  -->
			<div class="col-md-6 col-sm-6 col-xs-6 align-left text-left width-50 f-left word-wrap">
				<?php if(!empty($receipt_details->invoice_no_prefix)): ?>
					<strong><?php echo $receipt_details->invoice_no_prefix; ?></strong>
				<?php endif; ?>
				<?php echo e($receipt_details->invoice_no, false); ?>


				<?php if(!empty($receipt_details->types_of_service)): ?>
					<br/>
					<span class="pull-left text-left">
						<strong><?php echo $receipt_details->types_of_service_label; ?>:</strong>
						<?php echo e($receipt_details->types_of_service, false); ?>

						<!-- Waiter info -->
						<?php if(!empty($receipt_details->types_of_service_custom_fields)): ?>
							<?php $__currentLoopData = $receipt_details->types_of_service_custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<br><strong><?php echo e($key, false); ?>: </strong> <?php echo e($value, false); ?>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>
					</span>
				<?php endif; ?>

				<!-- Table information-->
		        <?php if(!empty($receipt_details->table_label) || !empty($receipt_details->table)): ?>
		        	<br/>
					<span class="pull-left text-left">
						<?php if(!empty($receipt_details->table_label)): ?>
							<strong><?php echo $receipt_details->table_label; ?></strong>
						<?php endif; ?>
						<?php echo e($receipt_details->table, false); ?>

					</span>
		        <?php endif; ?>

				<!-- customer info -->
				<?php if(!empty($receipt_details->customer_info)): ?>
					<br/>
					<strong><?php echo e($receipt_details->customer_label, false); ?></strong> <?php echo $receipt_details->customer_info; ?> <br>
				<?php endif; ?>
				<?php if(!empty($receipt_details->client_id_label)): ?>
					<br/>
					<strong><?php echo e($receipt_details->client_id_label, false); ?></strong> <?php echo e($receipt_details->client_id, false); ?>

				<?php endif; ?>
				<?php if(!empty($receipt_details->customer_tax_label)): ?>
					<br/>
					<strong><?php echo e($receipt_details->customer_tax_label, false); ?></strong> <?php echo e($receipt_details->customer_tax_number, false); ?>

				<?php endif; ?>
				<?php if(!empty($receipt_details->customer_custom_fields)): ?>
					<br/><?php echo $receipt_details->customer_custom_fields; ?>

				<?php endif; ?>
				<?php if(!empty($receipt_details->sales_person_label)): ?>
					<br/>
					<strong><?php echo e($receipt_details->sales_person_label, false); ?></strong> <?php echo e($receipt_details->sales_person, false); ?>

				<?php endif; ?>
				<?php if(!empty($receipt_details->commission_agent_label)): ?>
					<br/>
					<strong><?php echo e($receipt_details->commission_agent_label, false); ?></strong> <?php echo e($receipt_details->commission_agent, false); ?>

				<?php endif; ?>
				<?php if(!empty($receipt_details->customer_rp_label)): ?>
					<br/>
					<strong><?php echo e($receipt_details->customer_rp_label, false); ?></strong> <?php echo e($receipt_details->customer_total_rp, false); ?>

				<?php endif; ?>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-6 align-right text-right width-50 f-right word-wrap">
				<strong><?php echo e($receipt_details->date_label, false); ?></strong> <?php echo e($receipt_details->invoice_date, false); ?>


				<?php if(!empty($receipt_details->due_date_label)): ?>
				<br><strong><?php echo e($receipt_details->due_date_label, false); ?></strong> <?php echo e($receipt_details->due_date ?? '', false); ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->brand_label) || !empty($receipt_details->repair_brand)): ?>
					<br>
					<?php if(!empty($receipt_details->brand_label)): ?>
						<strong><?php echo $receipt_details->brand_label; ?></strong>
					<?php endif; ?>
					<?php echo e($receipt_details->repair_brand, false); ?>

		        <?php endif; ?>


		        <?php if(!empty($receipt_details->device_label) || !empty($receipt_details->repair_device)): ?>
					<br>
					<?php if(!empty($receipt_details->device_label)): ?>
						<strong><?php echo $receipt_details->device_label; ?></strong>
					<?php endif; ?>
					<?php echo e($receipt_details->repair_device, false); ?>

		        <?php endif; ?>

				<?php if(!empty($receipt_details->model_no_label) || !empty($receipt_details->repair_model_no)): ?>
					<br>
					<?php if(!empty($receipt_details->model_no_label)): ?>
						<strong><?php echo $receipt_details->model_no_label; ?></strong>
					<?php endif; ?>
					<?php echo e($receipt_details->repair_model_no, false); ?>

		        <?php endif; ?>

				<?php if(!empty($receipt_details->serial_no_label) || !empty($receipt_details->repair_serial_no)): ?>
					<br>
					<?php if(!empty($receipt_details->serial_no_label)): ?>
						<strong><?php echo $receipt_details->serial_no_label; ?></strong>
					<?php endif; ?>
					<?php echo e($receipt_details->repair_serial_no, false); ?><br>
		        <?php endif; ?>
				<?php if(!empty($receipt_details->repair_status_label) || !empty($receipt_details->repair_status)): ?>
					<?php if(!empty($receipt_details->repair_status_label)): ?>
						<strong><?php echo $receipt_details->repair_status_label; ?></strong>
					<?php endif; ?>
					<?php echo e($receipt_details->repair_status, false); ?><br>
		        <?php endif; ?>
		        
		        <?php if(!empty($receipt_details->repair_warranty_label) || !empty($receipt_details->repair_warranty)): ?>
					<?php if(!empty($receipt_details->repair_warranty_label)): ?>
						<strong><?php echo $receipt_details->repair_warranty_label; ?></strong>
					<?php endif; ?>
					<?php echo e($receipt_details->repair_warranty, false); ?>

					<br>
		        <?php endif; ?>
		        
				<!-- Waiter info -->
				<?php if(!empty($receipt_details->service_staff_label) || !empty($receipt_details->service_staff)): ?>
		        	<br/>
					<?php if(!empty($receipt_details->service_staff_label)): ?>
						<strong><?php echo $receipt_details->service_staff_label; ?></strong>
					<?php endif; ?>
					<?php echo e($receipt_details->service_staff, false); ?>

		        <?php endif; ?>
		        <?php if(!empty($receipt_details->shipping_custom_field_1_label)): ?>
					<br><strong><?php echo $receipt_details->shipping_custom_field_1_label; ?> :</strong> <?php echo $receipt_details->shipping_custom_field_1_value ?? ''; ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->shipping_custom_field_2_label)): ?>
					<br><strong><?php echo $receipt_details->shipping_custom_field_2_label; ?>:</strong> <?php echo $receipt_details->shipping_custom_field_2_value ?? ''; ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->shipping_custom_field_3_label)): ?>
					<br><strong><?php echo $receipt_details->shipping_custom_field_3_label; ?>:</strong> <?php echo $receipt_details->shipping_custom_field_3_value ?? ''; ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->shipping_custom_field_4_label)): ?>
					<br><strong><?php echo $receipt_details->shipping_custom_field_4_label; ?>:</strong> <?php echo $receipt_details->shipping_custom_field_4_value ?? ''; ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->shipping_custom_field_5_label)): ?>
					<br><strong><?php echo $receipt_details->shipping_custom_field_2_label; ?>:</strong> <?php echo $receipt_details->shipping_custom_field_5_value ?? ''; ?>

				<?php endif; ?>
				
				<?php if(!empty($receipt_details->sale_orders_invoice_no)): ?>
					<br>
					<strong><?php echo app('translator')->get('restaurant.order_no'); ?>:</strong> <?php echo $receipt_details->sale_orders_invoice_no ?? ''; ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->sale_orders_invoice_date)): ?>
					<br>
					<strong><?php echo app('translator')->get('lang_v1.order_dates'); ?>:</strong> <?php echo $receipt_details->sale_orders_invoice_date ?? ''; ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->sell_custom_field_1_value)): ?>
					<br>
					<strong><?php echo e($receipt_details->sell_custom_field_1_label, false); ?>:</strong> <?php echo $receipt_details->sell_custom_field_1_value ?? ''; ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->sell_custom_field_2_value)): ?>
					<br>
					<strong><?php echo e($receipt_details->sell_custom_field_2_label, false); ?>:</strong> <?php echo $receipt_details->sell_custom_field_2_value ?? ''; ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->sell_custom_field_3_value)): ?>
					<br>
					<strong><?php echo e($receipt_details->sell_custom_field_3_label, false); ?>:</strong> <?php echo $receipt_details->sell_custom_field_3_value ?? ''; ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->sell_custom_field_4_value)): ?>
					<br>
					<strong><?php echo e($receipt_details->sell_custom_field_4_label, false); ?>:</strong> <?php echo $receipt_details->sell_custom_field_4_value ?? ''; ?>

				<?php endif; ?>

			</div>
	</div>
</div>

<div class="row" style="color: #000000 !important;">
	<?php if ($__env->exists('sale_pos.receipts.partial.common_repair_invoice')) echo $__env->make('sale_pos.receipts.partial.common_repair_invoice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<div class="row" style="color: #000000 !important;">
	<div class="col-md-12 col-sm-12 width-100">
		<br/>
		<?php
			$p_width = 64;
		?>
		<?php if(!empty($receipt_details->item_discount_label)): ?>
			<?php
				$p_width -= 10;
			?>
		<?php endif; ?>
		<?php if(!empty($receipt_details->discounted_unit_price_label)): ?>
			<?php
				$p_width -= 10;
			?>
		<?php endif; ?>
		<div class="table-responsive">
		<table class="table table-bordered" style="border: 1px solid #000 !important">
			<thead>
				<tr>
					<th style="width: 4%; border: 1px solid #000 !important" class="text-center">TT</td>
					<th style="width: <?php echo e($p_width, false); ?>%; border: 1px solid #000 !important" class="text-center"><?php echo e($receipt_details->table_product_label, false); ?></td>
					<th style="width: 8%; border: 1px solid #000 !important" class="text-center"><?php echo e($receipt_details->table_qty_label, false); ?></td>
					<th style="width: 10; border: 1px solid #000 !important" class="text-center"><?php echo e($receipt_details->table_unit_price_label, false); ?></td>
					<?php if(!empty($receipt_details->item_discount_label)): ?>
						<th style="width: 10%; border: 1px solid #000 !important" class="text-center"><?php echo e($receipt_details->item_discount_label, false); ?></td>
					<?php endif; ?>
					<?php if(!empty($receipt_details->discounted_unit_price_label)): ?>
						<th style="width: 10%; border: 1px solid #000 !important" class="text-center"><?php echo e($receipt_details->discounted_unit_price_label, false); ?></td>
					<?php endif; ?>
					<th style="width: 14%; border: 1px solid #000 !important" class="text-center"><?php echo e($receipt_details->table_subtotal_label, false); ?></td>
				</tr>
			</thead>
			<tbody>
				<?php $__empty_1 = true; $__currentLoopData = $receipt_details->lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
					<tr>
						<td style="border: 1px solid #000 !important"><?php echo e($loop->iteration, false); ?></td>
						<td style="border: 1px solid #000 !important">
							<?php if(!empty($line['image'])): ?>
								<img src="<?php echo e($line['image'], false); ?>" alt="Product image" class="product-thumbnail-small" style="float: left; margin-right: 8px;">
							<?php endif; ?>
                            <?php echo e($line['name'], false); ?> <?php echo e($line['product_variation'], false); ?> <?php echo e($line['variation'], false); ?> 
                            <?php if(!empty($line['sub_sku'])): ?><br><?php echo app('translator')->get('product.sku'); ?>: <?php echo e($line['sub_sku'], false); ?> <?php endif; ?>
							<?php if(!empty($line['brand'])): ?>, <?php echo app('translator')->get('product.brand'); ?>: <?php echo e($line['brand'], false); ?> <?php endif; ?>
							<?php if(!empty($line['cat_code'])): ?>, <?php echo e($line['cat_code'], false); ?><?php endif; ?>
                            <?php if(!empty($line['product_custom_fields'])): ?>, <?php echo e($line['product_custom_fields'], false); ?> <?php endif; ?>
                            <?php if(!empty($line['product_description'])): ?><br><?php echo app('translator')->get('lang_v1.description'); ?>: <?php echo e($line['product_description'], false); ?> <?php endif; ?>
                            <?php if(!empty($line['sell_line_note'])): ?><br><?php echo app('translator')->get('brand.note'); ?>: <?php echo e($line['sell_line_note'], false); ?> <?php endif; ?>
                            <?php if(!empty($line['lot_number'])): ?><br><?php echo e($line['lot_number_label'], false); ?>: <?php echo e($line['lot_number'], false); ?> <?php endif; ?> 
                            <?php if(!empty($line['product_expiry'])): ?>, <?php echo e($line['product_expiry_label'], false); ?>: <?php echo e($line['product_expiry'], false); ?> <?php endif; ?>

                            <?php if(!empty($line['warranty_name'])): ?><br><small><?php echo e($line['warranty_name'], false); ?></small><?php endif; ?>
							<?php if(!empty($line['warranty_description'])): ?><small>( <?php echo e($line['warranty_description'], false); ?> )</small><?php endif; ?>
							<?php if(!empty($line['warranty_exp_date'])): ?><small>- <?php echo app('translator')->get('lang_v1.to'); ?>: <?php echo e(\Carbon::createFromTimestamp(strtotime($line['warranty_exp_date']))->format(session('business.date_format')), false); ?></small><?php endif; ?>

                            <?php if($receipt_details->show_base_unit_details && $line['quantity'] && $line['base_unit_multiplier'] !== 1): ?>
                            <br><small>
                            	1 <?php echo e($line['units'], false); ?> = <?php echo e($line['base_unit_multiplier'], false); ?> <?php echo e($line['base_unit_name'], false); ?> <br>
                            	<?php echo e($line['base_unit_price'], false); ?> x <?php echo e($line['orig_quantity'], false); ?> = <?php echo e($line['line_total'], false); ?>

                            </small>
                            <?php endif; ?>
                        </td>
						<td style="border: 1px solid #000 !important">
							<?php echo e($line['quantity'], false); ?> <?php echo e($line['units'], false); ?> 

							<?php if($receipt_details->show_base_unit_details && $line['quantity'] && $line['base_unit_multiplier'] !== 1): ?>
                            <br><small>
                            	<?php echo e($line['quantity'], false); ?> x <?php echo e($line['base_unit_multiplier'], false); ?> = <?php echo e($line['orig_quantity'], false); ?> <?php echo e($line['base_unit_name'], false); ?>

                            </small>
                            <?php endif; ?>
						</td>
						<td class="ws-nowrap align-right" style="border: 1px solid #000 !important"><?php echo e($line['unit_price_before_discount'], false); ?></td>
						<?php if(!empty($receipt_details->item_discount_label)): ?>
							<td class="ws-nowrap align-right" style="border: 1px solid #000 !important">
								<?php echo e($line['total_line_discount'] ?? '0', false); ?>


								<?php if(!empty($line['line_discount_percent'])): ?>
								 	<br>(<?php echo e($line['line_discount_percent'], false); ?> %)
								<?php endif; ?>
							</td>
						<?php endif; ?>
						<?php if(!empty($receipt_details->discounted_unit_price_label)): ?>
							<td class="ws-nowrap align-right" style="border: 1px solid #000 !important">
								<?php echo e($line['unit_price_inc_tax'], false); ?> 
							</td>
						<?php endif; ?>
						<td class="ws-nowrap align-right" style="border: 1px solid #000 !important"><?php echo e($line['line_total'], false); ?></td>
					</tr>
					<?php if(!empty($line['modifiers'])): ?>
						<?php $__currentLoopData = $line['modifiers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modifier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td style="border: 1px solid #000 !important">&nbsp;</td>
								<td style="border: 1px solid #000 !important">
		                            <?php echo e($modifier['name'], false); ?> <?php echo e($modifier['variation'], false); ?> 
		                            <?php if(!empty($modifier['sub_sku'])): ?><br><?php echo app('translator')->get('product.sku'); ?>: <?php echo e($modifier['sub_sku'], false); ?> <?php endif; ?> <?php if(!empty($modifier['cat_code'])): ?>, <?php echo e($modifier['cat_code'], false); ?><?php endif; ?>
		                            <?php if(!empty($modifier['sell_line_note'])): ?><br><?php echo app('translator')->get('brand.note'); ?>: <?php echo e($modifier['sell_line_note'], false); ?> <?php endif; ?> 
		                        </td>
								<td style="border: 1px solid #000 !important"><?php echo e($modifier['quantity'], false); ?> <?php echo e($modifier['units'], false); ?> </td>
								<td class="ws-nowrap align-right" style="border: 1px solid #000 !important"><?php echo e($modifier['unit_price_inc_tax'], false); ?></td>
								<?php if(!empty($receipt_details->item_discount_label)): ?>
									<td class="ws-nowrap align-right" style="border: 1px solid #000 !important">0</td>
								<?php endif; ?>
								<?php if(!empty($receipt_details->discounted_unit_price_label)): ?>
									<td class="ws-nowrap align-right" style="border: 1px solid #000 !important"><?php echo e($modifier['unit_price_exc_tax'], false); ?></td>
								<?php endif; ?>
								<td class="ws-nowrap align-right" style="border: 1px solid #000 !important"><?php echo e($modifier['line_total'], false); ?></td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
					<tr>
						<td style="border: 1px solid #000 !important" colspan="5">&nbsp;</td>
						<?php if(!empty($receipt_details->item_discount_label)): ?>
    					<td style="border: 1px solid #000 !important"></td>
    					<?php endif; ?>
    					<?php if(!empty($receipt_details->discounted_unit_price_label)): ?>
    					<td style="border: 1px solid #000 !important"></td>
    					<?php endif; ?>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
		</div>
	</div>
</div>

<div class="row" style="color: #000000 !important;">
	<div class="col-md-6 col-sm-6 col-xs-6 width-50 f-left">
		<table class="table table-slim">

			<?php if(!empty($receipt_details->payments)): ?>
				<?php $__currentLoopData = $receipt_details->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($payment['method'], false); ?></td>
						<td class="align-right" ><?php echo e($payment['amount'], false); ?></td>
						<td class="align-right"><?php echo e($payment['date'], false); ?></td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>

			<!-- Total Paid-->
			<?php if(!empty($receipt_details->total_paid)): ?>
				<tr>
					<td style="font-weight:bold">
						<?php echo $receipt_details->total_paid_label; ?>

					</td>
					<td class="align-right">
						<?php echo e($receipt_details->total_paid, false); ?>

					</td>
				</tr>
			<?php endif; ?>

			<!-- Total Due-->
			<?php if(!empty($receipt_details->total_due) && !empty($receipt_details->total_due_label)): ?>
			<tr>
				<td style="font-weight:bold">
					<?php echo $receipt_details->total_due_label; ?>

				</td>
				<td class="align-right">
					<?php echo e($receipt_details->total_due, false); ?>

				</td>
			</tr>
			<?php endif; ?>

			<?php if(!empty($receipt_details->all_due)): ?>
			<tr>
				<td style="font-weight:bold">
					<?php echo $receipt_details->all_bal_label; ?>

				</td>
				<td class="align-right">
					<?php echo e($receipt_details->all_due, false); ?>

				</td>
			</tr>
			<?php endif; ?>
		</table>
	</div>

	<div class="col-md-6 col-sm-6 col-xs-6 width-50 f-left">
        <table class="table table-slim">
					<!-- Total quantity -->
					<?php if(!empty($receipt_details->total_quantity_label)): ?>
						<tr>
							<td style="width:60%; font-weight:bold">
								<?php echo $receipt_details->total_quantity_label; ?>

							</td>
							<td class="align-right">
								<?php echo e($receipt_details->total_quantity, false); ?>

							</td>
						</tr>
					<?php endif; ?>

					<!-- Total items -->
					<?php if(!empty($receipt_details->total_items_label)): ?>
						<tr>
							<td style="width:60%; font-weight:bold">
								<?php echo $receipt_details->total_items_label; ?>

							</td>
							<td class="align-right">
								<?php echo e($receipt_details->total_items, false); ?>

							</td>
						</tr>
					<?php endif; ?>
					
					<!-- Subtotal -->
					<tr>
						<td style="width:60%; font-weight:bold">
							<?php echo $receipt_details->subtotal_label; ?>

						</td>
						<td class="align-right">
							<?php echo e($receipt_details->subtotal, false); ?>

						</td>
					</tr>
					
					<?php if(!empty($receipt_details->total_exempt_uf)): ?>
					<tr>
						<td style="width:60%; font-weight:bold">
							<?php echo app('translator')->get('lang_v1.exempt'); ?>
						</td>
						<td class="align-right">
							<?php echo e($receipt_details->total_exempt, false); ?>

						</td>
					</tr>
					<?php endif; ?>

					<!-- Discount -->
					<?php if( !empty($receipt_details->discount) ): ?>
						<tr>
							<td style="width:60%; font-weight:bold">
								<?php echo $receipt_details->discount_label; ?>

							</td>
							<td class="align-right">
								(-) <?php echo e($receipt_details->discount, false); ?>

							</td>
						</tr>
					<?php endif; ?>
					
					<!-- Shipping Charges -->
					<?php if(!empty($receipt_details->shipping_charges)): ?>
						<tr>
							<td style="width:60%; font-weight:bold">
								<?php echo $receipt_details->shipping_charges_label; ?>

							</td>
							<td class="align-right">
								(+) <?php echo e($receipt_details->shipping_charges, false); ?>

							</td>
						</tr>
					<?php endif; ?>

					<!-- Packing Charges -->
					<?php if(!empty($receipt_details->packing_charge)): ?>
						<tr>
							<td style="width:60%; font-weight:bold">
								<?php echo $receipt_details->packing_charge_label; ?>

							</td>
							<td class="align-right">
								(+) <?php echo e($receipt_details->packing_charge, false); ?>

							</td>
						</tr>
					<?php endif; ?>
					
					<!-- Expenses -->
					<?php if( !empty($receipt_details->additional_expenses) ): ?>
						<?php $__currentLoopData = $receipt_details->additional_expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td style="width:60%; font-weight:bold">
									<?php echo e($key, false); ?>:
								</td>
								<td class="align-right">
									(+) <?php echo e($val, false); ?>

								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>

					<!-- Reward point -->
					<?php if( !empty($receipt_details->reward_point_label) ): ?>
						<tr>
							<td style="width:60%; font-weight:bold">
								<?php echo $receipt_details->reward_point_label; ?>

							</td>
							<td class="align-right">
								(-) <?php echo e($receipt_details->reward_point_amount, false); ?>

							</td>
						</tr>
					<?php endif; ?>

					<!-- Tax -->
					<?php if( !empty($receipt_details->tax) ): ?>
						<tr>
							<td style="width:60%; font-weight:bold">
								<?php echo $receipt_details->tax_label; ?>

							</td>
							<td class="align-right">
								(+) <?php echo e($receipt_details->tax, false); ?>

							</td>
						</tr>
					<?php endif; ?>

					<!-- Round off -->
					<?php if( $receipt_details->round_off_amount > 0): ?>
						<tr>
							<td style="width:60%; font-weight:bold">
								<?php echo $receipt_details->round_off_label; ?>

							</td>
							<td class="align-right">
								<?php echo e($receipt_details->round_off, false); ?>

							</td>
						</tr>
					<?php endif; ?>

					<!-- Total -->
					<tr>
						<td style="width:60%; font-weight:bold">
							<?php echo $receipt_details->total_label; ?>

						</td>
						<td class="align-right">
							<?php echo e($receipt_details->total, false); ?>

						</td>
					</tr>
					<?php if(!empty($receipt_details->total_in_words)): ?>
						<tr>
							<td colspan="2"><strong>Bằng chữ:</strong> <?php echo e(ucfirst($receipt_details->total_in_words), false); ?></td>
						</tr>
					<?php endif; ?>

			<!-- tax -->
			<?php if(empty($receipt_details->hide_price) && !empty($receipt_details->tax_summary_label) && !empty($receipt_details->taxes)): ?>
				<tr>
	        		<th colspan="2" class="text-center"><br><?php echo e($receipt_details->tax_summary_label, false); ?></th>
	        	</tr>
	        	<?php $__currentLoopData = $receipt_details->taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        		<tr>
	        			<td style="width:60%"><strong><?php echo e($key, false); ?></strong></td>
	        			<td class="align-right"><?php echo e($val, false); ?></td>
	        		</tr>
	        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>
        </table>
    </div>

	<?php if(!empty($receipt_details->additional_notes)): ?>
	    <div class="col-md-12 col-sm-12 width-100">
	    	<p><strong><?php echo app('translator')->get('sale.sell_note'); ?>: </strong><?php echo nl2br($receipt_details->additional_notes); ?></p>
	    </div>
    <?php endif; ?>
</div>

<div class="row" style="color: #000000 !important;">
	<div class="col-md-6 col-sm-6 col-xs-6 width-50 f-left">
		<p class="text-center" style="text-align: center; color: #000000 !important"><strong><?php echo app('translator')->get('lang_v1.customers'); ?></strong></p>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-6 width-50 f-left">
		<p class="text-center" style="text-align: center; color: #000000 !important"><strong>AnToanHome</strong></p>
	</div>
</div>

<div class="row" style="color: #000000 !important;">
	<?php if(!empty($receipt_details->footer_text)): ?>
	<div class="<?php if($receipt_details->show_barcode || $receipt_details->show_qr_code): ?> col-xs-8 <?php else: ?> col-xs-12 <?php endif; ?>">
		<?php echo $receipt_details->footer_text; ?>

	</div>
	<?php endif; ?>
	<?php if($receipt_details->show_barcode || $receipt_details->show_qr_code): ?>
		<div class="<?php if(!empty($receipt_details->footer_text)): ?> col-xs-4 <?php else: ?> col-xs-12 <?php endif; ?> text-center">
			<?php if($receipt_details->show_barcode): ?>
				
				<img class="center-block" src="data:image/png;base64,<?php echo e(DNS1D::getBarcodePNG($receipt_details->invoice_no, 'C128', 2,30,array(39, 48, 54), true), false); ?>">
			<?php endif; ?>
			
			<?php if($receipt_details->show_qr_code && !empty($receipt_details->qr_code_text)): ?>
				<img class="center-block mt-5" src="data:image/png;base64,<?php echo e(DNS2D::getBarcodePNG($receipt_details->qr_code_text, 'QRCODE', 3, 3, [39, 48, 54]), false); ?>">
			<?php endif; ?>
		</div>
	<?php endif; ?>
</div><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/sale_pos/receipts/classic.blade.php ENDPATH**/ ?>