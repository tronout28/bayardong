
<?php $__env->startSection('title',__('installment::lang.customer_instalment')); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('installment::layouts.partials.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="content-header">
        <h1><?php echo app('translator')->get('installment::lang.customer_instalment'); ?></h1>
    </section>

    <?php echo csrf_field(); ?>
    <section class="content no-print">
        <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' =>'']); ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('installment.view')): ?>


            <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <?php echo Form::label('customer_id',__('installment::lang.customers') .' : '); ?>

                                <?php echo Form::select('customer_id', $customers, null, ['class' => 'form-control select2','id'=>'customer_id']); ?>

                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="form-group">
                                <?php echo Form::label('balance_due',' Balance Due:'); ?>

                                <input type="balance_due" name='balance_due' id="balance_due" value="00.00" class="form-control text-disabled" readonly>
                            </div>
                        </div>


                    </div>



            <?php endif; ?>

           

        <div class="view-div">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('installment.view')): ?>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped " id="data_table2">
                        <thead>
                        <tr>
                            <th style="width: 140px">Installment start date</th>
                            <th style="width: 140px">Total amount</th>
                            <th>Installment value</th>
                            <th style="width: 100px">Number of installments</th>

                            <th>Number of installments Paid</th>
                            <th style="width: 150px"></th>


                        </tr>
                        </thead>

                    </table>
                </div>


            <?php endif; ?>
        </div>



        <?php echo $__env->renderComponent(); ?>



    </section>

    <div class="modal fade div_modal" tabindex="-1" role="dialog"
         aria-labelledby="gridSystemModalLabel">
    </div>

    <section class="invoice print_section" id="installment_section">
    </section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
 
 <?php echo $__env->make('installment::layouts.partials.javascripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<script type="text/javascript">
$(document).ready(function () {

    data_table2 = $('#data_table2').DataTable({
        processing: true,
        serverSide: true,
        ajax:{
            url:'/installment/getinstallment?id=',
            data:function(d) {
                d.id= $('#customer_id').val();
            }
        },
        columnDefs: [
            {
                targets:5,
                orderable: false,
                searchable: false,
            },
        ],
    });
    $('#customer_id').on('change',function () {
        var customer_id = $('#customer_id').val();
        $.ajax({
            method: 'GET',
            url: '/installment/getcustomerdata/' + customer_id,
            data: {
                id: customer_id
            },
            success: function (result) {
                $('#balance_due').val(result['balance_due'].toFixed(2));
            }
        });
        data_table2.ajax.reload();

    });

});





$(document).on('click', 'button.delete_installment_button', function () {
    swal({
        title: LANG.sure,
        text: 'The installment group will be deleted ',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
    }).then(willDelete => {
        if (willDelete) {
            var href = $(this).data('href');
            var data = $(this).serialize();
            $.ajax({
                method: 'DELETE',
                url: href,
                dataType: 'json',
                data: data,
                success: function (result) {
                    if (result.success == true) {
                        toastr.success(result.msg);
                        data_table2.ajax.reload();
                    } else {
                        toastr.error(result.msg);
                    }
                },
            });
        }
    });

});



</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/Modules/Installment/Providers/../Resources/views/customer/index.blade.php ENDPATH**/ ?>