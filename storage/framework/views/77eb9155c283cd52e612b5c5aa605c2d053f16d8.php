<!-- Edit Shipping Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="posShippingModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><?php echo app('translator')->get('sale.shipping'); ?></h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
				        <div class="form-group">
				            <?php echo Form::label('shipping_details_modal', __('sale.shipping_details') . ':*' ); ?>

				            <?php echo Form::textarea('shipping_details_modal', !empty($transaction->shipping_details) ? $transaction->shipping_details : '', ['class' => 'form-control','placeholder' => __('sale.shipping_details'), 'required' ,'rows' => '4']); ?>

				        </div>
				    </div>

				    <div class="col-md-6">
				        <div class="form-group">
				            <?php echo Form::label('shipping_address_modal', __('lang_v1.shipping_address') . ':' ); ?>

				            <?php echo Form::textarea('shipping_address_modal',!empty($transaction->shipping_address) ? $transaction->shipping_address : '', ['class' => 'form-control','placeholder' => __('lang_v1.shipping_address') ,'rows' => '4']); ?>

				        </div>
				    </div>

				    <div class="col-md-6">
				        <div class="form-group">
				            <?php echo Form::label('shipping_charges_modal', __('sale.shipping_charges') . ':*' ); ?>

				            <div class="input-group">
				                <span class="input-group-addon">
				                    <i class="fa fa-info"></i>
				                </span>
				                <?php echo Form::text('shipping_charges_modal', !empty($transaction->shipping_charges) ? number_format($transaction->shipping_charges, session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']) : 0, ['class' => 'form-control input_number input_number', 'data-decimal' => 'no_neg', 'placeholder' => __('sale.shipping_charges')]); ?>

				            </div>
				        </div>
				    </div>

				    <div class="col-md-6">
				        <div class="form-group">
				            <?php echo Form::label('shipping_status_modal', __('lang_v1.shipping_status') . ':' ); ?>

				            <?php echo Form::select('shipping_status_modal',$shipping_statuses, !empty($transaction->shipping_status) ? $transaction->shipping_status : null, ['class' => 'form-control','placeholder' => __('messages.please_select')]); ?>

				        </div>
				    </div>

				    <div class="col-md-6">
				        <div class="form-group">
				            <?php echo Form::label('delivered_to_modal', __('lang_v1.delivered_to') . ':' ); ?>

				            <?php echo Form::text('delivered_to_modal', !empty($transaction->delivered_to) ? $transaction->delivered_to : null, ['class' => 'form-control','placeholder' => __('lang_v1.delivered_to')]); ?>

				        </div>
				    </div>
					<div class="col-md-6">
				        <div class="form-group">
				            <?php echo Form::label('delivery_person_modal', __('lang_v1.delivery_person') . ':' ); ?> <br>
				            <?php echo Form::select('delivery_person_modal', $users, !empty($transaction->delivery_person) ? $transaction->delivery_person : null, ['style' => 'width:100%' ,'class' => 'form-control select2 width-100','placeholder' => __('messages.please_select')]); ?>

				        </div>
				    </div>
				    <?php
				        $custom_labels = json_decode(session('business.custom_labels'), true);

				        $shipping_custom_label_1 = !empty($custom_labels['shipping']['custom_field_1']) ? $custom_labels['shipping']['custom_field_1'] : '';

				        $is_shipping_custom_field_1_required = !empty($custom_labels['shipping']['is_custom_field_1_required']) && $custom_labels['shipping']['is_custom_field_1_required'] == 1 ? true : false;

				        $shipping_custom_label_2 = !empty($custom_labels['shipping']['custom_field_2']) ? $custom_labels['shipping']['custom_field_2'] : '';

				        $is_shipping_custom_field_2_required = !empty($custom_labels['shipping']['is_custom_field_2_required']) && $custom_labels['shipping']['is_custom_field_2_required'] == 1 ? true : false;

				        $shipping_custom_label_3 = !empty($custom_labels['shipping']['custom_field_3']) ? $custom_labels['shipping']['custom_field_3'] : '';
				        
				        $is_shipping_custom_field_3_required = !empty($custom_labels['shipping']['is_custom_field_3_required']) && $custom_labels['shipping']['is_custom_field_3_required'] == 1 ? true : false;

				        $shipping_custom_label_4 = !empty($custom_labels['shipping']['custom_field_4']) ? $custom_labels['shipping']['custom_field_4'] : '';
				        
				        $is_shipping_custom_field_4_required = !empty($custom_labels['shipping']['is_custom_field_4_required']) && $custom_labels['shipping']['is_custom_field_4_required'] == 1 ? true : false;

				        $shipping_custom_label_5 = !empty($custom_labels['shipping']['custom_field_5']) ? $custom_labels['shipping']['custom_field_5'] : '';
				        
				        $is_shipping_custom_field_5_required = !empty($custom_labels['shipping']['is_custom_field_5_required']) && $custom_labels['shipping']['is_custom_field_5_required'] == 1 ? true : false;
			        ?>

			        <?php if(!empty($shipping_custom_label_1)): ?>
			        	<?php
			        		$label_1 = $shipping_custom_label_1 . ':';
			        		if($is_shipping_custom_field_1_required) {
			        			$label_1 .= '*';
			        		}
			        	?>

			        	<div class="col-md-6">
					        <div class="form-group">
					            <?php echo Form::label('shipping_custom_field_1', $label_1 ); ?>

					            <?php echo Form::text('shipping_custom_field_1', !empty($transaction->shipping_custom_field_1) ? $transaction->shipping_custom_field_1 : null, ['class' => 'form-control','placeholder' => $shipping_custom_label_1, 'required' => $is_shipping_custom_field_1_required]); ?>

					        </div>
					    </div>
			        <?php endif; ?>
			        <?php if(!empty($shipping_custom_label_2)): ?>
			        	<?php
			        		$label_2 = $shipping_custom_label_2 . ':';
			        		if($is_shipping_custom_field_2_required) {
			        			$label_2 .= '*';
			        		}
			        	?>

			        	<div class="col-md-6">
					        <div class="form-group">
					            <?php echo Form::label('shipping_custom_field_2', $label_2 ); ?>

					            <?php echo Form::text('shipping_custom_field_2', !empty($transaction->shipping_custom_field_2) ? $transaction->shipping_custom_field_2 : null, ['class' => 'form-control','placeholder' => $shipping_custom_label_2, 'required' => $is_shipping_custom_field_2_required]); ?>

					        </div>
					    </div>
			        <?php endif; ?>
			        <?php if(!empty($shipping_custom_label_3)): ?>
			        	<?php
			        		$label_3 = $shipping_custom_label_3 . ':';
			        		if($is_shipping_custom_field_3_required) {
			        			$label_3 .= '*';
			        		}
			        	?>

			        	<div class="col-md-6">
					        <div class="form-group">
					            <?php echo Form::label('shipping_custom_field_3', $label_3 ); ?>

					            <?php echo Form::text('shipping_custom_field_3', !empty($transaction->shipping_custom_field_3) ? $transaction->shipping_custom_field_3 : null, ['class' => 'form-control','placeholder' => $shipping_custom_label_3, 'required' => $is_shipping_custom_field_3_required]); ?>

					        </div>
					    </div>
			        <?php endif; ?>
			        <?php if(!empty($shipping_custom_label_4)): ?>
			        	<?php
			        		$label_4 = $shipping_custom_label_4 . ':';
			        		if($is_shipping_custom_field_4_required) {
			        			$label_4 .= '*';
			        		}
			        	?>

			        	<div class="col-md-6">
					        <div class="form-group">
					            <?php echo Form::label('shipping_custom_field_4', $label_4 ); ?>

					            <?php echo Form::text('shipping_custom_field_4', !empty($transaction->shipping_custom_field_4) ? $transaction->shipping_custom_field_4 : null, ['class' => 'form-control','placeholder' => $shipping_custom_label_4, 'required' => $is_shipping_custom_field_4_required]); ?>

					        </div>
					    </div>
			        <?php endif; ?>
			        <?php if(!empty($shipping_custom_label_5)): ?>
			        	<?php
			        		$label_5 = $shipping_custom_label_5 . ':';
			        		if($is_shipping_custom_field_5_required) {
			        			$label_5 .= '*';
			        		}
			        	?>

			        	<div class="col-md-6">
					        <div class="form-group">
					            <?php echo Form::label('shipping_custom_field_5', $label_5 ); ?>

					            <?php echo Form::text('shipping_custom_field_5', !empty($transaction->shipping_custom_field_5) ? $transaction->shipping_custom_field_5 : null, ['class' => 'form-control','placeholder' => $shipping_custom_label_5, 'required' => $is_shipping_custom_field_5_required]); ?>

					        </div>
					    </div>
			        <?php endif; ?>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="tw-dw-btn tw-dw-btn-primary tw-text-white" id="posShippingModalUpdate"><?php echo app('translator')->get('messages.update'); ?></button>
			    <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white" data-dismiss="modal"><?php echo app('translator')->get('messages.cancel'); ?></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/sale_pos/partials/edit_shipping_modal.blade.php ENDPATH**/ ?>