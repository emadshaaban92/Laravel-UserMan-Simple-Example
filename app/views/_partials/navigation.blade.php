@if (Sentry::check())
	<ul class="nav">
		<li><a href="{{ URL::route('logout') }}"><i class="icon-lock"></i> Logout</a></li>
	</ul>
@endif
