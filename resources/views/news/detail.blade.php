@extends('templates.public.template')
@section('content')
<?php 
	$url_public = getenv("PUBLIC_URL");
?>
<div class="rightbody">
		<h1 class="title">{{ $arNew['name'] }}</h1>
		<div class="items-new">
			<div class="new-detail">
				<p> {!! $arNew['detail_text'] !!} </p>
			</div>
		</div>
		
		<h2 class="title" style="margin-top:30px;color:#BBB">Tin tức liên quan</h2>
		<div class="items-new">
			<ul>
				<?php 
				foreach ($arNewsLQ as $key => $arNew) {
					$id_news = $arNew['id_news'];
					$name = $arNew['name'];
					$nameUrl = str_slug($name,'-');
					$url = route('public.news.detail', ['slug' => $nameUrl, 'id' => $id_news]);
					$preview_text = $arNew['preview_text'];
					$picture = $arNew['picture'];
					$urlPic = Storage::url('app/'.$picture);
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
		</div>
	</div>
@endsection