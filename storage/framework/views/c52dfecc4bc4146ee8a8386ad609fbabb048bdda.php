<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action([\Modules\Accounting\Http\Controllers\TransferController::class, 'store']), 
        'method' => 'post', 'id' => 'transfer_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->get( 'accounting::lang.add_transfer' ); ?></h4>
    </div>

    <div class="modal-body">
        <div class="form-group">
            <?php echo Form::label('ref_no', __('purchase.ref_no').':'); ?>

            <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.leave_empty_to_autogenerate') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            <?php echo Form::text('ref_no', null, ['class' => 'form-control']); ?>

        </div>
        <div class="form-group">
            <?php echo Form::label('from_account', __( 'lang_v1.transfer_from' ) .":*"); ?>

            <?php echo Form::select('from_account', [], null, ['class' => 'form-control accounts-dropdown', 'required', 
                'placeholder' => __('messages.please_select') ]); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label('to_account', __( 'account.transfer_to' ) .":*"); ?>

            <?php echo Form::select('to_account', [], null, ['class' => 'form-control accounts-dropdown', 'required', 
                'placeholder' => __('messages.please_select') ]); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label('amount', __( 'sale.amount' ) .":*"); ?>

            <?php echo Form::text('amount', 0, ['class' => 'form-control input_number', 
                'required','placeholder' => __( 'sale.amount' ) ]); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label('operation_date', __( 'messages.date' ) .":*"); ?>

            <div class="input-group">
                <?php echo Form::text('operation_date', null, ['class' => 'form-control', 
                    'required','placeholder' => __( 'messages.date' ), 'id' => 'operation_date' ]); ?>

                <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>

        <div class="form-group">
            <?php echo Form::label('note', __( 'brand.note' )); ?>

            <?php echo Form::textarea('note', null, ['class' => 'form-control', 
                'placeholder' => __( 'brand.note' ), 'rows' => 4]); ?>

        </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo app('translator')->get( 'messages.save' ); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/Accounting/Providers/../Resources/views/transfer/create.blade.php ENDPATH**/ ?>