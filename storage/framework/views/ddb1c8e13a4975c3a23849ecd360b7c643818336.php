<table class="table table-condensed">
	<?php $__empty_1 = true; $__currentLoopData = $medias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
		<tr>
			<td>
				<?php if(isFileImage($media->display_url)): ?>
					<?php echo $media->thumbnail(); ?>

					<br>
				<?php endif; ?>
				<?php echo e($media->display_name, false); ?>

			</td>
			<td>
				<small>
					<?php echo app('translator')->get('lang_v1.uploaded_by'); ?>:
					<?php echo e($media->uploaded_by_user->user_full_name, false); ?>

				</small>
			</td>
			<td>
				<a href="<?php echo e($media->display_url, false); ?>" download="<?php echo e($media->display_name, false); ?>" class="tw-dw-btn tw-dw-btn-xs tw-dw-btn-outline  tw-dw-btn-accent no-print"><i class="fas fa-download"></i> <?php echo app('translator')->get('lang_v1.download'); ?></a>
				<?php if(!empty($delete)): ?>
					<button type="button" data-href="<?php echo e(action([\App\Http\Controllers\ProductController::class, 'deleteMedia'], [$media->id]), false); ?>" class="tw-dw-btn tw-dw-btn-xs tw-dw-btn-outline  tw-dw-btn-error delete-media no-print"><i class="fas fa-trash"></i> <?php echo app('translator')->get('messages.delete'); ?></a>
				<?php endif; ?>
			</td>
		</tr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
		<tr>
			<td colspan="3" class="text-center"><?php echo app('translator')->get('lang_v1.no_attachment_found'); ?></td>
		</tr>
	<?php endif; ?>
</table><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/sell/partials/media_table.blade.php ENDPATH**/ ?>