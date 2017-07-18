@extends('templates.admin.template')
@section('content')
<?php 
	$url_admin = getenv("ADMIN_URL");
?> 
<div class="bottom-spacing">
	  <!-- Button -->
	  <div class="float-left">
		  <a href="{{ route('admin.cat.add') }}" class="button">
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
						<th>Tên Danh Mục</th>
						<th style="width:11%; text-align: center;">Chức năng</th>
					</tr>
				</thead>
				<tbody>
					
					<?php
					foreach ($arCats as $key => $arCat){
					$id_cat = $arCat['id_cat'];
					$name = $arCat['name'];
					?>
					<tr>
						<td class="align-center">{{ $id_cat }}</td>
						<td><a href="">{{ $name }}</a></td>
						<td align="center">
							<a href="{{ route('admin.cat.edit', $id_cat) }}">Sửa <img src="{{$url_admin}}/images/pencil.gif" alt="edit" /></a>
							<a href="{{ route('admin.cat.del', $id_cat) }}">Xóa <img src="{{$url_admin}}/images/bin.gif" width="16" height="16" alt="delete" /></a>
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
				{{ $arCats->links() }}
			</div> 
			<div style="clear: both;"></div> 
		 </div>
	
</div> <!-- End .grid_12 -->
@endsection