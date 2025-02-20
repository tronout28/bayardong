<?php $__env->startSection('title', __('lang_v1.manage_modules')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black">
        <?php echo app('translator')->get('lang_v1.manage_modules'); ?>
        <small class="tw-text-sm md:tw-text-base tw-text-gray-700 tw-font-semibold">Only superadmin can access manage modules</small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
    <button class="tw-dw-btn tw-dw-btn-primary tw-text-white tw-dw-btn-sm upload_module_btn tw-mt-4">
        <i class="fas fa-upload"></i>
        <?php echo app('translator')->get('lang_v1.upload_module'); ?>
    </button>

    <a class="tw-dw-btn tw-dw-btn-primary tw-text-white tw-dw-btn-sm pull-right tw-mt-4" href="<?php echo e(action([\App\Http\Controllers\Install\ModulesController::class, 'regenerate']), false); ?>">
        <i class="fas fa-tools"></i>
        Regenerate <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . "<br/>1. Regenerate/publish modules css/js to fix not found issue. <br/> 2. Publish api module oauth files" . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
    </a>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-md-12 form_col" style="display: none;">
        <?php $__env->startComponent('components.widget'); ?>
            <?php echo Form::open(['url' => action([\App\Http\Controllers\Install\ModulesController::class, 'uploadModule']), 'id' => 'upload_module_form','files' => true, 'style' => 'display:none']); ?>

                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <?php echo Form::label('module', __('lang_v1.upload_module') . ":*"); ?>


                            <?php echo Form::file('module', ['required', 'accept' => 'application/zip']); ?>

                            <p class="help-block">
                                <?php echo app('translator')->get("lang_v1.pls_upload_valid_zip_file"); ?>
                            </p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-4">
                        <button type="submit" class="tw-dw-btn tw-dw-btn-primary tw-text-white tw-dw-btn-sm">
                            <?php echo app('translator')->get('lang_v1.upload'); ?>
                        </button>
                        &nbsp;
                        <button type="button" class="tw-dw-btn tw-dw-btn-error tw-text-white tw-dw-btn-sm cancel_upload_btn">
                            <?php echo app('translator')->get('messages.cancel'); ?>
                        </button>
                    </div>
                </div>
            <?php echo Form::close(); ?>

        <?php echo $__env->renderComponent(); ?>
    </div>
    <div class="col-md-12">
    <?php $__env->startComponent('components.widget'); ?>
        <table class="table">
            <tr class="success">
                <th class="col-md-1">#</th>
                <th class="col-md-4"><?php echo app('translator')->get('lang_v1.modules'); ?></th>
                <th class="col-md-7"><?php echo app('translator')->get('lang_v1.description'); ?></th>
            </tr>
            <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <td>
                        <?php echo e($loop->iteration, false); ?>

                    </td>
                    <td>
                        <strong><?php echo e($module['name'], false); ?></strong> <br/>
                        <?php if(!$module['is_installed']): ?>
                            <a class="tw-dw-btn tw-dw-btn-xs tw-dw-btn-outline  tw-dw-btn-accent" 
                            <?php if($is_demo): ?>
                                href="#"
                                title="<?php echo app('translator')->get('lang_v1.disabled_in_demo'); ?>"
                                disabled
                            <?php else: ?>
                                href="<?php echo e($module['install_link'], false); ?>"
                            <?php endif; ?>
                            > <?php echo app('translator')->get('lang_v1.install'); ?></a>
                        <?php else: ?>
                            <a class="tw-dw-btn tw-dw-btn-xs tw-dw-btn-outline tw-dw-btn-warning"
                                <?php if($is_demo): ?>
                                    href="#"
                                    disabled
                                    title="<?php echo app('translator')->get('lang_v1.disabled_in_demo'); ?>"
                                <?php else: ?>
                                    href="<?php echo e($module['uninstall_link'], false); ?>"
                                <?php endif; ?>
                                onclick="return confirm('Do you really want to uninstall the module? Module will be uninstall but the data will not be deleted')"
                            ><?php echo app('translator')->get('lang_v1.uninstall'); ?>
                            </a>

                            
                        <?php endif; ?>

                        <form 
                            action="<?php echo e(action([\App\Http\Controllers\Install\ModulesController::class, 'destroy'], ['module_name' => $module['name']]), false); ?>"
                                style="display: inline;" 
                                method="post"
                                onsubmit="return confirm('Do you really want to delete the module? Module code will be deleted but the data will not be deleted')"
                            >
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                <button class="tw-dw-btn tw-dw-btn-xs tw-dw-btn-outline  tw-dw-btn-error"
                                    <?php if($is_demo): ?>
                                    disabled="disabled" 
                                    title="<?php echo app('translator')->get('lang_v1.disabled_in_demo'); ?>"
                                    <?php endif; ?>
                                >
                                <?php echo app('translator')->get('messages.delete'); ?></button>
                            </form>
                    </td>

                    <td>
                        <?php echo e($module['description'], false); ?> <br/>
                        <?php if(isset($module['version'])): ?>
                            <small class="label bg-gray"><?php echo app('translator')->get('lang_v1.version'); ?> <?php echo e($module['version']['installed_version'], false); ?></small>
                        <?php endif; ?>

                        <?php if(!empty($module['version']) && $module['version']['is_update_available']): ?>
                            <div class="alert alert-warning mt-5">
                                <i class="fas fa-sync"></i> <?php echo app('translator')->get('lang_v1.module_new_version', ['module' => $module['name'], 'link' => $module['update_link']]); ?> 
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <?php
                $mods = unserialize($mods);
            ?>

            <?php $__currentLoopData = $mods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(!isset($modules[$mod['n']])): ?>
                    <tr>
                        <td><i class="fas fa-hand-point-right fa-2x"></i></td>
                        <td>
                            <strong><?php echo e($mod['dn'], false); ?></strong> <br/>
                            <button onclick="window.open('<?php echo e($mod['u'], false); ?>', '_blank')" 
                            class="tw-dw-btn tw-dw-btn-xs tw-dw-btn-outline tw-dw-btn-accent"><i class="fas fa-money-bill"></i> Buy</button>
                        </td>
                        <td>
                            <?php echo e($mod['d'], false); ?>

                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <?php echo $__env->renderComponent(); ?>
    </div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    //show a hidden form on upload_module_btn click
    $(document).on('click', '.upload_module_btn', function(){
        $(".form_col,form#upload_module_form").fadeToggle();
    });

    //hide form on cancel_upload_btn click
    $(document).on('click', '.cancel_upload_btn', function(){
        $("form#upload_module_form")[0].reset();
        $(".form_col,form#upload_module_form").fadeOut();
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/install/modules/index.blade.php ENDPATH**/ ?>