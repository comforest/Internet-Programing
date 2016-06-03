<!-- 
작성자 : 김기현
페이지 설명 : 달력 표시 바
필요한 css : datebar.css
 -->
<aside class="Llayer_fixed">
	<script type = "text/javascript">

	<!--   
		var p = new Date();
		var td = p.getDate();
		var tm = p.getMonth();
		var ty = p.getFullYear();
		WriteVerticalCalendar(ty,tm,td);
		
		function AddDate(dd,y,m,d){
			var fd = dd.getDate() + d;
			var fm = dd.getMonth() + m;
			var fy = dd.getFullYear() + y;
			if(fd < 1){
				--fm;
				fd = getLastDate(fy, fm) + fd;
				console.log(fd + " " + fm);
			}else if(fd > getLastDate(fy,fm)){
				fd -= getLastDate(fy, fm);
				++fm;
			}
			if(fm < 0){
				fm = 12 - fm;
				-- fy;
			}else if(fm > 11){
				fm = fm - 12;
				++ fy;
			}
			var da = new Date(fy,fm,fd);
			return da;
		}

		function getLastDate(y, m){
			var last = [31,28,31,30,31,30,31,31,30,31,30,31];        
			if (y%4===0 && y%100!=0 || y%400===0) {
				lastDate = last[1] = 29;
			}
			return last[m];
		}

		function WriteVerticalCalendar(y, m, d){   
			
			var week = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];

			var d = new Date(y,m,d);
			var div = document.getElementsByClassName("Llayer_fixed")[0];
		
			var dd = AddDate(d,0,0,-7);
			div.innerHTML = ("<a href='#' class=\"mobile_left\" onclick=\"WriteVerticalCalendar("+dd.getFullYear()+","+dd.getMonth()+","+dd.getDate()+")\"><img class=\"datebar_div_up\" src=\"/static/image/left_button.png\"></a>");
			div.innerHTML += ("<a href='#' class=\"desktop\" onclick=\"WriteVerticalCalendar("+dd.getFullYear()+","+dd.getMonth()+","+dd.getDate()+")\"><img class=\"datebar_div_up\" src=\"/static/image/up_button.png\"></a>");
			for(var i=0;i<7;i++){
				dd = AddDate(d,0,0,i);
				div.innerHTML += ("<div href='#' class=\"oneline\">"+"<span class=\"desktop\">"+  (dd.getMonth()+1)+" / " +"</span>"+dd.getDate() +"</div>");   
				div.innerHTML += ("<p class=\"date\" style = \"font-size: 15px\">"+week[dd.getDay()]+"</p>");
				div.innerHTML += ("<br class=\"desktop\">");
			}
			var dd = AddDate(d,0,0,7);
			div.innerHTML += ("<a href='#' class=\"desktop\" onclick=\"WriteVerticalCalendar("+dd.getFullYear()+","+dd.getMonth()+","+dd.getDate()+")\"><img class=\"datebar_div_down\" src=\"/static/image/down_button.png\"></a>");
			div.innerHTML += ("<a href='#' class=\"mobile_right\" onclick=\"WriteVerticalCalendar("+dd.getFullYear()+","+dd.getMonth()+","+dd.getDate()+")\"><img class=\"datebar_div_down\" src=\"/static/image/right_button.png\"></a>");
		}
	-->
	</script>     
</aside>	