@extends('templates.admin.template')
@section('content')
<?php 
	$url_admin = getenv("ADMIN_URL");
	$id_cat = $arCat['id_cat'];
	$name = $arCat['name'];
?> 
<!-- Form elements -->    
<div class="grid_12">

	<div class="module">
		 <h2><span>Sửa danh mục</span></h2>
			
		 <div class="module-body">
			<form action="{{ route('admin.cat.edit', $id_cat) }}" method="POST">
			{{ csrf_field() }}
				<p>
					<label>Tên tin</label>
					<input type="text" name="tendmt" value="{{$name}}" class="input-medium" />
				</p>
				<fieldset>
					<input class="submit-green" name="submit" type="submit" value="Sửa" /> 
					<input class="submit-gray" name="reset" type="reset" value="Nhập lại" />
				</fieldset>
			</form>
		 </div> <!-- End .module-body -->

	</div>  <!-- End .module -->
	<div style="clear:both;"></div>
</div> <!-- End .grid_12 -->
@endsection