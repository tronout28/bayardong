<?php $request = app('Illuminate\Http\Request'); ?>

<div class="container-fluid">

    <!-- Language changer -->
    <div class="row">
      
        <div class="tw-absolute tw-top-2 md:tw-top-5 tw-left-4 md:tw-left-8 tw-flex tw-items-center tw-gap-4" style="text-align: left">
            <?php echo $__env->make('layouts.partials.language_btn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="tw-absolute tw-top-3 md:tw-top-8 tw-right-4 md:tw-right-10 tw-flex tw-items-center tw-gap-4 md:tw-gap-10"
            style="text-align: left">
            <?php if(!($request->segment(1) == 'business' && $request->segment(2) == 'register') && $request->segment(1) != 'login'): ?>
                <a class="tw-text-white tw-font-medium tw-text-sm md:tw-text-base hover:tw-text-white"
                    href="<?php echo e(action([\App\Http\Controllers\Auth\LoginController::class, 'login']), false); ?><?php if(!empty(request()->lang)): ?> <?php echo e('?lang=' . request()->lang, false); ?> <?php endif; ?>"><?php echo e(__('business.sign_in'), false); ?></a>
            <?php endif; ?>

            <!-- Register  -->
            <div class="tw-border-2 tw-border-white tw-rounded-full tw-h-10 md:tw-h-12 tw-w-24 tw-flex tw-items-center tw-justify-center">
                <?php if(!($request->segment(1) == 'business' && $request->segment(2) == 'register')): ?>

                    <!-- Register Url -->
                    <?php if(config('constants.allow_registration')): ?>
                        <a href="<?php echo e(route('business.getRegister'), false); ?><?php if(!empty(request()->lang)): ?> <?php echo e('?lang=' . request()->lang, false); ?> <?php endif; ?>"
                            class="tw-text-white tw-font-medium tw-text-sm md:tw-text-base hover:tw-text-white"><?php echo e(__('business.register'), false); ?>

                        </a>

                        <!-- pricing url -->
                        <?php if(Route::has('pricing') && config('app.env') != 'demo' && $request->segment(1) != 'pricing'): ?>
                            <a class="tw-text-white tw-font-medium tw-text-sm md:tw-text-base hover:tw-text-white"
                                href="<?php echo e(action([\Modules\Superadmin\Http\Controllers\PricingController::class, 'index']), false); ?>"><?php echo app('translator')->get('superadmin::lang.pricing'); ?></a>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/layouts/partials/header-auth.blade.php ENDPATH**/ ?>