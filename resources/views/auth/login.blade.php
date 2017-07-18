@extends('templates.admin.template')
@section('content')

<div class="grid_12">

	<div class="module">
		 <h2><span>Thêm tin tức</span></h2>
			
		 <div class="module-body">
		 <?php if (Session::get('msg') != NULL){
				echo '<strong style="color:red">'.Session::get('msg').'</strong>';
			}
		?>
			<form action="{{ route('auth.auth.login') }}" method="POST">
			{{ csrf_field() }}
				<p>
					<label>Username:</label>
					<input type="text" name="username" value="" class="input-medium" />
				</p>
				<p>
					<label>Password:</label>
					<input type="password" name="password" value="" class="input-medium" />
				</p>
				
				<fieldset>
					<input class="submit-green" name="submit" type="submit" value="Đăng nhập" /> 
					<input class="submit-gray" name="reset" type="reset" value="Nhập lại" />
				</fieldset>
			</form>
		 </div> <!-- End .module-body -->

	</div>  <!-- End .module -->
	<div style="clear:both;"></div>
</div> <!-- End .grid_12 -->
@endsection