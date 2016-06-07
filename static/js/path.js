var editing = false;

function openEdit() {
    var e = document.getElementById("edit");
    e.innerHTML = "done";
    
    var container = document.getElementById("pathcontainer");
    container.className = "dialog path editing";
} 

function closeEdit() {
    location.reload(true);
}

function toggle() {
    editing = !editing;
    
    if (editing) {
        openEdit();
    } else {
        closeEdit();
    }
}

function del(num) {
    var id = "#n"+num;
    $(id).remove();
}

function up(num) {
    $('.path_info').remove();
    
    var id = "#n"+num;
    if ($(id).is(":first-child")) {
        return;
    }
    
    $(id).after($(id).prev());
}

function down(num) {
    $('.path_info').remove();

    var id = "#n"+num;
    if ($(id).is(":last-child")) {
        return;
    }
    
    $(id).before($(id).next());
}

$("a.oneline").click(function() {
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
        }
    });
});