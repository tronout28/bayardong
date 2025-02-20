<div class="modal-dialog modal-xl no-print" role="document">
  <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="modalTitle"> <?php echo app('translator')->get('sale.sell_details'); ?> (<b><?php if($sell->type == 'sales_order'): ?> <?php echo app('translator')->get('restaurant.order_no'); ?> <?php else: ?> <?php echo app('translator')->get('sale.invoice_no'); ?> <?php endif; ?> :</b> <?php echo e($sell->invoice_no, false); ?>)</h4>
	</div>
<div class="modal-body">
    <div class="row">
      <div class="col-xs-12">
          <p class="pull-right"><b><?php echo app('translator')->get('messages.date'); ?>:</b> <?php echo e(\Carbon::createFromTimestamp(strtotime($sell->transaction_date))->format(session('business.date_format')), false); ?></p>
      </div>
    </div>
    <div class="row">
      <?php
        $custom_labels = json_decode(session('business.custom_labels'), true);
        $export_custom_fields = [];
        if (!empty($sell->is_export) && !empty($sell->export_custom_fields_info)) {
            $export_custom_fields = $sell->export_custom_fields_info;
        }
      ?>
      <div class="<?php if(!empty($export_custom_fields)): ?> col-sm-3 <?php else: ?> col-sm-4 <?php endif; ?>">
        <b><?php if($sell->type == 'sales_order'): ?> <?php echo e(__('restaurant.order_no'), false); ?> <?php else: ?> <?php echo e(__('sale.invoice_no'), false); ?> <?php endif; ?>:</b> #<?php echo e($sell->invoice_no, false); ?><br>
        <b><?php echo e(__('sale.status'), false); ?>:</b> 
          <?php if($sell->status == 'draft' && $sell->is_quotation == 1): ?>
            <?php echo e(__('lang_v1.quotation'), false); ?>

          <?php else: ?>
            <?php echo e($statuses[$sell->status] ?? __('sale.' . $sell->status), false); ?>

          <?php endif; ?>
        <br>
        <?php if($sell->type != 'sales_order'): ?>
          <b><?php echo e(__('sale.payment_status'), false); ?>:</b> <?php if(!empty($sell->payment_status)): ?><?php echo e(__('lang_v1.' . $sell->payment_status), false); ?>

          <?php endif; ?>
        <?php endif; ?>
        <?php if(!empty($custom_labels['sell']['custom_field_1'])): ?>
          <br><strong><?php echo e($custom_labels['sell']['custom_field_1'] ?? '', false); ?>: </strong> <?php echo e($sell->custom_field_1, false); ?>

        <?php endif; ?>
        <?php if(!empty($custom_labels['sell']['custom_field_2'])): ?>
          <br><strong><?php echo e($custom_labels['sell']['custom_field_2'] ?? '', false); ?>: </strong> <?php echo e($sell->custom_field_2, false); ?>

        <?php endif; ?>
        <?php if(!empty($custom_labels['sell']['custom_field_3'])): ?>
          <br><strong><?php echo e($custom_labels['sell']['custom_field_3'] ?? '', false); ?>: </strong> <?php echo e($sell->custom_field_3, false); ?>

        <?php endif; ?>
        <?php if(!empty($custom_labels['sell']['custom_field_4'])): ?>
          <br><strong><?php echo e($custom_labels['sell']['custom_field_4'] ?? '', false); ?>: </strong> <?php echo e($sell->custom_field_4, false); ?>

        <?php endif; ?>

        <?php if(!empty($sales_orders)): ?>
              <br><br><strong><?php echo app('translator')->get('lang_v1.sales_orders'); ?>:</strong>
             <table class="table table-slim no-border">
               <tr>
                 <th><?php echo app('translator')->get('lang_v1.sales_order'); ?></th>
                 <th><?php echo app('translator')->get('lang_v1.date'); ?></th>
               </tr>
               <?php $__currentLoopData = $sales_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $so): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($so->invoice_no, false); ?></td>
                  <td><?php echo e(\Carbon::createFromTimestamp(strtotime($so->transaction_date))->format(session('business.date_format') . ' ' . 'H:i'), false); ?></td>
                </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </table>
          <?php endif; ?>
        <?php if($sell->document_path): ?>
          <br>
          <br>
          <a href="<?php echo e($sell->document_path, false); ?>" 
          download="<?php echo e($sell->document_name, false); ?>" class="tw-dw-btn tw-dw-btn-xs tw-dw-btn-outline tw-dw-btn-accent pull-left no-print">
            <i class="fa fa-download"></i> 
              &nbsp;<?php echo e(__('purchase.download_document'), false); ?>

          </a>
        <?php endif; ?>
      </div>
      <div class="<?php if(!empty($export_custom_fields)): ?> col-sm-3 <?php else: ?> col-sm-4 <?php endif; ?>">
        <b><?php echo e(__('lang_v1.customers'), false); ?>:</b> <?php echo e($sell->contact->full_name_with_business, false); ?>

		<address>
        <?php if(!empty($sell->billing_address())): ?>
          <b><?php echo app('translator')->get('lang_v1.billing_address'); ?>:</b> <?php echo e($sell->billing_address(), false); ?>

        <?php else: ?>
          <b><?php echo app('translator')->get('business.address'); ?>:</b> <?php echo $sell->contact->contact_address; ?>

          <?php if($sell->contact->mobile): ?>
          <br>
              <b><?php echo e(__('contact.mobile'), false); ?>:</b> <?php echo e($sell->contact->mobile, false); ?>

          <?php endif; ?>
          <?php if($sell->contact->alternate_number): ?>
          <br>
              <b><?php echo e(__('contact.alternate_contact_number'), false); ?>:</b> <?php echo e($sell->contact->alternate_number, false); ?>

          <?php endif; ?>
          <?php if($sell->contact->landline): ?>
            <br>
              <b><?php echo e(__('contact.landline'), false); ?>:</b> <?php echo e($sell->contact->landline, false); ?>

          <?php endif; ?>
          <?php if($sell->contact->email): ?>
            <br>
              <b><?php echo e(__('business.email'), false); ?>:</b> <?php echo e($sell->contact->email, false); ?>

          <?php endif; ?>
        <?php endif; ?>
        </address>
      </div>
      <div class="<?php if(!empty($export_custom_fields)): ?> col-sm-3 <?php else: ?> col-sm-4 <?php endif; ?>">
      <?php if(in_array('tables' ,$enabled_modules)): ?>
         <strong><?php echo app('translator')->get('restaurant.table'); ?>:</strong>
          <?php echo e($sell->table->name ?? '', false); ?><br>
      <?php endif; ?>
      <?php if(in_array('service_staff' ,$enabled_modules)): ?>
          <strong><?php echo app('translator')->get('restaurant.service_staff'); ?>:</strong>
          <?php echo e($sell->service_staff->user_full_name ?? '', false); ?><br>
      <?php endif; ?>

      <strong><?php echo app('translator')->get('sale.shipping'); ?>:</strong>
      <span class="label <?php if(!empty($shipping_status_colors[$sell->shipping_status])): ?> <?php echo e($shipping_status_colors[$sell->shipping_status], false); ?> <?php else: ?> <?php echo e('bg-gray', false); ?> <?php endif; ?>"><?php echo e($shipping_statuses[$sell->shipping_status] ?? '', false); ?></span><br>
      <?php if(!empty($sell->shipping_address())): ?>
        <?php echo e($sell->shipping_address(), false); ?>

      <?php else: ?>
        <?php echo e($sell->shipping_address ?? '--', false); ?>

      <?php endif; ?>
      <?php if(!empty($sell->delivered_to)): ?>
        <br><strong><?php echo app('translator')->get('lang_v1.delivered_to'); ?>: </strong> <?php echo e($sell->delivered_to, false); ?>

      <?php endif; ?>

      <?php if(!empty($sell->delivery_person_user->first_name)): ?>
        <br><strong><?php echo app('translator')->get('lang_v1.delivery_person'); ?>: </strong> <?php echo e($sell->delivery_person_user->surname, false); ?> <?php echo e($sell->delivery_person_user->first_name, false); ?>     <?php echo e($sell->delivery_person_user->last_name, false); ?>

      <?php endif; ?>

      
      <?php if(!empty($sell->shipping_custom_field_1)): ?>
        <br><strong><?php echo e($custom_labels['shipping']['custom_field_1'] ?? '', false); ?>: </strong> <?php echo e($sell->shipping_custom_field_1, false); ?>

      <?php endif; ?>
      <?php if(!empty($sell->shipping_custom_field_2)): ?>
        <br><strong><?php echo e($custom_labels['shipping']['custom_field_2'] ?? '', false); ?>: </strong> <?php echo e($sell->shipping_custom_field_2, false); ?>

      <?php endif; ?>
      <?php if(!empty($sell->shipping_custom_field_3)): ?>
        <br><strong><?php echo e($custom_labels['shipping']['custom_field_3'] ?? '', false); ?>: </strong> <?php echo e($sell->shipping_custom_field_3, false); ?>

      <?php endif; ?>
      <?php if(!empty($sell->shipping_custom_field_4)): ?>
        <br><strong><?php echo e($custom_labels['shipping']['custom_field_4'] ?? '', false); ?>: </strong> <?php echo e($sell->shipping_custom_field_4, false); ?>

      <?php endif; ?>
      <?php if(!empty($sell->shipping_custom_field_5)): ?>
        <br><strong><?php echo e($custom_labels['shipping']['custom_field_5'] ?? '', false); ?>: </strong> <?php echo e($sell->shipping_custom_field_5, false); ?>

      <?php endif; ?>
      <?php
        $medias = $sell->media->where('model_media_type', 'shipping_document')->all();
      ?>
      <?php if(count($medias)): ?>
        <?php echo $__env->make('sell.partials.media_table', ['medias' => $medias], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php endif; ?>

      <?php if(in_array('types_of_service' ,$enabled_modules)): ?>
        <?php if(!empty($sell->types_of_service)): ?>
          <strong><?php echo app('translator')->get('lang_v1.types_of_service'); ?>:</strong>
          <?php echo e($sell->types_of_service->name, false); ?><br>
        <?php endif; ?>
        <?php if(!empty($sell->types_of_service->enable_custom_fields)): ?>
          <strong><?php echo e($custom_labels['types_of_service']['custom_field_1'] ?? __('lang_v1.service_custom_field_1' ), false); ?>:</strong>
          <?php echo e($sell->service_custom_field_1, false); ?><br>
          <strong><?php echo e($custom_labels['types_of_service']['custom_field_2'] ?? __('lang_v1.service_custom_field_2' ), false); ?>:</strong>
          <?php echo e($sell->service_custom_field_2, false); ?><br>
          <strong><?php echo e($custom_labels['types_of_service']['custom_field_3'] ?? __('lang_v1.service_custom_field_3' ), false); ?>:</strong>
          <?php echo e($sell->service_custom_field_3, false); ?><br>
          <strong><?php echo e($custom_labels['types_of_service']['custom_field_4'] ?? __('lang_v1.service_custom_field_4' ), false); ?>:</strong>
          <?php echo e($sell->service_custom_field_4, false); ?><br>
          <strong><?php echo e($custom_labels['types_of_service']['custom_field_5'] ?? __('lang_v1.custom_field', ['number' => 5]), false); ?>:</strong>
          <?php echo e($sell->service_custom_field_5, false); ?><br>
          <strong><?php echo e($custom_labels['types_of_service']['custom_field_6'] ?? __('lang_v1.custom_field', ['number' => 6]), false); ?>:</strong>
          <?php echo e($sell->service_custom_field_6, false); ?>

        <?php endif; ?>
      <?php endif; ?>
      </div>
      <?php if(!empty($export_custom_fields)): ?>
          <div class="col-sm-3">
                <?php $__currentLoopData = $export_custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <strong>
                        <?php
                            $export_label = __('lang_v1.export_custom_field1');
                            if ($label == 'export_custom_field_1') {
                                $export_label =__('lang_v1.export_custom_field1');
                            } elseif ($label == 'export_custom_field_2') {
                                $export_label = __('lang_v1.export_custom_field2');
                            } elseif ($label == 'export_custom_field_3') {
                                $export_label = __('lang_v1.export_custom_field3');
                            } elseif ($label == 'export_custom_field_4') {
                                $export_label = __('lang_v1.export_custom_field4');
                            } elseif ($label == 'export_custom_field_5') {
                                $export_label = __('lang_v1.export_custom_field5');
                            } elseif ($label == 'export_custom_field_6') {
                                $export_label = __('lang_v1.export_custom_field6');
                            }
                        ?>

                        <?php echo e($export_label, false); ?>

                        :
                    </strong> <?php echo e($value ?? '', false); ?> <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
      <?php endif; ?>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-12 col-xs-12">
        <div class="table-responsive">
          <?php echo $__env->make('sale_pos.partials.sale_line_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
      </div>
    </div>
    <div class="row">
      <?php
        $total_paid = 0;
      ?>
      <?php if($sell->type != 'sales_order'): ?>
      <div class="col-sm-12 col-xs-12">
        <h4><?php echo e(__('sale.payment_info'), false); ?>:</h4>
      </div>
      <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="table-responsive">
          <table class="table bg-gray">
            <tr class="bg-green">
              <th>#</th>
              <th><?php echo e(__('messages.date'), false); ?></th>
              <th><?php echo e(__('purchase.ref_no'), false); ?></th>
              <th><?php echo e(__('sale.amount'), false); ?></th>
              <th><?php echo e(__('sale.payment_mode'), false); ?></th>
              <th><?php echo e(__('sale.payment_note'), false); ?></th>
            </tr>
            <?php $__currentLoopData = $sell->payment_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                if($payment_line->is_return == 1){
                  $total_paid -= $payment_line->amount;
                } else {
                  $total_paid += $payment_line->amount;
                }
              ?>
              <tr>
                <td><?php echo e($loop->iteration, false); ?></td>
                <td><?php echo e(\Carbon::createFromTimestamp(strtotime($payment_line->paid_on))->format(session('business.date_format')), false); ?></td>
                <td><?php echo e($payment_line->payment_ref_no, false); ?></td>
                <td><span class="display_currency" data-currency_symbol="true"><?php echo e($payment_line->amount, false); ?></span></td>
                <td>
                  <?php echo e($payment_types[$payment_line->method] ?? $payment_line->method, false); ?>

                  <?php if($payment_line->is_return == 1): ?>
                    <br/>
                    ( <?php echo e(__('lang_v1.change_return'), false); ?> )
                  <?php endif; ?>
                </td>
                <td><?php if($payment_line->note): ?> 
                  <?php echo e(ucfirst($payment_line->note), false); ?>

                  <?php else: ?>
                  --
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </table>
        </div>
      </div>
      <?php endif; ?>
      <div class="col-md-6 col-sm-12 col-xs-12 <?php if($sell->type == 'sales_order'): ?> col-md-offset-6 <?php endif; ?>">
        <div class="table-responsive">
          <table class="table bg-gray">
            <tr>
              <th><?php echo e(__('sale.total'), false); ?>: </th>
              <td></td>
              <td><span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($sell->total_before_tax, false); ?></span></td>
            </tr>
            <tr>
              <th><?php echo e(__('sale.discount'), false); ?>:</th>
              <td><b>(-)</b></td>
              <td><div class="pull-right"><span class="display_currency" <?php if( $sell->discount_type == 'fixed'): ?> data-currency_symbol="true" <?php endif; ?>><?php echo e($sell->discount_amount, false); ?></span> <?php if( $sell->discount_type == 'percentage'): ?> <?php echo e('%', false); ?> <?php endif; ?></span></div></td>
            </tr>
            <?php if(in_array('types_of_service' ,$enabled_modules) && !empty($sell->packing_charge)): ?>
              <tr>
                <th><?php echo e(__('lang_v1.packing_charge'), false); ?>:</th>
                <td><b>(+)</b></td>
                <td><div class="pull-right"><span class="display_currency" <?php if( $sell->packing_charge_type == 'fixed'): ?> data-currency_symbol="true" <?php endif; ?>><?php echo e($sell->packing_charge, false); ?></span> <?php if( $sell->packing_charge_type == 'percent'): ?> <?php echo e('%', false); ?> <?php endif; ?> </div></td>
              </tr>
            <?php endif; ?>
            <?php if(session('business.enable_rp') == 1 && !empty($sell->rp_redeemed) ): ?>
              <tr>
                <th><?php echo e(session('business.rp_name'), false); ?>:</th>
                <td><b>(-)</b></td>
                <td> <span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($sell->rp_redeemed_amount, false); ?></span></td>
              </tr>
            <?php endif; ?>
            <tr>
              <th><?php echo e(__('sale.order_tax'), false); ?>:</th>
              <td><b>(+)</b></td>
              <td class="text-right">
                <?php if(!empty($order_taxes)): ?>
                  <?php $__currentLoopData = $order_taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <strong><?php echo e($k, false); ?>:</strong>&nbsp;<span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($v, false); ?></span><br>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <span class="display_currency pull-right" data-currency_symbol="true">0.00</span>
                <?php endif; ?>
              </td>
            </tr>
            <?php if(!empty($line_taxes)): ?>
            <tr>
              <th><?php echo e(__('lang_v1.line_taxes'), false); ?>:</th>
              <td></td>
              <td class="text-right">
                <?php if(!empty($line_taxes)): ?>
                  <?php $__currentLoopData = $line_taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <strong><?php echo e($k, false); ?>:</strong>&nbsp;<span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($v, false); ?></span><br>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <span class="display_currency pull-right" data-currency_symbol="true">0.00</span>
                <?php endif; ?>
              </td>
            </tr>
            <?php endif; ?>
            <tr>
              <th><?php echo e(__('sale.shipping'), false); ?>: <?php if($sell->shipping_details): ?>(<?php echo e($sell->shipping_details, false); ?>) <?php endif; ?></th>
              <td><b>(+)</b></td>
              <td><span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($sell->shipping_charges, false); ?></span></td>
            </tr>

            <?php if( !empty( $sell->additional_expense_value_1 )  && !empty( $sell->additional_expense_key_1 )): ?>
              <tr>
                <th><?php echo e($sell->additional_expense_key_1, false); ?>:</th>
                <td><b>(+)</b></td>
                <td><span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($sell->additional_expense_value_1, false); ?></span></td>
              </tr>
            <?php endif; ?>
            <?php if( !empty( $sell->additional_expense_value_2 )  && !empty( $sell->additional_expense_key_2 )): ?>
              <tr>
                <th><?php echo e($sell->additional_expense_key_2, false); ?>:</th>
                <td><b>(+)</b></td>
                <td><span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($sell->additional_expense_value_2, false); ?></span></td>
              </tr>
            <?php endif; ?>
            <?php if( !empty( $sell->additional_expense_value_3 )  && !empty( $sell->additional_expense_key_3 )): ?>
              <tr>
                <th><?php echo e($sell->additional_expense_key_3, false); ?>:</th>
                <td><b>(+)</b></td>
                <td><span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($sell->additional_expense_value_3, false); ?></span></td>
              </tr>
            <?php endif; ?>
            <?php if( !empty( $sell->additional_expense_value_4 ) && !empty( $sell->additional_expense_key_4 )): ?>
              <tr>
                <th><?php echo e($sell->additional_expense_key_4, false); ?>:</th>
                <td><b>(+)</b></td>
                <td><span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($sell->additional_expense_value_4, false); ?></span></td>
              </tr>
            <?php endif; ?>
            <tr>
              <th><?php echo e(__('lang_v1.round_off'), false); ?>: </th>
              <td></td>
              <td><span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($sell->round_off_amount, false); ?></span></td>
            </tr>
            <tr>
              <th><?php echo e(__('sale.total_payable'), false); ?>: </th>
              <td></td>
              <td><span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($sell->final_total, false); ?></span></td>
            </tr>
            <?php if($sell->type != 'sales_order'): ?>
            <tr>
              <th><?php echo e(__('sale.total_paid'), false); ?>:</th>
              <td></td>
              <td><span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($total_paid, false); ?></span></td>
            </tr>
            <tr>
              <th><?php echo e(__('sale.total_remaining'), false); ?>:</th>
              <td></td>
              <td>
                <!-- Converting total paid to string for floating point substraction issue -->
                <?php
                  $total_paid = (string) $total_paid;
                ?>
                <span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($sell->final_total - $total_paid, false); ?></span></td>
            </tr>
            <?php endif; ?>
          </table>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <strong><?php echo e(__( 'sale.sell_note'), false); ?>:</strong><br>
        <p class="well well-sm no-shadow bg-gray">
          <?php if($sell->additional_notes): ?>
            <?php echo nl2br($sell->additional_notes); ?>

          <?php else: ?>
            --
          <?php endif; ?>
        </p>
      </div>
      <div class="col-sm-6">
        <strong><?php echo e(__( 'sale.staff_note'), false); ?>:</strong><br>
        <p class="well well-sm no-shadow bg-gray">
          <?php if($sell->staff_note): ?>
            <?php echo nl2br($sell->staff_note); ?>

          <?php else: ?>
            --
          <?php endif; ?>
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
            <strong><?php echo e(__('lang_v1.activities'), false); ?>:</strong><br>
            <?php if ($__env->exists('activity_log.activities', ['activity_type' => 'sell'])) echo $__env->make('activity_log.activities', ['activity_type' => 'sell'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<div class="modal-footer">
    <?php if($sell->type != 'sales_order'): ?>
      <a href="#" class="print-invoice tw-dw-btn tw-dw-btn-success tw-text-white hover:tw-text-white" data-href="<?php echo e(route('sell.printInvoice', [$sell->id]), false); ?>?package_slip=true"><i class="fas fa-file-alt" aria-hidden="true"></i> <?php echo app('translator')->get("lang_v1.packing_slip"); ?></a>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('print_invoice')): ?>
      <a href="#" class="print-invoice tw-dw-btn tw-dw-btn-primary tw-text-white hover:tw-text-white" data-href="<?php echo e(route('sell.printInvoice', [$sell->id]), false); ?>"><i class="fa fa-print" aria-hidden="true"></i> <?php echo app('translator')->get("lang_v1.print_invoice"); ?></a>
    <?php endif; ?>
      <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white no-print" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
</div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    var element = $('div.modal-xl');
    __currency_convert_recursively(element);
  });
</script>
<?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/sale_pos/show.blade.php ENDPATH**/ ?>