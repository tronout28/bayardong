

<?php $__env->startSection('title', __('superadmin::lang.subscription')); ?>

<?php $__env->startSection('content'); ?>

<!-- Main content -->
<section class="content">

	<?php echo $__env->make('superadmin::layouts.partials.currency', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<div class="box box-success">
        <div class="box-header">
            <h3 class="box-title"><?php echo app('translator')->get('superadmin::lang.pay_and_subscribe'); ?></h3>
        </div>

        <div class="box-body">
    		<div class="col-md-8">
        		<h3>
        			<?php echo e($package->name, false); ?>


        			(<span class="display_currency" data-currency_symbol="true"><?php echo e($package->price, false); ?></span>

					<small>
						/ <?php echo e($package->interval_count, false); ?> <?php echo e(ucfirst($package->interval), false); ?>

					</small>)
        		</h3>
        		<ul>
					<li>
						<?php if($package->location_count == 0): ?>
							<?php echo app('translator')->get('superadmin::lang.unlimited'); ?>
						<?php else: ?>
							<?php echo e($package->location_count, false); ?>

						<?php endif; ?>

						<?php echo app('translator')->get('business.business_locations'); ?>
					</li>

					<li>
						<?php if($package->user_count == 0): ?>
							<?php echo app('translator')->get('superadmin::lang.unlimited'); ?>
						<?php else: ?>
							<?php echo e($package->user_count, false); ?>

						<?php endif; ?>

						<?php echo app('translator')->get('superadmin::lang.users'); ?>
					</li>

					<li>
						<?php if($package->product_count == 0): ?>
							<?php echo app('translator')->get('superadmin::lang.unlimited'); ?>
						<?php else: ?>
							<?php echo e($package->product_count, false); ?>

						<?php endif; ?>

						<?php echo app('translator')->get('superadmin::lang.products'); ?>
					</li>

					<li>
						<?php if($package->invoice_count == 0): ?>
							<?php echo app('translator')->get('superadmin::lang.unlimited'); ?>
						<?php else: ?>
							<?php echo e($package->invoice_count, false); ?>

						<?php endif; ?>

						<?php echo app('translator')->get('superadmin::lang.invoices'); ?>
					</li>

					<?php if($package->trial_days != 0): ?>
						<li>
							<?php echo e($package->trial_days, false); ?> <?php echo app('translator')->get('superadmin::lang.trial_days'); ?>
						</li>
					<?php endif; ?>
				</ul>

				<ul class="list-group">
					<?php $__currentLoopData = $gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="list-group-item">
							<b><?php echo app('translator')->get('superadmin::lang.pay_via', ['method' => $v]); ?></b>
							
							<div class="row" id="paymentdiv_<?php echo e($k, false); ?>">
								<?php 
									$view = 'superadmin::subscription.partials.pay_'.$k;
								?>
								<?php if ($__env->exists($view)) echo $__env->make($view, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							</div>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/Superadmin/Providers/../Resources/views/subscription/pay.blade.php ENDPATH**/ ?>