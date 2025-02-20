<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title no-print">
                <?php echo app('translator')->get( 'purchase.view_payments' ); ?> 
                (
                <?php if(in_array($transaction->type, ['purchase', 'expense', 'purchase_return', 'payroll'])): ?>    
                    <?php echo app('translator')->get('purchase.ref_no'); ?>: <?php echo e($transaction->ref_no, false); ?> 
                <?php elseif(in_array($transaction->type, ['sell', 'sell_return'])): ?>
                    <?php echo app('translator')->get('sale.invoice_no'); ?>: <?php echo e($transaction->invoice_no, false); ?>

                <?php elseif(in_array($transaction->type, ['hms_booking'])): ?>
                    <?php echo app('translator')->get('hms::lang.booking_Id'); ?>: <?php echo e($transaction->ref_no, false); ?>

                <?php endif; ?>
                )   
            </h4>
            <h4 class="modal-title visible-print-block">
                <?php if(in_array($transaction->type, ['purchase', 'expense', 'purchase_return', 'payroll'])): ?> 
                    <?php echo app('translator')->get('purchase.ref_no'); ?>: <?php echo e($transaction->ref_no, false); ?>

                <?php elseif($transaction->type == 'sell'): ?>
                    <?php echo app('translator')->get('sale.invoice_no'); ?>: <?php echo e($transaction->invoice_no, false); ?>

                <?php elseif(in_array($transaction->type, ['hms_booking'])): ?>
                    <?php echo app('translator')->get('hms::lang.booking_Id'); ?>: <?php echo e($transaction->ref_no, false); ?>

                <?php endif; ?>
            </h4>
        </div>

        <div class="modal-body">
            <?php if(in_array($transaction->type, ['purchase', 'purchase_return'])): ?>
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        <?php echo $__env->make('transaction_payment.transaction_supplier_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-md-4 invoice-col">
                        <?php echo $__env->make('transaction_payment.payment_business_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <div class="col-sm-4 invoice-col">
                        <b><?php echo app('translator')->get('purchase.ref_no'); ?>:</b> #<?php echo e($transaction->ref_no, false); ?><br/>
                        <b><?php echo app('translator')->get('messages.date'); ?>:</b> <?php echo e(\Carbon::createFromTimestamp(strtotime($transaction->transaction_date))->format(session('business.date_format')), false); ?><br/>
                        <b><?php echo app('translator')->get('purchase.purchase_status'); ?>:</b> <?php echo e(__('lang_v1.' . $transaction->status), false); ?><br>
                        <b><?php echo app('translator')->get('purchase.payment_status'); ?>:</b> <?php echo e(__('lang_v1.' . $transaction->payment_status), false); ?><br>
                    </div>
                </div>
            <?php elseif(in_array($transaction->type, ['expense', 'expense_refund'])): ?>
                <div class="row invoice-info">
                    <?php if(!empty($transaction->contact)): ?>
                        <div class="col-sm-4 invoice-col">
                            <?php echo app('translator')->get('expense.expense_for'); ?>:
                            <address>
                                <strong><?php echo e($transaction->contact->supplier_business_name, false); ?></strong>
                                <?php echo e($transaction->contact->name, false); ?>

                                <?php echo $transaction->contact->contact_address; ?>

                                <?php if(!empty($transaction->contact->tax_number)): ?>
                                    <br><?php echo app('translator')->get('contact.tax_no'); ?>: <?php echo e($transaction->contact->tax_number, false); ?>

                                <?php endif; ?>
                                <?php if(!empty($transaction->contact->mobile)): ?>
                                    <br><?php echo app('translator')->get('contact.mobile'); ?>: <?php echo e($transaction->contact->mobile, false); ?>

                                <?php endif; ?>
                                <?php if(!empty($transaction->contact->email)): ?>
                                    <br><?php echo app('translator')->get('business.email'); ?>: <?php echo e($transaction->contact->email, false); ?>

                                <?php endif; ?>
                            </address>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-4 invoice-col">
                        <?php echo $__env->make('transaction_payment.payment_business_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <div class="col-sm-4 invoice-col">
                        <b><?php echo app('translator')->get('purchase.ref_no'); ?>:</b> #<?php echo e($transaction->ref_no, false); ?><br/>
                        <b><?php echo app('translator')->get('messages.date'); ?>:</b> <?php echo e(\Carbon::createFromTimestamp(strtotime($transaction->transaction_date))->format(session('business.date_format')), false); ?><br/>
                        <b><?php echo app('translator')->get('purchase.payment_status'); ?>:</b> <?php echo e(__('lang_v1.' . $transaction->payment_status), false); ?><br>
                    </div>
                </div>
            <?php elseif($transaction->type == 'payroll'): ?>
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        <?php echo app('translator')->get('essentials::lang.payroll_for'); ?>:
                        <address>
                            <strong><?php echo e($transaction->transaction_for->user_full_name, false); ?></strong>
                            <?php if(!empty($transaction->transaction_for->address)): ?>
                                <br><?php echo e($transaction->transaction_for->address, false); ?>

                            <?php endif; ?>
                            <?php if(!empty($transaction->transaction_for->contact_number)): ?>
                                <br><?php echo app('translator')->get('contact.mobile'); ?>: <?php echo e($transaction->transaction_for->contact_number, false); ?>

                            <?php endif; ?>
                            <?php if(!empty($transaction->transaction_for->email)): ?>
                                <br><?php echo app('translator')->get('business.email'); ?>: <?php echo e($transaction->transaction_for->email, false); ?>

                            <?php endif; ?>
                        </address>
                    </div>
                    <div class="col-md-4 invoice-col">
                        <?php echo $__env->make('transaction_payment.payment_business_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-sm-4 invoice-col">
                        <b><?php echo app('translator')->get('purchase.ref_no'); ?>:</b> #<?php echo e($transaction->ref_no, false); ?><br/>
                        <?php
                            $transaction_date = \Carbon::parse($transaction->transaction_date);
                        ?>
                        <b><?php echo app('translator')->get( 'essentials::lang.month_year' ); ?>:</b> <?php echo e($transaction_date->format('F'), false); ?> <?php echo e($transaction_date->format('Y'), false); ?><br/>
                        <b><?php echo app('translator')->get('purchase.payment_status'); ?>:</b> <?php echo e(__('lang_v1.' . $transaction->payment_status), false); ?><br>
                    </div>
                </div>
            <?php else: ?>
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        <?php echo app('translator')->get('contact.customer'); ?>:
                        <address>
                            <strong><?php echo e($transaction->contact->name, false); ?></strong>

                            <?php echo $transaction->contact->contact_address; ?>

                            <?php if(!empty($transaction->contact->tax_number)): ?>
                                <br><?php echo app('translator')->get('contact.tax_no'); ?>: <?php echo e($transaction->contact->tax_number, false); ?>

                            <?php endif; ?>
                            <?php if(!empty($transaction->contact->mobile)): ?>
                                <br><?php echo app('translator')->get('contact.mobile'); ?>: <?php echo e($transaction->contact->mobile, false); ?>

                            <?php endif; ?>
                            <?php if(!empty($transaction->contact->email)): ?>
                                <br><?php echo app('translator')->get('business.email'); ?>: <?php echo e($transaction->contact->email, false); ?>

                            <?php endif; ?>
                        </address>
                    </div>
                    <div class="col-md-4 invoice-col">
                        <?php echo $__env->make('transaction_payment.payment_business_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-sm-4 invoice-col">
                        <b><?php echo app('translator')->get('sale.invoice_no'); ?>:</b> #<?php echo e($transaction->invoice_no, false); ?><br/>
                        <b><?php echo app('translator')->get('messages.date'); ?>:</b> <?php echo e(\Carbon::createFromTimestamp(strtotime($transaction->transaction_date))->format(session('business.date_format')), false); ?><br/>
                        <b><?php echo app('translator')->get('purchase.payment_status'); ?>:</b> <?php echo e(__('lang_v1.' . $transaction->payment_status), false); ?><br>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('send_notification')): ?>
                <?php if($transaction->type == 'purchase'): ?>
                    <div class="row no-print">
                        <div class="col-md-12 text-right">
                            <button type="button" class="tw-dw-btn tw-dw-btn-info tw-text-white tw-dw-btn-xs btn-modal" 
                            data-href="<?php echo e(action([\App\Http\Controllers\NotificationController::class, 'getTemplate'], ['transaction_id' => $transaction->id,'template_for' => 'payment_paid']), false); ?>" data-container=".view_modal"><i class="fa fa-envelope"></i> <?php echo app('translator')->get('lang_v1.payment_paid_notification'); ?></button>
                        </div>
                    </div>
                    <br>
                <?php endif; ?>
                <?php if($transaction->type == 'sell' || $transaction->type == 'hms_booking'): ?>
                    <div class="row no-print">
                        <div class="col-md-12 text-right">
                            <button type="button" class="tw-dw-btn tw-dw-btn-info tw-text-white tw-dw-btn-xs btn-modal" 
                            data-href="<?php echo e(action([\App\Http\Controllers\NotificationController::class, 'getTemplate'], ['transaction_id' => $transaction->id,'template_for' => 'payment_received']), false); ?>" data-container=".view_modal"><i class="fa fa-envelope"></i> <?php echo app('translator')->get('lang_v1.payment_received_notification'); ?></button>
                          
                            <?php if($transaction->payment_status != 'paid'): ?>
                                &nbsp;
                                <button type="button" class="tw-dw-btn tw-dw-btn-warning tw-text-white tw-dw-btn-xs btn-modal" data-href="<?php echo e(action([\App\Http\Controllers\NotificationController::class, 'getTemplate'], ['transaction_id' => $transaction->id,'template_for' => 'payment_reminder']), false); ?>" data-container=".view_modal"><i class="fa fa-envelope"></i> <?php echo app('translator')->get('lang_v1.send_payment_reminder'); ?></button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <br>
                <?php endif; ?>
            <?php endif; ?>
            <?php if($transaction->payment_status != 'paid'): ?>
                <div class="row">
                    <div class="col-md-12">
                        <?php if((auth()->user()->can('hms.add_booking_payment') && (in_array($transaction->type, ['hms_booking']))) || (auth()->user()->can('purchase.payments') && (in_array($transaction->type, ['purchase', 'purchase_return']))) || (auth()->user()->can('sell.payments') && (in_array($transaction->type, ['sell', 'sell_return']))) || ((auth()->user()->can('all_expense.access') || auth()->user()->can('view_own_expense')) &&  $transaction->type == 'expense') ): ?>
                            <a href="<?php echo e(action([\App\Http\Controllers\TransactionPaymentController::class, 'addPayment'], [$transaction->id]), false); ?>" class="tw-dw-btn tw-dw-btn-xs tw-dw-btn-outline  tw-dw-btn-primary pull-right add_payment_modal no-print"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo app('translator')->get("purchase.add_payment"); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <tr>
                          <th><?php echo app('translator')->get('messages.date'); ?></th>
                          <th><?php echo app('translator')->get('purchase.ref_no'); ?></th>
                          <th><?php echo app('translator')->get('purchase.amount'); ?></th>
                          <th><?php echo app('translator')->get('purchase.payment_method'); ?></th>
                          <th><?php echo app('translator')->get('purchase.payment_note'); ?></th>
                          <?php if($accounts_enabled): ?>
                            <th><?php echo app('translator')->get('lang_v1.payment_account'); ?></th>
                          <?php endif; ?>
                          <th class="no-print"><?php echo app('translator')->get('messages.actions'); ?></th>
                        </tr>
                        <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                              <td><?php echo e(\Carbon::createFromTimestamp(strtotime($payment->paid_on))->format(session('business.date_format') . ' ' . 'H:i'), false); ?></td>
                              <td><?php echo e($payment->payment_ref_no, false); ?></td>
                              <td><span class="display_currency" data-currency_symbol="true"><?php echo e($payment->amount, false); ?></span></td>
                              <td><?php echo e($payment_types[$payment->method] ?? '', false); ?></td>
                              <td><?php if(!empty($payment->gateway)): ?><?php echo e($payment->gateway, false); ?> - <?php endif; ?> <?php echo e($payment->note, false); ?></td>
                              <?php if($accounts_enabled): ?>
                                <td><?php echo e($payment->payment_account->name ?? '', false); ?></td>
                              <?php endif; ?>
                              <td class="no-print" style="display: flex;">
                              <?php if((in_array($transaction->type, ['hms_booking']) && auth()->user()->can('hms.edit_booking_payment')) || (auth()->user()->can('edit_purchase_payment') && (in_array($transaction->type, ['purchase', 'purchase_return']))) || (auth()->user()->can('edit_sell_payment') && (in_array($transaction->type, ['sell', 'sell_return']))) || ((auth()->user()->can('all_expense.access') || auth()->user()->can('view_own_expense')) && $transaction->type == 'expense') ): ?>
                                    <?php if($payment->method != 'advance'): ?>
                                        <button type="button" class="tw-dw-btn tw-dw-btn-xs tw-dw-btn-outline  tw-dw-btn-info edit_payment" 
                                    data-href="<?php echo e(action([\App\Http\Controllers\TransactionPaymentController::class, 'edit'], [$payment->id]), false); ?>"><i class="glyphicon glyphicon-edit"></i></button>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php if((in_array($transaction->type, ['hms_booking']) && auth()->user()->can('hms.delete_booking_payment')) || (auth()->user()->can('delete_purchase_payment') && (in_array($transaction->type, ['purchase', 'purchase_return']))) || (auth()->user()->can('delete_sell_payment') && (in_array($transaction->type, ['sell', 'sell_return']))) || ((auth()->user()->can('all_expense.access') || auth()->user()->can('view_own_expense')) && $transaction->type == 'expense') ): ?>
                                    &nbsp; <button type="button" class="tw-dw-btn tw-dw-btn-xs tw-dw-btn-outline  tw-dw-btn-error delete_payment" 
                                    data-href="<?php echo e(action([\App\Http\Controllers\TransactionPaymentController::class, 'destroy'], [$payment->id]), false); ?>"
                                    ><i class="fa fa-trash" aria-hidden="true"></i></button>
                                <?php endif; ?>
                              &nbsp;
                                <button type="button" class="tw-dw-btn tw-dw-btn-xs tw-dw-btn-outline  tw-dw-btn-primary view_payment" data-href="<?php echo e(action([\App\Http\Controllers\TransactionPaymentController::class, 'viewPayment'], [$payment->id]), false); ?>">
                                  <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                              <?php if(!empty($payment->document_path)): ?>
                                &nbsp;
                                <a href="<?php echo e($payment->document_path, false); ?>" class="tw-dw-btn tw-dw-btn-xs tw-dw-btn-outline  tw-dw-btn-accent" download="<?php echo e($payment->document_name, false); ?>"><i class="fa fa-download" data-toggle="tooltip" title="<?php echo e(__('purchase.download_document'), false); ?>"></i></a>
                                <?php if(isFileImage($payment->document_name)): ?>
                                &nbsp;
                                  <button data-href="<?php echo e($payment->document_path, false); ?>" class="tw-dw-btn tw-dw-btn-xs tw-dw-btn-outline  tw-dw-btn-info view_uploaded_document" data-toggle="tooltip" title="<?php echo e(__('lang_v1.view_document'), false); ?>"><i class="fa fa-picture-o"></i></button>
                                <?php endif; ?>

                              <?php endif; ?>
                              </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr class="text-center">
                              <td colspan="6"><?php echo app('translator')->get('purchase.no_records_found'); ?></td>
                            </tr>
                        <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="tw-dw-btn tw-dw-btn-primary tw-text-white no-print" 
              aria-label="Print" 
                onclick="$(this).closest('div.modal').printThis();">
                <i class="fa fa-print"></i> <?php echo app('translator')->get( 'messages.print' ); ?>
            </button>
            <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white no-print" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/transaction_payment/show_payments.blade.php ENDPATH**/ ?>