var editing = false;

function openEdit() {
    var e = document.getElementById("edit");
    e.innerHTML = "done";
    
    var container = document.getElementById("pathcontainer");
    container.className = "dialog path editing";
} 

function closeEdit() {
    var e = document.getElementById("edit");
    e.innerHTML = "edit";
    
    var container = document.getElementById("pathcontainer");
    container.className = "dialog path";
}

function toggle() {
    editing = !editing;
    
    if (editing) {
        openEdit();
    } else {
        closeEdit();
    }
}