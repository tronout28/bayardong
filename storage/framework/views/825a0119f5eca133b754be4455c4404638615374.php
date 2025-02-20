<table style="width:100%;">
	<thead>
		<tr>
			<td>
				<p class="text-right">
					<small class="text-muted-imp">
						<?php if(!empty($receipt_details->invoice_no_prefix)): ?>
							<?php echo $receipt_details->invoice_no_prefix; ?>

						<?php endif; ?>

						<?php echo e($receipt_details->invoice_no, false); ?>

					</small>
				</p>
			</td>
		</tr>
	</thead>

	<tbody>
		<tr>
				<td class="text-center" style="line-height: 15px !important; padding-bottom: 10px !important">
					<?php if(empty($receipt_details->letter_head)): ?>
						<?php if(!empty($receipt_details->header_text)): ?>
							<?php echo $receipt_details->header_text; ?>

						<?php endif; ?>

						<?php
							$sub_headings = implode('<br/>', array_filter([$receipt_details->sub_heading_line1, $receipt_details->sub_heading_line2, $receipt_details->sub_heading_line3, $receipt_details->sub_heading_line4, $receipt_details->sub_heading_line5]));
						?>

						<?php if(!empty($sub_headings)): ?>
							<span><?php echo $sub_headings; ?></span>
						<?php endif; ?>
					<?php endif; ?>
					<?php if(!empty($receipt_details->invoice_heading)): ?>
						
						<p style="font-weight: bold; font-size: 35px !important; line-height: 1;"><?php echo $receipt_details->invoice_heading; ?></p>

					<?php endif; ?>
				</td>
			</tr>
			<?php if(!empty($receipt_details->letter_head)): ?>
			<tr>
				<td>
					<img style="width: 100%;margin-bottom: 10px;" src="<?php echo e($receipt_details->letter_head, false); ?>">
				</td>
			</tr>
			<?php endif; ?>

		<tr>
			<td>

