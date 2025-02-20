
<?php $__env->startSection('title', __('cms::lang.cms')); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('cms::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php if($post_type == 'page'): ?>
            <?php echo app('translator')->get('cms::lang.page'); ?>
        <?php elseif($post_type == 'testimonial'): ?>
            <?php echo app('translator')->get('cms::lang.testimonial'); ?>
        <?php elseif($post_type == 'blog'): ?>
            <?php echo app('translator')->get('cms::lang.blog'); ?>
        <?php endif; ?>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
        <?php $__env->slot('tool'); ?>
        <div class="box-tools">
            <a class="btn btn-block btn-primary" 
                href="<?php echo e(action([\Modules\Cms\Http\Controllers\CmsPageController::class, 'create'], ['type' => $post_type]), false); ?>">
                <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></a>
            </div>
        <?php $__env->endSlot(); ?>
        <div class="row">
            <?php $__empty_1 = true; $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-md-4 page-box">
                    <?php $__env->startComponent('components.widget', ['class' => 'box box-solid', 'title' => $page->title]); ?>
                        <?php $__env->slot('tool'); ?>
                            <div class="box-tools" style="display: flex;">
                                <a class="btn btn-block btn-primary btn-xs"
                                    href="<?php echo e(action([\Modules\Cms\Http\Controllers\CmsPageController::class, 'edit'], [$page->id, 'type' => $post_type]), false); ?>">
                                    <i class="fa fa-edit"></i>
                                </a>
                                &nbsp;
                                <?php if(empty($page->layout)): ?>
                                    <button data-href="<?php echo e(action([\Modules\Cms\Http\Controllers\CmsPageController::class, 'destroy'], [$page->id, 'type' => $post_type]), false); ?>" class="btn btn-xs btn-danger delete_page">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </button>
                                <?php endif; ?>
                            </div>
                        <?php $__env->endSlot(); ?>
                        <p>
                            <b><?php echo app('translator')->get('cms::lang.priority'); ?>: </b> <?php echo e($page->priority, false); ?>

                        </p>
                        <p class="text-muted">
                            <?php echo app('translator')->get('lang_v1.added_on'); ?>: <?php echo e(\Carbon::createFromTimestamp(strtotime($page->created_at))->format(session('business.date_format') . ' ' . 'H:i'), false); ?>

                        </p>
                        <?php if(!empty($page->layout)): ?>
                            <p class="text-muted">
                                <?php echo app('translator')->get('cms::lang.layout'); ?>: <?php echo app('translator')->get('cms::lang.'.$page->layout); ?>
                            </p>
                        <?php endif; ?>
                        <?php if($page->is_enabled == 0): ?>
                           <span class="label bg-gray"><?php echo app('translator')->get('cms::lang.disabled'); ?></span>
                        <?php endif; ?>
                    <?php echo $__env->renderComponent(); ?>
                </div>
                <?php if($loop->iteration%3 == 0): ?>
                    <div class="clearfix"></div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-md-12">
                    <div class="callout callout-info">
                        <h3>
                            <i class="fas fa-exclamation-circle"></i>
                            <?php echo app('translator')->get('cms::lang.not_found_please_add_one'); ?>
                        </h3>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php echo $__env->renderComponent(); ?>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click', 'button.delete_page', function() {
            var page_box = $(this).closest('.page-box');
            swal({
                title: LANG.sure,
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then(willDelete => {
                if (willDelete) {
                    var href = $(this).data('href');
                    var data = $(this).serialize();
                    $.ajax({
                        method: 'DELETE',
                        url: href,
                        dataType: 'json',
                        data: data,
                        success: function(result) {
                            if (result.success == true) {
                                toastr.success(result.msg);
                                page_box.remove();
                            } else {
                                toastr.error(result.msg);
                            }
                        },
                    });
                }
            });
        });
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/Cms/Providers/../Resources/views/page/index.blade.php ENDPATH**/ ?>