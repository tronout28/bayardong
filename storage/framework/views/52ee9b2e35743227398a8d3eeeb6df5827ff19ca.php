<div class="modal fade" id="todays_profit_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo app('translator')->get('home.todays_profit'); ?></h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="modal_today" value="<?php echo e(\Carbon::now()->format('Y-m-d'), false); ?>">
        <div class="row">
          <div id="todays_profit">
          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white" data-dismiss="modal"><?php echo app('translator')->get('messages.close'); ?></button>
      </div>
    </div>
  </div>
</div><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/home/todays_profit_modal.blade.php ENDPATH**/ ?>