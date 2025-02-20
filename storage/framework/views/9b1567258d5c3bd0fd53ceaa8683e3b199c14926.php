<div class="col-md-12">
	<form action="<?php echo e(action([\Modules\Superadmin\Http\Controllers\SubscriptionController::class, 'confirm'], [$package->id]), false); ?>" method="POST">
	 	<?php echo e(csrf_field(), false); ?>

	 	<input type="hidden" name="gateway" value="<?php echo e($k, false); ?>">

	 	<button type="submit" class="btn btn-success"> <i class="fas fa-handshake"></i> <?php echo e($v, false); ?></button>
	</form>
	<p class="help-block"><?php echo app('translator')->get('superadmin::lang.offline_pay_helptext'); ?></p>
	<p class="help-block"><?php echo nl2br($offline_payment_details) ?? ''; ?></p>
</div><?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/Superadmin/Providers/../Resources/views/subscription/partials/pay_offline.blade.php ENDPATH**/ ?>