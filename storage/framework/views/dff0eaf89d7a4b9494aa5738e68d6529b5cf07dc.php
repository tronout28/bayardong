<?php if(!empty($testimonials) && count($testimonials) > 0): ?>
    <div class="block-20 space-between-blocks">
        <div class="container">
            <div class="col-lg-9 mx-auto text-center px-0 mb-5">
                <p class="block__paragraph--big">We have happy customers</p>
                <h1 class="block__title--big pb-5">What They Says About Us</h1>
            </div>
            <div class="row px-2 pt-4 mx-xxl-auto" id="block__container">
                <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 mb-1">
                        <div class="testimonial-card-1">
                            <div class="block-20-person">
                                <div class="mb-2">
                                    <img class="block-20-person__avatar" src="<?php echo e($testimonial->feature_image_url ?? 'https://ui-avatars.com/api/?name='.$testimonial->title, false); ?>"
                                        loading="lazy">
                                </div>
                                <div class="flex-grow-1 d-flex flex-column">
                                    <span class="block-20-person__rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span class="block-20-person__name my-1">
                                        <?php echo e($testimonial->title, false); ?>

                                    </span>
                                    <!-- <span class="block-20-person__info">
                                        Designation
                                    </span> -->
                                </div>
                            </div>
                            <div class="testimonial-card-1__paragraph mb-3">
                                <?php echo $testimonial->content; ?>

                            </div>
                            <span class="testimonial-card-1__quote-symbol">
                                <i class="fas fa-quote-left"></i>
                            </span>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endif; ?><?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/Cms/Providers/../Resources/views/frontend/pages/partials/testimonial.blade.php ENDPATH**/ ?>