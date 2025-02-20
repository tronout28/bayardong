<?php if(!empty($statistics)): ?>
    <div class="block-38 space-between-blocks">
        <div class="container">
            <!-- HEADER -->
            <div class="col-lg-9 mx-auto text-center px-0 mb-5">
                <h1 class="block__title--big mb-3">
                    <?php echo e($statistics['tagline'] ?? '', false); ?>

                </h1>
                <p class="block__paragraph--big mb-0 mx-3">
                    <?php echo e($statistics['description'] ?? '', false); ?>

                </p>
            </div>
            <ul class="stats row list-unstyled text-center mx-auto p-4 p-lg-5">
                <?php if(isset($statistics['content']) && !empty($statistics['content'])): ?>
                    <?php $__currentLoopData = $statistics['content']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stats): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="stats__li col-6 col-lg-3 p-0">
                            <span class="stats__number">
                                <?php echo e($stats['stats'] ?? '', false); ?>

                            </span>
                            <p class="stats__text">
                                <?php echo e($stats['title'] ?? '', false); ?>

                            </p>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
<?php endif; ?><?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/Cms/Providers/../Resources/views/frontend/pages/partials/statistics.blade.php ENDPATH**/ ?>