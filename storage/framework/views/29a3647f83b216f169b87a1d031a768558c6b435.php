<span id="view_contact_page"></span>
<div class="row">
    <div class="col-md-12">
        <div class="col-sm-4">
            <?php echo $__env->make('contact.contact_basic_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<?php echo $__env->make('contact.contact_tax_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-sm-4 mt-56">
            <?php echo $__env->make('contact.contact_more_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-sm-4 mt-56">
            <?php echo $__env->make('contact.contact_payment_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
        </div>

        <div class="col-sm-12">
        <?php if( $contact->type == 'supplier' || $contact->type == 'both'): ?>
            <a href="<?php echo e(action([\App\Http\Controllers\TransactionPaymentController::class, 'getPayContactDue'], [$contact->id]), false); ?>?type=purchase" class="pay_purchase_due tw-dw-btn tw-dw-btn-primary tw-text-white hover:tw-text-white tw-dw-btn-sm pull-right tw-m-2"><i class="fas fa-money-bill-alt" aria-hidden="true"></i> <?php echo app('translator')->get("contact.pay_due_amount"); ?></a>
        <?php endif; ?>
            <button type="button" class="tw-dw-btn tw-dw-btn-primary tw-text-white tw-dw-btn-sm pull-right tw-m-2" data-toggle="modal" data-target="#add_discount_modal"><i class="fas fa-percentage" aria-hidden="true"></i> <?php echo app('translator')->get('lang_v1.add_discount'); ?></button>
        </div>
    </div>
</div><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/contact/partials/contact_info_tab.blade.php ENDPATH**/ ?>