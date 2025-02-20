
<?php $__env->startSection('title', 'Home'); ?>
<?php
    $navbar_btn['text'] = 'Try For Free';
    $navbar_btn['link'] = route('business.getRegister');
    if(isset($__site_details['btns']) && isset($__site_details['btns']['navbar']) && !empty($__site_details['btns']['navbar']['text'])) {
        $navbar_btn['text'] = $__site_details['btns']['navbar']['text'] ?? 'Try For Free';
    }
    if(isset($__site_details['btns']) && isset($__site_details['btns']['navbar']) && !empty($__site_details['btns']['navbar']['link'])) {
        $navbar_btn['link'] = $__site_details['btns']['navbar']['link'] ?? route('business.getRegister');
    }

    $hero_btn['text'] = 'Start your Free Trial';
    $hero_btn['link'] = route('business.getRegister');
    if(isset($__site_details['btns']) && isset($__site_details['btns']['hero']) && !empty($__site_details['btns']['hero']['text'])) {
        $hero_btn['text'] = $__site_details['btns']['hero']['text'] ?? 'Start your Free Trial';
    }
    if(isset($__site_details['btns']) && isset($__site_details['btns']['hero']) && !empty($__site_details['btns']['hero']['link'])) {
        $hero_btn['link'] = $__site_details['btns']['hero']['link'] ?? route('business.getRegister');
    }

    $industry_btn['text'] = 'Get Started';
    $industry_btn['link'] = route('business.getRegister');
    if(isset($__site_details['btns']) && isset($__site_details['btns']['industry']) && !empty($__site_details['btns']['industry']['text'])) {
        $industry_btn['text'] = $__site_details['btns']['industry']['text'] ?? 'Get Started';
    }
    if(isset($__site_details['btns']) && isset($__site_details['btns']['industry']) && !empty($__site_details['btns']['industry']['link'])) {
        $industry_btn['link'] = $__site_details['btns']['industry']['link'] ?? route('business.getRegister');
    }

    $cta_btn['text'] = 'Try Now';
    $cta_btn['link'] = route('business.getRegister');
    if(isset($__site_details['btns']) && isset($__site_details['btns']['cta']) && !empty($__site_details['btns']['cta']['text'])) {
        $cta_btn['text'] = $__site_details['btns']['cta']['text'] ?? 'Try Now';
    }
    if(isset($__site_details['btns']) && isset($__site_details['btns']['cta']) && !empty($__site_details['btns']['cta']['link'])) {
        $cta_btn['link'] = $__site_details['btns']['cta']['link'] ?? route('business.getRegister');
    }
?>
<?php if ($__env->exists('cms::frontend.layouts.home_header')) echo $__env->make('cms::frontend.layouts.home_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('meta'); ?>
    <meta name="description" content="<?php echo e($page->meta_description, false); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php
    $page_meta = $page->pageMeta->keyBy('meta_key');
?>
<!------------------------------>
<!--Features---------------->
<!------------------------------>
<?php if ($__env->exists('cms::frontend.pages.partials.features', ['page_meta' => $page_meta])) echo $__env->make('cms::frontend.pages.partials.features', ['page_meta' => $page_meta], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!------------------------------>
<!--Industries---------------->
<!------------------------------>
<?php if ($__env->exists('cms::frontend.pages.partials.industries', ['page_meta' => $page_meta])) echo $__env->make('cms::frontend.pages.partials.industries', ['page_meta' => $page_meta], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!------------------------------>
<!--Stats---------------->
<!------------------------------>
<?php if ($__env->exists('cms::frontend.pages.partials.statistics', ['statistics' => $statistics ?? []])) echo $__env->make('cms::frontend.pages.partials.statistics', ['statistics' => $statistics ?? []], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!------------------------------>
<!--Testimonial---------------->
<!------------------------------>
<?php if ($__env->exists('cms::frontend.pages.partials.testimonial', ['testimonials' => $testimonials ?? []])) echo $__env->make('cms::frontend.pages.partials.testimonial', ['testimonials' => $testimonials ?? []], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!------------------------------>
<!--CTA---------------->
<!------------------------------>
<?php if ($__env->exists('cms::frontend.pages.partials.cta')) echo $__env->make('cms::frontend.pages.partials.cta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!------------------------------>
<!--FAQ---------------->
<!------------------------------>
<?php if ($__env->exists('cms::frontend.pages.partials.faq', ['faqs' => $faqs ?? []])) echo $__env->make('cms::frontend.pages.partials.faq', ['faqs' => $faqs ?? []], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    new Sticky("[sticky]");
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms::frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\bayardong-project\bayardong.com\Modules\Cms\Providers/../Resources/views/frontend/pages/home.blade.php ENDPATH**/ ?>