<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action([\App\Http\Controllers\ExpenseCategoryController::class, 'update'], [$expense_category->id]), 'method' => 'PUT', 'id' => 'expense_category_add_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->get( 'expense.edit_expense_category' ); ?></h4>
    </div>

    <div class="modal-body">
     <div class="form-group">
        <?php echo Form::label('name', __( 'expense.category_name' ) . ':*'); ?>

          <?php echo Form::text('name', $expense_category->name, ['class' => 'form-control', 'required', 'placeholder' => __( 'expense.category_name' )]); ?>

      </div>

      <div class="form-group">
        <?php echo Form::label('code', __( 'expense.category_code' ) . ':'); ?>

          <?php echo Form::text('code', $expense_category->code, ['class' => 'form-control', 'placeholder' => __( 'expense.category_code' )]); ?>

      </div>

        <div class="form-group">
            <div class="checkbox">
              <label>
                 <?php echo Form::checkbox('add_as_sub_cat', 1, !empty($expense_category->parent_id) ,[ 'class' => 'toggler', 'data-toggle_id' => 'parent_cat_div' ]); ?> <?php echo app('translator')->get( 'lang_v1.add_as_sub_cat' ); ?>
              </label>
            </div>
        </div>
        <div class="form-group <?php if(empty($expense_category->parent_id)): ?> hide <?php endif; ?>" id="parent_cat_div">
            <?php echo Form::label('parent_id', __( 'category.select_parent_category' ) . ':'); ?>

            <?php echo Form::select('parent_id', $categories, $expense_category->parent_id, ['class' => 'form-control', 'placeholder' => __('lang_v1.none')]); ?>

        </div>
    <div class="modal-footer">
      <button type="submit" class="tw-dw-btn tw-dw-btn-primary tw-text-white"><?php echo app('translator')->get( 'messages.update' ); ?></button>
      <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/expense_category/edit.blade.php ENDPATH**/ ?>