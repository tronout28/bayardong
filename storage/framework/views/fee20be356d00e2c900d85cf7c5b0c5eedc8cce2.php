<!-- Left side column. contains the logo and sidebar -->
<aside class="side-bar tw-relative tw-hidden tw-h-full tw-bg-white tw-w-64 xl:tw-w-64 lg:tw-flex lg:tw-flex-col tw-shrink-0 no-print">

    <!-- sidebar: style can be found in sidebar.less -->
    <a href="<?php echo e(route('home'), false); ?>"
        class="tw-flex tw-items-center tw-justify-center tw-w-full tw-border-r tw-h-15 tw-bg-<?php if(!empty(session('business.theme_color'))): ?><?php echo e(session('business.theme_color'), false); ?><?php else: ?><?php echo e('primary', false); ?><?php endif; ?>-800 tw-shrink-0 tw-border-primary-500/30">
		<?php if(!empty(Session::get('business.logo'))): ?>
			<img src="<?php echo e(asset('/uploads/business_logos/'.Session::get('business.logo')), false); ?>" alt="<?php echo e(Session::get('business.name'), false); ?>" style="max-width: 240px;">
		<?php else: ?>
			<p class="tw-text-lg tw-font-medium tw-text-white side-bar-heading tw-text-center">
				<?php echo e(Session::get('business.name'), false); ?> <span class="tw-inline-block tw-w-3 tw-h-3 tw-bg-green-400 tw-rounded-full" title="Online"></span>
			</p>
		<?php endif; ?>
    </a>
    <!-- Sidebar Menu -->
    <?php echo Menu::render('admin-sidebar-menu', 'adminltecustom'); ?>

    <!-- /.sidebar-menu -->
    <!-- /.sidebar -->
</aside>
<?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/layouts/partials/sidebar.blade.php ENDPATH**/ ?>