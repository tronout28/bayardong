<?php if($__is_repair_enabled): ?>
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("repair.create")): ?>
		<a href="<?php echo e(action([\App\Http\Controllers\SellPosController::class, 'create']). '?sub_type=repair', false); ?>" title="<?php echo e(__('repair::lang.add_repair'), false); ?>" data-toggle="tooltip" data-placement="bottom" class="btn bg-purple btn-flat m-6 btn-xs m-5 pull-right">
			<i class="fa fa-wrench fa-lg"></i>
			<strong><?php echo app('translator')->get('repair::lang.repair'); ?></strong>
		</a>
	<?php endif; ?>
<?php endif; ?><?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/Repair/Providers/../Resources/views/layouts/partials/pos_header.blade.php ENDPATH**/ ?>