<div class="pos-tab-content">
    <div class="row">
    	<div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('essentials_todos_prefix',  __('essentials::lang.essentials_todos_prefix') . ':'); ?>

                <?php echo Form::text('essentials_todos_prefix', !empty($settings['essentials_todos_prefix']) ? $settings['essentials_todos_prefix'] : null, ['class' => 'form-control','placeholder' => __('essentials::lang.essentials_todos_prefix')]); ?>

            </div>
        </div>
    </div>
</div><?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/Essentials/Providers/../Resources/views/settings/partials/essentials_settings.blade.php ENDPATH**/ ?>