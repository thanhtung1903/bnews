@extends('templates.admin.template')
@section('content')
<?php 
	$url_admin = getenv("ADMIN_URL");
	//dd($arNews);
?> 
<div class="bottom-spacing">
	  <!-- Button -->
	  <div class="float-left">
		  <a href="{{route('admin.news.add')}}" class="button">
			<span>Thêm tin <img src="{{$url_admin}}/images/plus-small.gif" alt="Thêm tin"></span>
		  </a>
	  </div>
	  <div class="clear"></div>
</div>

<div class="grid_12">
	<?php if (Session::get('msg') != NULL){
			echo '<strong style="color:red">'.Session::get('msg').'</strong>';
		}
	?>
	<!-- Example table -->
	<div class="module">
		<h2><span>Danh sách tin</span></h2>
		
		<div class="module-table-body">
			<form action="">
			<table id="myTable" class="tablesorter">
				<thead>
					<tr>
						<th style="width:4%; text-align: center;">ID</th>
						<th>Tên</th>
						<th style="width:20%">Danh mục</th>
						<th style="width:16%; text-align: center;">Hình ảnh</th>
						<th style="width:11%; text-align: center;">Chức năng</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				/*echo "<pre>";
					print_r($arNews);
				echo "</pre>";
				*///die();
				foreach ($arNews as $key => $arNew) {
					$arNew = (array) $arNew;
					$id_news = $arNew['id_news'];
					$name = $arNew['name'];
					$cname = $arNew['cname'];
					$picture = $arNew['picture'];
					$urlPic = Storage::url('app/files/'.$picture);
				 ?>
					<tr>
						<td class="align-center"> {{$id_news}} </td>
						<td><a href="">{{ $name }}</a></td>
						<td> {{$cname}} </td>
						<td align="center">
						<?php 
							if($picture != ''){
						 ?>
						<img src="{{$urlPic}}" class="hoa" />
						<?php }else{
							echo "Không có hình";
							} ?>
						</td>
						<td align="center">
							<a href="{{route('admin.news.edit', $id_news)}}">Sửa <img src="{{$url_admin}}/images/pencil.gif" alt="edit" /></a>
							<a href="{{route('admin.news.del', $id_news)}}">Xóa <img src="{{$url_admin}}/images/bin.gif" width="16" height="16" alt="delete" /></a>
						</td>
					</tr>
					<?php 
					}
					 ?>
				</tbody>
			</table>
			</form>
		 </div> <!-- End .module-table-body -->
	</div> <!-- End .module -->
		 <div class="pagination">           
			<div class="numbers">
				<span>Trang:</span> 
				{{$arNews->links()}}
			</div> 
			<div style="clear: both;"></div> 
		 </div>
	
</div> <!-- End .grid_12 -->
@endsection