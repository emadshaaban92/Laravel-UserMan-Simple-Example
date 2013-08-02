@if (Sentry::check())
	<ul class="nav">
		<li><a href="{{ URL::route('MemberHome') }}"><i class="icon-user"></i> Welcome {{Sentry::getUser()->first_name}} </a></li>
		<li><a href="{{ URL::route('logout') }}"><i class="icon-lock"></i> Logout </a></li>
	</ul>
@else
	<ul class="nav">
		<li><a href="{{ URL::route('login') }}"><i class="icon-user"></i> Login </a></li>
		<li><a href="{{ URL::route('register') }}"><i class="icon-plus"></i> Register </a></li>
	</ul>
@endif
