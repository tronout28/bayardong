<?php if(!empty($faqs) && isset($faqs)): ?>
    <div class="block-39 space-between-blocks">
        <div class="container">
            <!-- HEADER -->
            <div class="col-lg-9 mx-auto text-center px-0 mb-5">
                <h1 class="block__title--big">Frequently Asked Questions</h1>
            </div>
            <div class="row px-2">
                <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-6">
                        <div class="content-block">
                            <h4 class="content-block__title">
                                <?php echo e($faq['question'] ?? '', false); ?>

                            </h4>
                            <p class="content-block__paragraph">
                                <?php echo e($faq['answer'] ?? '', false); ?>

                            </p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div> 
<?php endif; ?><?php /**PATH D:\Laravel\bayardong-project\bayardong.com\Modules\Cms\Providers/../Resources/views/frontend/pages/partials/faq.blade.php ENDPATH**/ ?>