@extends('templates.admin.template')
@section('content')
<?php 
	$url_admin = getenv("ADMIN_URL");
?> 
<div class="bottom-spacing">
	  <!-- Button -->
	  <div class="float-left">
		  <a href="{{ route('admin.users.add') }}" class="button">
			<span>Thêm user <img src="{{$url_admin}}/images/plus-small.gif" alt="Thêm tin"></span>
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
						<th>Username</th>
						<th>Fullname</th>
						<th style="width:11%; text-align: center;">Chức năng</th>
					</tr>
				</thead>
				<tbody>
					
					<?php
					foreach ($arUsers as $key => $arUser){
					$id = $arUser['id'];
					$username = $arUser['username'];
					$fullname = $arUser['fullname'];
					?>
					<tr>
						<td class="align-center">{{ $id }}</td>
						<td>{{ $username }}</td>
						<td>{{ $fullname }}</td>
						<td align="center">
							<a href="{{ route('admin.users.edit', $id) }}">Sửa <img src="{{$url_admin}}/images/pencil.gif" alt="edit" /></a>
							<a href="{{ route('admin.users.del', $id) }}">Xóa <img src="{{$url_admin}}/images/bin.gif" width="16" height="16" alt="delete" /></a>
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
</div> <!-- End .grid_12 -->
@endsection