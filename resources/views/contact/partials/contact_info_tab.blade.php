<span id="view_contact_page"></span>
<div class="row">
    <div class="col-md-12">
        <div class="col-sm-4">
            @include('contact.contact_basic_info')
			@include('contact.contact_tax_info')
        </div>
        <div class="col-sm-4 mt-56">
            @include('contact.contact_more_info')
        </div>
        <div class="col-sm-4 mt-56">
            @include('contact.contact_payment_info') 
        </div>

        <div class="col-sm-12">
        @if( $contact->type == 'supplier' || $contact->type == 'both')
            <a href="{{action([\App\Http\Controllers\TransactionPaymentController::class, 'getPayContactDue'], [$contact->id])}}?type=purchase" class="pay_purchase_due tw-dw-btn tw-dw-btn-primary tw-text-white hover:tw-text-white tw-dw-btn-sm pull-right tw-m-2"><i class="fas fa-money-bill-alt" aria-hidden="true"></i> @lang("contact.pay_due_amount")</a>
        @endif
            <button type="button" class="tw-dw-btn tw-dw-btn-primary tw-text-white tw-dw-btn-sm pull-right tw-m-2" data-toggle="modal" data-target="#add_discount_modal"><i class="fas fa-percentage" aria-hidden="true"></i> @lang('lang_v1.add_discount')</button>
        </div>
    </div>
</div>