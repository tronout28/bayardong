
<?php $__env->startSection('title', __('cms::lang.cms')); ?>
<?php $__env->startSection('css'); ?>
<style type="text/css">
    .app-logo{
        max-width: 100%;
        width: 100px;
        object-fit: contain;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('cms::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo app('translator')->get('cms::lang.site_details'); ?>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <?php echo Form::open(['action' => '\Modules\Cms\Http\Controllers\SettingsController@store', 'id' => 'site_details_form', 'method' => 'post', 'files' => true, 'enctype' => "multipart/form-data"]); ?>

        <div class="row">
            <div class="col-md-12">
                <?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>
                    <div class="row">
                        <div class="col-xs-12 pos-tab-container">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pos-tab-menu">
                                <div class="list-group">
                                    <a href="#" class="list-group-item text-center active">
                                        <?php echo app('translator')->get('cms::lang.application'); ?>
                                    </a>
                                    <a href="#" class="list-group-item text-center">
                                        <?php echo app('translator')->get('cms::lang.contact_us'); ?>
                                    </a>
                                    <a href="#" class="list-group-item text-center">
                                        <?php echo app('translator')->get('cms::lang.follow_us_on_social_media'); ?>
                                    </a>
                                    <a href="#" class="list-group-item text-center">
                                        <?php echo app('translator')->get('cms::lang.statistics'); ?>
                                    </a>
                                    <a href="#" class="list-group-item text-center">
                                        <?php echo app('translator')->get('cms::lang.faq'); ?>
                                    </a>
                                    <a href="#" class="list-group-item text-center">
                                        <?php echo app('translator')->get('cms::lang.chat_widget'); ?>
                                    </a>
                                    <a href="#" class="list-group-item text-center">
                                        <?php echo app('translator')->get('cms::lang.integration'); ?>
                                    </a>
                                    <a href="#" class="list-group-item text-center">
                                        <?php echo app('translator')->get('cms::lang.buttons'); ?>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 pos-tab">
                                <?php if ($__env->exists('cms::settings.partials.application')) echo $__env->make('cms::settings.partials.application', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php if ($__env->exists('cms::settings.partials.contact_us')) echo $__env->make('cms::settings.partials.contact_us', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php if ($__env->exists('cms::settings.partials.follow_us_on_social_media')) echo $__env->make('cms::settings.partials.follow_us_on_social_media', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php if ($__env->exists('cms::settings.partials.statistics')) echo $__env->make('cms::settings.partials.statistics', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php if ($__env->exists('cms::settings.partials.faqs')) echo $__env->make('cms::settings.partials.faqs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php if ($__env->exists('cms::settings.partials.chat_widget')) echo $__env->make('cms::settings.partials.chat_widget', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php if ($__env->exists('cms::settings.partials.integration')) echo $__env->make('cms::settings.partials.integration', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php if ($__env->exists('cms::settings.partials.buttons')) echo $__env->make('cms::settings.partials.buttons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <!--  </pos-tab-container> -->
                    </div>
                <?php echo $__env->renderComponent(); ?>
            </div>            
        </div>
        <div class="row">
            <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary submit-btn btn-lg"><?php echo app('translator')->get('messages.submit'); ?></button>
            </div>
        </div>
    <?php echo Form::close(); ?>

</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script type="text/javascript">

        function toggleChatDiv(option) {
            if(option == 'in_app_chat'){
                $('div.in_app_chat_div').removeClass('hide');
                $('div.third_party_chat_div').addClass('hide');
            } else {
                $('div.in_app_chat_div').addClass('hide');
                $('div.third_party_chat_div').removeClass('hide');
            }
        }
        
        $(document).on('change', '#chat_widget_option', function() {
            toggleChatDiv($(this).val());
        });

        toggleChatDiv($('#chat_widget_option').val());

        $(document).ready(function () {
            __page_leave_confirmation('#site_details_form');
            $("form#site_details_form").validate({
                submitHandler: function(form, e) {
                    if ($('form#site_details_form').valid()) {
                        window.onbeforeunload = null;
                        let post_submit_btn = Ladda.create(document.querySelector('.submit-btn'));
                        form.submit();
                        post_submit_btn.start();
                    }
                }
            });
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/Cms/Providers/../Resources/views/settings/index.blade.php ENDPATH**/ ?>