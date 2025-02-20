
<?php if(!$account_exist): ?>
<table class="table table-bordered table-striped">
    <tr>
        <td colspan="10" class="text-center">
            <h3><?php echo app('translator')->get( 'accounting::lang.no_accounts' ); ?></h3>
            <p><?php echo app('translator')->get( 'accounting::lang.add_default_accounts_help' ); ?></p>
            <a href="<?php echo e(route('accounting.create-default-accounts'), false); ?>" class="btn btn-success btn-xs"><?php echo app('translator')->get( 'accounting::lang.add_default_accounts' ); ?> <i class="fas fa-file-import"></i></a>
        </td>
    </tr>
</table>
<?php else: ?>
<div class="row">
    <div class="col-md-4 mb-12 col-md-offset-4">
        <div class="input-group">
            <input type="input" class="form-control" id="accounts_tree_search">
            <span class="input-group-addon">
                <i class="fas fa-search"></i>
            </span>
        </div>
    </div>
    <div class="col-md-4">
        <button class="btn btn-primary btn-sm" id="expand_all"><?php echo app('translator')->get('accounting::lang.expand_all'); ?></button>
        <button class="btn btn-primary btn-sm" id="collapse_all"><?php echo app('translator')->get('accounting::lang.collapse_all'); ?></button>
    </div>
    <div class="col-md-12" id="accounts_tree_container">
        <ul>
        <?php $__currentLoopData = $account_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li <?php if($loop->index==0): ?> data-jstree='{ "opened" : true }' <?php endif; ?>>
                <?php echo e($value, false); ?>

                <ul>
                    <?php $__currentLoopData = $account_sub_types->where('account_primary_type', $key)->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li <?php if($loop->index==0): ?> data-jstree='{ "opened" : true }' <?php endif; ?>>
                            <?php echo e($sub_type->account_type_name, false); ?>

                            <ul>
                            <?php $__currentLoopData = $accounts->where('account_sub_type_id', $sub_type->id)->sortBy('name')->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li <?php if(count($account->child_accounts) == 0): ?> data-jstree='{ "icon" : "fas fa-arrow-alt-circle-right" }' <?php endif; ?>>
                                    <?php echo e($account->name, false); ?> <?php if(!empty($account->gl_code)): ?>(<?php echo e($account->gl_code, false); ?>) <?php endif; ?> 
                                    - <?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $account->balance, session("business.currency_precision", 2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?>
                                    <?php if($account->status == 'active'): ?>  
                                        <span><i class="fas fa-check text-success" title="<?php echo app('translator')->get( 'accounting::lang.active' ); ?>"></i></span>
                                    <?php elseif($account->status == 'inactive'): ?> 
                                        <span><i class="fas fa-times text-danger" 
                                        title="<?php echo app('translator')->get( 'lang_v1.inactive' ); ?>" style="font-size: 14px;"></i></span>
                                    <?php endif; ?>
                                    <span class="tree-actions">
                                        <a class="btn btn-xs btn-default text-success ledger-link" 
                                            title="<?php echo app('translator')->get( 'accounting::lang.ledger' ); ?>"
                                            href="<?php echo e(action([\Modules\Accounting\Http\Controllers\CoaController::class, 'ledger'], $account->id), false); ?>">
                                            <i class="fas fa-file-alt"></i></a>
                                        <a class="btn-modal btn-xs btn-default text-primary" title="<?php echo app('translator')->get('messages.edit'); ?>"
                                            href="<?php echo e(action([\Modules\Accounting\Http\Controllers\CoaController::class, 'edit'], $account->id), false); ?>" 
                                            data-href="<?php echo e(action([\Modules\Accounting\Http\Controllers\CoaController::class, 'edit'], $account->id), false); ?>" 
                                            data-container="#create_account_modal">
                                        <i class="fas fa-edit"></i></a>
                                        <a class="activate-deactivate-btn text-warning  btn-xs btn-default" 
                                            title="<?php if($account->status=='active'): ?> <?php echo app('translator')->get('messages.deactivate'); ?> <?php else: ?> 
                                            <?php echo app('translator')->get('messages.activate'); ?> <?php endif; ?>"
                                            href="<?php echo e(action([\Modules\Accounting\Http\Controllers\CoaController::class, 'activateDeactivate'], $account->id), false); ?>">
                                            <i class="fas fa-power-off"></i>
                                        </a>
                                    </span>
                                    <?php if(count($account->child_accounts) > 0): ?>
                                        <ul>
                                        <?php $__currentLoopData = $account->child_accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child_account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li data-jstree='{ "icon" : "fas fa-arrow-alt-circle-right" }'>
                                                <?php echo e($child_account->name, false); ?> 
                                                <?php if(!empty($child_account->gl_code)): ?>(<?php echo e($child_account->gl_code, false); ?>) <?php endif; ?>
                                                 - <?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $child_account->balance, session("business.currency_precision", 2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?>

                                                <?php if($child_account->status == 'active'): ?> 
                                                    <span><i class="fas fa-check text-success" title="<?php echo app('translator')->get( 'accounting::lang.active' ); ?>"></i></span>
                                                <?php elseif($child_account->status == 'inactive'): ?> 
                                                    <span><i class="fas fa-times text-danger" 
                                                    title="<?php echo app('translator')->get( 'lang_v1.inactive' ); ?>" style="font-size: 14px;"></i></span>
                                                <?php endif; ?>
                                                 <span class="tree-actions">
                                                    <a class="btn btn-xs btn-default text-success ledger-link" 
                                                        title="<?php echo app('translator')->get( 'accounting::lang.ledger' ); ?>"
                                                        href="<?php echo e(action([\Modules\Accounting\Http\Controllers\CoaController::class, 'ledger'], $child_account->id), false); ?>">
                                                        <i class="fas fa-file-alt"></i></a>
                                                    <a class="btn-modal btn-xs btn-default text-primary" title="<?php echo app('translator')->get('messages.edit'); ?>"
                                                        href="<?php echo e(action([\Modules\Accounting\Http\Controllers\CoaController::class, 'edit'], $child_account->id), false); ?>" 
                                                        data-href="<?php echo e(action([\Modules\Accounting\Http\Controllers\CoaController::class, 'edit'], $child_account->id), false); ?>" 
                                                        data-container="#create_account_modal">
                                                    <i class="fas fa-edit"></i></a>
                                                    <a class="activate-deactivate-btn text-warning  btn-xs btn-default" 
                                                        title="<?php if($child_account->status=='active'): ?> <?php echo app('translator')->get('messages.deactivate'); ?> <?php else: ?> 
                                                        <?php echo app('translator')->get('messages.activate'); ?> <?php endif; ?>"
                                                        href="<?php echo e(action([\Modules\Accounting\Http\Controllers\CoaController::class, 'activateDeactivate'], $child_account->id), false); ?>">
                                                        <i class="fas fa-power-off"></i>
                                                        </a>
                                                </span>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<?php endif; ?><?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/Accounting/Providers/../Resources/views/chart_of_accounts/accounts_tree.blade.php ENDPATH**/ ?>