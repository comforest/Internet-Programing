<!-- 
작성자 : 이호연
페이지 설명 : 경로 보여주기
필요한 css : dialog.css, path.css
 -->
<!-- 경로 목록 -->
<section class="dialog path" id="pathcontainer">
	<section class="dialog_head">
		<a href="#" id="edit" onclick="toggle()">edit</a>
	</section>
	<section class="dialog_body">
		<article class="dialog_article path_article" id="n100">
            <div class="trashbox">
                <a href="#" onclick="del('100')"><img src="/static/image/bin_grey.png" class="trash"></a>
            </div>
            <div class="namebox">
                <h1>1</h1>
                <p class = "time">2h</p>
            </div>
            <div class="photobox">
                <img src="/static/image/sampleImage.jpg" class="photo">
            </div>
            <div class="updownbox">
                <div class="buttonwrap">
                    <a href="#" onclick="up('100')"><img src="/static/image/up_button.png"></a>
                </div>
                <div class="buttonwrap">
                    <a href="#" onclick="down('100')"><img src="/static/image/down_button.png"></a>
                </div>
            </div>
		</article>
		<article class="dialog_article path_info">
			<img src="/static/image/walk.png">
			<p>
				Lorem ipsum dolor sit arnet, ee cctur consectetur ad...
			</p>
		</article>		<article class="dialog_article path_article" id="n101">
            <div class="trashbox">
                <a href="#" onclick="del('101')"><img src="/static/image/bin_grey.png" class="trash"></a>
            </div>
            <div class="namebox">
                <h1>2</h1>
                <p class = "time">2h</p>
            </div>
            <div class="photobox">
                <img src="/static/image/sampleImage.jpg" class="photo">
            </div>
            <div class="updownbox">
                <div class="buttonwrap">
                    <a href="#" onclick="up('101')"><img src="/static/image/up_button.png"></a>
                </div>
                <div class="buttonwrap">
                    <a href="#" onclick="down('101')"><img src="/static/image/down_button.png"></a>
                </div>
            </div>
		</article>
		<article class="dialog_article path_info">
			<img src="/static/image/walk.png">
			<p>
				Lorem ipsum dolor sit arnet, ee cctur consectetur ad...
			</p>
		</article>		<article class="dialog_article path_article" id="n102">
            <div class="trashbox">
                <a href="#" onclick="del('102')"><img src="/static/image/bin_grey.png" class="trash"></a>
            </div>
            <div class="namebox">
                <h1>3</h1>
                <p class = "time">2h</p>
            </div>
            <div class="photobox">
                <img src="/static/image/sampleImage.jpg" class="photo">
            </div>
            <div class="updownbox">
                <div class="buttonwrap">
                    <a href="#" onclick="up('102')"><img src="/static/image/up_button.png"></a>
                </div>
                <div class="buttonwrap">
                    <a href="#" onclick="down('102')"><img src="/static/image/down_button.png"></a>
                </div>
            </div>
		</article>
	</section>
	<section class="dialog_foot">
		<a class="click">list</a>
		<a>map</a>
	</section>
</section>