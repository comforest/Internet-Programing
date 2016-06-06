function showDetail(place) {
    $(".tourList").css("display", "none");
    $(".detailView").css("display", "");
    gotolist();
    $("#place_name").text(place.name);
    if (place.photos) {
        $("#place_thumbnail").attr("src", 'https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=' + place.photos[0].photo_reference + '&key=AIzaSyAYOKpuX6_Y9muKZCB4rBX7xiBCJKAJ2RQ');
    } else {
        $("#place_thumbnail").attr("src", "/static/image/sampleImage.jpg");
    }
    var infotext = "";
    $.each(place.types, function(key, data) {
        infotext += "<span class=\"hashtag\">#" + data + "</span> "
    });
    $("#place_info").html(infotext);
    $("#place_location").text(place.formatted_address);
    $("#image_add_place").attr("data-place-id", place.place_id);
}

function closeDetail() {
    $(".tourList").css("display", "");
    $(".detailView").css("display", "none");
}

$(function(){
    $(document).on("click", ".dialog_article", function(){
        var index = $(this).data("place-index");
        showDetail(place_list[index]);
    });
    $(document).on("click", "#image_add_place", function(){
        var place_id = $(this).attr("data-place-id");
        var user_id = $("#session_userID").attr("value");
        $.ajax({
            url:"/ajax/addPlace.php",
            type:"get",
            data:{
                user_id:user_id,
                place_id:place_id,
                route_date: $("#selected_date").attr("value")
            },
            success:function(){
                console.log("유저 [" + user_id + "]에 장소 [" + place_id + "]가 추가되었습니다.");
            }
        });
    });
});

function gotomap() {
    $("#gotolist").attr("class", "");
    $("#gotomap").attr("class", "click");
    $(".dialog_head").css("display", "none");
    $(".dialog_body").css("display", "none");
    $("#mapbox").css("z-index", 100);
    $(".dialog").addClass("dialog_map");
}

function gotolist() {
    $("#gotolist").attr("class", "click");
    $("#gotomap").attr("class", "");
    $(".dialog_head").css("display", "");
    $(".dialog_body").css("display", "");
    $("#mapbox").css("z-index", 1);
    $(".dialog").removeClass("dialog_map");
}