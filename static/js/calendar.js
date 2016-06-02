
$(document).ready(function(){
	HtmlCalendar(2016,5);
});

function HtmlCalendar(y, m){

   var firstDay = (new Date(y,m,1)).getDay();

   var last = [31,28,31,30,31,30,31,31,30,31,30,31];
   if (y%4 && y%100!=0 || y%400===0) {
       lastDate = last[1] = 29;	
   }

   var lastDate = last[m];


   function getCalendar(fy, fm){
      if(fm < 0){
         fm = 11;
         -- fy;
      }else if(fm > 11){
         fm = 0;
         ++ fy;
      }
          return "HtmlCalendar("+fy+"," + fm+ ")";
   }
   var not = 0;
   

   var str = "<table>"
   +"<thead>"
   +"<tr>"
   +"<th colspan='7'>"
   +"<a onclick="+getCalendar(y-1,m)+">&laquo</a>"
   +"<a onclick="+getCalendar(y,m-1)+">&lt</a>"
   +y+"년 " + (m+1) + "월"
   +"<a onclick="+getCalendar(y,m+1)+">&gt</a>"
   +"<a onclick="+getCalendar(y+1,m)+">&raquo</a>"
   +"</th>"
   +"<tr>"
   +"<th>일</th>"
   +"<th>월</th>"
   +"<th>화</th>"
   +"<th>수</th>"
   +"<th>목</th>"
   +"<th>금</th>"
   +"<th>토</th>"
   +"</tr>"
   +"</thead>"
   +"<tbody>";

   var bool = true;
   var writeDate = 1;
   while(true){
      str += "<tr>";
      for(var i = 0; i < 7; ++i){
         if((writeDate > 1 && writeDate <= lastDate) || (writeDate == 1 && i == firstDay)){
            str += "<td>"
            +"<p>"+(writeDate)+"</p>"
            writeDate++;
            +"</td>";
         }else{
            str+="<td></td>";
         }
      }
      str +="</tr>"
      if(writeDate>lastDate){
         break;
      }
   }

   str += "</tbody>";

   $(".calendar").html(str);
}