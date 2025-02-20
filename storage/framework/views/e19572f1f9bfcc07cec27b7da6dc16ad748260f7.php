<style>
@media print {
  #scrollable-container {
    position: absolute;
  }
}
</style>

<div class="row" style="color: #000000 !important;">
	<!-- Logo -->
	<?php if(!empty($receipt_details->logo)): ?>
		<img style="max-height: 120px; width: auto;" src="<?php echo e($receipt_details->logo, false); ?>" class="img img-responsive center-block">
	<?php endif; ?>

	<!-- Header text -->
	<?php if(!empty($receipt_details->header_text)): ?>
		<div class="col-xs-12">
			<?php echo $receipt_details->header_text; ?>

		</div>
	<?php endif; ?>

	<!-- business information here -->
	<div class="col-xs-12 text-center">
		<!-- Shop Name  -->
		<?php if(!empty($receipt_details->display_name)): ?>
			<h3 class="text-center" style="color: #000000 !important">
			<?php echo e($receipt_details->display_name, false); ?>

			</h3>
		<?php endif; ?>

		<!-- Title of receipt -->
		<h2 class="text-center" style="color: #000000 !important">
			<?php echo app('translator')->get('lang_v1.packing_slip'); ?>
		</h2>
	</div>
</div>

<div class="row" style="color: #000000 !important;">
	<div class="col-xs-6">
		<!-- Invoice  number  -->
		<?php if(!empty($receipt_details->invoice_no_prefix)): ?>
			<b><?php echo $receipt_details->invoice_no_prefix; ?> </b>
		<?php endif; ?>
		<?php echo e($receipt_details->invoice_no, false); ?>

	</div>
	<div class="col-xs-6">
		<!-- Date-->
		<?php if(!empty($receipt_details->date_label)): ?>
			<b><?php echo e($receipt_details->date_label, false); ?> </b>
				<?php echo e($receipt_details->invoice_date, false); ?>

			</p>
		<?php endif; ?>
	</div>
</div>

<div class="row" style="color: #000000 !important;">
	<div class="col-xs-6">
		<?php if(!empty($receipt_details->customer_label)): ?>
			<b><?php echo e($receipt_details->customer_label, false); ?></b> 
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
	</div>
	<div class="col-xs-6">
		<strong><?php echo app('translator')->get('lang_v1.shipping_address'); ?>:</strong><br>
		<?php echo $receipt_details->shipping_address; ?>

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
	</div>
</div>

