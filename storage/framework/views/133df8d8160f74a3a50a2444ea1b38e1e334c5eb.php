<?php
    $feature = [];
    if(
        isset($page_meta['feature']) && 
        isset($page_meta['feature']['meta_value']) &&
        !empty($page_meta['feature']['meta_value'])
    ) {
        $feature = json_decode($page_meta['feature']['meta_value'], true);
    }
    ?>
<?php if(!empty($feature)): ?>
    <div class="block-1 space-between-blocks" data-sticky-container="" id="features">
        <div class="container">
            <div class="row justify-content-center flex-column-reverse flex-lg-row px-2 mx-auto" id="block__container">
                <div class="col-lg-4 col-xl-6 mb-5 pe-lg-5">
                    <div sticky="" data-margin-top="30px">
                        <h1 class="block__title--big mb-3">
                            <?php echo e($feature['title'] ?? '', false); ?>

                        </h1>
                        <p class="block__paragraph--big mb-5">
                            <?php echo $feature['description'] ?? ''; ?>

                        </p>
                    </div>
                </div>
                <?php if(!empty($feature['content'])): ?>
                    <div class="col-lg-8 col-xl-6 gx-xxl-5">
                        <div class="row">
                            <?php $__currentLoopData = $feature['content']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($content['icon']) && !empty($content['title']) && !empty($content['description'])): ?>
                                    <div class="col-md-6 mb-2-1rem">
                                        <div class="card-1">
                                            <span class="fr-icon">
                                                <i class="<?php echo e($content['icon'], false); ?> fa-lg"></i>
                                            </span>
                                            <h3 class="card-1__title mb-2">
                                                <?php echo e($content['title'] ?? '', false); ?>

                                            </h3>
                                            <p class="card-1__paragraph">
                                                <?php echo e($content['description'] ?? '', false); ?>

                                            </p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?><?php /**PATH D:\Laravel\bayardong-project\bayardong.com\Modules\Cms\Providers/../Resources/views/frontend/pages/partials/features.blade.php ENDPATH**/ ?>