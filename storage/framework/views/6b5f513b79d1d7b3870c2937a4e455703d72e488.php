<div class="fixed-nav-container">
    <nav class="hero-nav position-relative container mx-auto px-0">
        <ul class="nav w-100 list-unstyled align-items-center p-0">
            <li class="hero-nav__item">
                <a href="<?php echo e(url('/'), false); ?>">
                    <img class="hero-nav__logo" src="<?php echo e($__logo_url, false); ?>" 
                        change-src-onscroll="<?php echo e($__logo_url, false); ?>" alt="logo" loading="lazy">
                </a>
                <!-- Don't remove this empty span -->
                <span class="mx-2"></span>
            </li>
            <li id="hero-menu" class="flex-grow-1 hero__nav-list hero__nav-list--mobile-menu ft-menu">
                <ul class="hero__menu-content nav flex-column flex-lg-row ft-menu__slider animated list-unstyled p-2 p-lg-0">
                    <li class="flex-grow-1">
                        <ul class="nav nav--lg-side flex-column-reverse flex-lg-row-reverse list-unstyled align-items-center p-0">
                            <li class="flex-grow-1">
                                <ul class="nav nav--lg-side flex-column-reverse flex-lg-row-reverse list-unstyled align-items-center p-0">
                                    <li class="hero-nav__item">
                                        <a href="<?php echo e($navbar_btn['link'], false); ?>" target="_blank" 
                                            class="btn btn-primary">
                                            <?php echo e($navbar_btn['text'], false); ?>

                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                            <?php if(Auth::check()): ?>
                                <li class="hero-nav__item">
                                    <a href="<?php echo e(route('home'), false); ?>" class="hero-nav__link">
                                        <strong>
                                            <?php echo app('translator')->get('cms::lang.dashboard'); ?>
                                        </strong>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('login')): ?>
                                <?php if(!Auth::check()): ?>
                                    <li class="hero-nav__item">
                                        <a href="<?php echo e(route('login'), false); ?>" class="hero-nav__link">
                                            <strong>
                                                <?php echo app('translator')->get('lang_v1.login'); ?>
                                            </strong>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if($__blog_count >= 1): ?>
                                <li class="hero-nav__item">
                                    <a href="<?php echo e(action([\Modules\Cms\Http\Controllers\CmsController::class, 'getBlogList']), false); ?>" class="hero-nav__link">
                                        <?php echo e(__('cms::lang.blogs'), false); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(count($__pages) > 0): ?>
                                <li class="hero-nav__item hero-nav__item--with-dropdown">
                                    <span class="hero-nav__link" tabindex="1" role="button">
                                        <span class="flex-grow-1 me-2">
                                            Pages
                                        </span>
                                        <svg class="hero-nav__item-chevron bi bi-chevron-down" width=".8em" height=".8em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                                        </svg>
                                    </span>
                                    <div class="hero-nav__dropdown dropdown dropdown--of-1-columns">
                                        <div class="row flex-wrap">
                                            <div class="col-lg-12">
                                                <?php $__currentLoopData = $__pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="<?php echo e(action([\Modules\Cms\Http\Controllers\CmsPageController::class, 'showPage'], ['page' => $page->slug]), false); ?>" class="dropdown__link">
                                                        <!-- Don't remove this empty "span" -->
                                                        <span class="mx-2"></span>
                                                        <!-- ------------------------------ -->
                                                        <div class="dropdown__item">
                                                            <span class="dropdown__item-title">
                                                                <?php echo e($page->title, false); ?>

                                                            </span>
                                                        </div>
                                                    </a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <li class="hero-nav__item">
                                <a href="<?php echo e(route('cms.contact.us'), false); ?>" class="hero-nav__link">Contact us</a>
                            </li>
                            <?php if(Route::has('pricing') && config('app.env') != 'demo'): ?>
                                <li class="hero-nav__item">
                                    <a href="<?php echo e(action([\Modules\Superadmin\Http\Controllers\PricingController::class, 'index']), false); ?>" class="hero-nav__link">
                                        <?php echo app('translator')->get('superadmin::lang.pricing'); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <li class="hero-nav__item">
                                <a href="<?php echo e(url('/'), false); ?>" class="hero-nav__link">
                                   Home
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <button close-nav-menu="" class="ft-menu__close-btn animated">
                    <svg class="bi bi-x" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"></path>
                        <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </li>
            <li class="hero-nav__item d-lg-none d-flex flex-row-reverse">
                <button open-nav-menu="" class="text-center px-2">
                    <i class="fas fa-bars"></i>
                </button>
            </li>
        </ul>
    </nav>
</div><?php /**PATH D:\Laravel\bayardong-project\bayardong.com\Modules\Cms\Providers/../Resources/views/frontend/layouts/navbar.blade.php ENDPATH**/ ?>