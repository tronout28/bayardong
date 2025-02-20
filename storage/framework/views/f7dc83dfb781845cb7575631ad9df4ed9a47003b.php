<?php
    $is_mobile = isMobile();
?>
<div class="row">
    <div class="pos-form-actions tw-rounded-tr-xl tw-rounded-tl-xl tw-shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] tw-bg-white ">
        <div class="tw-flex tw-items-center tw-justify-between tw-flex-col sm:tw-flex-row md:tw-flex-row lg:tw-flex-row xl:tw-flex-row tw-gap-2 tw-px-4 tw-py-0 tw-overflow-x-auto tw-w-full">

            <div class="md:!tw-w-none !tw-flex md:!tw-hidden !tw-flex-row !tw-items-center !tw-gap-3">
                <div class="tw-pos-total tw-flex tw-items-center tw-gap-3">
                    <div class="tw-text-black tw-font-bold tw-text-sm tw-flex tw-items-center tw-flex-col tw-leading-1">
                        <div><?php echo app('translator')->get('sale.total_payable'); ?>:</div>
                    </div>
                    <input type="hidden" name="final_total" id="final_total_input" value="0">
                    <span id="total_payable" class="tw-text-green-900 tw-font-bold tw-text-sm number">0</span>
                </div>
            </div>

            <div class="!tw-w-full md:!tw-w-none !tw-flex md:!tw-hidden !tw-flex-row !tw-items-center !tw-gap-3">
                <?php if(!Gate::check('disable_pay_checkout') || auth()->user()->can('superadmin') || auth()->user()->can('admin')): ?>
                    <button type="button"
                        class=" tw-flex tw-flex-row tw-items-center tw-justify-center tw-gap-1 tw-font-bold tw-text-white tw-cursor-pointer tw-text-xs md:tw-text-sm tw-bg-[#001F3E] tw-rounded-md tw-p-2 tw-w-[8.5rem] <?php if(!$is_mobile): ?>  <?php endif; ?> no-print <?php if($pos_settings['disable_pay_checkout'] != 0): ?> hide <?php endif; ?>"
                        id="pos-finalize" title="<?php echo app('translator')->get('lang_v1.tooltip_checkout_multi_pay'); ?>"><i class="fas fa-money-check-alt"
                            aria-hidden="true"></i> <?php echo app('translator')->get('lang_v1.checkout_multi_pay'); ?> </button>
                <?php endif; ?>

                <?php if(!Gate::check('disable_express_checkout') || auth()->user()->can('superadmin') || auth()->user()->can('admin')): ?>
                    <button type="button"
                        class="tw-font-bold tw-text-white tw-cursor-pointer tw-text-xs md:tw-text-sm tw-bg-[rgb(40,183,123)] tw-p-2 tw-rounded-md tw-w-[5.5rem] tw-flex tw-flex-row tw-items-center tw-justify-center tw-gap-1 <?php if(!$is_mobile): ?>  <?php endif; ?> no-print <?php if($pos_settings['disable_express_checkout'] != 0 || !array_key_exists('cash', $payment_types)): ?> hide <?php endif; ?> pos-express-finalize <?php if($is_mobile): ?> col-xs-6 <?php endif; ?>"
                        data-pay_method="cash" title="<?php echo app('translator')->get('tooltip.express_checkout'); ?>"> <i class="fas fa-money-bill-alt"
                            aria-hidden="true"></i> <?php echo app('translator')->get('lang_v1.express_checkout_cash'); ?></button>
                <?php endif; ?>
                <?php if(empty($edit)): ?>
                    <button type="button" class="tw-font-bold tw-text-white tw-cursor-pointer tw-text-xs md:tw-text-sm tw-bg-red-600 tw-p-2 tw-rounded-md tw-w-[5.5rem] tw-flex tw-flex-row tw-items-center tw-justify-center tw-gap-1" id="pos-cancel"> <i
                            class="fas fa-window-close"></i> <?php echo app('translator')->get('sale.cancel'); ?></button>
                <?php else: ?>
                    <button type="button" class="btn-danger tw-dw-btn hide tw-dw-btn-xs" id="pos-delete"
                        <?php if(!empty($only_payment)): ?> disabled <?php endif; ?>> <i class="fas fa-trash-alt"></i>
                        <?php echo app('translator')->get('messages.delete'); ?></button>
                <?php endif; ?>
            </div>
            <div class="tw-flex tw-items-center tw-gap-4 tw-flex-row tw-overflow-x-auto">

                <?php if(!Gate::check('disable_draft') || auth()->user()->can('superadmin') || auth()->user()->can('admin')): ?>
                    <button type="button"
                        class="tw-font-bold tw-text-gray-700 tw-text-xs md:tw-text-sm tw-flex tw-flex-col tw-items-center tw-justify-center tw-gap-1 <?php if($pos_settings['disable_draft'] != 0): ?> hide <?php endif; ?>"
                        id="pos-draft" <?php if(!empty($only_payment)): ?> disabled <?php endif; ?>><i
                            class="fas fa-edit tw-text-[#009ce4]"></i> <?php echo app('translator')->get('sale.draft'); ?></button>
                <?php endif; ?>

                <?php if(!Gate::check('disable_quotation') || auth()->user()->can('superadmin') || auth()->user()->can('admin')): ?>
                    <button type="button"
                        class="tw-font-bold tw-text-gray-700 tw-cursor-pointer tw-text-xs md:tw-text-sm tw-flex tw-flex-col tw-items-center tw-justify-center tw-gap-1 <?php if($is_mobile): ?> col-xs-6 <?php endif; ?>"
                        id="pos-quotation" <?php if(!empty($only_payment)): ?> disabled <?php endif; ?>><i
                            class="fas fa-edit tw-text-[#E7A500]"></i> <?php echo app('translator')->get('lang_v1.quotation'); ?></button>
                <?php endif; ?>

                <?php if(!Gate::check('disable_suspend_sale') || auth()->user()->can('superadmin') || auth()->user()->can('admin')): ?>
                    <?php if(empty($pos_settings['disable_suspend'])): ?>
                        <button type="button"
                            class="tw-font-bold tw-text-gray-700 tw-cursor-pointer tw-text-xs md:tw-text-sm tw-flex tw-flex-col tw-items-center tw-justify-center tw-gap-1  no-print pos-express-finalize"
                            data-pay_method="suspend" title="<?php echo app('translator')->get('lang_v1.tooltip_suspend'); ?>"
                            <?php if(!empty($only_payment)): ?> disabled <?php endif; ?>>
                            <i class="fas fa-pause tw-text-[#EF4B51]" aria-hidden="true"></i>
                            <?php echo app('translator')->get('lang_v1.suspend'); ?>
                        </button>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if(!Gate::check('disable_credit_sale') || auth()->user()->can('superadmin') || auth()->user()->can('admin')): ?>
                    <?php if(empty($pos_settings['disable_credit_sale_button'])): ?>
                        <input type="hidden" name="is_credit_sale" value="0" id="is_credit_sale">
                        <button type="button"
                            class=" tw-font-bold tw-text-gray-700 tw-cursor-pointer tw-text-xs md:tw-text-sm tw-flex tw-flex-col tw-items-center tw-justify-center tw-gap-1 no-print pos-express-finalize <?php if($is_mobile): ?> col-xs-6 <?php endif; ?>"
                            data-pay_method="credit_sale" title="<?php echo app('translator')->get('lang_v1.tooltip_credit_sale'); ?>"
                            <?php if(!empty($only_payment)): ?> disabled <?php endif; ?>>
                            <i class="fas fa-check tw-text-[#5E5CA8]" aria-hidden="true"></i> <?php echo app('translator')->get('lang_v1.credit_sale'); ?>
                        </button>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(!Gate::check('disable_card') || auth()->user()->can('superadmin') || auth()->user()->can('admin')): ?>
                    <button type="button"
                        class="tw-font-bold tw-text-gray-700 tw-cursor-pointer tw-text-xs md:tw-text-sm tw-flex tw-flex-col tw-items-center tw-justify-center tw-gap-1  no-print <?php if(!empty($pos_settings['disable_suspend'])): ?>  <?php endif; ?> pos-express-finalize <?php if(!array_key_exists('card', $payment_types)): ?> hide <?php endif; ?> <?php if($is_mobile): ?> col-xs-6 <?php endif; ?>"
                        data-pay_method="card" title="<?php echo app('translator')->get('lang_v1.tooltip_express_checkout_card'); ?>">
                        <i class="fas fa-credit-card tw-text-[#D61B60]" aria-hidden="true"></i> <?php echo app('translator')->get('lang_v1.express_checkout_card'); ?>
                    </button>
                <?php endif; ?>

                <?php if(!Gate::check('disable_pay_checkout') || auth()->user()->can('superadmin') || auth()->user()->can('admin')): ?>
                    <button type="button"
                        class="tw-hidden md:tw-flex md:tw-flex-row md:tw-items-center md:tw-justify-center md:tw-gap-1 tw-font-bold tw-text-white tw-cursor-pointer tw-text-xs md:tw-text-sm tw-bg-[#001F3E] tw-rounded-md tw-p-2 tw-w-[8.5rem] <?php if(!$is_mobile): ?>  <?php endif; ?> no-print <?php if($pos_settings['disable_pay_checkout'] != 0): ?> hide <?php endif; ?>"
                        id="pos-finalize" title="<?php echo app('translator')->get('lang_v1.tooltip_checkout_multi_pay'); ?>"><i class="fas fa-money-check-alt"
                            aria-hidden="true"></i> <?php echo app('translator')->get('lang_v1.checkout_multi_pay'); ?> </button>
                <?php endif; ?>

                <?php if(!Gate::check('disable_express_checkout') || auth()->user()->can('superadmin') || auth()->user()->can('admin')): ?>
                    <button type="button"
                        class="tw-font-bold tw-text-white tw-cursor-pointer tw-text-xs md:tw-text-sm tw-bg-[rgb(40,183,123)] tw-p-2 tw-rounded-md tw-w-[8.5rem] tw-hidden md:tw-flex lg:tw-flex lg:tw-flex-row lg:tw-items-center lg:tw-justify-center lg:tw-gap-1 <?php if(!$is_mobile): ?>  <?php endif; ?> no-print <?php if($pos_settings['disable_express_checkout'] != 0 || !array_key_exists('cash', $payment_types)): ?> hide <?php endif; ?> pos-express-finalize"
                        data-pay_method="cash" title="<?php echo app('translator')->get('tooltip.express_checkout'); ?>"> <i class="fas fa-money-bill-alt"
                            aria-hidden="true"></i> <?php echo app('translator')->get('lang_v1.express_checkout_cash'); ?></button>
                <?php endif; ?>


                <?php if(empty($edit)): ?>
                    <button type="button"
                        class="tw-font-bold tw-text-white tw-cursor-pointer tw-text-xs md:tw-text-sm tw-bg-red-600 tw-p-2 tw-rounded-md tw-w-[8.5rem] tw-hidden md:tw-flex lg:tw-flex lg:tw-flex-row lg:tw-items-center lg:tw-justify-center lg:tw-gap-1"
                        id="pos-cancel"> <i class="fas fa-window-close"></i> <?php echo app('translator')->get('sale.cancel'); ?></button>
                <?php else: ?>
                    <button type="button"
                        class="tw-font-bold tw-text-white tw-cursor-pointer tw-text-xs md:tw-text-sm tw-bg-red-600 tw-p-2 tw-rounded-md tw-w-[8.5rem] tw-hidden md:tw-flex lg:tw-flex lg:tw-flex-row lg:tw-items-center lg:tw-justify-center lg:tw-gap-1 hide"
                        id="pos-delete" <?php if(!empty($only_payment)): ?> disabled <?php endif; ?>> <i
                            class="fas fa-trash-alt"></i> <?php echo app('translator')->get('messages.delete'); ?></button>
                <?php endif; ?>

                <?php if(!$is_mobile): ?>
                    <div class="pos-total md:tw-flex md:tw-items-center md:tw-gap-3 tw-hidden">
                        <div
                            class="tw-text-black tw-font-bold tw-text-base md:tw-text-2xl tw-flex tw-items-center tw-flex-col">
                            <div><?php echo app('translator')->get('sale.total_payable'); ?>:</div>
                        </div>
                        <input type="hidden" name="final_total" id="final_total_input" value="0">
                        <span id="total_payable"
                            class="tw-text-green-900 tw-font-bold tw-text-base md:tw-text-2xl number">0</span>
                    </div>
                <?php endif; ?>
            </div>

            <div class="tw-w-full md:tw-w-fit tw-flex tw-flex-col tw-items-end tw-gap-3 tw-hidden md:tw-block">
                <?php if(!isset($pos_settings['hide_recent_trans']) || $pos_settings['hide_recent_trans'] == 0): ?>
                    <button type="button"
                        class="tw-font-bold tw-bg-[#646EE4] hover:tw-bg-[#414aac] tw-rounded-full tw-text-white tw-w-full md:tw-w-fit tw-px-5 tw-h-11 tw-cursor-pointer tw-text-xs md:tw-text-sm"
                        data-toggle="modal" data-target="#recent_transactions_modal" id="recent-transactions"> <i
                            class="fas fa-clock"></i> <?php echo app('translator')->get('lang_v1.recent_transactions'); ?></button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php if(isset($transaction)): ?>
    <?php echo $__env->make('sale_pos.partials.edit_discount_modal', [
        'sales_discount' => $transaction->discount_amount,
        'discount_type' => $transaction->discount_type,
        'rp_redeemed' => $transaction->rp_redeemed,
        'rp_redeemed_amount' => $transaction->rp_redeemed_amount,
        'max_available' => !empty($redeem_details['points']) ? $redeem_details['points'] : 0,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('sale_pos.partials.edit_discount_modal', [
        'sales_discount' => $business_details->default_sales_discount,
        'discount_type' => 'percentage',
        'rp_redeemed' => 0,
        'rp_redeemed_amount' => 0,
        'max_available' => 0,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if(isset($transaction)): ?>
    <?php echo $__env->make('sale_pos.partials.edit_order_tax_modal', ['selected_tax' => $transaction->tax_id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('sale_pos.partials.edit_order_tax_modal', [
        'selected_tax' => $business_details->default_sales_tax,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php echo $__env->make('sale_pos.partials.edit_shipping_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/sale_pos/partials/pos_form_actions.blade.php ENDPATH**/ ?>