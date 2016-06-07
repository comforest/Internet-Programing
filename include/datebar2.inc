<!-- 
작성자 : 김기현
페이지 설명 : 달력 표시 바
필요한 css : datebar.css
 -->
<aside class="Llayer_fixed">
	<script type = "text/javascript">

	<!--
        <?php  
            $datestart = $_SESSION['dateStart'];
            $arr = explode("-", $datestart);
            $strstart = $arr[1]."/".$arr[2]."/".$arr[0];
            
            $dateend = $_SESSION['dateEnd'];
            $arr = explode("-", $dateend);
            $strend = $arr[1]."/".$arr[2]."/".$arr[0];
        ?>
        var startDate = new Date('<?php echo $strstart; ?>');
        var endDate = new Date('<?php echo $strend; ?>');
    
		var p = new Date('<?php echo $strstart; ?>');
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
                    str += ("<div class=\"oneline outofrange\" data-date=\"" + dd.getFullYear() + "-" + ("0" + (dd.getMonth()+1)).slice(-2) + "-" + ("0" + dd.getDate()).slice(-2) + "\">"+"<span class=\"desktop\">"+  (dd.getMonth()+1)+" / " +"</span> <span class=\"hDate\">"+dd.getDate() +"</span><p class=\"date\" >"+week[dd.getDay()]+"</p> </div>");
                } else {         
                    str += ("<a href='#' class=\"oneline\" data-date=\"" + dd.getFullYear() + "-" + ("0" + (dd.getMonth()+1)).slice(-2) + "-" + ("0" + dd.getDate()).slice(-2) + "\" onclick=\"clickDate(this)\">"+"<span class=\"desktop\">"+  (dd.getMonth()+1)+" / " +"</span> <span class=\"hDate\">"+dd.getDate() +"</span><p class=\"date\" >"+week[dd.getDay()]+"</p> </a>");
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

			var user_id = $("#session_userID").attr("value");

			$.ajax({
				url:"/ajax/getRoute.php",
				type:"get",
				dataType:"json",
				data:{
					user_id:user_id,
					route_date: $("#selected_date").attr("value")
				},
				success:function(result){
					console.log("유저 [" + user_id + "]에 대한 요청 결과: ");
					console.log(result);

					var pre_html = "";
					$.each(result, function(key, data) {
						pre_html += '<article class="dialog_article path_article" id="n100">';
						pre_html += '<div class="trashbox">';
						pre_html += '<a href="#" onclick="del("100")"><img src="/static/image/bin_grey.png" class="trash"></a>';
						pre_html += '</div>';
						pre_html += '<div class="namebox">';
						pre_html += '<h1>' + data.googleID + '</h1>';
						pre_html += '<p class = "time">' + data.placeID + '</p>';
						pre_html += '</div>';
						pre_html += '<div class="photobox">';
						pre_html += '<img src="/static/image/sampleImage.jpg" class="photo">';
						pre_html += '</div>';
						pre_html += '<div class="updownbox">';
						pre_html += '<div class="buttonwrap">';
						pre_html += '<a href="#" onclick="up("100")"><img src="/static/image/up_button.png"></a>';
						pre_html += '</div>';
						pre_html += '<div class="buttonwrap">';
						pre_html += '<a href="#" onclick="down("100")"><img src="/static/image/down_button.png"></a>';
						pre_html += '</div>';
						pre_html += '</div>';
						pre_html += '</article>';
					});
					$("#path_list_body").html(pre_html);
				},
				error:function(info, xhr){
					console.log("에러: " + info.status + "\n" + info.responseText);
				}
			});
		}
	-->
	</script>
</aside>	