<!-- business information here -->
<div class="row invoice-info">

	<div class="col-md-6 invoice-col width-50">

		<div class="text-right font-23">
			<?php if(!empty($receipt_details->invoice_no_prefix)): ?>
				<span class="pull-left"><?php echo $receipt_details->invoice_no_prefix; ?></span>
			<?php endif; ?>

			<?php echo e($receipt_details->invoice_no, false); ?>

		</div>

		<!-- Total Due-->
		<?php if(!empty($receipt_details->total_due) && !empty($receipt_details->total_due_label)): ?>
			<div class="bg-light-blue-active text-right font-23 padding-5">
				<span class="pull-left bg-light-blue-active">
					<?php echo $receipt_details->total_due_label; ?>

				</span>

				<?php echo e($receipt_details->total_due, false); ?>

			</div>
		<?php endif; ?>

		<?php if(!empty($receipt_details->all_due)): ?>
			<div class="bg-light-blue-active text-right font-23 padding-5">
				<span class="pull-left bg-light-blue-active">
					<?php echo $receipt_details->all_bal_label; ?>

				</span>

				<?php echo e($receipt_details->all_due, false); ?>

			</div>
		<?php endif; ?>
		
		<!-- Total Paid-->
		<?php if(!empty($receipt_details->total_paid)): ?>
			<div class="text-right font-23 ">
				<span class="pull-left"><?php echo $receipt_details->total_paid_label; ?></span>
				<?php echo e($receipt_details->total_paid, false); ?>

			</div>
		<?php endif; ?>
		<!-- Date-->
		<?php if(!empty($receipt_details->date_label)): ?>
			<div class="text-right font-23 ">
				<span class="pull-left">
					<?php echo e($receipt_details->date_label, false); ?>

				</span>

				<?php echo e($receipt_details->invoice_date, false); ?>

			</div>
		<?php endif; ?>
		<?php if(!empty($receipt_details->due_date_label)): ?>
			<div class="text-right font-23 ">
				<span class="pull-left">
					<?php echo e($receipt_details->due_date_label, false); ?>

				</span>

				<?php echo e($receipt_details->due_date ?? '', false); ?>

			</div>
		<?php endif; ?>
		<?php if(!empty($receipt_details->sell_custom_field_1_value)): ?>
			<div class="text-right font-23 ">
				<span class="pull-left">
					<?php echo e($receipt_details->sell_custom_field_1_label, false); ?>

				</span>

				<?php echo e($receipt_details->sell_custom_field_1_value, false); ?>

			</div>
		<?php endif; ?>
		<?php if(!empty($receipt_details->sell_custom_field_2_value)): ?>
			<div class="text-right font-23 ">
				<span class="pull-left">
					<?php echo e($receipt_details->sell_custom_field_2_label, false); ?>

				</span>

				<?php echo e($receipt_details->sell_custom_field_2_value, false); ?>

			</div>
		<?php endif; ?>
		<?php if(!empty($receipt_details->sell_custom_field_3_value)): ?>
			<div class="text-right font-23 ">
				<span class="pull-left">
					<?php echo e($receipt_details->sell_custom_field_3_label, false); ?>

				</span>

				<?php echo e($receipt_details->sell_custom_field_3_value, false); ?>

			</div>
		<?php endif; ?>
		<?php if(!empty($receipt_details->sell_custom_field_4_value)): ?>
			<div class="text-right font-23 ">
				<span class="pull-left">
					<?php echo e($receipt_details->sell_custom_field_4_label, false); ?>

				</span>

				<?php echo e($receipt_details->sell_custom_field_4_value, false); ?>

			</div>
		<?php endif; ?>


		<div class="word-wrap">
			<?php if(!empty($receipt_details->customer_label)): ?>
				<b><?php echo e($receipt_details->customer_label, false); ?></b><br/>
			<?php endif; ?>

			<!-- customer info -->
			<?php if(!empty($receipt_details->customer_info)): ?>
				<?php echo $receipt_details->customer_info; ?>

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

			<!-- Display type of service details -->
			<?php if(!empty($receipt_details->types_of_service)): ?>
				<span class="pull-left text-left">
					<strong><?php echo $receipt_details->types_of_service_label; ?>:</strong>
					<?php echo e($receipt_details->types_of_service, false); ?>

					<!-- Waiter info -->
					<?php if(!empty($receipt_details->types_of_service_custom_fields)): ?>
						<br>
						<?php $__currentLoopData = $receipt_details->types_of_service_custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<strong><?php echo e($key, false); ?>: </strong> <?php echo e($value, false); ?><?php if(!$loop->last): ?>, <?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
				</span>
			<?php endif; ?>
		</div>

	</div>

	<div class="col-md-6 invoice-col width-50 ">
		<?php if(empty($receipt_details->letter_head)): ?>
		<!-- Logo -->
		<?php if(!empty($receipt_details->logo)): ?>
			<img style="max-height: 120px; width: auto;" src="<?php echo e($receipt_details->logo, false); ?>" class="img center-block">
			<br/>
		<?php endif; ?>

		<!-- Shop & Location Name  -->
		<p>
			<?php if(!empty($receipt_details->display_name)): ?>
				<br/><?php echo e($receipt_details->display_name, false); ?>

			<?php endif; ?>
			<?php if(!empty($receipt_details->address)): ?>
				<?php echo $receipt_details->address; ?>

			<?php endif; ?>

			<?php if(!empty($receipt_details->contact)): ?>
				<br/><?php echo $receipt_details->contact; ?>

			<?php endif; ?>

			<?php if(!empty($receipt_details->website)): ?>
				<br/><?php echo e($receipt_details->website, false); ?>

			<?php endif; ?>

			<?php if(!empty($receipt_details->tax_info1)): ?>
				<br/><?php echo e($receipt_details->tax_label1, false); ?> <?php echo e($receipt_details->tax_info1, false); ?>

			<?php endif; ?>

			<?php if(!empty($receipt_details->tax_info2)): ?>
				<br/><?php echo e($receipt_details->tax_label2, false); ?> <?php echo e($receipt_details->tax_info2, false); ?>

			<?php endif; ?>

			<?php if(!empty($receipt_details->location_custom_fields)): ?>
				<br/><?php echo e($receipt_details->location_custom_fields, false); ?>

			<?php endif; ?>
		</p>
		<?php endif; ?>
		
		<!-- Table information-->
        <?php if(!empty($receipt_details->table_label) || !empty($receipt_details->table)): ?>
        	<p>
				<?php if(!empty($receipt_details->table_label)): ?>
					<?php echo $receipt_details->table_label; ?>

				<?php endif; ?>
				<?php echo e($receipt_details->table, false); ?>

			</p>
        <?php endif; ?>

		<!-- Waiter info -->
		<?php if(!empty($receipt_details->service_staff_label) || !empty($receipt_details->service_staff)): ?>
        	<p>
				<?php if(!empty($receipt_details->service_staff_label)): ?>
					<?php echo $receipt_details->service_staff_label; ?>

				<?php endif; ?>
				<?php echo e($receipt_details->service_staff, false); ?>

			</p>
        <?php endif; ?>



        <div class="word-wrap">

			<p class="text-right ">
			<?php if(!empty($receipt_details->brand_label) || !empty($receipt_details->repair_brand)): ?>
				<?php if(!empty($receipt_details->brand_label)): ?>
					<span class="pull-left">
						<strong><?php echo $receipt_details->brand_label; ?></strong>
					</span>
				<?php endif; ?>
				<?php echo e($receipt_details->repair_brand, false); ?><br>
	        <?php endif; ?>


	        <?php if(!empty($receipt_details->device_label) || !empty($receipt_details->repair_device)): ?>
				<?php if(!empty($receipt_details->device_label)): ?>
					<span class="pull-left">
						<strong><?php echo $receipt_details->device_label; ?></strong>
					</span>
				<?php endif; ?>
				<?php echo e($receipt_details->repair_device, false); ?><br>
	        <?php endif; ?>

			<?php if(!empty($receipt_details->model_no_label) || !empty($receipt_details->repair_model_no)): ?>
				<?php if(!empty($receipt_details->model_no_label)): ?>
					<span class="pull-left">
						<strong><?php echo $receipt_details->model_no_label; ?></strong>
					</span>
				<?php endif; ?>
				<?php echo e($receipt_details->repair_model_no, false); ?> <br>
	        <?php endif; ?>

			<?php if(!empty($receipt_details->serial_no_label) || !empty($receipt_details->repair_serial_no)): ?>
				<?php if(!empty($receipt_details->serial_no_label)): ?>
					<span class="pull-left">
						<strong><?php echo $receipt_details->serial_no_label; ?></strong>
					</span>
				<?php endif; ?>
				<?php echo e($receipt_details->repair_serial_no, false); ?><br>
	        <?php endif; ?>
			<?php if(!empty($receipt_details->repair_status_label) || !empty($receipt_details->repair_status)): ?>
				<?php if(!empty($receipt_details->repair_status_label)): ?>
					<span class="pull-left">
						<strong><?php echo $receipt_details->repair_status_label; ?></strong>
					</span>
				<?php endif; ?>
				<?php echo e($receipt_details->repair_status, false); ?><br>
	        <?php endif; ?>
	        
	        <?php if(!empty($receipt_details->repair_warranty_label) || !empty($receipt_details->repair_warranty)): ?>
				<?php if(!empty($receipt_details->repair_warranty_label)): ?>
					<span class="pull-left">
						<strong><?php echo $receipt_details->repair_warranty_label; ?></strong>
					</span>
				<?php endif; ?>
				<?php echo e($receipt_details->repair_warranty, false); ?>

				<br>
	        <?php endif; ?>
	        </p>
		</div>
	</div>
