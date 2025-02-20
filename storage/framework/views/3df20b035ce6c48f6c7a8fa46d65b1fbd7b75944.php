<!doctype html>
<html lang="en">
    <head>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- custom metas -->
        <?php if(!empty($__site_details['meta_tags'])): ?>
            <?php echo $__site_details['meta_tags']; ?>

        <?php endif; ?>

        <?php echo $__env->yieldContent('meta'); ?>

        <!-- font awesome 5 free -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
        <!-- Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>

        <!-- Your Custom CSS file that will include your blocks CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('modules/cms/css/cms.css?v=' . $asset_v), false); ?>">
        <script src="https://unpkg.com/tua-body-scroll-lock"></script>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">
        <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(config('app.name', 'ultimatePOS'), false); ?></title>
        <!-- custom css code -->
        <?php if(!empty($__site_details['custom_css'])): ?>
            <?php echo $__site_details['custom_css']; ?>

        <?php endif; ?>

        <!-- in app chat widget css -->
        <?php if(
            isset($__site_details['chat']) && 
            isset($__site_details['chat']['enable']) && 
            $__site_details['chat']['enable'] == 'in_app_chat'
        ): ?>
            <?php if ($__env->exists('cms::components.chat_widget.css.chat-widget-style.chat_widget-style1')) echo $__env->make('cms::components.chat_widget.css.chat-widget-style.chat_widget-style1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if ($__env->exists('cms::components.chat_widget.css.chat-widget-colors.color-green')) echo $__env->make('cms::components.chat_widget.css.chat-widget-colors.color-green', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php echo $__env->yieldContent('css'); ?>
        <style type="text/css">
            .far.fa-comments{
                padding-top: 3px !important;
                font-size: 25px !important;
            }
        </style>
    </head>
    <body>
        <?php echo $__env->yieldContent('content'); ?>

        <?php if(
            isset($__site_details['chat']) && 
            isset($__site_details['chat']['enable']) && 
            $__site_details['chat']['enable'] == 'in_app_chat'
        ): ?>
            <?php if ($__env->exists('cms::components.chat_widget.chat_widget')) echo $__env->make('cms::components.chat_widget.chat_widget', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if ($__env->exists('cms::frontend.layouts.footer')) echo $__env->make('cms::frontend.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/tua-body-scroll-lock"></script>
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sticky-js/1.3.0/sticky.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        <script src="<?php echo e(asset('modules/cms/js/cms.js?v=' . $asset_v), false); ?>"></script>

        <!-- Google analytics code -->
        <?php if(!empty($__site_details['google_analytics'])): ?>
            <?php echo $__site_details['google_analytics']; ?>

        <?php endif; ?>

        <!-- facebook pixel code -->
        <?php if(!empty($__site_details['fb_pixel'])): ?>
            <?php echo $__site_details['fb_pixel']; ?>

        <?php endif; ?>

        <!-- custom js -->
        <?php if(!empty($__site_details['custom_js'])): ?>
            <?php echo $__site_details['custom_js']; ?>

        <?php endif; ?>

        <!-- 3rd party chat_widget -->
        <?php if(
            (
                isset($__site_details['chat']) && 
                isset($__site_details['chat']['enable']) && 
                $__site_details['chat']['enable'] == 'other' &&
                !empty($__site_details['chat_widget'])
            ) ||
            (
                !isset($__site_details['chat']) &&
                empty($__site_details['chat']) &&
                !empty($__site_details['chat_widget'])
            )
        ): ?>
            <?php echo $__site_details['chat_widget']; ?>

        <?php endif; ?>
        <!-- in app chat js -->
        <?php if(
            isset($__site_details['chat']) && 
            isset($__site_details['chat']['enable']) && 
            $__site_details['chat']['enable'] == 'in_app_chat'
        ): ?>
            <?php if ($__env->exists('cms::components.chat_widget.js.chat_widget-style1')) echo $__env->make('cms::components.chat_widget.js.chat_widget-style1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php echo $__env->yieldContent('javascript'); ?>
    </body>
</html><?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/Cms/Providers/../Resources/views/frontend/layouts/app.blade.php ENDPATH**/ ?>