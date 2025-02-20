<div class="table-responsive">
    <table class="table table-bordered table-striped table-text-center" id="profit_by_date_table">
        <thead>
            <tr>
                <th><?php echo app('translator')->get('lang_v1.date'); ?></th>
                <th><?php echo app('translator')->get('lang_v1.gross_profit'); ?></th>
            </tr>
        </thead>
        <tfoot>
            <tr class="bg-gray font-17 footer-total">
                <td><strong><?php echo app('translator')->get('sale.total'); ?>:</strong></td>
                <td class="footer_total"></td>
            </tr>
        </tfoot>
    </table>
</div><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/report/partials/profit_by_date.blade.php ENDPATH**/ ?>