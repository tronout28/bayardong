<?php $__env->startSection('title', __('lang_v1.add_selling_price_group_prices')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"><?php echo app('translator')->get('lang_v1.add_selling_price_group_prices'); ?></h1>
</section>

<!-- Main content -->
<section class="content">
	<?php echo Form::open(['url' => action([\App\Http\Controllers\ProductController::class, 'saveSellingPrices']), 'method' => 'post', 'id' => 'selling_price_form' ]); ?>

	<?php echo Form::hidden('product_id', $product->id); ?>

	<div class="row">
		<div class="col-xs-12">
		<div class="box box-solid">
			<div class="box-header">
	            <h3 class="box-title"><?php echo app('translator')->get('sale.product'); ?>: <?php echo e($product->name, false); ?> (<?php echo e($product->sku, false); ?>)</h3>
	        </div>
			<div class="box-body">
				<div class="row">
					<div class="col-xs-12">
						<div class="table-responsive">
							<table class="table table-condensed table-bordered table-th-green text-center table-striped">
								<thead>
									<tr>
										<?php if($product->type == 'variable'): ?>
											<th>
												<?php echo app('translator')->get('lang_v1.variation'); ?>
											</th>
										<?php endif; ?>
										<th><?php echo app('translator')->get('lang_v1.default_selling_price_inc_tax'); ?></th>
										<?php $__currentLoopData = $price_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<th><?php echo e($price_group->name, false); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.price_group_price_type_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tr>
								</thead>
								<tbody>
									<?php $__currentLoopData = $product->variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
										<?php if($product->type == 'variable'): ?>
											<td>
												<?php echo e($variation->product_variation->name, false); ?> - <?php echo e($variation->name, false); ?> (<?php echo e($variation->sub_sku, false); ?>)
											</td>
										<?php endif; ?>
										<td><span class="display_currency" data-currency_symbol="true"><?php echo e($variation->sell_price_inc_tax, false); ?></span></td>
											<?php $__currentLoopData = $price_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<td>                                                  
                                                    <?php
                                                        $price_type = !empty($variation_prices[$variation->id][$price_group->id]['price_type']) ? $variation_prices[$variation->id][$price_group->id]['price_type'] : 'fixed';

                                                        $name = 'group_prices[' . $price_group->id . '][' . $variation->id . '][price_type]';
                                                    ?>
													<div class="form-group text-left">
														<?php echo Form::label('discount_type', __('sale.discount_type') . ':*' ); ?>

														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-info"></i>
															</span>
															<select name=<?php echo e($name, false); ?> class="form-control">
																<option value="fixed" <?php if($price_type == 'fixed'): ?> selected <?php endif; ?>><?php echo app('translator')->get('lang_v1.fixed'); ?></option>
																<option value="percentage" <?php if($price_type == 'percentage'): ?> selected <?php endif; ?>><?php echo app('translator')->get('lang_v1.percentage'); ?></option>
															</select>
														</div>
													</div>
													<div class="form-group text-left">
														<?php echo Form::label('discount_amount', __('sale.discount_amount') . ':*' ); ?>

														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-info"></i>
															</span>
															<?php echo Form::text('group_prices[' . $price_group->id . '][' . $variation->id . '][price]', !empty($variation_prices[$variation->id][$price_group->id]['price']) ? number_format($variation_prices[$variation->id][$price_group->id]['price'], session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']) : 0, ['class' => 'form-control input_number input-sm'] ); ?>

														</div>
													</div>
												</td>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<?php echo Form::hidden('submit_type', 'save', ['id' => 'submit_type']); ?>

			<div class="text-center">
      			<div class="btn-group">
					<button id="opening_stock_button" <?php if($product->enable_stock == 0): ?> disabled <?php endif; ?> type="submit" value="submit_n_add_opening_stock" class="tw-dw-btn tw-text-white tw-dw-btn-lg tw-dw-btn-success submit_form"><?php echo app('translator')->get('lang_v1.save_n_add_opening_stock'); ?></button>
					<button type="submit" value="save_n_add_another" class="tw-dw-btn tw-text-white tw-dw-btn-lg tw-dw-btn-error submit_form"><?php echo app('translator')->get('lang_v1.save_n_add_another'); ?></button>
          			<button type="submit" value="submit" class="tw-dw-btn tw-dw-btn-primary tw-text-white tw-dw-btn-lg submit_form"><?php echo app('translator')->get('messages.save'); ?></button>
          		</div>
          	</div>
		</div>
	</div>

	<?php echo Form::close(); ?>

</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$('button.submit_form').click( function(e){
				e.preventDefault();
				$('input#submit_type').val($(this).attr('value'));

				if($("form#selling_price_form").valid()) {
		            $("form#selling_price_form").submit();
		        }
			});
		});
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/product/add-selling-prices.blade.php ENDPATH**/ ?>