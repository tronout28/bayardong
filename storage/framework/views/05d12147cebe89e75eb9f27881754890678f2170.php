<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title"><?php echo $document_note->heading; ?></h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <?php echo $document_note->description; ?>

                </div>
            </div>
            <?php if(($document_note->media)->count() > 0): ?>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <h4><?php echo app('translator')->get('lang_v1.documents'); ?></h4>
                        <?php $__currentLoopData = $document_note->media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e($media->display_url, false); ?>" download="<?php echo e($media->display_name, false); ?>">
                                <i class="fa fa-download"></i>
                                <?php echo e($media->display_name, false); ?>

                            </a><br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="modal-footer">
            <span class="pull-left">
                <i class="fas fa-pencil-alt"></i>
                <?php echo e($document_note->createdBy->user_full_name, false); ?>

                &nbsp;
                <i class="fa fa-calendar-check-o"></i>
                <?php echo e(\Carbon::createFromTimestamp(strtotime($document_note->created_at))->format(session('business.date_format')), false); ?>

            </span>
            <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white tw-dw-btn-sm" data-dismiss="modal">
                <?php echo app('translator')->get('messages.close'); ?>
            </button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/documents_and_notes/show.blade.php ENDPATH**/ ?>