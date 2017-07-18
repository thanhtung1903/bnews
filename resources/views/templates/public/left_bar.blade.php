<h2>Danh mục tin</h2>
<ul>
	<?php 
	foreach ($arCats as $key => $arCat) {
		$id_cat = $arCat['id_cat'];
		$name = $arCat['name'];
		$nameUrl = str_slug($name,'-');
		$url = route('public.news.cat', ['slug' => $nameUrl, 'id' => $id_cat]);
	?>
		<li><a href="{{$url}}">{{$name}}</a></li>
	<?php 
	}
	?>
</ul>
