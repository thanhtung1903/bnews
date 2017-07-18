@extends('templates.admin.template')
@section('content')
<?php 
	$url_admin = getenv("ADMIN_URL");
?> 
<!-- Form elements -->    
<div class="grid_12">

	<div class="module">
		 <h2><span>Thêm tin tức</span></h2>
			
		 <div class="module-body">
			<form action="{{ route('admin.news.edit', $arNew['id_news']) }}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
				<p>
					<label>Tên tin</label>
					<input type="text" name="tentin" value="{{$arNew['name']}}" class="input-medium" />
				</p>
				<p>
					<label>Danh mục tin</label>
					<select  name="danhmuc" class="input-short">
						<?php 
						foreach ($arCats as $key => $arCat) {
							$id_cat = $arCat['id_cat'];
							$name = $arCat['name'];
							$selected = '';
							if($id_cat == $arNew['id_cat']){
								$selected = "selected = 'selected'";
							}
						 ?>
						<option {{ $selected }} value="{{$id_cat}}">{{$name}}</option>
						<?php } ?>
					</select>
				</p>
				<p>
					<label>Hình ảnh</label>
					<input type="file"  name="hinhanh" value="" />
				</p>
				<p>
					<label>Mô tả</label>
					<textarea name="mota" value="" rows="7" cols="90" class="input-medium">
						{{ $arNew['preview_text'] }}
					</textarea>
				</p>
				<p>
					<label>Chi tiết</label>
					<textarea  name="chitiet" value="" rows="7" cols="90" class="input-long">
						{{$arNew['detail_text'] }}

					</textarea>
				</p>
				<fieldset>
					<input class="submit-green" name="them" type="submit" value="Sửa" /> 
					<input class="submit-gray" name="reset" type="reset" value="Nhập lại" />
				</fieldset>
			</form>
		 </div> <!-- End .module-body -->

	</div>  <!-- End .module -->
	<div style="clear:both;"></div>
</div> <!-- End .grid_12 -->
@endsection