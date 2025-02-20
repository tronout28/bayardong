<header class="hero container-fluid">
    <div class="hero__content container mx-auto">
        <!-- I'm putting the nav inside this "fixed-nav-container" to fix some issues happens on scroll -->
        <?php if ($__env->exists('cms::frontend.layouts.navbar')) echo $__env->make('cms::frontend.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
           <!------------------------------>
    <!--Hero---------------->
    <!------------------------------>
        <div class="hero__body col-lg-7 px-0">
            <h1 class="hero__title mb-4">
                <?php echo e($page->title, false); ?>

            </h1>
            <div class="hero__paragraph mx-0 mb-4">
                <?php echo $page->content; ?>

            </div>
            <div class="hero__btns-container">
                <a class="hero__btn btn btn-primary mb-2 mb-lg-0 mx-1 mx-lg-2" href="<?php echo e($hero_btn['link'], false); ?>">
                    <?php echo e($hero_btn['text'], false); ?>

                </a>
                <!-- <a class="hero__btn btn btn-secondary mb-2 mb-lg-0 mx-1 mx-lg-2" href="<?php echo e(route('business.getRegister'), false); ?>">
                    Get access for $4.9
                </a> -->
            </div>
        </div>
    </div>
    <div class="hero__row d-block d-lg-flex row">
        <div class="hero__empty-column col-lg-7"></div>
        <?php
            $bg_img_url = asset('modules/cms/img/home.png');
            if(!empty($page->feature_image_url)) {
                $bg_img_url = $page->feature_image_url;
            }
        ?>
        <div class="hero__image-column col-lg-5" 
            style="background-image: url(<?php echo e($bg_img_url, false); ?>);">
        </div>
    </div>
</header><?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/Cms/Providers/../Resources/views/frontend/layouts/home_header.blade.php ENDPATH**/ ?>