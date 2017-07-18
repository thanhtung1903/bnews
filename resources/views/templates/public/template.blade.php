@include('templates.public.header')
<div class="leftpanel">
	@include('templates.public.left_bar')
</div>
<div class="rightpanel">
	 @yield('content')
</div>
@include('templates.public.footer')