<div class="row" style="color: #000000 !important;">
	<div class="col-xs-12">
		<br/>
		<table class="table table-bordered" style="border-color: #000000 !important">
			<thead>
				<tr style="background-color: #d2d6de !important; font-weight:bold" class="text-center">
					<td style="width: 5% !important; border-color: #000000 !important">TT</td>
					<td style="width: 20% !important; border-color: #000000 !important"><?php echo app('translator')->get('product.sku'); ?></td>
					<td style="width: 65% !important; border-color: #000000 !important">
						<?php echo e($receipt_details->table_product_label, false); ?>

					</td>
					<td style="width: 10% !important; border-color: #000000 !important">
						<?php echo e($receipt_details->table_qty_label, false); ?>

					</td>
				</tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = $receipt_details->lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td style="background-color: #ffffff !important; color: #000000 !important; border-color: #000000 !important" class="text-center">
							<?php echo e($loop->iteration, false); ?>

						</td>
						<td style="background-color: #ffffff !important; color: #000000 !important; border-color: #000000 !important" class="text-center">
                            <?php if(!empty($line['sub_sku'])): ?><?php echo e($line['sub_sku'], false); ?><?php endif; ?>
						</td>
						<td style="background-color: #ffffff !important; color: #000000 !important; border-color: #000000 !important" style="word-break: break-all;">
                            <?php echo e($line['name'], false); ?> <?php echo e($line['product_variation'], false); ?> <?php echo e($line['variation'], false); ?> 
							<?php if(!empty($line['brand'])): ?>, <?php echo app('translator')->get('product.brand'); ?>: <?php echo e($line['brand'], false); ?> <?php endif; ?>
							<?php if(!empty($line['cat_code'])): ?>, <?php echo e($line['cat_code'], false); ?><?php endif; ?>
                            <?php if(!empty($line['product_custom_fields'])): ?>, <?php echo e($line['product_custom_fields'], false); ?> <?php endif; ?>
							<?php if(!empty($line['product_description'])): ?><br><?php echo app('translator')->get('lang_v1.description'); ?>: <?php echo e($line['product_description'], false); ?> <?php endif; ?>
                            <?php if(!empty($line['sell_line_note'])): ?><br><?php echo app('translator')->get('brand.note'); ?>: <?php echo e($line['sell_line_note'], false); ?> <?php endif; ?>
                            <?php if(!empty($line['lot_number'])): ?><br> <?php echo e($line['lot_number_label'], false); ?>: <?php echo e($line['lot_number'], false); ?> <?php endif; ?> 
                            <?php if(!empty($line['product_expiry'])): ?>, <?php echo e($line['product_expiry_label'], false); ?>: <?php echo e($line['product_expiry'], false); ?> <?php endif; ?> 
                        </td>
						<td style="background-color: #ffffff !important; color: #000000 !important; border-color: #000000 !important" class="text-center">
							<?php echo e($line['quantity'], false); ?> <?php echo e($line['units'], false); ?>

						</td>
					</tr>
					<?php if(!empty($line['modifiers'])): ?>
						<?php $__currentLoopData = $line['modifiers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modifier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td style="background-color: #ffffff !important; color: #000000 !important; border-color: #000000 !important" class="text-center">
									&nbsp;
								</td>
								<td style="background-color: #ffffff !important; color: #000000 !important; border-color: #000000 !important" class="text-center">
		                            <?php if(!empty($modifier['sub_sku'])): ?><?php echo e($modifier['sub_sku'], false); ?><?php endif; ?> 
								</td>
								<td style="background-color: #ffffff !important; color: #000000 !important; border-color: #000000 !important">
		                            <?php echo e($modifier['name'], false); ?> <?php echo e($modifier['variation'], false); ?> 
		                            <?php if(!empty($modifier['sell_line_note'])): ?><br><?php echo app('translator')->get('brand.note'); ?>: <?php echo e($modifier['sell_line_note'], false); ?> <?php endif; ?> 
		                        </td>
								<td style="background-color: #ffffff !important; color: #000000 !important; border-color: #000000 !important" class="text-center">
									<?php echo e($modifier['quantity'], false); ?> <?php echo e($modifier['units'], false); ?>

								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
	</div>
</div>

<div class="row" style="color: #000000 !important;">
	<div class="col-xs-4">
		<p class="text-center"><b>Người nhận hàng</b></p>
	</div>
	<div class="col-xs-4">
		<p class="text-center"><b>Người giao hàng</b></p>
	</div>
	<div class="col-xs-4">
		<p class="text-center"><b>Người lập phiếu</b></p>
	</div>
</div>


<?php if($receipt_details->show_barcode): ?>
<br>
<div class="row" style="color: #000000 !important;">
		<div class="col-xs-12">
			<img class="center-block" src="data:image/png;base64,<?php echo e(DNS1D::getBarcodePNG($receipt_details->invoice_no, 'C128', 2,30,array(39, 48, 54), true), false); ?>">
		</div>
</div>
<?php endif; ?>

<?php if(!empty($receipt_details->footer_text)): ?>
	<div class="row" style="color: #000000 !important;">
		<div class="col-xs-12">
			<?php echo $receipt_details->footer_text; ?>

		</div>
	</div>
<?php endif; ?><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/sale_pos/receipts/packing_slip.blade.php ENDPATH**/ ?>