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
    var id = "#n"+num;
    if ($(id).is(":first-child")) {
        return;
    }
    
    $(id).append($(id).prev());
}

function down(num) {
    var id = "#n"+num;
    if ($(id).is(":last-child")) {
        return;
    }
    
    $(id).prepend($(id).next());
}