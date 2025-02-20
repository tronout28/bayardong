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
                <a class="navbar-brand" href="<?php echo e(action([\Modules\AssetManagement\Http\Controllers\AssetController::class, 'dashboard']), false); ?>">
                		<i class="fas fa fa-boxes"></i>
                	<?php echo e(__('assetmanagement::lang.asset_management'), false); ?>

                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('asset.view')): ?>
                    <li <?php if(request()->segment(2) == 'assets'): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e(action([\Modules\AssetManagement\Http\Controllers\AssetController::class, 'index']), false); ?>">
                            <?php echo app('translator')->get('assetmanagement::lang.assets'); ?>
                        </a>
                    </li>
                    <li <?php if(request()->segment(2) == 'allocation'): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e(action([\Modules\AssetManagement\Http\Controllers\AssetAllocationController::class, 'index']), false); ?>">
                            <?php echo app('translator')->get('assetmanagement::lang.asset_allocated'); ?>
                        </a>
                    </li>
                    <li <?php if(request()->segment(2) == 'revocation'): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e(action([\Modules\AssetManagement\Http\Controllers\RevokeAllocatedAssetController::class, 'index']), false); ?>">
                            <?php echo app('translator')->get('assetmanagement::lang.revoked_asset'); ?>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if(auth()->user()->can('asset.view_all_maintenance') || auth()->user()->can('asset.view_own_maintenance')): ?>
                    <li <?php if(request()->segment(2) == 'maintenance'): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e(action([\Modules\AssetManagement\Http\Controllers\AssetMaitenanceController::class, 'index']), false); ?>">
                            <?php echo app('translator')->get('assetmanagement::lang.asset_maintenance'); ?>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('only_admin')): ?>
                    <li <?php if(request()->get('type') == 'asset'): ?> class="active" <?php endif; ?>>
                    	<a href="<?php echo e(action([\App\Http\Controllers\TaxonomyController::class, 'index']) . '?type=asset', false); ?>">
                    		<?php echo app('translator')->get('assetmanagement::lang.asset_categories'); ?>
                    	</a>
                   	</li>
                    <li <?php if(request()->segment(2) == 'settings'): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e(action([\Modules\AssetManagement\Http\Controllers\AssetSettingsController::class, 'index']), false); ?>">
                            <?php echo app('translator')->get('role.settings'); ?>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</section><?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/AssetManagement/Providers/../Resources/views/layouts/nav.blade.php ENDPATH**/ ?>