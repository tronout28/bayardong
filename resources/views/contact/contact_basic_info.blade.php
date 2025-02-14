<!-- <strong>{{ $contact->name }}</strong><br><br> -->
<h3 class="profile-username">
    <i class="fas fa-user-tie"></i>
    {{ $contact->full_name_with_business }}
    <br>
	<small>
        @if($contact->type == 'both')
            {{__('role.customer')}} & {{__('role.supplier')}}
        @elseif(($contact->type != 'lead'))
            {{__('role.'.$contact->type)}}
        @endif
    </small>
</h3><br>
<strong><i class="fa fa-map-marker margin-r-5"></i> @lang('business.address')</strong>
<p class="text-muted">
    {!! $contact->contact_address !!}
</p>

<strong><i class="fa fa-mobile margin-r-5"></i> @lang('contact.mobile')</strong>
<p class="text-muted">
    {{ $contact->mobile }}
</p>
@if($contact->alternate_number)
    <strong><i class="fa fa-phone margin-r-5"></i> @lang('contact.alternate_contact_number')</strong>
    <p class="text-muted">
        {{ $contact->alternate_number }}
    </p>
@endif
@if($contact->landline)
    <strong><i class="fa fa-phone margin-r-5"></i> @lang('contact.landline')</strong>
    <p class="text-muted">
        {{ $contact->landline }}
    </p>
@endif
@if($contact->email)
    <strong><i class="fa fa-envelope margin-r-5"></i> @lang('business.email')</strong>
    <p class="text-muted">
        {{ $contact->email }}
    </p>
@endif
@if($contact->dob)
    <strong><i class="fa fa-calendar margin-r-5"></i> @lang('lang_v1.dob')</strong>
    <p class="text-muted">
        {{ @format_date($contact->dob) }}
    </p>
@endif