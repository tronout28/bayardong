<div class="modal-dialog" role="document">
    {!! Form::open(['url' => action([\App\Http\Controllers\PurchaseOrderController::class, 'postEditPurchaseOrderStatus'], ['id' => $id]), 'method' => 'put', 'id' => 'update_po_status_form']) !!}
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">@lang('lang_v1.edit_status')</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('po_status', __('sale.status') . ':') !!}
                        <select name="status" id="po_status" class="form-control" style="width: 100%;">
                            @foreach($statuses as $key => $po_status)
                                <option value="{{$key}}" @if($key == $status) selected @endif>
                                    {{$po_status['label']}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="tw-dw-btn tw-dw-btn-primary tw-text-white ladda-button">
                @lang('messages.update')
            </button>
            <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white" data-dismiss="modal">
                @lang('messages.close')
            </button>
        </div>
    </div><!-- /.modal-content -->
    {!! Form::close() !!}
</div><!-- /.modal-dialog -->
