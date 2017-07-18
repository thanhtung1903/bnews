@extends('templates.public.template')
@section('content')
<?php 
	$url_public = getenv("PUBLIC_URL");
?>
<div class="rightbody">
	<h1 class="title">Tin tức</h1>
	<div class="items-new">
		<ul>
			<?php 
			foreach ($arNews as $key => $arNew) {
				$id_news = $arNew['id_news'];
				$name = $arNew['name'];
				$nameUrl = str_slug($name,'-');
				$url = route('public.news.detail', ['slug' => $nameUrl, 'id' => $id_news]);
				$preview_text = $arNew['preview_text'];
				$picture = $arNew['picture'];
				$urlPic = Storage::url('app/files/'.$picture);
			 ?>
			<li>
				<h2>
					<a href="{{$url}}" title="">{{$name}}</a>
				</h2>
				<div class="item">
					<a href="{{$url}}" title=""><img src="{{$urlPic}}" alt="" /></a>
					<p>{{$preview_text}}</p>
					<div class="clr"></div>
				</div>
			</li>
			<?php 
				}
			 ?>
			
		</ul>
		
		<div class="paginator">
			{{$arNews->links()}}
		</div>
	</div>
</div>
@endsection