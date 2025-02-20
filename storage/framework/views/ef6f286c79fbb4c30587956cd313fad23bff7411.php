<?php $request = app('Illuminate\Http\Request'); ?>
<div class="row no-print">
  <div class="col-md-12">
    <a href="<?php echo e(action([\App\Http\Controllers\HomeController::class, 'index']), false); ?>" title="<?php echo e(__('lang_v1.go_back'), false); ?>" data-toggle="tooltip" data-placement="bottom" class="btn btn-info btn-flat m-6 hidden-xs btn-sm m-5 pull-right">
        <strong><i class="fa fa-backward fa-lg"></i></strong>
    </a>
  </div>
</div>
<?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/layouts/partials/header-restaurant.blade.php ENDPATH**/ ?>