<!-- app css -->
<?php if(!empty($for_pdf)): ?>
	<link rel="stylesheet" href="<?php echo e(asset('css/app.css?v='.$asset_v), false); ?>">
<?php endif; ?>
<div class="col-md-6 col-sm-6 col-xs-6 <?php if(!empty($for_pdf)): ?> width-50 f-left <?php endif; ?>" style="margin-top: 20px;">
	<p><strong><?php echo e($contact->business->name, false); ?></strong><br>
		<?php if(!empty($location)): ?>
    		<?php echo $location->location_address; ?>

    	<?php else: ?>
    		<?php echo $contact->business->business_address; ?>

    	<?php endif; ?>
	</p>

	<table class="table">
		<tr>
			<th style="text-align: left;"><?php echo app('translator')->get('lang_v1.to'); ?></th>
		</tr>
		<tr>
			<td>
				<p><strong><?php echo e($contact->name, false); ?></strong><br> <?php echo $contact->contact_address; ?> <?php if(!empty($contact->email)): ?> <br><?php echo app('translator')->get('business.email'); ?>: <?php echo e($contact->email, false); ?> <?php endif; ?>
					<br><?php echo app('translator')->get('contact.mobile'); ?>: <?php echo e($contact->mobile, false); ?>

					<?php if(!empty($contact->tax_number)): ?> <br><?php echo app('translator')->get('contact.tax_no'); ?>: <?php echo e($contact->tax_number, false); ?> <?php endif; ?>
				</p>
			</td>
		</tr>
	</table>	
</div>
<div class="col-md-6 col-sm-6 col-xs-6 <?php if(!empty($for_pdf)): ?> width-50 f-right <?php endif; ?>" style="margin-top: 20px;">
		
	<table style="margin: auto;">
		<tr><th class="text-center" style="border-top:hidden; font-size: 22px;"><?php echo e(__('lang_v1.statement'), false); ?></th></tr>
		<tr><th class="text-center"><?php echo app('translator')->get('lang_v1.date'); ?></th></tr>
		<tr><td class="text-center"><?php echo e($ledger_details['start_date'], false); ?> <?php echo app('translator')->get('lang_v1.to'); ?> <?php echo e($ledger_details['end_date'], false); ?></td></tr>
	</table>
