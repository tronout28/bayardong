<div class="modal-dialog modal-xl" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="modalTitle"> <?php echo app('translator')->get('lang_v1.purchase_return_details'); ?> (<b><?php echo app('translator')->get('purchase.ref_no'); ?>:</b> #<?php echo e($purchase->return_parent->ref_no ?? $purchase->ref_no, false); ?>)
        </h4>
    </div>

    <div class="modal-body">
      <div class="row">
        <?php if(!empty($purchase->return_parent)): ?>
        <div class="col-sm-6 col-xs-6">
            <h4><?php echo app('translator')->get('lang_v1.purchase_return_details'); ?>:</h4>
            <strong><?php echo app('translator')->get('lang_v1.return_date'); ?>:</strong> <?php echo e(\Carbon::createFromTimestamp(strtotime($purchase->return_parent->transaction_date))->format(session('business.date_format')), false); ?><br>
            <strong><?php echo app('translator')->get('purchase.supplier'); ?>:</strong> <?php echo e($purchase->contact->full_name_with_business, false); ?> <br>
            <strong><?php echo app('translator')->get('purchase.business_location'); ?>:</strong> <?php echo e($purchase->location->name, false); ?>

        </div>
        <div class="col-sm-6 col-xs-6">
            <h4><?php echo app('translator')->get('purchase.purchase_details'); ?>:</h4>
            <strong><?php echo app('translator')->get('purchase.ref_no'); ?>:</strong> <?php echo e($purchase->ref_no, false); ?> <br>
            <strong><?php echo app('translator')->get('messages.date'); ?>:</strong> <?php echo e(\Carbon::createFromTimestamp(strtotime($purchase->transaction_date))->format(session('business.date_format')), false); ?>

        </div>
        <?php else: ?>
            <div class="col-sm-6 col-xs-6">
                <h4><?php echo app('translator')->get('lang_v1.purchase_return_details'); ?>:</h4>
                <strong><?php echo app('translator')->get('lang_v1.return_date'); ?>:</strong> <?php echo e(\Carbon::createFromTimestamp(strtotime($purchase->transaction_date))->format(session('business.date_format')), false); ?><br>
                <strong><?php echo app('translator')->get('purchase.supplier'); ?>:</strong> <?php echo $purchase->contact->contact_address; ?> <br>
                <strong><?php echo app('translator')->get('purchase.business_location'); ?>:</strong> <?php echo e($purchase->location->name, false); ?>

            </div>
        <?php endif; ?>
        <?php if(empty($purchase->return_parent)): ?>
            <?php if($purchase->document_path): ?>
                <div class="col-md-12">
                    <a href="<?php echo e($purchase->document_path, false); ?>" 
                      download="<?php echo e($purchase->document_name, false); ?>" class="btn btn-sm btn-success pull-right no-print">
                        <i class="fa fa-download"></i> 
                          &nbsp;<?php echo e(__('purchase.download_document'), false); ?>

                    </a>
                </div>
            <?php endif; ?>
        <?php endif; ?>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-12">
          <br>
          <table class="table bg-gray">
            <thead>
              <tr class="bg-green">
                  <th>#</th>
                  <th><?php echo app('translator')->get('product.product_name'); ?></th>
                  <th><?php echo app('translator')->get('product.sku'); ?></th>
                  <th><?php echo app('translator')->get('lang_v1.return_quantity'); ?></th>
                  <th><?php echo app('translator')->get('sale.unit_price'); ?></th>
                  <th><?php echo app('translator')->get('lang_v1.return_subtotal'); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php
                $total_before_tax = 0;
              ?>
              <?php $__currentLoopData = $purchase->purchase_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($purchase_line->quantity_returned == 0): ?>
                <?php continue; ?>
              <?php endif; ?>

              <?php
                $unit_name = $purchase_line->product->unit->short_name;
                if(!empty($purchase_line->sub_unit)) {
                  $unit_name = $purchase_line->sub_unit->short_name;
                }
              ?>
              <tr>
                  <td><?php echo e($loop->iteration, false); ?></td>
                  <td>
                    <?php echo e($purchase_line->product->name, false); ?>

                    <?php if( $purchase_line->product->type == 'variable'): ?>
                      - <?php echo e($purchase_line->variations->product_variation->name, false); ?>

                      - <?php echo e($purchase_line->variations->name, false); ?>

                    <?php endif; ?>
                  </td>
                  <td>
                    <?php if( $purchase_line->product->type == 'variable'): ?>
                    <?php echo e($purchase_line->variations->sub_sku, false); ?>

                    <?php else: ?>
                    <?php echo e($purchase_line->product->sku, false); ?>

                    <?php endif; ?>
                  </td>
                  <td><?php echo e(number_format($purchase_line->quantity_returned, session('business.quantity_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php echo e($unit_name, false); ?></td>
                  <td><span class="display_currency no-print" data-currency_symbol="true"><?php echo e($purchase_line->purchase_price_inc_tax, false); ?></span><span class="display_currency print_section"><?php echo e($purchase_line->purchase_price_inc_tax, false); ?></span></td>
                  <td>
                    <?php
                      $line_total = $purchase_line->purchase_price_inc_tax * $purchase_line->quantity_returned;
                      $total_before_tax += $line_total ;
                    ?>
                    <span class="display_currency no-print" data-currency_symbol="true"><?php echo e($line_total, false); ?></span><span class="display_currency print_section"><?php echo e($line_total, false); ?></span>
                  </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
        <table class="table">
          <tr>
            <th><?php echo app('translator')->get('purchase.net_total_amount'); ?>: </th>
            <td></td>
            <td><span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($total_before_tax, false); ?></span></td>
          </tr>
          
          <tr>
            <th><?php echo app('translator')->get('lang_v1.total_return_tax'); ?>:</th>
            <td><b>(+)</b></td>
            <td class="text-right">
                <?php if(!empty($purchase_taxes)): ?>
                  <?php $__currentLoopData = $purchase_taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <strong><?php echo e($k, false); ?>:</strong>&nbsp;<span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($v, false); ?></span><br>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <span class="display_currency pull-right" data-currency_symbol="true">0.00</span>
                <?php endif; ?>
              </td>
          </tr>
          <tr>
            <th><?php echo app('translator')->get('lang_v1.return_total'); ?>:</th>
            <td></td>
            <td><span class="display_currency pull-right" data-currency_symbol="true" ><?php echo e($purchase->return_parent->final_total ??  $purchase->final_total, false); ?></span></td>
          </tr>
        </table>
      </div>
    </div>
    <div class="row no-print">
      <div class="col-md-12">
            <strong><?php echo e(__('lang_v1.activities'), false); ?>:</strong><br>
            <?php if ($__env->exists('activity_log.activities', ['activity_type' => 'sell'])) echo $__env->make('activity_log.activities', ['activity_type' => 'sell'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
  </div>

    <div class="modal-footer no-print">
      <button type="button" class="tw-dw-btn tw-dw-btn-primary tw-text-white no-print" aria-label="Print" 
      onclick="$(this).closest('div.modal-content').printThis();"><i class="fa fa-print"></i> <?php echo app('translator')->get( 'messages.print' ); ?>
      </button>
      <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white no-print" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>
  </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		var element = $('div.modal-xl');
		__currency_convert_recursively(element);
	});
</script><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/purchase_return/show.blade.php ENDPATH**/ ?>