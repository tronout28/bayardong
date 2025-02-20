<?php $__env->startSection('title', __('lang_v1.register')); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-md-8 col-xs-12 col-md-offset-2 tw-mt-6">
        <div
            class=" tw-p-2 sm:tw-p-3 tw-mb-4 tw-transition-all tw-duration-200  tw-bg-white tw-shadow-sm tw-rounded-xl tw-ring-1 tw-ring-gray-200">
            <div class="tw-flex tw-flex-col tw-gap-4 tw-dw-rounded-box tw-dw-p-6 tw-dw-max-w-md">
                <div class="tw-flex tw-flex-col rounded-2xl tw-dw-p-6 tw-dw-max-w-md text-center">
                    
                    
                    <h1 class="tw-text-lg md:tw-text-xl tw-font-semibold tw-text-[#1e1e1e]">
                            <?php echo e(config('app.name', 'ultimatePOS'), false); ?>

                      </h1>
                      <h2 class="tw-text-sm tw-font-medium tw-text-gray-500">
                            <?php echo app('translator')->get('business.register_and_get_started_in_minutes'); ?>
                      </h2>
                </div>
            <?php echo Form::open([
                'url' => route('business.postRegister'),
                'method' => 'post',
                'id' => 'business_register_form',
                'files' => true,
            ]); ?>

            <?php echo $__env->make('business.partials.register_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo Form::hidden('package_id', $package_id); ?>

            <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.change_lang').click(function() {
                window.location = "<?php echo e(route('business.getRegister'), false); ?>?lang=" + $(this).attr('value');
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/business/register.blade.php ENDPATH**/ ?>