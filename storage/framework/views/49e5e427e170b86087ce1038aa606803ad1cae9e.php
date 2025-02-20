<section class="no-print">
    <nav class="navbar navbar-default bg-white m-4">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo e(action([\Modules\Cms\Http\Controllers\CmsPageController::class, 'index'], ['type' => 'page']), false); ?>"><i class="fas fa-window-restore"></i> <?php echo e(__('cms::lang.cms'), false); ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li <?php if(request()->segment(2) == 'site-details'): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e(action([\Modules\Cms\Http\Controllers\SettingsController::class, 'index']), false); ?>">
                            <?php echo app('translator')->get('cms::lang.site_details'); ?>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li <?php if(request()->type == 'page'): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e(action([\Modules\Cms\Http\Controllers\CmsPageController::class, 'index'], ['type' => 'page']), false); ?>">
                            <?php echo app('translator')->get('cms::lang.page'); ?>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li <?php if(request()->type == 'blog'): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e(action([\Modules\Cms\Http\Controllers\CmsPageController::class, 'index'], ['type' => 'blog']), false); ?>">
                            <?php echo app('translator')->get('cms::lang.blog'); ?>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li <?php if(request()->type == 'testimonial'): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e(action([\Modules\Cms\Http\Controllers\CmsPageController::class, 'index'], ['type' => 'testimonial']), false); ?>">
                            <?php echo app('translator')->get('cms::lang.testimonial'); ?>
                        </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</section><?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/Cms/Providers/../Resources/views/layouts/nav.blade.php ENDPATH**/ ?>