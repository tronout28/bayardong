<div class="modal-dialog" role="document">
    <div class="modal-content">

        <?php echo Form::open(['url' => action('\Modules\Installment\Http\Controllers\InstallmentSystemController@store'), 'method' => 'post','id'=>'add_installment_system' ]); ?>


        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add Installment Plan</h4>
        </div>

        <div class="modal-body">
            <div class="form-group">
                <?php echo Form::label('name','Installment Plan Name :*'); ?>

                <?php echo Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' =>'Name' ]); ?>

            </div>
            <div class="form-group">
                <?php echo Form::label('number',' Number of installments :*'); ?>

                <div class="row">
                    <div class="col-lg-4">
                <?php echo Form::text('number', null, ['class' => 'form-control integr', 'required' ]); ?>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <?php echo Form::label('period',' Repayment Period:'); ?>

                <div class="row">
                    <div class="col-lg-4">
                        <?php echo Form::text('period', null, ['class' => 'form-control integr', 'required' ]); ?>

                    </div>
                    <div class="col-lg-6">
                        <select class="form-control" name="type">
                            <option value="day"><?php echo app('translator')->get('installment::lang.day'); ?></option>
                            <option value="month"><?php echo app('translator')->get('installment::lang.month'); ?></option>
                            <option value="year"><?php echo app('translator')->get('installment::lang.year'); ?></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
               <div class="row">
                    <div class="col-lg-4">
                        <?php echo Form::label('benefit',' Interest Rate %:'); ?>

                        <?php echo Form::text('benefit', null, ['class' => 'form-control', 'required' ]); ?>

                    </div>
                    <div class="col-lg-4">
                        <?php echo Form::label('benefit_type','Interest Type :'); ?>

                           <select class="form-control" name="benefit_type">
                               <option value="simple"><?php echo app('translator')->get('installment::lang.simple'); ?></option>
                               <option value="complex"><?php echo app('translator')->get('installment::lang.complex'); ?></option>

                           </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <?php echo Form::label('latfines','Late Payment Penalty % :'); ?>

                <div class="row">
                    <div class="col-lg-4">
                        <?php echo Form::text('latfines', null, ['class' => 'form-control decimal', 'required' ]); ?>

                    </div>
                    <div class="col-lg-6">
                        <select class="form-control"  name="latfinestype">
                            <option value="day"><?php echo app('translator')->get('installment::lang.day'); ?></option>
                            <option value="month"><?php echo app('translator')->get('installment::lang.month'); ?></option>
                            <option value="year"><?php echo app('translator')->get('installment::lang.year'); ?></option>
                        </select>
                    </div>
                </div>
            </div>



            <div class="form-group">
                <?php echo Form::label('description','Description:'); ?>

                <?php echo Form::text('description', null, ['class' => 'form-control'  ]); ?>

            </div>

     </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" ><?php echo app('translator')->get( 'messages.save' ); ?></button>
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
        </div>

        <?php echo Form::close(); ?>


    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script>

</script><?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/Installment/Providers/../Resources/views/systems/create.blade.php ENDPATH**/ ?>