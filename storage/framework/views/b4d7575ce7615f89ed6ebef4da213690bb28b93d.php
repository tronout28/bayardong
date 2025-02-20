<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="spacer"></div>
    <div class="row">
        <div class="col-md-12 text-right mb-12" >
            <?php if(!empty($payment_link)): ?>
                <a href="<?php echo e($payment_link, false); ?>" class="btn btn-info no-print" style="margin-right: 20px;"><i class="fas fa-money-check-alt" title="<?php echo app('translator')->get('lang_v1.pay'); ?>"></i> <?php echo app('translator')->get('lang_v1.pay'); ?>
                </a>
            <?php endif; ?>
            <button type="button" class="tw-dw-btn tw-dw-btn-primary tw-text-white no-print tw-dw-btn-sm" id="print_invoice" 
                 aria-label="Print"><i class="fas fa-print"></i> <?php echo app('translator')->get( 'messages.print' ); ?>
            </button>
            <?php if(auth()->guard()->check()): ?>
                <a href="<?php echo e(action([\App\Http\Controllers\SellController::class, 'index']), false); ?>" class="tw-dw-btn tw-dw-btn-success tw-text-white no-print tw-dw-btn-sm" ><i class="fas fa-backward"></i>
                </a>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-sm-12" style="border: 1px solid #ccc;">
            <div class="spacer"></div>
            <div id="invoice_content">
                <?php echo $receipt['html_content']; ?>

            </div>
            <div class="spacer"></div>
        </div>
    </div>
    <div class="spacer"></div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click', '#print_invoice', function(){
            $('#invoice_content').printThis();
        });
    });
    <?php if(!empty(request()->input('print_on_load'))): ?>
        $(window).on('load', function(){
            $('#invoice_content').printThis();
        });
    <?php endif; ?>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/sale_pos/partials/show_invoice.blade.php ENDPATH**/ ?>