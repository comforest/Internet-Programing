<!-- 
작성자 : 김기현
페이지 설명 : 달력 표시 바
필요한 css : datebar.css
 -->
<aside class="Llayer_fixed">
	<script type = "text/javascript">

	<!--   
        var startDate = new Date('6/7/2016');
        var endDate = new Date('6/11/2016');
    
		var p = new Date();
		var td = p.getDate();
		var tm = p.getMonth();
		var ty = p.getFullYear();
		WriteVerticalCalendar(ty,tm,td);
		
		function getLastDate(y, m){
			var last = [31,28,31,30,31,30,31,31,30,31,30,31];        
			if (y%4===0 && y%100!=0 || y%400===0) {
				lastDate = last[1] = 29;
			}
			return last[m];
		}
		function AddDate(dd,y,m,d){
 			var fd = dd.getDate() + d;
 			var fm = dd.getMonth() + m;
 			var fy = dd.getFullYear() + y;
 			if(fd < 1){
 				--fm;
	 			if(fm < 0){
	 				fm += 12;
	 				-- fy;
	 			}
 				fd = getLastDate(fy, fm) + fd;
 			}else if(fd > getLastDate(fy,fm)){
 				fd -= getLastDate(fy, fm);
 				++fm;
 			}
 			if(fm < 0){
 				fm += 12;
 				-- fy;
 			}else if(fm > 11){
 				fm = fm - 12;
 				++ fy;
 			}
 			var da = new Date(fy,fm,fd);
 			return da;
 		}
        function cmp(date1, date2) {
            if (date1.getFullYear() > date2.getFullYear()) {
                return 1;
            } 
            if (date1.getFullYear() < date2.getFullYear()) {
                return -1;
            }
            if (date1.getMonth() > date2.getMonth()) {
                return 1;
            } 
            if (date1.getMonth() < date2.getMonth()) {
                return -1;
            } 
            if (date1.getDate() > date2.getDate()) {
                return 1;
            }
            if (date1.getDate() < date2.getDate()) {
                return -1;
            }
            return 0;

        }
		function WriteVerticalCalendar(y, m, d, num=7){   
			
			var week = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];

			var d = new Date(y,m,d);
			var div = document.getElementsByClassName("Llayer_fixed")[0];
			
			var dd = new Date();
			dd = AddDate(d, 0,0,-7);
			div.innerHTML = ("<a href='#' class=\"mobile_left\" onclick=\"WriteVerticalCalendar("+dd.getFullYear()+","+dd.getMonth()+","+dd.getDate()+")\"><img class=\"datebar_div_up\" src=\"/static/image/left_button.png\"></a>");
			div.innerHTML += ("<a href='#' class=\"dateButtonUp desktop\" onclick=\"WriteVerticalCalendar("+dd.getFullYear()+","+dd.getMonth()+","+dd.getDate()+")\"><img class=\"datebar_div_up\" src=\"/static/image/up_button.png\"></a>");
			
			var str = "<section class=\"dateBody\">";
			for(var i=0;i<num;i++){
				dd = AddDate(d, 0,0,i);
                if (cmp(dd, startDate) < 0 || cmp(dd, endDate) > 0) {
                    str += ("<div class=\"oneline outofrange\" data-date=\"" + dd.getFullYear() + "-" + ("0" + dd.getMonth()).slice(-2) + "-" + ("0" + dd.getDate()).slice(-2) + "\">"+"<span class=\"desktop\">"+  (dd.getMonth()+1)+" / " +"</span> <span class=\"hDate\">"+dd.getDate() +"</span><p class=\"date\" >"+week[dd.getDay()]+"</p> </div>");
                } else {         
                    str += ("<a href='#' class=\"oneline\" data-date=\"" + dd.getFullYear() + "-" + ("0" + dd.getMonth()).slice(-2) + "-" + ("0" + dd.getDate()).slice(-2) + "\" onclick=\"clickDate(this)\">"+"<span class=\"desktop\">"+  (dd.getMonth()+1)+" / " +"</span> <span class=\"hDate\">"+dd.getDate() +"</span><p class=\"date\" >"+week[dd.getDay()]+"</p> </a>");
                }
            }
			str += "</section>";
			div.innerHTML += str;

			dd = AddDate(d, 0,0,7);
			div.innerHTML += ("<a href='#' class=\"dateButtonDown desktop\" onclick=\"WriteVerticalCalendar("+dd.getFullYear()+","+dd.getMonth()+","+dd.getDate()+")\"><img class=\"datebar_div_down\" src=\"/static/image/down_button.png\"></a>");
			div.innerHTML += ("<a href='#' class=\"mobile_right\" onclick=\"WriteVerticalCalendar("+dd.getFullYear()+","+dd.getMonth()+","+dd.getDate()+")\"><img class=\"datebar_div_down\" src=\"/static/image/right_button.png\"></a>");

		}
		function clickDate(t){
			var arr = document.getElementsByClassName("oneline");

		for (i = 0; i < arr.length; i++) {
            if (arr[i].className != "oneline outofrange") {
                arr[i].className = "oneline";
            }
		}
			t.className += " dateSelect";

			$("#selected_date").attr("value", t.getAttribute("data-date"));
		}
	-->
	</script>
</aside>	