</div>
<?php if(!empty($receipt_details->shipping_custom_field_1_label) || !empty($receipt_details->shipping_custom_field_2_label)): ?>
	<div class="row">
		<div class="col-xs-6">
			<?php if(!empty($receipt_details->shipping_custom_field_1_label)): ?>
				<strong><?php echo $receipt_details->shipping_custom_field_1_label; ?> :</strong> <?php echo $receipt_details->shipping_custom_field_1_value ?? ''; ?>

			<?php endif; ?>
		</div>
		<div class="col-xs-6">
			<?php if(!empty($receipt_details->shipping_custom_field_2_label)): ?>
				<strong><?php echo $receipt_details->shipping_custom_field_2_label; ?>:</strong> <?php echo $receipt_details->shipping_custom_field_2_value ?? ''; ?>

			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>
<?php if(!empty($receipt_details->shipping_custom_field_3_label) || !empty($receipt_details->shipping_custom_field_4_label)): ?>
	<div class="row">
		<div class="col-xs-6">
			<?php if(!empty($receipt_details->shipping_custom_field_3_label)): ?>
				<strong><?php echo $receipt_details->shipping_custom_field_3_label; ?> :</strong> <?php echo $receipt_details->shipping_custom_field_3_value ?? ''; ?>

			<?php endif; ?>
		</div>
		<div class="col-xs-6">
			<?php if(!empty($receipt_details->shipping_custom_field_4_label)): ?>
				<strong><?php echo $receipt_details->shipping_custom_field_4_label; ?>:</strong> <?php echo $receipt_details->shipping_custom_field_4_value ?? ''; ?>

			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>
