<?php $__env->startSection('title', __('lang_v1.' . $type . 's')); ?>
<?php
    $api_key = env('GOOGLE_MAP_API_KEY');
?>
<?php if(!empty($api_key)): ?>
    <?php $__env->startSection('css'); ?>
        <?php echo $__env->make('contact.partials.google_map_styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"> <?php echo app('translator')->get('lang_v1.' . $type . 's'); ?>
            <small class="tw-text-sm md:tw-text-base tw-text-gray-700 tw-font-semibold"><?php echo app('translator')->get('contact.manage_your_contact', ['contacts' => __('lang_v1.' . $type . 's')]); ?></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
            <?php if($type == 'customer'): ?>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>
                            <?php echo Form::checkbox('has_sell_due', 1, false, ['class' => 'input-icheck', 'id' => 'has_sell_due']); ?> <strong><?php echo app('translator')->get('lang_v1.sell_due'); ?></strong>
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>
                            <?php echo Form::checkbox('has_sell_return', 1, false, ['class' => 'input-icheck', 'id' => 'has_sell_return']); ?> <strong><?php echo app('translator')->get('lang_v1.sell_return'); ?></strong>
                        </label>
                    </div>
                </div>
            <?php elseif($type == 'supplier'): ?>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>
                            <?php echo Form::checkbox('has_purchase_due', 1, false, ['class' => 'input-icheck', 'id' => 'has_purchase_due']); ?> <strong><?php echo app('translator')->get('report.purchase_due'); ?></strong>
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>
                            <?php echo Form::checkbox('has_purchase_return', 1, false, ['class' => 'input-icheck', 'id' => 'has_purchase_return']); ?> <strong><?php echo app('translator')->get('lang_v1.purchase_return'); ?></strong>
                        </label>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-md-3">
                <div class="form-group">
                    <label>
                        <?php echo Form::checkbox('has_advance_balance', 1, false, ['class' => 'input-icheck', 'id' => 'has_advance_balance']); ?> <strong><?php echo app('translator')->get('lang_v1.advance_balance'); ?></strong>
                    </label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>
                        <?php echo Form::checkbox('has_opening_balance', 1, false, ['class' => 'input-icheck', 'id' => 'has_opening_balance']); ?> <strong><?php echo app('translator')->get('lang_v1.opening_balance'); ?></strong>
                    </label>
                </div>
            </div>
            <?php if($type == 'customer'): ?>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="has_no_sell_from"><?php echo app('translator')->get('lang_v1.has_no_sell_from'); ?>:</label>
                        <?php echo Form::select(
                            'has_no_sell_from',
                            [
                                'one_month' => __('lang_v1.one_month'),
                                'three_months' => __('lang_v1.three_months'),
                                'six_months' => __('lang_v1.six_months'),
                                'one_year' => __('lang_v1.one_year'),
                            ],
                            null,
                            ['class' => 'form-control', 'id' => 'has_no_sell_from', 'placeholder' => __('messages.please_select')],
                        ); ?>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="cg_filter"><?php echo app('translator')->get('lang_v1.customer_group'); ?>:</label>
                        <?php echo Form::select('cg_filter', $customer_groups, null, ['class' => 'form-control', 'id' => 'cg_filter']); ?>

                    </div>
                </div>
            <?php endif; ?>

            <?php if(config('constants.enable_contact_assign') === true): ?>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('assigned_to', __('lang_v1.assigned_to') . ':'); ?>

                        <?php echo Form::select('assigned_to', $users, null, ['class' => 'form-control select2', 'style' => 'width:100%']); ?>

                    </div>
                </div>
            <?php endif; ?>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="status_filter"><?php echo app('translator')->get('sale.status'); ?>:</label>
                    <?php echo Form::select(
                        'status_filter',
                        ['active' => __('business.is_active'), 'inactive' => __('lang_v1.inactive')],
                        null,
                        ['class' => 'form-control', 'id' => 'status_filter', 'placeholder' => __('lang_v1.none')],
                    ); ?>

                </div>
            </div>
        <?php echo $__env->renderComponent(); ?>
        <input type="hidden" value="<?php echo e($type, false); ?>" id="contact_type">
        <?php $__env->startComponent('components.widget', [
            'class' => 'box-primary',
            'title' => __('contact.all_your_contact', ['contacts' => __('lang_v1.' . $type . 's')]),
        ]); ?>
            <?php if(auth()->user()->can('supplier.create') ||
                    auth()->user()->can('customer.create') ||
                    auth()->user()->can('supplier.view_own') ||
                    auth()->user()->can('customer.view_own')): ?>
                <?php $__env->slot('tool'); ?>
                    <div class="box-tools">
                        <a class="tw-dw-btn tw-bg-gradient-to-r tw-from-indigo-600 tw-to-blue-500 tw-font-bold tw-text-white tw-border-none tw-rounded-full btn-modal"
                                data-href="<?php echo e(action([\App\Http\Controllers\ContactController::class, 'create'], ['type' => $type]), false); ?>"
                                data-container=".contact_modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                                </svg> <?php echo app('translator')->get('messages.add'); ?>
                        </a>
                    </div>
                <?php $__env->endSlot(); ?>
            <?php endif; ?>
            <?php if(auth()->user()->can('supplier.view') ||
                    auth()->user()->can('customer.view') ||
                    auth()->user()->can('supplier.view_own') ||
                    auth()->user()->can('customer.view_own')): ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="contact_table">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('messages.action'); ?></th>
                                <th><?php echo app('translator')->get('lang_v1.contact_id'); ?></th>
                                <th><?php echo app('translator')->get('business.business_name'); ?></th>
                                <th><?php echo app('translator')->get('contact.name'); ?></th>
								<th><?php echo app('translator')->get('contact.mobile'); ?></th>
                                <th><?php echo app('translator')->get('business.email'); ?></th>
                                <th><?php echo app('translator')->get('contact.tax_no'); ?></th>
								<th><?php echo app('translator')->get('business.address'); ?></th>
								<th><?php echo app('translator')->get('contact.pay_term'); ?></th>
                                <?php if($type == 'supplier'): ?>
                                    <th><?php echo app('translator')->get('account.opening_balance'); ?></th>
                                    <th><?php echo app('translator')->get('lang_v1.advance_balance'); ?></th>
                                    <th><?php echo app('translator')->get('contact.total_purchase_due'); ?></th>
                                    <th><?php echo app('translator')->get('lang_v1.total_purchase_return_due'); ?></th>
                                <?php elseif($type == 'customer'): ?>
                                    <th><?php echo app('translator')->get('lang_v1.credit_limit'); ?></th>
                                    <th><?php echo app('translator')->get('lang_v1.customer_group'); ?></th>
                                    <?php if($reward_enabled): ?>
                                        <th id="rp_col"><?php echo e(session('business.rp_name'), false); ?></th>
                                    <?php endif; ?>
                                    <th><?php echo app('translator')->get('account.opening_balance'); ?></th>
                                    <th><?php echo app('translator')->get('lang_v1.advance_balance'); ?></th>
									<th><?php echo app('translator')->get('contact.total_sale_due'); ?></th>
                                    <th><?php echo app('translator')->get('lang_v1.total_sell_return_due'); ?></th>
                                <?php endif; ?>
								<th><?php echo app('translator')->get('lang_v1.added_on'); ?></th>
                                <?php
                                    $custom_labels = json_decode(session('business.custom_labels'), true);
                                ?>
                                <th><?php echo e($custom_labels['contact']['custom_field_1'] ?? __('lang_v1.contact_custom_field1'), false); ?></th>
                                <th><?php echo e($custom_labels['contact']['custom_field_2'] ?? __('lang_v1.contact_custom_field2'), false); ?></th>
                                <th><?php echo e($custom_labels['contact']['custom_field_3'] ?? __('lang_v1.contact_custom_field3'), false); ?></th>
                                <th><?php echo e($custom_labels['contact']['custom_field_4'] ?? __('lang_v1.contact_custom_field4'), false); ?></th>
                                <th><?php echo e($custom_labels['contact']['custom_field_5'] ?? __('lang_v1.custom_field', ['number' => 5]), false); ?></th>
                                <th><?php echo e($custom_labels['contact']['custom_field_6'] ?? __('lang_v1.custom_field', ['number' => 6]), false); ?></th>
                                <th><?php echo e($custom_labels['contact']['custom_field_7'] ?? __('lang_v1.custom_field', ['number' => 7]), false); ?></th>
                                <th><?php echo e($custom_labels['contact']['custom_field_8'] ?? __('lang_v1.custom_field', ['number' => 8]), false); ?></th>
                                <th><?php echo e($custom_labels['contact']['custom_field_9'] ?? __('lang_v1.custom_field', ['number' => 9]), false); ?></th>
                                <th><?php echo e($custom_labels['contact']['custom_field_10'] ?? __('lang_v1.custom_field', ['number' => 10]), false); ?></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-gray font-17 text-center footer-total">
                                <td <?php if($type == 'supplier'): ?> colspan="11"
									<?php elseif($type == 'customer'): ?>
										<?php if($reward_enabled): ?> colspan="14"
										<?php else: ?> colspan="13"
										<?php endif; ?>
                                    <?php endif; ?>>
                                    <strong>
                                        <?php echo app('translator')->get('sale.total'); ?>:
                                    </strong>
                                <td class="footer_contact_due"></td>
                                <td class="footer_contact_return_due"></td>
                                <td></td>
								<td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            <?php endif; ?>
        <?php echo $__env->renderComponent(); ?>

        <div class="modal fade contact_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        </div>
        <div class="modal fade pay_contact_due_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        </div>

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <?php if(!empty($api_key)): ?>
        <script>
            // This example adds a search box to a map, using the Google Place Autocomplete
            // feature. People can enter geographical searches. The search box will return a
            // pick list containing a mix of places and predicted search terms.

            // This example requires the Places library. Include the libraries=places
            // parameter when you first load the API. For example:
            // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

            function initAutocomplete() {
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: {
                        lat: -33.8688,
                        lng: 151.2195
                    },
                    zoom: 10,
                    mapTypeId: 'roadmap'
                });

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                        map.setCenter(initialLocation);
                    });
                }


                // Create the search box and link it to the UI element.
                var input = document.getElementById('shipping_address');
                var searchBox = new google.maps.places.SearchBox(input);
                map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                // Bias the SearchBox results towards current map's viewport.
                map.addListener('bounds_changed', function() {
                    searchBox.setBounds(map.getBounds());
                });

                var markers = [];
                // Listen for the event fired when the user selects a prediction and retrieve
                // more details for that place.
                searchBox.addListener('places_changed', function() {
                    var places = searchBox.getPlaces();

                    if (places.length == 0) {
                        return;
                    }

                    // Clear out the old markers.
                    markers.forEach(function(marker) {
                        marker.setMap(null);
                    });
                    markers = [];

                    // For each place, get the icon, name and location.
                    var bounds = new google.maps.LatLngBounds();
                    places.forEach(function(place) {
                        if (!place.geometry) {
                            console.log("Returned place contains no geometry");
                            return;
                        }
                        var icon = {
                            url: place.icon,
                            size: new google.maps.Size(71, 71),
                            origin: new google.maps.Point(0, 0),
                            anchor: new google.maps.Point(17, 34),
                            scaledSize: new google.maps.Size(25, 25)
                        };

                        // Create a marker for each place.
                        markers.push(new google.maps.Marker({
                            map: map,
                            icon: icon,
                            title: place.name,
                            position: place.geometry.location
                        }));

                        //set position field value
                        var lat_long = [place.geometry.location.lat(), place.geometry.location.lng()]
                        $('#position').val(lat_long);

                        if (place.geometry.viewport) {
                            // Only geocodes have viewport.
                            bounds.union(place.geometry.viewport);
                        } else {
                            bounds.extend(place.geometry.location);
                        }
                    });
                    map.fitBounds(bounds);
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e($api_key, false); ?>&libraries=places" async defer></script>
        <script type="text/javascript">
            $(document).on('shown.bs.modal', '.contact_modal', function(e) {
                initAutocomplete();
            });
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u7054907/public_html/bayardong.com/resources/views/contact/index.blade.php ENDPATH**/ ?>