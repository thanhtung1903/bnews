@extends('templates.admin.template')
@section('content')
<?php 
	$url_admin = getenv("ADMIN_URL");
?> 
<!-- Form elements -->    
<div class="grid_12">

	<div class="module">
		 <h2><span>Thêm Danh Mục</span></h2>
		 <div class="module-body">
		 	@if (count($errors) > 0)
	            @foreach ($errors->all() as $error)
	                <p style="color: red;font-weight: bold;">{{ $error }}</p>
	            @endforeach
			@endif
			<form action="{{ route('admin.cat.add') }}" method="POST">
			{{ csrf_field() }}
				<p>
					<label>Tên tin</label>
					<input type="text" name="tendmt" value="" class="input-medium" />
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