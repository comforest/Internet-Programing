<!-- 
작성자 : 이호연
페이지 설명 : 관광지 목록 리스트
필요한 css : dialog.css, tourlist.css
-->
<!-- 관광지 목록 -->

<script type="text/javascript">
<!--
	
-->
</script>
<section class="dialog tourList">
	<section id="dialog_head" class="dialog_head">
		<a class="headButton" onclick="headerIcon(this, 0)"><img src="/static/image/all_black.png" id="all"></a>
		<a class="headButton" onclick="headerIcon(this, 1)"><img src="/static/image/culture_grey.png" id="historic"></a>
		<a class="headButton" onclick="headerIcon(this, 2)"><img src="/static/image/nature_grey.png" id="nature"></a>
		<a class="headButton" onclick="headerIcon(this, 3)"><img src="/static/image/trend_grey.png" id="trend"></a>
		<a class="headButton" onclick="headerIcon(this, 4)"><img src="/static/image/shopping_grey.png" id="shopping"></a>
		<a class="search" href="#"><img src="/static/image/search_grey.png"></a>
	</section>
	<section id="dialog_body" class="dialog_body">
	</section>
	<section class="dialog_foot">
		<a id="gotolist" class="click" onclick="gotolist()">list</a>
		<a id="gotomap" onclick="gotomap()">map</a>
	</section>

</section>