<?php if(!empty($receipt_details->shipping_custom_field_5_label)): ?>
	<div class="row">
		<div class="col-xs-6">
			<?php if(!empty($receipt_details->shipping_custom_field_5_label)): ?>
				<strong><?php echo $receipt_details->shipping_custom_field_5_label; ?> :</strong> <?php echo $receipt_details->shipping_custom_field_5_value ?? ''; ?>

			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>
<?php if(!empty($receipt_details->sale_orders_invoice_no) || !empty($receipt_details->sale_orders_invoice_date)): ?>
	<div class="row">
		<div class="col-xs-6">
			<strong><?php echo app('translator')->get('restaurant.order_no'); ?>:</strong> <?php echo $receipt_details->sale_orders_invoice_no ?? ''; ?>

		</div>
		<div class="col-xs-6">
			<strong><?php echo app('translator')->get('lang_v1.order_dates'); ?>:</strong> <?php echo $receipt_details->sale_orders_invoice_date ?? ''; ?>

		</div>
	</div>
<?php endif; ?>
<div class="row">
	<?php if ($__env->exists('sale_pos.receipts.partial.common_repair_invoice')) echo $__env->make('sale_pos.receipts.partial.common_repair_invoice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<div class="row ">
	<div class="col-xs-12">
		<br/>
		<table class="table table-bordered table-no-top-cell-border table-slim">
			<thead>
				<tr style="background-color: #357ca5 !important; color: white !important; font-size: 15px !important" class="table-no-side-cell-border table-no-top-cell-border text-center">
					<td style="background-color: #357ca5 !important; color: white !important;width: 3% !important">#</td>
					
					<?php
						$p_width = 20;
					?>
					<?php if($receipt_details->show_cat_code != 1): ?>
						<?php
							$p_width = 30;
						?>
					<?php endif; ?>
					<td style="background-color: #357ca5 !important; color: white !important; width: <?php echo e($p_width, false); ?>% !important">
						<?php echo e($receipt_details->table_product_label, false); ?>

					</td>

					<?php if($receipt_details->show_cat_code == 1): ?>
						<td style="background-color: #357ca5 !important; color: white !important; width: 10% !important;"><?php echo e($receipt_details->cat_code_label, false); ?></td>
					<?php endif; ?>
					
					<td style="background-color: #357ca5 !important; color: white !important;width: 10% !important;">
						<?php echo e($receipt_details->table_qty_label, false); ?>

					</td>
					<td style="background-color: #357ca5 !important; color: white !important;width: 10% !important;">
						<?php echo e($receipt_details->table_unit_price_label, false); ?>

					</td>
					<td style="background-color: #357ca5 !important; color: white !important;width: 10% !important;">
						<?php echo e($receipt_details->discounted_unit_price_label, false); ?>

					</td>
					<td style="background-color: #357ca5 !important; color: white !important;width: 8% !important;">
						<?php echo e($receipt_details->line_discount_label, false); ?>

					</td>
					<td style="background-color: #357ca5 !important; color: white !important;width: 10% !important;">
						<?php echo e($receipt_details->line_tax_label, false); ?>

					</td>
					<td style="background-color: #357ca5 !important; color: white !important;width: 10% !important;">
						<?php echo e($receipt_details->table_unit_price_label, false); ?> (<?php echo app('translator')->get('product.inc_of_tax'); ?>)
					</td>
					<td style="background-color: #357ca5 !important; color: white !important;width: 10% !important;">
						<?php echo e($receipt_details->table_subtotal_label, false); ?>

					</td>
				</tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = $receipt_details->lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td class="text-center">
							<?php echo e($loop->iteration, false); ?>

						</td>
						<td>
							<?php if(!empty($line['image'])): ?>
								<img src="<?php echo e($line['image'], false); ?>" alt="Image" width="50" style="float: left; margin-right: 8px;">
							<?php endif; ?>
                            <?php echo e($line['name'], false); ?> <?php echo e($line['product_variation'], false); ?> <?php echo e($line['variation'], false); ?> 
                            <?php if(!empty($line['sub_sku'])): ?>, <?php echo e($line['sub_sku'], false); ?> <?php endif; ?> <?php if(!empty($line['brand'])): ?>, <?php echo e($line['brand'], false); ?> <?php endif; ?>
                            <?php if(!empty($line['product_custom_fields'])): ?>, <?php echo e($line['product_custom_fields'], false); ?> <?php endif; ?>
                            <?php if(!empty($line['product_description'])): ?>
                            	<small>
                            		<?php echo $line['product_description']; ?>

                            	</small>
                            <?php endif; ?>
                            <?php if(!empty($line['sell_line_note'])): ?>
                            	<br>
                             <small class="text-muted"><?php echo $line['sell_line_note']; ?></small>
                             <?php endif; ?>
                            <?php if(!empty($line['lot_number'])): ?><br> <?php echo e($line['lot_number_label'], false); ?>:  <?php echo e($line['lot_number'], false); ?> <?php endif; ?> 
                            <?php if(!empty($line['product_expiry'])): ?>, <?php echo e($line['product_expiry_label'], false); ?>:  <?php echo e($line['product_expiry'], false); ?> <?php endif; ?> 

                            <?php if(!empty($line['warranty_name'])): ?> <br><small><?php echo e($line['warranty_name'], false); ?> </small><?php endif; ?> <?php if(!empty($line['warranty_exp_date'])): ?> <small>- <?php echo e(\Carbon::createFromTimestamp(strtotime($line['warranty_exp_date']))->format(session('business.date_format')), false); ?> </small><?php endif; ?>
                            <?php if(!empty($line['warranty_description'])): ?> <small> <?php echo e($line['warranty_description'] ?? '', false); ?></small><?php endif; ?>

                            <?php if($receipt_details->show_base_unit_details && $line['quantity'] && $line['base_unit_multiplier'] !== 1): ?>
                            <br><small>
                            	1 <?php echo e($line['units'], false); ?> = <?php echo e($line['base_unit_multiplier'], false); ?> <?php echo e($line['base_unit_name'], false); ?> <br>
                            	<?php echo e($line['base_unit_price'], false); ?> x <?php echo e($line['orig_quantity'], false); ?> = <?php echo e($line['line_total'], false); ?>

                            </small>
                            <?php endif; ?>
                        </td>

						<?php if($receipt_details->show_cat_code == 1): ?>
	                        <td>
	                        	<?php if(!empty($line['cat_code'])): ?>
	                        		<?php echo e($line['cat_code'], false); ?>

	                        	<?php endif; ?>
	                        </td>
	                    <?php endif; ?>

						<td class="text-right">
							<?php echo e($line['quantity'], false); ?> <?php echo e($line['units'], false); ?>


							<?php if($receipt_details->show_base_unit_details && $line['quantity'] && $line['base_unit_multiplier'] !== 1): ?>
                            <br><small>
                            	<?php echo e($line['quantity'], false); ?> x <?php echo e($line['base_unit_multiplier'], false); ?> = <?php echo e($line['orig_quantity'], false); ?> <?php echo e($line['base_unit_name'], false); ?>

                            </small>
                            <?php endif; ?>
						</td>
						<td class="text-right">
							<?php echo e($line['unit_price_before_discount'], false); ?>

						</td>
						<td class="text-right">
							<?php echo e($line['unit_price_inc_tax'], false); ?> 
						</td>
						<td class="text-right">
							<?php echo e($line['total_line_discount'] ?? 0, false); ?>

							<?php if(!empty($line['line_discount_percent'])): ?>
							 	(<?php echo e($line['line_discount_percent'], false); ?>%)
							<?php endif; ?>
						</td>
						<td class="text-right">
							<?php echo e($line['tax'], false); ?> <?php echo e($line['tax_name'], false); ?>

						</td>
						<td class="text-right">
							<?php echo e($line['unit_price_inc_tax'], false); ?>

						</td>
						<td class="text-right">
							<?php echo e($line['line_total'], false); ?>

						</td>
					</tr>
					<?php if(!empty($line['modifiers'])): ?>
						<?php $__currentLoopData = $line['modifiers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modifier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td class="text-center">
									&nbsp;
								</td>
								<td>
		                            <?php echo e($modifier['name'], false); ?> <?php echo e($modifier['variation'], false); ?> 
		                            <?php if(!empty($modifier['sub_sku'])): ?>, <?php echo e($modifier['sub_sku'], false); ?> <?php endif; ?> 
		                            <?php if(!empty($modifier['sell_line_note'])): ?>(<?php echo $modifier['sell_line_note']; ?>) <?php endif; ?> 
		                        </td>

								<?php if($receipt_details->show_cat_code == 1): ?>
			                        <td>
			                        	<?php if(!empty($modifier['cat_code'])): ?>
			                        		<?php echo e($modifier['cat_code'], false); ?>

			                        	<?php endif; ?>
			                        </td>
			                    <?php endif; ?>

								<td class="text-right">
									<?php echo e($modifier['quantity'], false); ?> <?php echo e($modifier['units'], false); ?>

								</td>
								<td class="text-right">
									&nbsp;
								</td>
								<td class="text-center">
									&nbsp;
								</td>
								<td class="text-center">
									&nbsp;
								</td>
								<td class="text-center">
									&nbsp;
								</td>
								<td class="text-center">
									<?php echo e($modifier['unit_price_exc_tax'], false); ?>

								</td>
								<td class="text-right">
									<?php echo e($modifier['line_total'], false); ?>

								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				<?php
					$lines = count($receipt_details->lines);
				?>

				<?php for($i = $lines; $i < 5; $i++): ?>
    				<tr>
    					<td>&nbsp;</td>
    					<td>&nbsp;</td>
    					<td>&nbsp;</td>
    					<td>&nbsp;</td>
    					<td>&nbsp;</td>
    					<td>&nbsp;</td>
    					<td>&nbsp;</td>
    					<td>&nbsp;</td>
    					<td>&nbsp;</td>
    					<?php if($receipt_details->show_cat_code == 1): ?>
    						<td>&nbsp;</td>
    					<?php endif; ?>
    				</tr>
				<?php endfor; ?>

			</tbody>
		</table>
	</div>
</div>

<div class="row invoice-info " style="page-break-inside: avoid !important">
	<div class="col-md-6 invoice-col width-50">
		<table class="table table-slim">
			<?php if(!empty($receipt_details->payments)): ?>
				<?php $__currentLoopData = $receipt_details->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($payment['method'], false); ?></td>
						<td><?php echo e($payment['amount'], false); ?></td>
						<td><?php echo e($payment['date'], false); ?></td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>
		</table>
		
		<b class="pull-left"><?php echo app('translator')->get('lang_v1.authorized_signatory'); ?></b>
	</div>

	<div class="col-md-6 invoice-col width-50">
		<table class="table-no-side-cell-border table-no-top-cell-border width-100 table-slim">
			<tbody>
				<?php if(!empty($receipt_details->total_quantity_label)): ?>
					<tr >
						<td style="width:50%">
							<?php echo $receipt_details->total_quantity_label; ?>

						</td>
						<td class="text-right">
							<?php echo e($receipt_details->total_quantity, false); ?>

						</td>
					</tr>
				<?php endif; ?>

				<?php if(!empty($receipt_details->total_items_label)): ?>
					<tr >
						<td style="width:50%">
							<?php echo $receipt_details->total_items_label; ?>

						</td>
						<td class="text-right">
							<?php echo e($receipt_details->total_items, false); ?>

						</td>
					</tr>
				<?php endif; ?>
				<tr >
					<td style="width:50%">
						<?php echo $receipt_details->subtotal_label; ?>

					</td>
					<td class="text-right">
						<?php echo e($receipt_details->subtotal, false); ?>

					</td>
				</tr>
				
				<!-- Shipping Charges -->
				<?php if(!empty($receipt_details->shipping_charges)): ?>
					<tr >
						<td style="width:50%">
							<?php echo $receipt_details->shipping_charges_label; ?>

						</td>
						<td class="text-right">
							<?php echo e($receipt_details->shipping_charges, false); ?>

						</td>
					</tr>
				<?php endif; ?>

				<?php if(!empty($receipt_details->packing_charge)): ?>
					<tr >
						<td style="width:50%">
							<?php echo $receipt_details->packing_charge_label; ?>

						</td>
						<td class="text-right">
							<?php echo e($receipt_details->packing_charge, false); ?>

						</td>
					</tr>
				<?php endif; ?>

				<!-- Discount -->
				<?php if( !empty($receipt_details->discount) ): ?>
					<tr >
						<td>
							<?php echo $receipt_details->discount_label; ?>

						</td>

						<td class="text-right">
							(-) <?php echo e($receipt_details->discount, false); ?>

						</td>
					</tr>
				<?php endif; ?>

				<?php if( !empty($receipt_details->total_line_discount) ): ?>
					<tr >
						<td>
							<?php echo $receipt_details->line_discount_label; ?>

						</td>

						<td class="text-right">
							(-) <?php echo e($receipt_details->total_line_discount, false); ?>

						</td>
					</tr>
				<?php endif; ?>

				<?php if( !empty($receipt_details->additional_expenses) ): ?>
					<?php $__currentLoopData = $receipt_details->additional_expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr >
							<td>
								<?php echo e($key, false); ?>:
							</td>

							<td class="text-right">
								(+) <?php echo e($val, false); ?>

							</td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>

				<?php if( !empty($receipt_details->reward_point_label) ): ?>
					<tr >
						<td>
							<?php echo $receipt_details->reward_point_label; ?>

						</td>

						<td class="text-right">
							(-) <?php echo e($receipt_details->reward_point_amount, false); ?>

						</td>
					</tr>
				<?php endif; ?>

				<?php if(!empty($receipt_details->group_tax_details)): ?>
					<?php $__currentLoopData = $receipt_details->group_tax_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr >
							<td>
								<?php echo $key; ?>

							</td>
							<td class="text-right">
								(+) <?php echo e($value, false); ?>

							</td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php else: ?>
					<?php if( !empty($receipt_details->tax) ): ?>
						<tr >
							<td>
								<?php echo $receipt_details->tax_label; ?>

							</td>
							<td class="text-right">
								(+) <?php echo e($receipt_details->tax, false); ?>

							</td>
						</tr>
					<?php endif; ?>
				<?php endif; ?>

				<?php if( $receipt_details->round_off_amount > 0): ?>
					<tr >
						<td>
							<?php echo $receipt_details->round_off_label; ?>

						</td>
						<td class="text-right">
							<?php echo e($receipt_details->round_off, false); ?>

						</td>
					</tr>
				<?php endif; ?>
				
				<!-- Total -->
				<tr>
					<th style="background-color: #357ca5 !important; color: white !important" class="font-23 padding-10">
						<?php echo $receipt_details->total_label; ?>

					</th>
					<td class="text-right font-23 padding-10" style="background-color: #357ca5 !important; color: white !important">
						<?php echo e($receipt_details->total, false); ?>

					</td>
				</tr>
				<?php if(!empty($receipt_details->total_in_words)): ?>
				<tr>
					<td colspan="2" class="text-right">
						<small>(<?php echo e($receipt_details->total_in_words, false); ?>)</small>
					</td>
				</tr>
				<?php endif; ?>
			</tbody>
        </table>
	</div>
</div>

<div class="border-bottom col-md-12">
    <?php if(empty($receipt_details->hide_price) && !empty($receipt_details->tax_summary_label) ): ?>
        <!-- tax -->
        <?php if(!empty($receipt_details->taxes)): ?>
        	<table class="table table-slim table-bordered">
        		<tr>
        			<th colspan="2" class="text-center"><?php echo e($receipt_details->tax_summary_label, false); ?></th>
        		</tr>
        		<?php $__currentLoopData = $receipt_details->taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        			<tr>
        				<td class="text-center"><b><?php echo e($key, false); ?></b></td>
        				<td class="text-center"><?php echo e($val, false); ?></td>
        			</tr>
        		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        	</table>
        <?php endif; ?>
    <?php endif; ?>
</div>

<?php if(!empty($receipt_details->additional_notes)): ?>
	<div class="row ">
		<div class="col-xs-12">
			<br>
			<p><?php echo nl2br($receipt_details->additional_notes); ?></p>
		</div>
	</div>
<?php endif; ?>

<div class="row ">
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
	</div>

			</td>
		</tr>
	</tbody>
</table>

<style type="text/css">
	body {
		color: #000000;
	}
</style><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/sale_pos/receipts/detailed.blade.php ENDPATH**/ ?>