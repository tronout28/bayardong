<section class="no-print">
    <nav class="navbar navbar-default bg-white m-4">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo e(action([\Modules\Spreadsheet\Http\Controllers\SpreadsheetController::class, 'index']), false); ?>">
                    <i class="fas fa fa-file-excel"></i> <?php echo e(__('spreadsheet::lang.spreadsheet'), false); ?>

                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li <?php if(request()->segment(2) == 'sheets'): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e(action([\Modules\Spreadsheet\Http\Controllers\SpreadsheetController::class, 'index']), false); ?>">
                            <?php echo app('translator')->get('spreadsheet::lang.sheets'); ?>
                        </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</section><?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/Spreadsheet/Providers/../Resources/views/layouts/nav.blade.php ENDPATH**/ ?>