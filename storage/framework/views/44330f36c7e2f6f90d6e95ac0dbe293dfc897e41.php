<header class="hero container-fluid">
    <div class="hero__content container mx-auto">
        <!-- I'm putting the nav inside this "fixed-nav-container" to fix some issues happens on scroll -->
        <?php if ($__env->exists('cms::frontend.layouts.navbar')) echo $__env->make('cms::frontend.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</header><?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/Cms/Providers/../Resources/views/frontend/layouts/header.blade.php ENDPATH**/ ?>