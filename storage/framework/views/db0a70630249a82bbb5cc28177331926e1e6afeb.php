<!-- default value -->
<?php
    $go_back_url = action([\App\Http\Controllers\SellPosController::class, 'index']);
    $transaction_sub_type = '';
    $view_suspended_sell_url = action([\App\Http\Controllers\SellController::class, 'index']) . '?suspended=1';
    $pos_redirect_url = action([\App\Http\Controllers\SellPosController::class, 'create']);
?>

<?php if(!empty($pos_module_data)): ?>
    <?php $__currentLoopData = $pos_module_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            if (!empty($value['go_back_url'])) {
                $go_back_url = $value['go_back_url'];
            }

            if (!empty($value['transaction_sub_type'])) {
                $transaction_sub_type = $value['transaction_sub_type'];
                $view_suspended_sell_url .= '&transaction_sub_type=' . $transaction_sub_type;
                $pos_redirect_url .= '?sub_type=' . $transaction_sub_type;
            }
        ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<input type="hidden" name="transaction_sub_type" id="transaction_sub_type" value="<?php echo e($transaction_sub_type, false); ?>">
<?php $request = app('Illuminate\Http\Request'); ?>
<div class="col-md-12 no-print pos-header">
    <input type="hidden" id="pos_redirect_url" value="<?php echo e($pos_redirect_url, false); ?>">

    

    <div
        class="tw-flex tw-flex-col md:tw-flex-row tw-items-center tw-justify-between tw-shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] tw-bg-white tw-rounded-xl tw-mx-0 tw-mt-1 tw-mb-0 md:tw-mb-0 tw-p-3">
        <div class="tw-w-full md:tw-w-1/3">
            <div class="tw-flex tw-items-center tw-gap-2">
                <p><strong><?php echo app('translator')->get('sale.location'); ?>: &nbsp;</strong></p>
                <div style="width: 28%">
                    <?php if(empty($transaction->location_id)): ?>
                        <?php if(count($business_locations) > 1): ?>
                            <?php echo Form::select(
                                'select_location_id',
                                $business_locations,
                                $default_location->id ?? null,
                                ['class' => 'form-control input-sm', 'id' => 'select_location_id', 'required', 'autofocus'],
                                $bl_attributes,
                            ); ?>

                        <?php else: ?>
                            <?php echo e($default_location->name, false); ?>

                        <?php endif; ?>
                    <?php else: ?>
                    <?php echo e($transaction->location->name, false); ?>

                    <?php endif; ?>
                </div>
                <div
                    class="tw-hidden md:tw-block tw-bg-[#646EE4] hover:tw-bg-[#414aac] tw-py-1.5 tw-px-2 tw-rounded-md">
                     &nbsp; <span
                        class="curr_datetime text-white tw-font-semibold"><?php echo e(\Carbon::createFromTimestamp(strtotime('now'))->format(session('business.date_format') . ' ' . 'H:i'), false); ?></span>
                    <i class="fa fa-keyboard hover-q text-white" aria-hidden="true" data-container="body"
                        data-toggle="popover" data-placement="bottom" data-content="<?php echo $__env->make('sale_pos.partials.keyboard_shortcuts_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>"
                        data-html="true" data-trigger="hover" data-original-title="" title=""></i>
                </div>

                <?php if(empty($pos_settings['hide_product_suggestion'])): ?>
                    <button type="button" title="<?php echo e(__('lang_v1.view_products'), false); ?>" data-placement="bottom"
                        class="tw-shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] tw-bg-white hover:tw-bg-white/60 tw-cursor-pointer tw-border-2 tw-flex tw-items-center tw-justify-center tw-rounded-md tw-w-8 tw-h-8 tw-text-gray-600 btn-modal pull-right tw-block md:tw-hidden"
                        data-toggle="modal" data-target="#mobile_product_suggestion_modal">
                        <strong><i class="fa fa-cubes fa-lg tw-text-[#00935F] !tw-text-sm"></i></strong>
                    </button>
                <?php endif; ?>

                <span class="tw-block md:tw-hidden">
                    <i class="fas hamburger fa-bars tw-mx-5"
                        onclick="document.getElementById('pos_header_more_options').classList.toggle('tw-hidden')"></i>
                </span>

            </div>
        </div>

        <div class="tw-w-full md:tw-w-2/3 !tw-p-0 tw-flex tw-items-center tw-justify-between tw-gap-4 tw-flex-col md:tw-flex-row tw-hidden md:tw-flex"
            id="pos_header_more_options">
            <a href="<?php echo e($go_back_url, false); ?>" title="<?php echo e(__('lang_v1.go_back'), false); ?>"
                class="tw-shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] tw-bg-white hover:tw-bg-white/60 tw-cursor-pointer tw-border-2 tw-flex tw-items-center tw-justify-center tw-rounded-md md:tw-w-8 tw-w-auto tw-h-8 tw-text-gray-600 pull-right">
                <strong class="!tw-m-3">
                    <i class="fa fa-backward fa-lg fa fa-backward tw-fa-lg tw-text-[#009EE4] !tw-text-sm"></i>
                    <span class="tw-inline md:tw-hidden"><?php echo e(__('lang_v1.go_back'), false); ?></span>
                </strong>
            </a>

            

            <?php if(!isset($pos_settings['hide_recent_trans']) || $pos_settings['hide_recent_trans'] == 0): ?>
                <button type="button"
                    class="md:tw-hidden tw-shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] tw-bg-white hover:tw-bg-white/60 tw-cursor-pointer tw-border-2 tw-flex tw-items-center tw-justify-center tw-rounded-md md:tw-w-8 tw-w-auto tw-h-8 tw-text-gray-600 pull-right"
                    data-toggle="modal" data-target="#recent_transactions_modal" id="recent-transactions">
                        <strong class="!tw-m-3">
                            <i class="fa fa-clock fa-lg tw-text-[#646EE4] !tw-text-sm"></i>
                            <span class="tw-inline md:tw-hidden"><?php echo e(__('lang_v1.recent_transactions'), false); ?></span>
                        </strong>
                </button>
            <?php endif; ?>

            <?php if(!empty($pos_settings['inline_service_staff'])): ?>
                <button type="button" id="show_service_staff_availability"
                    title="<?php echo e(__('lang_v1.service_staff_availability'), false); ?>"
                    class="tw-shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] tw-bg-white hover:tw-bg-white/60 tw-cursor-pointer tw-border-2 tw-flex tw-items-center tw-justify-center tw-rounded-md md:tw-w-8 tw-w-auto tw-h-8 tw-text-gray-600 pull-right"
                    data-container=".view_modal"
                    data-href="<?php echo e(action([\App\Http\Controllers\SellPosController::class, 'showServiceStaffAvailibility']), false); ?>">
                    <strong class="!tw-m-3">
                        <i class="fa fa-users fa-lg tw-text-[#646EE4] !tw-text-sm"></i>
                        <span class="tw-inline md:tw-hidden"><?php echo e(__('lang_v1.service_staff_availability'), false); ?></span>
                    </strong>
                </button>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('close_cash_register')): ?>
                <button type="button" id="close_register" title="<?php echo e(__('cash_register.close_register'), false); ?>"
                    class="tw-shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] tw-bg-white hover:tw-bg-white/60 tw-cursor-pointer tw-border-2 tw-flex tw-items-center tw-justify-center tw-rounded-md md:tw-w-8 tw-w-auto tw-h-8 tw-text-gray-600 btn-modal pull-right"
                    data-container=".close_register_modal"
                    data-href="<?php echo e(action([\App\Http\Controllers\CashRegisterController::class, 'getCloseRegister']), false); ?>">
                    <strong class="!tw-m-3">
                        <i class="fa fa-window-close fa-lg tw-text-[#EF4B53] !tw-text-sm"></i>
                        <span class="tw-inline md:tw-hidden"><?php echo e(__('cash_register.close_register'), false); ?></span>
                    </strong>
                </button>
            <?php endif; ?>

            <?php if(
                !empty($pos_settings['inline_service_staff']) ||
                    (in_array('tables', $enabled_modules) || in_array('service_staff', $enabled_modules))): ?>
                <button type="button"
                    class="tw-shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] tw-bg-white hover:tw-bg-white/60 tw-cursor-pointer tw-border-2 tw-flex tw-items-center tw-justify-center tw-rounded-md md:tw-w-8 tw-w-auto tw-h-8 tw-text-gray-600 pull-right popover-default"
                    id="service_staff_replacement" title="<?php echo e(__('restaurant.service_staff_replacement'), false); ?>"
                    data-toggle="popover" data-trigger="click"
                    data-content='<div class="m-8"><input type="text" class="form-control" placeholder="<?php echo app('translator')->get('sale.invoice_no'); ?>" id="send_for_sell_service_staff_invoice_no"></div><div class="w-100 text-center"><button type="button" class="tw-dw-btn tw-dw-btn-xs tw-dw-btn-outline tw-dw-btn-error" id="send_for_sercice_staff_replacement"><?php echo app('translator')->get('lang_v1.send'); ?></button></div>'
                    data-html="true" data-placement="bottom">

                    <strong class="!tw-m-3">
                        <i class="fa fa-user-plus fa-lg tw-text-[#646EE4] !tw-text-sm"></i>
                        <span class="tw-inline md:tw-hidden"><?php echo e(__('restaurant.service_staff_replacement'), false); ?></span>
                    </strong>
                </button>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_cash_register')): ?>
                <button type="button" id="register_details" title="<?php echo e(__('cash_register.register_details'), false); ?>"
                    class="tw-shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] tw-bg-white hover:tw-bg-white/60 tw-cursor-pointer tw-border-2 tw-flex tw-items-center tw-justify-center tw-rounded-md md:tw-w-8 tw-w-auto tw-h-8 tw-text-gray-600 btn-modal pull-right"
                    data-container=".register_details_modal"
                    data-href="<?php echo e(action([\App\Http\Controllers\CashRegisterController::class, 'getRegisterDetails']), false); ?>">

                    <strong class="!tw-m-3">
                        <i class="fa fa-briefcase tw-fa-lg tw-text-[#00935F] !tw-text-sm" aria-hidden="true"></i>
                        <span class="tw-inline md:tw-hidden"><?php echo e(__('cash_register.register_details'), false); ?></span>
                    </strong>
                </button>
            <?php endif; ?>

            <button title="<?php echo app('translator')->get('lang_v1.calculator'); ?>" id="btnCalculator" type="button"
                class="tw-shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] tw-bg-white hover:tw-bg-white/60 tw-cursor-pointer tw-border-2 tw-flex tw-items-center tw-justify-center tw-rounded-md md:tw-w-8 tw-w-auto tw-h-8 tw-text-gray-600 pull-right popover-default"
                data-toggle="popover" data-trigger="click" data-content='<?php echo $__env->make('layouts.partials.calculator', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>' data-html="true"
                data-placement="bottom">


                <strong class="!tw-m-3">
                    <i class="fa fa-calculator fa-lg tw-text-[#00935F] !tw-text-sm" aria-hidden="true"></i>
                    <span class="tw-inline md:tw-hidden"><?php echo e(__('lang_v1.calculator'), false); ?></span>
                </strong>
            </button>

            <button type="button"
                class="tw-shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] tw-bg-white hover:tw-bg-white/60 tw-cursor-pointer tw-border-2 tw-flex tw-items-center tw-justify-center tw-rounded-md md:tw-w-8 tw-w-auto tw-h-8 tw-text-gray-600 pull-right pull-right popover-default"
                id="return_sale" title="<?php echo app('translator')->get('lang_v1.sell_return'); ?>" data-toggle="popover" data-trigger="click"
                data-content='<div class="m-8"><input type="text" class="form-control" placeholder="<?php echo app('translator')->get('sale.invoice_no'); ?>" id="send_for_sell_return_invoice_no"></div><div class="w-100 text-center"><button type="button" class="tw-dw-btn tw-dw-btn-error tw-text-white tw-dw-btn-sm" id="send_for_sell_return"><?php echo app('translator')->get('lang_v1.send'); ?></button></div>'
                data-html="true" data-placement="bottom">
                <strong class="!tw-m-3">
                    <i class="fas fa-undo fa-lg tw-text-[#EF4B53] !tw-text-sm"></i>
                    <span class="tw-inline md:tw-hidden"><?php echo e(__('lang_v1.sell_return'), false); ?></span>
                </strong>
            </button>


            <button type="button" title="<?php echo e(__('lang_v1.full_screen'), false); ?>"
                class="tw-shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] tw-bg-white hover:tw-bg-white/60 tw-cursor-pointer tw-border-2 tw-flex tw-items-center tw-justify-center tw-rounded-md md:tw-w-8 tw-w-auto tw-h-8 tw-text-gray-600 pull-right"
                id="full_screen">
                <strong class="!tw-m-3">
                    <i class="fa fa-window-maximize fa-lg tw-text-[#646EE4] !tw-text-sm"></i>
                    <span class="tw-inline md:tw-hidden">Full Screen</span>
                </strong>
            </button>

            <button type="button" id="view_suspended_sales" title="<?php echo e(__('lang_v1.view_suspended_sales'), false); ?>"
                class="tw-shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] tw-bg-white hover:tw-bg-white/60 tw-cursor-pointer tw-border-2 tw-flex tw-items-center tw-justify-center tw-rounded-md md:tw-w-8 tw-w-auto tw-h-8 tw-text-gray-600 btn-modal pull-right"
                data-container=".view_modal" data-href="<?php echo e($view_suspended_sell_url, false); ?>">
                <strong class="!tw-m-3">
                    <i class="fa fa-pause-circle fa-lg tw-text-[#A5ADBB] !tw-text-sm"></i>
                    <span class="tw-inline md:tw-hidden"><?php echo e(__('lang_v1.view_suspended_sales'), false); ?></span>
                </strong>
            </button>


            <?php if(Module::has('Repair') && $transaction_sub_type != 'repair'): ?>
                <?php echo $__env->make('repair::layouts.partials.pos_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(in_array('pos_sale', $enabled_modules) && !empty($transaction_sub_type)): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sell.create')): ?>
                    <a href="<?php echo e(action([\App\Http\Controllers\SellPosController::class, 'create']), false); ?>"
                        title="<?php echo app('translator')->get('sale.pos_sale'); ?>"
                        class="tw-shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] tw-bg-white hover:tw-bg-white/60 tw-cursor-pointer tw-border-2 tw-w-auto tw-h-auto tw-py-1 tw-px-4 tw-rounded-md pull-right">
                        <strong><i class="fa fa-th-large tw-text-[#00935F] !tw-text-sm"></i> &nbsp;
                            <?php echo app('translator')->get('sale.pos_sale'); ?></strong>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('expense.add')): ?>
                <button type="button" title="<?php echo e(__('expense.add_expense'), false); ?>" data-placement="bottom"
                    class="tw-shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] tw-bg-white hover:tw-bg-white/60 tw-cursor-pointer tw-border-2 tw-w-auto tw-h-auto tw-py-1 tw-px-4 tw-rounded-md btn-modal pull-right"
                    id="add_expense">
                    <strong><i class="fa fas fa-minus-circle"></i> <?php echo app('translator')->get('expense.add_expense'); ?></strong>
                </button>
            <?php endif; ?>

        </div>
    </div>
</div>

<div class="modal fade" id="service_staff_modal" tabindex="-1" role="dialog"
    aria-labelledby="gridSystemModalLabel">
</div>
<?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/layouts/partials/header-pos.blade.php ENDPATH**/ ?>