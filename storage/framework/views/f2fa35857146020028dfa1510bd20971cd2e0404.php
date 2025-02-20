<div class="row text-center">
	<?php if(file_exists(public_path('uploads/logo.png'))): ?>
		<div class="col-xs-12">
			<img src="/uploads/logo.png" class="img-rounded" alt="Logo" width="150" style="margin-bottom: 30px;">
		</div>
	<?php else: ?>
    	<h1 class="text-center page-header"><?php echo e(config('app.name', 'ultimatePOS'), false); ?></h1>
    <?php endif; ?>
</div><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/layouts/partials/logo.blade.php ENDPATH**/ ?>