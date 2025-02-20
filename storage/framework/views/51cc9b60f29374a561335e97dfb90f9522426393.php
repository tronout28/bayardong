
<?php $__env->startSection('title', $page->title); ?>
<?php
    $navbar_btn['text'] = 'Try For Free';
    $navbar_btn['link'] = route('business.getRegister');
    if(isset($__site_details['btns']) && isset($__site_details['btns']['navbar']) && !empty($__site_details['btns']['navbar']['text'])) {
        $navbar_btn['text'] = $__site_details['btns']['navbar']['text'] ?? 'Try For Free';
    }
    if(isset($__site_details['btns']) && isset($__site_details['btns']['navbar']) && !empty($__site_details['btns']['navbar']['link'])) {
        $navbar_btn['link'] = $__site_details['btns']['navbar']['link'] ?? route('business.getRegister');
    }
?>
<?php if ($__env->exists('cms::frontend.layouts.header')) echo $__env->make('cms::frontend.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('meta'); ?>
    <meta name="description" content="<?php echo e($page->meta_description, false); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="article-block space-between-blocks">
    <div class="container col-xxl-10 px-xxl-0">
        <div class="article col-xl-10 mx-auto">
            <div class="px-4 mb-4 text-center">
                <h1 class="article-block__title">
                    <?php echo e($page->title, false); ?>

                </h1>
            </div>
            <?php if(!empty($page->feature_image)): ?>
                <div class="article-block__header mb-5 py-4 px-xxl-5">
                    <img src="<?php echo e($page->feature_image_url ?? asset('modules/cms/img/default.png'), false); ?>" 
                    class="article-block__header-img w-100">
                </div>
            <?php endif; ?>
            <?php echo $page->content; ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    new Sticky("[sticky]");
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms::frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/Cms/Providers/../Resources/views/frontend/pages/custom_view.blade.php ENDPATH**/ ?>