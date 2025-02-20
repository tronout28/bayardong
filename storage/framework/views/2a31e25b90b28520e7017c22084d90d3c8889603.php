<?php $__env->startSection('title',  __('invoice.edit_invoice_layout')); ?>

<?php $__env->startSection('content'); ?>
<style type="text/css">



</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"><?php echo app('translator')->get('invoice.edit_invoice_layout'); ?></h1>
</section>

<!-- Main content -->
<section class="content">
<?php echo Form::open(['url' => action([\App\Http\Controllers\InvoiceLayoutController::class, 'update'], [$invoice_layout->id]), 'method' => 'put', 
  'id' => 'add_invoice_layout_form', 'files' => true]); ?>


  <?php
    $product_custom_fields = !empty($invoice_layout->product_custom_fields) ? $invoice_layout->product_custom_fields : [];
    $contact_custom_fields = !empty($invoice_layout->contact_custom_fields) ? $invoice_layout->contact_custom_fields : [];
    $location_custom_fields = !empty($invoice_layout->location_custom_fields) ? $invoice_layout->location_custom_fields : [];
    $custom_labels = json_decode(session('business.custom_labels'), true);
  ?>
  <div class="box box-solid">
    <div class="box-body">
      <div class="row">

        <div class="col-sm-6">
         <div class="form-group">
            <?php echo Form::label('name', __('invoice.layout_name') . ':*'); ?>

              <?php echo Form::text('name', $invoice_layout->name, ['class' => 'form-control', 'required',
              'placeholder' => __('invoice.layout_name')]); ?>

          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <?php echo Form::label('design', __('lang_v1.design') . ':*'); ?>

              <?php echo Form::select('design', $designs, $invoice_layout->design, ['class' => 'form-control']); ?>

              <span class="help-block">
                <?php echo app('translator')->get('lang_v1.used_for_browser_based_printing'); ?>
              </span>
          </div>

          <div class="form-group <?php if($invoice_layout->design != 'columnize-taxes'): ?> hide <?php endif; ?>" id="columnize-taxes">
            <div class="col-md-3">
              <input type="text" class="form-control" 
              name="table_tax_headings[]" required="required" placeholder="tax 1 name" value="<?php echo e($invoice_layout->table_tax_headings[0], false); ?>"
              <?php if($invoice_layout->design != 'columnize-taxes'): ?> disabled <?php endif; ?>>
              <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.tooltip_columnize_taxes_heading') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            </div>
            <div class="col-md-3">
              <input type="text" class="form-control" 
              name="table_tax_headings[]" placeholder="tax 2 name" 
              value="<?php echo e($invoice_layout->table_tax_headings[1], false); ?>"
              <?php if($invoice_layout->design != 'columnize-taxes'): ?> disabled <?php endif; ?>>
            </div>
            <div class="col-md-3">
              <input type="text" class="form-control" 
              name="table_tax_headings[]" placeholder="tax 3 name"
              value="<?php echo e($invoice_layout->table_tax_headings[2], false); ?>"
              <?php if($invoice_layout->design != 'columnize-taxes'): ?> disabled <?php endif; ?>>
            </div>
            <div class="col-md-3">
              <input type="text" class="form-control" 
              name="table_tax_headings[]" placeholder="tax 4 name"
              value="<?php echo e($invoice_layout->table_tax_headings[3], false); ?>"
              <?php if($invoice_layout->design != 'columnize-taxes'): ?> disabled <?php endif; ?>>
            </div>

          </div>
        </div>
        <div class="clearfix"></div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('show_letter_head', 1, $invoice_layout->show_letter_head, 
                            ['class' => 'input-icheck', 'id' => 'show_letter_head']); ?> 
                            <?php echo app('translator')->get('lang_v1.show_letter_head'); ?></label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 letter_head_input">
                <div class="form-group">
                    <?php echo Form::label('letter_head', __('lang_v1.letter_head') . ':'); ?>

                    <?php echo Form::file('letter_head', ['accept' => 'image/*']); ?>

                    <span class="help-block"><?php echo app('translator')->get('lang_v1.letter_head_help'); ?> <br> <?php echo app('translator')->get('lang_v1.invoice_logo_help', ['max_size' => '1 MB']); ?> <br> <?php echo app('translator')->get('lang_v1.letter_head_help2'); ?></span>
                </div>
            </div>
      </div>
      <div class="row hide-for-letterhead">
        <!-- Logo -->
        <div class="col-sm-6">
          <div class="form-group">
            <?php echo Form::label('logo', __('invoice.invoice_logo') . ':'); ?>

            <?php echo Form::file('logo', ['accept' => 'image/*']); ?>

            <span class="help-block"><?php echo app('translator')->get('lang_v1.invoice_logo_help', ['max_size' => '1 MB']); ?><br> <?php echo app('translator')->get('lang_v1.invoice_logo_help2'); ?></span>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_logo', 1, $invoice_layout->show_logo, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('invoice.show_logo'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="form-group">
            <?php echo Form::label('header_text', __('invoice.header_text') . ':' ); ?>

              <?php echo Form::textarea('header_text', $invoice_layout->header_text, ['class' => 'form-control',
              'placeholder' => __('invoice.header_text'), 'rows' => 3]); ?>

          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('sub_heading_line1', __('lang_v1.sub_heading_line', ['_number_' => 1]) . ':' ); ?>

            <?php echo Form::text('sub_heading_line1', $invoice_layout->sub_heading_line1, ['class' => 'form-control',
              'placeholder' => __('lang_v1.sub_heading_line', ['_number_' => 1]) ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('sub_heading_line2', __('lang_v1.sub_heading_line', ['_number_' => 2]) . ':' ); ?>

            <?php echo Form::text('sub_heading_line2', $invoice_layout->sub_heading_line2, ['class' => 'form-control',
              'placeholder' => __('lang_v1.sub_heading_line', ['_number_' => 2]) ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('sub_heading_line3', __('lang_v1.sub_heading_line', ['_number_' => 3]) . ':' ); ?>

            <?php echo Form::text('sub_heading_line3', $invoice_layout->sub_heading_line3, ['class' => 'form-control',
              'placeholder' => __('lang_v1.sub_heading_line', ['_number_' => 3]) ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('sub_heading_line4', __('lang_v1.sub_heading_line', ['_number_' => 4]) . ':' ); ?>

            <?php echo Form::text('sub_heading_line4', $invoice_layout->sub_heading_line4, ['class' => 'form-control',
              'placeholder' => __('lang_v1.sub_heading_line', ['_number_' => 4]) ]); ?>

          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('sub_heading_line5', __('lang_v1.sub_heading_line', ['_number_' => 5]) . ':' ); ?>

            <?php echo Form::text('sub_heading_line5', $invoice_layout->sub_heading_line5, ['class' => 'form-control',
              'placeholder' => __('lang_v1.sub_heading_line', ['_number_' => 5]) ]); ?>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="box box-solid">
    <div class="box-body">
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('invoice_heading', __('invoice.invoice_heading') . ':' ); ?>

            <?php echo Form::text('invoice_heading', $invoice_layout->invoice_heading, ['class' => 'form-control',
              'placeholder' => __('invoice.invoice_heading') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('invoice_heading_not_paid', __('invoice.invoice_heading_not_paid') . ':' ); ?>

            <?php echo Form::text('invoice_heading_not_paid', $invoice_layout->invoice_heading_not_paid, ['class' => 'form-control',
              'placeholder' => __('invoice.invoice_heading_not_paid') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('invoice_heading_paid', __('invoice.invoice_heading_paid') . ':' ); ?>

            <?php echo Form::text('invoice_heading_paid', $invoice_layout->invoice_heading_paid, ['class' => 'form-control',
              'placeholder' => __('invoice.invoice_heading_paid') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('proforma_heading', __('lang_v1.proforma_heading') . ':' ); ?>

            <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.tooltip_proforma_heading') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            <?php echo Form::text('common_settings[proforma_heading]', !empty($invoice_layout->common_settings['proforma_heading']) ? $invoice_layout->common_settings['proforma_heading'] : null, ['class' => 'form-control',
              'placeholder' => __('lang_v1.proforma_heading'), 'id' => 'proforma_heading' ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('quotation_heading', __('lang_v1.quotation_heading') . ':' ); ?><?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.tooltip_quotation_heading') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            <?php echo Form::text('quotation_heading', $invoice_layout->quotation_heading, ['class' => 'form-control', 'placeholder' => __('lang_v1.quotation_heading') ]); ?>

          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('sales_order_heading', __('lang_v1.sales_order_heading') . ':' ); ?>

            <?php echo Form::text('common_settings[sales_order_heading]', !empty($invoice_layout->common_settings['sales_order_heading']) ? $invoice_layout->common_settings['sales_order_heading'] : null, ['class' => 'form-control',
              'placeholder' => __('lang_v1.sales_order_heading'), 'id' => 'sales_order_heading' ]); ?>

          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('invoice_no_prefix', __('invoice.invoice_no_prefix') . ':' ); ?>

            <?php echo Form::text('invoice_no_prefix', $invoice_layout->invoice_no_prefix, ['class' => 'form-control',
              'placeholder' => __('invoice.invoice_no_prefix') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('quotation_no_prefix', __('lang_v1.quotation_no_prefix') . ':' ); ?>

            <?php echo Form::text('quotation_no_prefix', $invoice_layout->quotation_no_prefix, ['class' => 'form-control',
              'placeholder' => __('lang_v1.quotation_no_prefix') ]); ?>

          </div>
        </div>
        
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('date_label', __('lang_v1.date_label') . ':' ); ?>

            <?php echo Form::text('date_label', $invoice_layout->date_label, ['class' => 'form-control',
              'placeholder' => __('lang_v1.date_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('due_date_label', __('lang_v1.due_date_label') . ':' ); ?>

            <?php echo Form::text('common_settings[due_date_label]', !empty($invoice_layout->common_settings['due_date_label']) ? $invoice_layout->common_settings['due_date_label'] : null, ['class' => 'form-control',
              'placeholder' => __('lang_v1.due_date_label'), 'id' => 'due_date_label' ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('common_settings[show_due_date]', 1, !empty($invoice_layout->common_settings['show_due_date']), ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_due_date'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('date_time_format', __('lang_v1.date_time_format') . ':' ); ?>

            <?php echo Form::text('date_time_format', $invoice_layout->date_time_format, ['class' => 'form-control',
              'placeholder' => __('lang_v1.date_time_format') ]); ?> 
              <p class="help-block"><?php echo __('lang_v1.date_time_format_help'); ?></p>
          </div>
        </div>
        <?php
        $sell_custom_field_1_label = !empty($custom_labels['sell']['custom_field_1']) ? $custom_labels['sell']['custom_field_1'] : '';

        $sell_custom_field_2_label = !empty($custom_labels['sell']['custom_field_2']) ? $custom_labels['sell']['custom_field_2'] : '';

        $sell_custom_field_3_label = !empty($custom_labels['sell']['custom_field_3']) ? $custom_labels['sell']['custom_field_3'] : '';

        $sell_custom_field_4_label = !empty($custom_labels['sell']['custom_field_4']) ? $custom_labels['sell']['custom_field_4'] : '';
      ?>
        <?php if(!empty($sell_custom_field_1_label)): ?>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('common_settings[sell_custom_fields1]', 1, !empty($invoice_layout->common_settings['sell_custom_fields1']), ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['sell']['custom_field_1'] ?? __('lang_v1.product_custom_field1'), false); ?></label>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <?php if(!empty($sell_custom_field_2_label)): ?>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('common_settings[sell_custom_fields2]', 1, !empty($invoice_layout->common_settings['sell_custom_fields2']), ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['sell']['custom_field_2'] ?? __('lang_v1.product_custom_field2'), false); ?></label>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <?php if(!empty($sell_custom_field_3_label)): ?>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('common_settings[sell_custom_fields3]', 1, !empty($invoice_layout->common_settings['sell_custom_fields3']), ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['sell']['custom_field_3'] ?? __('lang_v1.product_custom_field3'), false); ?></label>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <?php if(!empty($sell_custom_field_4_label)): ?>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('common_settings[sell_custom_fields4]', 1, !empty($invoice_layout->common_settings['sell_custom_fields4']), ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['sell']['custom_field_4'] ?? __('lang_v1.product_custom_field4'), false); ?></label>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('sales_person_label', __('lang_v1.sales_person_label') . ':' ); ?>

            <?php echo Form::text('sales_person_label', $invoice_layout->sales_person_label, ['class' => 'form-control',
            'placeholder' => __('lang_v1.sales_person_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('commission_agent_label', __('lang_v1.commission_agent_label') . ':' ); ?>

            <?php echo Form::text('commission_agent_label', $invoice_layout->commission_agent_label, ['class' => 'form-control',
            'placeholder' => __('lang_v1.commission_agent_label') ]); ?>

          </div>
        </div>
        <div class="clearfix"></div>
        
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_business_name', 1, $invoice_layout->show_business_name, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('invoice.show_business_name'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_location_name', 1, $invoice_layout->show_location_name, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('invoice.show_location_name'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_sales_person', 1, $invoice_layout->show_sales_person, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_sales_person'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_commission_agent', 1, $invoice_layout->show_commission_agent, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_commission_agent'); ?></label>
              </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-12">
          <h4><?php echo app('translator')->get('lang_v1.fields_for_customer_details'); ?>:</h4>
        </div>
       <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_customer', 1, $invoice_layout->show_customer, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('invoice.show_customer'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('customer_label', __('invoice.customer_label') . ':' ); ?>

            <?php echo Form::text('customer_label', $invoice_layout->customer_label, ['class' => 'form-control',
              'placeholder' => __('invoice.customer_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_client_id', 1, $invoice_layout->show_client_id, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_client_id'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('client_id_label', __('lang_v1.client_id_label') . ':' ); ?>

            <?php echo Form::text('client_id_label', $invoice_layout->client_id_label, ['class' => 'form-control',
              'placeholder' => __('lang_v1.client_id_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('client_tax_label', __('lang_v1.client_tax_label') . ':' ); ?>

            <?php echo Form::text('client_tax_label', $invoice_layout->client_tax_label, ['class' => 'form-control',
            'placeholder' => __('lang_v1.client_tax_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_reward_point', 1, $invoice_layout->show_reward_point, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_reward_point'); ?></label>
              </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-3">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('contact_custom_fields[]', 'custom_field1', in_array('custom_field1', $contact_custom_fields), ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['contact']['custom_field_1'] ?? __('lang_v1.contact_custom_field1'), false); ?></label>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('contact_custom_fields[]', 'custom_field2', in_array('custom_field2', $contact_custom_fields), ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['contact']['custom_field_2'] ?? __('lang_v1.contact_custom_field2'), false); ?></label>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('contact_custom_fields[]', 'custom_field3', in_array('custom_field3', $contact_custom_fields), ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['contact']['custom_field_3'] ?? __('lang_v1.contact_custom_field3'), false); ?></label>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('contact_custom_fields[]', 'custom_field4', in_array('custom_field4', $contact_custom_fields), ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['contact']['custom_field_4'] ?? __('lang_v1.contact_custom_field4'), false); ?></label>
          </div>
        </div>
      </div>        

      </div>
      <div class="row hide-for-letterhead">
      <div class="col-sm-12">
            <h4><?php echo app('translator')->get('invoice.fields_to_be_shown_in_address'); ?>:</h4>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_landmark', 1, $invoice_layout->show_landmark, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('business.landmark'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_city', 1, $invoice_layout->show_city, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('business.city'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_state', 1, $invoice_layout->show_state, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('business.state'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_country', 1, $invoice_layout->show_country, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('business.country'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_zip_code', 1, $invoice_layout->show_zip_code, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('business.zip_code'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('location_custom_fields[]', 'custom_field1', in_array('custom_field1', $location_custom_fields), ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['location']['custom_field_1'] ?? __('lang_v1.location_custom_field1'), false); ?></label>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('location_custom_fields[]', 'custom_field2', in_array('custom_field2', $location_custom_fields), ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['location']['custom_field_2'] ?? __('lang_v1.location_custom_field2'), false); ?></label>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('location_custom_fields[]', 'custom_field3', in_array('custom_field3', $location_custom_fields), ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['location']['custom_field_3'] ?? __('lang_v1.location_custom_field3'), false); ?></label>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('location_custom_fields[]', 'custom_field4', in_array('custom_field4', $location_custom_fields), ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['location']['custom_field_4'] ?? __('lang_v1.location_custom_field4'), false); ?></label>
          </div>
        </div>
      </div>
        <div class="col-sm-12">
          <div class="form-group">
            <label><?php echo app('translator')->get('invoice.fields_to_shown_for_communication'); ?>:</label>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_mobile_number', 1, $invoice_layout->show_mobile_number, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('invoice.show_mobile_number'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_alternate_number', 1, $invoice_layout->show_alternate_number, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('invoice.show_alternate_number'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_email', 1, $invoice_layout->show_email, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('invoice.show_email'); ?></label>
              </div>
          </div>
        </div>
        
        <div class="col-sm-12">
          <div class="form-group">
            <label><?php echo app('translator')->get('invoice.fields_to_shown_for_tax'); ?>:</label>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_tax_1', 1, $invoice_layout->show_tax_1, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('invoice.show_tax_1'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_tax_2', 1, $invoice_layout->show_tax_2, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('invoice.show_tax_2'); ?></label>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="box box-solid">
    <div class="box-body">
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('table_product_label', __('lang_v1.product_label') . ':' ); ?>

            <?php echo Form::text('table_product_label', $invoice_layout->table_product_label, ['class' => 'form-control',
              'placeholder' => __('lang_v1.product_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('table_qty_label', __('lang_v1.qty_label') . ':' ); ?>

            <?php echo Form::text('table_qty_label', $invoice_layout->table_qty_label, ['class' => 'form-control',
              'placeholder' => __('lang_v1.qty_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('table_unit_price_label', __('lang_v1.unit_price_label') . ':' ); ?>

            <?php echo Form::text('table_unit_price_label', $invoice_layout->table_unit_price_label, ['class' => 'form-control',
              'placeholder' => __('lang_v1.unit_price_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('table_subtotal_label', __('lang_v1.subtotal_label') . ':' ); ?>

            <?php echo Form::text('table_subtotal_label', $invoice_layout->table_subtotal_label, ['class' => 'form-control',
              'placeholder' => __('lang_v1.subtotal_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('cat_code_label', __('lang_v1.cat_code_label') . ':' ); ?>

            <?php echo Form::text('cat_code_label', $invoice_layout->cat_code_label, ['class' => 'form-control', 'placeholder' => 'HSN or Category Code' ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('total_quantity_label', __('lang_v1.total_quantity_label') . ':' ); ?>

            <?php echo Form::text('common_settings[total_quantity_label]', !empty($invoice_layout->common_settings['total_quantity_label']) ? $invoice_layout->common_settings['total_quantity_label'] : null, ['class' => 'form-control',
              'placeholder' => __('lang_v1.total_quantity_label'), 'id' => 'total_quantity_label' ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('item_discount_label', __('lang_v1.item_discount_label') . ':' ); ?>

            <?php echo Form::text('common_settings[item_discount_label]', !empty($invoice_layout->common_settings['item_discount_label']) ? $invoice_layout->common_settings['item_discount_label'] : null, ['class' => 'form-control',
              'placeholder' => __('lang_v1.item_discount_label'), 'id' => 'item_discount_label' ]); ?>

          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('discounted_unit_price_label', __('lang_v1.discounted_unit_price_label') . ':' ); ?>

            <?php echo Form::text('common_settings[discounted_unit_price_label]', !empty($invoice_layout->common_settings['discounted_unit_price_label']) ? $invoice_layout->common_settings['discounted_unit_price_label'] : null, ['class' => 'form-control',
              'placeholder' => __('lang_v1.discounted_unit_price_label'), 'id' => 'discounted_unit_price_label' ]); ?>

          </div>
        </div>
        
        <div class="col-sm-12">
          <h4><?php echo app('translator')->get('lang_v1.product_details_to_be_shown'); ?>:</h4>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_brand', 1, $invoice_layout->show_brand, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_brand'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_sku', 1, $invoice_layout->show_sku, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_sku'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_cat_code', 1, $invoice_layout->show_cat_code, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_cat_code'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
              <?php echo Form::checkbox('show_sale_description', 1, $invoice_layout->show_sale_description, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_sale_description'); ?></label>
            </div>
            <p class="help-block"><?php echo app('translator')->get('lang_v1.product_imei_or_sn'); ?></p>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('common_settings[show_product_description]', 1, !empty($invoice_layout->common_settings['show_product_description']), ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_product_description'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('product_custom_fields[]', 'product_custom_field1', in_array('product_custom_field1', $product_custom_fields), ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['product']['custom_field_1'] ?? __('lang_v1.product_custom_field1'), false); ?></label>
            </div>
          </div>
        </div>

      <div class="col-sm-3">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('product_custom_fields[]', 'product_custom_field2', in_array('product_custom_field2', $product_custom_fields), ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['product']['custom_field_2'] ?? __('lang_v1.product_custom_field2'), false); ?></label>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('product_custom_fields[]', 'product_custom_field3', in_array('product_custom_field3', $product_custom_fields), ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['product']['custom_field_3'] ?? __('lang_v1.product_custom_field3'), false); ?></label>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('product_custom_fields[]', 'product_custom_field4', in_array('product_custom_field4', $product_custom_fields), ['class' => 'input-icheck']); ?> <?php echo e($custom_labels['product']['custom_field_4'] ?? __('lang_v1.product_custom_field4'), false); ?></label>
          </div>
        </div>
      </div>
        <div class="clearfix"></div>
        <?php if(request()->session()->get('business.enable_product_expiry') == 1): ?>
          <div class="col-sm-3">
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <?php echo Form::checkbox('show_expiry', 1, $invoice_layout->show_expiry, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_product_expiry'); ?></label>
                </div>
            </div>
          </div>
        <?php endif; ?>
        <?php if(request()->session()->get('business.enable_lot_number') == 1): ?>
          <div class="col-sm-3">
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <?php echo Form::checkbox('show_lot', 1, $invoice_layout->show_lot, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_lot_number'); ?></label>
                </div>
            </div>
          </div>
        <?php endif; ?>

        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_image', 1, !empty($invoice_layout->show_image), ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_product_image'); ?></label>
              </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('common_settings[show_warranty_name]', 1, !empty($invoice_layout->common_settings['show_warranty_name']), ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_warranty_name'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('common_settings[show_warranty_exp_date]', 1, !empty($invoice_layout->common_settings['show_warranty_exp_date']), ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_warranty_exp_date'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('common_settings[show_warranty_description]', 1, !empty($invoice_layout->common_settings['show_warranty_description']), ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_warranty_description'); ?></label>
              </div>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('common_settings[show_base_unit_details]', 1, !empty($invoice_layout->common_settings['show_base_unit_details']), ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_base_unit_details'); ?></label>
              </div>
          </div>
        </div>

      </div>

    </div>
  </div>
  <div class="box box-solid">
    <div class="box-body">
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('sub_total_label', __('invoice.sub_total_label') . ':' ); ?>

            <?php echo Form::text('sub_total_label', $invoice_layout->sub_total_label, ['class' => 'form-control',
              'placeholder' => __('invoice.sub_total_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('discount_label', __('invoice.discount_label') . ':' ); ?>

            <?php echo Form::text('discount_label', $invoice_layout->discount_label, ['class' => 'form-control',
              'placeholder' => __('invoice.discount_label') ]); ?>

          </div>
        </div>
        
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('tax_label', __('invoice.tax_label') . ':' ); ?>

            <?php echo Form::text('tax_label', $invoice_layout->tax_label, ['class' => 'form-control',
              'placeholder' => __('invoice.tax_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('total_label', __('invoice.total_label') . ':' ); ?>

            <?php echo Form::text('total_label', $invoice_layout->total_label, ['class' => 'form-control',
              'placeholder' => __('invoice.total_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('total_items_label', __('lang_v1.total_items_label') . ':' ); ?>

            <?php echo Form::text('common_settings[total_items_label]', !empty($invoice_layout->common_settings['total_items_label']) ? $invoice_layout->common_settings['total_items_label'] : null, ['class' => 'form-control',
              'placeholder' => __('lang_v1.total_items_label'), 'id' => 'total_items_label' ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('round_off_label', __('lang_v1.round_off_label') . ':' ); ?>

            <?php echo Form::text('round_off_label', $invoice_layout->round_off_label, ['class' => 'form-control',
              'placeholder' => __('lang_v1.round_off_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('total_due_label', __('invoice.total_due_label') . ' (' . __('lang_v1.current_sale') . '):' ); ?>

            <?php echo Form::text('total_due_label', $invoice_layout->total_due_label, ['class' => 'form-control',
              'placeholder' => __('invoice.total_due_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('paid_label', __('invoice.paid_label') . ':' ); ?>

            <?php echo Form::text('paid_label', $invoice_layout->paid_label, ['class' => 'form-control',
              'placeholder' => __('invoice.paid_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_payments', 1, $invoice_layout->show_payments, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('invoice.show_payments'); ?></label>
              </div>
          </div>
        </div>

        <!-- Barcode -->
        <div class="col-sm-3">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_barcode', 1, $invoice_layout->show_barcode, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('invoice.show_barcode'); ?></label>
              </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('prev_bal_label', __('invoice.total_due_label') . ' (' . __('lang_v1.all_sales') . '):' ); ?>

            <?php echo Form::text('prev_bal_label', $invoice_layout->prev_bal_label, ['class' => 'form-control',
              'placeholder' => __('invoice.total_due_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-5">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('show_previous_bal', 1, $invoice_layout->show_previous_bal, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_previous_bal_due'); ?></label>
                <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.previous_bal_due_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
              </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('change_return_label', __('lang_v1.change_return_label') . ':' ); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.change_return_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            <?php echo Form::text('change_return_label', $invoice_layout->change_return_label, ['class' => 'form-control',
              'placeholder' => __('lang_v1.change_return_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-3 <?php if($invoice_layout->design != 'slim'): ?> hide <?php endif; ?>" id="hide_price_div">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('common_settings[hide_price]', 1, !empty($invoice_layout->common_settings['hide_price']), ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.hide_all_prices'); ?></label>
              </div>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
              <label>
                <?php echo Form::checkbox('common_settings[show_total_in_words]', 1, !empty($invoice_layout->common_settings['show_total_in_words']), ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_total_in_words'); ?></label> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.show_in_word_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                <?php if(!extension_loaded('intl')): ?>
                  <p class="help-block"><?php echo app('translator')->get('lang_v1.enable_php_intl_extension'); ?></p>
                <?php endif; ?>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('word_format', __('lang_v1.word_format') . ':'); ?> 
            <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.word_format_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            <?php echo Form::select('common_settings[num_to_word_format]', ['international' => __('lang_v1.international'), 'indian' => __('lang_v1.indian')], $invoice_layout->common_settings['num_to_word_format'] ?? 'international', ['class' => 'form-control', 'id' => 'word_format']); ?>

          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('tax_summary_label', __('lang_v1.tax_summary_label') . ':' ); ?>

            <?php echo Form::text('common_settings[tax_summary_label]', !empty($invoice_layout->common_settings['tax_summary_label']) ? $invoice_layout->common_settings['tax_summary_label'] : null, ['class' => 'form-control', 'placeholder' => __('lang_v1.tax_summary_label'), 'id' => 'tax_summary_label' ]); ?>

          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="box box-solid">
    <div class="box-body">
      <div class="row">
        <div class="col-sm-12">
        
        <div class="col-sm-6 hide">
          <div class="form-group">
            <?php echo Form::label('highlight_color', __('invoice.highlight_color') . ':' ); ?>

            <?php echo Form::text('highlight_color', $invoice_layout->highlight_color, ['class' => 'form-control',
              'placeholder' => __('invoice.highlight_color') ]); ?>

          </div>
        </div>

        <div class="clearfix"></div>
        <div class="col-md-12 hide">
          <hr/>
        </div>
        
        <div class="col-sm-12">
          <div class="form-group">
            <?php echo Form::label('footer_text', __('invoice.footer_text') . ':' ); ?>

              <?php echo Form::textarea('footer_text', $invoice_layout->footer_text, ['class' => 'form-control',
              'placeholder' => __('invoice.footer_text'), 'rows' => 3]); ?>

          </div>
        </div>
        <?php if(empty($invoice_layout->is_default)): ?>
        <div class="col-sm-6">
          <div class="form-group">
            <br>
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('is_default', 1, $invoice_layout->is_default, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('barcode.set_as_default'); ?></label>
            </div>
          </div>
        </div>
        <?php endif; ?>
        
      </div>
    </div>
  </div>
</div>


<?php $__env->startComponent('components.widget', ['class' => 'box-solid', 'title' => __('lang_v1.qr_code')]); ?>
  <div class="row">
    <div class="col-sm-4">
      <div class="form-group">
        <div class="checkbox">
          <label>
            <?php echo Form::checkbox('show_qr_code', 1, $invoice_layout->show_qr_code, ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_qr_code'); ?></label>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <div class="checkbox">
                <label>
                <?php echo Form::checkbox('common_settings[show_qr_code_label]', 1, !empty($invoice_layout->common_settings['show_qr_code_label']), ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_labels'); ?></label>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <div class="checkbox">
                <label>
                <?php echo Form::checkbox('common_settings[zatca_qr]', 1, !empty($invoice_layout->common_settings['zatca_qr']), ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.zatca_qr'); ?></label>
                <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.zatca_qr_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12">
      <h4><?php echo app('translator')->get('lang_v1.fields_to_be_shown'); ?>:</h4>
    </div>
    <?php
      $qr_code_fields = empty($invoice_layout->qr_code_fields) ? [] : $invoice_layout->qr_code_fields;
    ?>
    <div class="col-sm-4">
      <div class="form-group">
        <div class="checkbox">
          <label>
            <?php echo Form::checkbox('qr_code_fields[]', 'business_name', in_array('business_name', $qr_code_fields), ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('business.business_name'); ?></label>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group">
        <div class="checkbox">
          <label>
            <?php echo Form::checkbox('qr_code_fields[]', 'address', in_array('address', $qr_code_fields), ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.business_location_address'); ?></label>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group">
        <div class="checkbox">
          <label>
            <?php echo Form::checkbox('qr_code_fields[]', 'tax_1', in_array('tax_1', $qr_code_fields), ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.business_tax_1'); ?></label>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group">
        <div class="checkbox">
          <label>
            <?php echo Form::checkbox('qr_code_fields[]', 'tax_2', in_array('tax_2', $qr_code_fields), ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.business_tax_2'); ?></label>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group">
        <div class="checkbox">
          <label>
            <?php echo Form::checkbox('qr_code_fields[]', 'invoice_no', in_array('invoice_no', $qr_code_fields), ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('sale.invoice_no'); ?></label>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group">
        <div class="checkbox">
          <label>
            <?php echo Form::checkbox('qr_code_fields[]', 'invoice_datetime', in_array('invoice_datetime', $qr_code_fields), ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.invoice_datetime'); ?></label>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group">
        <div class="checkbox">
          <label>
            <?php echo Form::checkbox('qr_code_fields[]', 'subtotal', in_array('subtotal', $qr_code_fields), ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('sale.subtotal'); ?></label>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group">
        <div class="checkbox">
          <label>
            <?php echo Form::checkbox('qr_code_fields[]', 'total_amount', in_array('total_amount', $qr_code_fields), ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.total_amount_with_tax'); ?></label>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group">
        <div class="checkbox">
          <label>
            <?php echo Form::checkbox('qr_code_fields[]', 'total_tax', in_array('total_tax', $qr_code_fields), ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.total_tax'); ?></label>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group">
        <div class="checkbox">
          <label>
            <?php echo Form::checkbox('qr_code_fields[]', 'customer_name', in_array('customer_name', $qr_code_fields), ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('sale.customer_name'); ?></label>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group">
        <div class="checkbox">
          <label>
            <?php echo Form::checkbox('qr_code_fields[]', 'invoice_url', in_array('invoice_url', $qr_code_fields), ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.view_invoice_url'); ?></label>
        </div>
      </div>
    </div>

  </div>
  <?php echo $__env->renderComponent(); ?>
<?php if(!empty($enabled_modules) && in_array('types_of_service', $enabled_modules) ): ?>
    <?php echo $__env->make('types_of_service.invoice_layout_settings', ['module_info' => $invoice_layout->module_info], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<!-- Call restaurant module if defined -->
<?php echo $__env->make('restaurant.partials.invoice_layout', ['module_info' => $invoice_layout->module_info, 'edit_il' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if(Module::has('Repair')): ?>
  <?php echo $__env->make('repair::layouts.partials.invoice_layout_settings', ['module_info' => $invoice_layout->module_info, 'edit_il' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>


<div class="box box-solid">
  <div class="box-header with-border">
    <h3 class="box-title"><?php echo app('translator')->get('lang_v1.layout_credit_note'); ?></h3>
  </div>

  <div class="box-body">
    <div class="row">
      
      <div class="col-sm-3">
        <div class="form-group">
          <?php echo Form::label('cn_heading', __('lang_v1.cn_heading') . ':' ); ?>

          <?php echo Form::text('cn_heading', $invoice_layout->cn_heading, ['class' => 'form-control', 'placeholder' => __('lang_v1.cn_heading') ]); ?>

        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <?php echo Form::label('cn_no_label', __('lang_v1.cn_no_label') . ':' ); ?>

          <?php echo Form::text('cn_no_label', $invoice_layout->cn_no_label, ['class' => 'form-control', 'placeholder' => __('lang_v1.cn_no_label') ]); ?>

        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <?php echo Form::label('cn_amount_label', __('lang_v1.cn_amount_label') . ':' ); ?>

          <?php echo Form::text('cn_amount_label', $invoice_layout->cn_amount_label, ['class' => 'form-control', 'placeholder' => __('lang_v1.cn_amount_label') ]); ?>

        </div>
      </div>

    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-12 text-center">
    <button type="submit" class="tw-dw-btn tw-dw-btn-primary tw-text-white tw-dw-btn-lg"><?php echo app('translator')->get('messages.update'); ?></button>
  </div>
</div>

  <?php echo Form::close(); ?>

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
  __page_leave_confirmation('#add_invoice_layout_form');
    $(document).on('ifChanged', '#show_letter_head', function() {
        letter_head_changed();
    });

    function letter_head_changed() {
        if($('#show_letter_head').is(":checked")) {
            $('.hide-for-letterhead').addClass('hide');
            $('.letter_head_input').removeClass('hide');
        } else {
            $('.hide-for-letterhead').removeClass('hide');
            $('.letter_head_input').addClass('hide');
        }
    }

    $(document).ready(function(){
        letter_head_changed();
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/invoice_layout/edit.blade.php ENDPATH**/ ?>