</div>
<div class="col-md-12 col-sm-12 <?php if(!empty($for_pdf)): ?> width-100 <?php endif; ?>">
	<?php
		$amount_due = 0;
		$current_due = 0;
		$due_1_30_days = 0;
		$due_30_60_days = 0;
		$due_60_90_days = 0;
		$due_over_90_days = 0;
	?>
	<?php if(!empty($for_pdf)): ?>
	<br>
	<?php endif; ?>
	<table class="table table-striped <?php if(!empty($for_pdf)): ?> table-pdf td-border <?php endif; ?>" id="ledger_table">
		<thead>
			<tr class="row-border">
				<th><?php echo app('translator')->get('lang_v1.date'); ?></th>
				<th><?php echo app('translator')->get('lang_v1.transaction'); ?></th>
				<th><?php echo app('translator')->get('sale.amount'); ?></th>
				<th><?php echo app('translator')->get('lang_v1.balance'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $ledger_details['ledger']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php
					if(empty($data['total_due'])) {
						continue;
					}
					if($data['payment_status'] != 'paid' && !empty($data['due_date'])) {
						if (!empty($data['transaction_type']) && $data['transaction_type'] == 'ledger_discount') {
							$data['total_due'] = -1 * $data['total_due'];
						}
						$amount_due += $data['total_due'];

						$days_diff = $data['due_date']->diffInDays();
						if($days_diff == 0){
							$current_due += $data['total_due'];
						} elseif ($days_diff > 0 && $days_diff <= 30) {
							$due_1_30_days += $data['total_due'];
						} elseif ($days_diff > 30 && $days_diff <= 60) {
							$due_30_60_days += $data['total_due'];
						} elseif ($days_diff > 60 && $days_diff <= 90) {
							$due_60_90_days += $data['total_due'];
						} elseif ($days_diff > 90) {
							$due_over_90_days += $data['total_due'];
						}
					}
				?>
				<tr <?php if(!empty($for_pdf) && $loop->iteration % 2 == 0): ?> class="odd" <?php endif; ?> style="border:hidden;">
					<td class="row-border"><?php echo e(\Carbon::createFromTimestamp(strtotime($data['date']))->format(session('business.date_format') . ' ' . 'H:i'), false); ?></td>
					<td><?php if($loop->index == 0): ?> <?php echo e($data['type'], false); ?> <?php endif; ?> <?php echo e($data['ref_no'], false); ?> <?php if(!empty($data['due_date']) && $data['payment_status'] != 'paid'): ?> <br><?php echo app('translator')->get('lang_v1.due'); ?> <?php echo e(\Carbon::createFromTimestamp(strtotime($data['due_date']))->format(session('business.date_format')), false); ?> <?php endif; ?></td>
					<td><?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $data['final_total'], session("business.currency_precision", 2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?></td>
					<td><?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $data['total_due'], session("business.currency_precision", 2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?></td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php if(count($ledger_details['ledger']) < 5): ?>
				<tr style="border:hidden;"><td colspan="4">&nbsp;</td></tr>
				<tr style="border:hidden;"><td colspan="4">&nbsp;</td></tr>
				<tr style="border:hidden;"><td colspan="4">&nbsp;</td></tr>
				<tr style="border:hidden;"><td colspan="4">&nbsp;</td></tr>
				<tr style="border:hidden;"><td colspan="4">&nbsp;</td></tr>
				<tr style="border:hidden;"><td colspan="4">&nbsp;</td></tr>
				<tr style="border:hidden;"><td colspan="4">&nbsp;</td></tr>
			<?php endif; ?>
		</tbody>
	</table>
	<table class="table" style="margin-top: 0;">
		<tr>
			<th style="font-size: 12px;"><?php echo app('translator')->get('lang_v1.current'); ?></th>
			<th style="color: #2dce89 !important;font-size: 12px;"><?php echo e(strtoupper(__('lang_v1.1_30_days_past_due')), false); ?></th>
			<th style="color: #ffd026 !important;font-size: 12px;"><?php echo e(strtoupper(__('lang_v1.30_60_days_past_due')), false); ?></th>
			<th style="color: #ffa100 !important;font-size: 12px;"><?php echo e(strtoupper(__('lang_v1.60_90_days_past_due')), false); ?></th>
			<th style="color: #f5365c !important;font-size: 12px;"><?php echo e(strtoupper(__('lang_v1.over_90_days_past_due')), false); ?></th>
			<th style="font-size: 12px;"><?php echo e(strtoupper(__('lang_v1.amount_due')), false); ?></th>
		</tr>
		<tr>
			<td style="text-align: center;">
				<?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $current_due, session("business.currency_precision", 2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?>
			</td>
			<td style="color: #2dce89 !important; text-align: center;">
				<?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $due_1_30_days, session("business.currency_precision", 2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?>
			</td>
			<td style="color: #ffd026 !important; text-align: center;">
				<?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $due_30_60_days, session("business.currency_precision", 2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?>
			</td>
			<td style="color: #ffa100 !important;text-align: center;">
				<?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $due_60_90_days, session("business.currency_precision", 2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?>
			</td>
			<td style="color: #f5365c !important; text-align: center;">
				<?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $due_over_90_days, session("business.currency_precision", 2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?>
			</td>
			<td style="text-align: center;">
				<?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $amount_due, session("business.currency_precision", 2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?>
			</td>
		</tr>
	</table>
</div><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/contact/ledger_format_2.blade.php ENDPATH**/ ?>