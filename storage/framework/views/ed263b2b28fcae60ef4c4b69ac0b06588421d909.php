<div class="pos-tab-content active">
	<div class="row">
		<div class="col-md-8">
            <div class="form-group">
                <?php echo Form::label('logo', __('cms::lang.logo') . ':' ); ?>

                <div class="input-group">
                    <?php echo Form::file('logo', ['id' => 'logo', 'accept' => 'image/*']); ?>

                </div>
                <p class="help-block text-muted">
                    <?php echo app('translator')->get('cms::lang.previously_uploaded_will_be_removed'); ?>
                    <br>
                    <?php echo app('translator')->get('cms::lang.logo_dimension_help_txt'); ?>
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <?php if(!empty($logo) && !empty($logo->logo_url)): ?>
                <img src="<?php echo e($logo->logo_url, false); ?>" alt="Logo" class="app-logo">
            <?php endif; ?>
        </div>
	</div>
    <h4>
        <?php echo app('translator')->get('cms::lang.notification'); ?>
    </h4>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php echo Form::label('notifiable_email', __('cms::lang.email') . ':' ); ?>

                <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('cms::lang.inquiry_notification_help_text') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                <?php echo Form::text('notifiable_email', !empty($details['notifiable_email']) ? $details['notifiable_email'] : '', ['class' => 'form-control', 'id' => 'notifiable_email']); ?>

           </div>
           <p>
           		<small>
           			<?php echo e(__('cms::lang.inquiry_notification_help_text'), false); ?>

           		</small>
           </p>
        </div>
    </div>
</div><?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/Cms/Providers/../Resources/views/settings/partials/application.blade.php ENDPATH**/ ?>