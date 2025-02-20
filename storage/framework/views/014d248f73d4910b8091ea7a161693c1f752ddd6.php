
<?php $__env->startSection('title', __('inventorymanagement::inventory.inventory')); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?php echo app('translator')->get('inventorymanagement::inventory.inventory'); ?></h1>
        <h3><?php echo app('translator')->get('inventorymanagement::inventory.create_new_inventory'); ?></h3>
    </section>

    <!-- Main content -->
    <section class="content">
        <form method="post" action="<?php echo e(url("inventorymanagement/createNewInventory"), false); ?>">
            <?php echo csrf_field(); ?>
        <div class="row">
            <label style="margin:17px"><?php echo app('translator')->get("inventorymanagement::inventory.inventory_start_date"); ?></label></br>
            <div class="col-md-6">
                <div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</span>
                    <input style="height: 45px" class="form-control"  required="" name="inventory_start_date" type="date" >
                </div>
            </div>
        </div>
        <div class="row">
            <label style="margin:17px"><?php echo app('translator')->get("inventorymanagement::inventory.inventory_end_date"); ?></label></br>
            <div class="col-md-6">
                <div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</span>
                    <input style="height: 45px" class="form-control"  required="" name="inventory_end_date" type="date" >
                </div>
            </div>
        </div>
        <div class="row">
            <label style="margin:17px"><?php echo app('translator')->get("inventorymanagement::inventory.inventory_branch"); ?></label></br>
            <div class="col-md-6">
                <div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-code-branch"></i>
						</span>
                    <select class="form-control" name="branch">
                        <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option id="1" value="<?php echo e($branch->id, false); ?>"><?php echo e($branch->name, false); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </div>
    </br>
    </br>
        <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('inventorymanagement::inventory.save'); ?></button>
        </form>
    </section>
    <!-- /.content -->
<?php echo $__env->make('inventorymanagement::partials.mainscript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/InventoryManagement/Providers/../Resources/views/index.blade.php ENDPATH**/ ?>