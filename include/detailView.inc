<!-- 
작성자 : 이호연
페이지 설명 : 관광지 상세 설명
필요한 css : dialog.css, detailView.css
 -->
<!-- 관광지 목록 -->
<section class="dialog detailView" style="display: none;">
	<section class="dialog_head">
		<a href="javascript:void(0);" onclick="closeDetail()"><img src="/static/image/left_button.png"></a>
	</section>
	<section class="dialog_body">
		<figure>
			<img id="place_thumbnail" class="thumbnail" src="/static/image/sampleImage.jpg">
			<img class="Button" style="right:0" src="/static/image/right_button.png">
			<img class="Button" src="/static/image/left_button.png">
		</figure>
		<article class="dialog_article detailView_info">
			<a id="image_add_place" href="javascript:void(0);"><img src="/static/image/add.png"></a>
			<h1 id="place_name">Gyeongbokgung</h1>
			<p id="place_info">This is a sample place information.</p>
		</article>
		<article class="dialog_article detailView_location">
			<img src="/static/image/location.png">
			<p id="place_location">The location of requested place is as below.</p>
		</article>
	</section>
	<section class="dialog_foot">
		<a id="gotolist" class="click" onclick="gotolist()">list</a>
		<a id="gotomap" onclick="gotomap()">map</a>
	</section>
</section>
