<?php $__env->startSection('title', __( 'account.balance_sheet' )); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"><?php echo app('translator')->get( 'account.balance_sheet'); ?>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row no-print">
        <div class="col-sm-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('bal_sheet_location_id',  __('purchase.business_location') . ':'); ?>

                    <?php echo Form::select('bal_sheet_location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%']); ?>

                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                    <label for="end_date"><?php echo app('translator')->get('messages.filter_by_date'); ?>:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <input type="text" id="end_date" value="<?php echo e(\Carbon::createFromTimestamp(strtotime('now'))->format(session('business.date_format')), false); ?>" class="form-control" readonly>
                    </div>
            </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <br>
    <div class="box box-solid">
        <div class="box-header print_section">
            <h3 class="box-title"><?php echo e(session()->get('business.name'), false); ?> - <?php echo app('translator')->get( 'account.balance_sheet'); ?> - <span id="hidden_date"><?php echo e(\Carbon::createFromTimestamp(strtotime('now'))->format(session('business.date_format')), false); ?></span></h3>
        </div>
        <div class="box-body">
            <table class="table table-border-center no-border table-pl-12">
                <thead>
                    <tr class="bg-gray">
                        <th><?php echo app('translator')->get( 'account.liability'); ?></th>
                        <th><?php echo app('translator')->get( 'account.assets'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <table class="table">
                                <tr>
                                    <th><?php echo app('translator')->get('account.supplier_due'); ?>:</th>
                                <td>
                                    <input type="hidden" id="hidden_supplier_due" class="liability">
                                    <span class="remote-data" id="supplier_due">
                                        <i class="fas fa-sync fa-spin fa-fw"></i>
                                    </span>
                                </td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table class="table" id="assets_table">
                                <tbody>
                                    <tr>
                                        <th><?php echo app('translator')->get('account.customer_due'); ?>:</th>
                                        <td>
                                            <input type="hidden" id="hidden_customer_due" class="asset">
                                            <span class="remote-data" id="customer_due">
                                                <i class="fas fa-sync fa-spin fa-fw"></i>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo app('translator')->get('report.closing_stock'); ?>:</th>
                                        <td>
                                            <input type="hidden" id="hidden_closing_stock" class="asset">
                                            <span class="remote-data" id="closing_stock">
                                                <i class="fas fa-sync fa-spin fa-fw"></i>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2"><?php echo app('translator')->get('account.account_balances'); ?>:</th>
                                    </tr>
                                </tbody>
                                <tbody id="account_balances" class="pl-20-td">
                                    <tr><td colspan="2"><i class="fas fa-sync fa-spin fa-fw"></i></td></tr>
                                </tbody>
                                
                            </table>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="bg-gray">
                        <td>
                            <table class="table bg-gray mb-0 no-border">
                                <tr>
                                    <th>
                                        <?php echo app('translator')->get('account.total_liability'); ?>: 
                                    </th>
                                    <td>
                                        <span id="total_liabilty"><i class="fas fa-sync fa-spin fa-fw"></i></span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table class="table bg-gray mb-0 no-border">
                                <tr>
                                    <th>
                                        <?php echo app('translator')->get('account.total_assets'); ?>: 
                                    </th>
                                    <td>
                                        <span id="total_assets"><i class="fas fa-sync fa-spin fa-fw"></i></span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="box-footer">
            <button type="button" class="tw-dw-btn tw-dw-btn-primary tw-text-white no-print pull-right"onclick="window.print()">
          <i class="fa fa-print"></i> <?php echo app('translator')->get('messages.print'); ?></button>
        </div>
    </div>

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>

<script type="text/javascript">
    $(document).ready( function(){
        //Date picker
        $('#end_date').datepicker({
            autoclose: true,
            format: datepicker_date_format
        });
        update_balance_sheet();

        $('#end_date').change( function() {
            update_balance_sheet();
            $('#hidden_date').text($(this).val());
        });
        $('#bal_sheet_location_id').change( function() {
            update_balance_sheet();
        });
    });

    function update_balance_sheet(){
        var loader = '<i class="fas fa-sync fa-spin fa-fw"></i>';
        $('span.remote-data').each( function() {
            $(this).html(loader);
        });

        $('table#assets_table tbody#account_balances').html('<tr><td colspan="2"><i class="fas fa-sync fa-spin fa-fw"></i></td></tr>');
        $('table#assets_table tbody#capital_account_balances').html('<tr><td colspan="2"><i class="fas fa-sync fa-spin fa-fw"></i></td></tr>');

        var end_date = $('input#end_date').val();
        var location_id = $('#bal_sheet_location_id').val()
        $.ajax({
            url: "<?php echo e(action([\App\Http\Controllers\AccountReportsController::class, 'balanceSheet']), false); ?>?end_date=" + end_date + '&location_id=' + location_id, 
            dataType: "json",
            success: function(result){
                $('span#supplier_due').text(__currency_trans_from_en(result.supplier_due, true));
                __write_number($('input#hidden_supplier_due'), result.supplier_due);

                $('span#customer_due').text(__currency_trans_from_en(result.customer_due, true));
                __write_number($('input#hidden_customer_due'), result.customer_due);

                $('span#closing_stock').text(__currency_trans_from_en(result.closing_stock, true));
                __write_number($('input#hidden_closing_stock'), result.closing_stock);
                var account_balances = result.account_balances;
                $('table#assets_table tbody#account_balances').html('');
                for (var key in account_balances) {
                    var accnt_bal = __currency_trans_from_en(result.account_balances[key]);
                    var accnt_bal_with_sym = __currency_trans_from_en(result.account_balances[key], true);
                    var account_tr = '<tr><td class="pl-20-td">' + key + ':</td><td><input type="hidden" class="asset" value="' + accnt_bal + '">' + accnt_bal_with_sym + '</td></tr>';
                    $('table#assets_table tbody#account_balances').append(account_tr);
                }
                var capital_account_details = result.capital_account_details;
                $('table#assets_table tbody#capital_account_balances').html('');
                for (var key in capital_account_details) {
                    var accnt_bal = __currency_trans_from_en(result.capital_account_details[key]);
                    var accnt_bal_with_sym = __currency_trans_from_en(result.capital_account_details[key], true);
                    var account_tr = '<tr><td class="pl-20-td">' + key + ':</td><td><input type="hidden" class="asset" value="' + accnt_bal + '">' + accnt_bal_with_sym + '</td></tr>';
                    $('table#assets_table tbody#capital_account_balances').append(account_tr);
                }


                var total_liabilty = 0;
                var total_assets = 0;
                $('input.liability').each( function(){
                    total_liabilty += __read_number($(this));
                });
                $('input.asset').each( function(){
                    total_assets += __read_number($(this));
                });

                $('span#total_liabilty').text(__currency_trans_from_en(total_liabilty, true));
                $('span#total_assets').text(__currency_trans_from_en(total_assets, true));
                
            }
        });
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/account_reports/balance_sheet.blade.php ENDPATH**/ ?>