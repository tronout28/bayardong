
<?php $__env->startSection('title', __('assetmanagement::lang.assets')); ?>
<?php $__env->startSection('content'); ?>
	<?php if ($__env->exists('assetmanagement::layouts.nav')) echo $__env->make('assetmanagement::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<!-- Main content -->
	<section class="content no-print">
		<div class="row">
			<div class="col-md-4">
				<div class="info-box info-box-new-style">
	            	<span class="info-box-icon bg-aqua"><i class="fas fa-boxes"></i></span>

	            	<div class="info-box-content">
	              		<span class="info-box-text"><?php echo app('translator')->get('assetmanagement::lang.total_assets_allocated_to_you'); ?></span>
	              		<span class="info-box-number"><?php echo e(number_format($total_assets_allocated, session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?></span>
	            	</div>
	            	<!-- /.info-box-content -->
	          	</div>
			</div>

			<div class="col-md-4">
				<div class="box box-solid">
					<div class="box-body">
						<table class="table">
							<thead>
								<tr>
									<th><?php echo app('translator')->get('product.category'); ?></th>
									<th><?php echo app('translator')->get('assetmanagement::lang.total_assets_allocated_to_you'); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php $__currentLoopData = $asset_allocation_by_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($asset->category, false); ?></td>
										<td><?php echo e(number_format($asset->total_quantity_allocated, session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?></td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

								<?php if(count($asset_allocation_by_category) == 0): ?>
									<tr>
										<td colspan="2" class="text-center"><?php echo app('translator')->get('lang_v1.no_data'); ?></td>
									</tr>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<?php if($is_admin): ?>
			<hr>
			<div class="row">
				<div class="col-md-4">
					<div class="info-box info-box-new-style">
		            	<span class="info-box-icon bg-aqua"><i class="fas fa-boxes"></i></span>

		            	<div class="info-box-content">
		              		<span class="info-box-text"><?php echo app('translator')->get('assetmanagement::lang.total_assets'); ?></span>
		              		<span class="info-box-number"><?php echo e(number_format($total_assets, session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?></span>
		            	</div>
		          	</div>

		          	<div class="info-box info-box-new-style">
		            	<span class="info-box-icon bg-aqua"><i class="fas fa-boxes"></i></span>

		            	<div class="info-box-content">
		              		<span class="info-box-text"><?php echo app('translator')->get('assetmanagement::lang.total_assets_allocated'); ?></span>
		              		<span class="info-box-number"><?php echo e(number_format($total_assets_allocated_for_all_users, session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?></span>
		            	</div>
		            	<!-- /.info-box-content -->
		          	</div>
				</div>

				<div class="col-md-4">
					<div class="box box-solid">
						<div class="box-header">
							<h3 class="box-title"><?php echo app('translator')->get('assetmanagement::lang.assets_by_category'); ?></h3>
						</div>
						<div class="box-body">
							<table class="table">
								<thead>
									<tr>
										<th><?php echo app('translator')->get('product.category'); ?></th>
										<th><?php echo app('translator')->get('assetmanagement::lang.total_assets'); ?></th>
									</tr>
								</thead>
								<tbody>
									<?php $__currentLoopData = $assets_by_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td><?php echo e($asset->category, false); ?></td>
											<td><?php echo e(number_format($asset->total_quantity, session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?></td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

									<?php if(count($assets_by_category) == 0): ?>
										<tr>
											<td colspan="2" class="text-center"><?php echo app('translator')->get('lang_v1.no_data'); ?></td>
										</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="box box-solid">
						<div class="box-header">
							<h3 class="box-title"><?php echo app('translator')->get('assetmanagement::lang.expired_or_expiring_in_one_month'); ?></h3>
						</div>
						<div class="box-body">
							<table class="table">
								<thead>
									<tr>
										<th><?php echo app('translator')->get('assetmanagement::lang.assets'); ?></th>
										<th><?php echo app('translator')->get('assetmanagement::lang.warranty_status'); ?></th>
									</tr>
								</thead>
								<tbody>
									<?php $__currentLoopData = $expiring_assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td><?php echo e($asset->name, false); ?> - <?php echo e($asset->asset_code, false); ?></td>
											<td><?php if(empty($asset->max_end_date)): ?> <span class="label bg-red"><?php echo app('translator')->get('report.expired'); ?></span> <?php else: ?>
												<?php if(\Carbon\Carbon::parse($asset->max_end_date)->lessThan(\Carbon\Carbon::today())): ?>
													<span class="label bg-red"><?php echo app('translator')->get('report.expired'); ?>: <?php echo e(\Carbon::createFromTimestamp(strtotime($asset->max_end_date))->format(session('business.date_format')), false); ?></span>
												<?php else: ?>
													<span class="label bg-yellow"><?php echo app('translator')->get('assetmanagement::lang.expiring_on'); ?>: <?php echo e(\Carbon::createFromTimestamp(strtotime($asset->max_end_date))->format(session('business.date_format')), false); ?></span>
												<?php endif; ?>
											<?php endif; ?></td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

									<?php if(count($expiring_assets) == 0): ?>
										<tr>
											<td colspan="2" class="text-center"><?php echo app('translator')->get('lang_v1.no_data'); ?></td>
										</tr>
									<?php endif; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>


			</div>
		<?php endif; ?>
	</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/AssetManagement/Providers/../Resources/views/asset/dashboard.blade.php ENDPATH**/ ?>