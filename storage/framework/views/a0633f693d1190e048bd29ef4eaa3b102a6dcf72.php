
<?php $__env->startSection('title', __('cms::lang.blog')); ?>
<?php $__env->startSection('css'); ?>
<style type="text/css">
    .blog-img{
        height: 232px !important;
        object-fit: cover !important;
        max-width: 100% !important;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if ($__env->exists('cms::frontend.layouts.header')) echo $__env->make('cms::frontend.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="article-block space-between-blocks">
    <div class="container col-xxl-10 px-xxl-0">
        <div class="article col-xl-10 mx-auto">
            <div class="px-4 mb-4 text-center">
                <h1 class="article-block__title">
                    Latest Blogs
                </h1>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php $__empty_1 = true; $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="<?php echo e($blog->feature_image_url ?? asset('modules/cms/img/default.png'), false); ?>"
                            class="blog-img" 
                            loading="lazy">
                        <div class="card-body">
                            <a href="<?php echo e(action([\Modules\Cms\Http\Controllers\CmsController::class, 'viewBlog'], ['id' => $blog->id, 'slug' => $blog->slug]), false); ?>" class="text-decoration-none text-dark">
                                <h4>
                                    <?php echo e($blog->title, false); ?>

                                </h4>
                            </a>
                            <?php if(!empty($blog->meta_description)): ?>
                                <p class="card-text"
                                    title="<?php echo e($blog->meta_description, false); ?>">
                                    <?php echo e(substr($blog->meta_description,0,160), false); ?>...
                                </p>
                            <?php endif; ?>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a type="button" class="hero__btn btn btn-secondary mb-2 mb-lg-0 mx-1 mx-lg-2"
                                        href="<?php echo e(action([\Modules\Cms\Http\Controllers\CmsController::class, 'viewBlog'], ['id' => $blog->id, 'slug' => $blog->slug]), false); ?>">
                                        Read more
                                    </a>
                                </div>
                                <small class="text-muted" title="last updated">
                                    <?php echo e(\Carbon\Carbon::parse($blog->created_at)->diffForHumans(), false); ?>

                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col text-center">
                    <h1>
                        No blogs written!
                    </h1>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms::frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/Cms/Providers/../Resources/views/frontend/blogs/index.blade.php ENDPATH**/ ?>