<div class="row">
	<div class="col-md-4">
	    <div class="form-group">
	        <?php echo Form::label('sr_location_id',  __('purchase.business_location') . ':'); ?>


	        <?php echo Form::select('sr_location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%']); ?>

	    </div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
            <table class="table table-bordered table-striped" 
            id="supplier_stock_report_table" width="100%">
                <thead>
                    <tr>
                        <th><?php echo app('translator')->get('sale.product'); ?></th>
                        <th><?php echo app('translator')->get('product.sku'); ?></th>
                        <th><?php echo app('translator')->get('purchase.purchase_quantity'); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.total_sold'); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.total_unit_transfered'); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.total_returned'); ?></th>
                        <th><?php echo app('translator')->get('report.current_stock'); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.total_stock_price'); ?></th>
                    </tr>
                </thead>
            </table>
        </div>
	</div>
</div><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/contact/partials/stock_report_tab.blade.php ENDPATH**/ ?>