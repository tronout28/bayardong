<!-- Left side column. contains the logo and sidebar -->
<aside class="side-bar tw-relative tw-hidden tw-h-full tw-bg-white tw-w-64 xl:tw-w-64 lg:tw-flex lg:tw-flex-col tw-shrink-0 no-print">

    <!-- sidebar: style can be found in sidebar.less -->
    <a href="{{route('home')}}"
        class="tw-flex tw-items-center tw-justify-center tw-w-full tw-border-r tw-h-15 tw-bg-@if(!empty(session('business.theme_color'))){{session('business.theme_color')}}@else{{'primary'}}@endif-800 tw-shrink-0 tw-border-primary-500/30">
		@if(!empty(Session::get('business.logo')))
			<img src="{{asset('/uploads/business_logos/'.Session::get('business.logo'))}}" alt="{{Session::get('business.name')}}" style="max-width: 240px;">
		@else
			<p class="tw-text-lg tw-font-medium tw-text-white side-bar-heading tw-text-center">
				{{ Session::get('business.name') }} <span class="tw-inline-block tw-w-3 tw-h-3 tw-bg-green-400 tw-rounded-full" title="Online"></span>
			</p>
		@endif
    </a>
    <!-- Sidebar Menu -->
    {!! Menu::render('admin-sidebar-menu', 'adminltecustom') !!}
    <!-- /.sidebar-menu -->
    <!-- /.sidebar -->
</aside>
