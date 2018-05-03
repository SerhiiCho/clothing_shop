@auth     
	<nav class="user-sidebar">
		<ul>
			<li class="{{ activeIfRouteIs('dashboard') }} red-buttons" {{ $unreaded }}>
				<a href="/dashboard" title="@lang('user-sidebar.profile')">
					<i class="fa fa-user-circle-o icon-profile-menu-line" aria-hidden="true"></i>
					<span>@lang('user-sidebar.profile')</span>
				</a>
			</li>
			<li class="{{ activeIfRouteIs('items/create') }}">
				<a href="/items/create" title="@lang('user-sidebar.add_new_item')">
					<i class="fa fa-plus-circle icon-profile-menu-line" aria-hidden="true"></i>
					<span>@lang('user-sidebar.add_new_item')</span>
				</a>
			</li>
			<li class="{{ activeIfRouteIs('items') }}" >
				<a href="/items" title="@lang('user-sidebar.all_items')">
					<i class="fa fa-shopping-bag icon-profile-menu-line" aria-hidden="true"></i>
					<span>@lang('user-sidebar.all_items')</span>
				</a>
			</li>
			<li class="remove-hover">
				<a href="#">
					<i class="fa fa-cog icon-profile-menu-line" aria-hidden="true"></i>
					<span>@lang('user-sidebar.settings')</span>
				</a>
			</li>
			<li class="{{ activeIfRouteIs('settings/general') }}">
				<a href="/settings/general" title="@lang('user-sidebar.general')">
					<i class="fa fa-angle-right icon-profile-menu-line" aria-hidden="true"></i>
					<span>@lang('user-sidebar.general')</span>
				</a>
			</li>
		</ul>
		<li>
			<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="@lang('user-sidebar.exit')">
				<i class="fa fa-power-off icon-profile-menu-line" aria-hidden="true"></i>
				<span class="nav-text">@lang('user-sidebar.exit')</span>
			</a>
		</li>
	</nav>

	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
		@csrf
	</form>
@endauth