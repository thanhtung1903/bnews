@extends('templates.admin.template')
@section('content')
<?php 
	$url_admin = getenv("ADMIN_URL");
?> 
<!-- Form elements -->    
<div class="grid_12">

	<div class="module">
		 <h2><span>Thêm User</span></h2>
			
		 <div class="module-body">
			<form action="{{ route('admin.users.add') }}" method="POST">
			{{ csrf_field() }}
				<p>
					<label>Username</label>
					<input type="text" name="username" value="" class="input-medium" />
				</p>
				<p>
					<label>Password</label>
					<input type="password" name="password" value="" class="input-medium" />
				</p>
				<p>
					<label>Fullname</label>
					<input type="text" name="fullname" value="" class="input-medium" />
				</p>
				<fieldset>
					<input class="submit-green" name="them" type="submit" value="Thêm" /> 
					<input class="submit-gray" name="reset" type="reset" value="Nhập lại" />
				</fieldset>
			</form>
		 </div> <!-- End .module-body -->

	</div>  <!-- End .module -->
	<div style="clear:both;"></div>
</div> <!-- End .grid_12 -->
@endsection