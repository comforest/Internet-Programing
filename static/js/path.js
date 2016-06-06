var editing = false;

function openEdit() {
    var e = document.getElementById("edit");
    x.innerHTML = "done";
} 

function closeEdit() {
    var e = document.getElementById("edit");
    x.innerHTML = "edit";
}

function toggle() {
    editing = !editing;
    
    if (editing) {
        openEdit();
    } else {
        closeEdit();
    }
}

object.addEventListener("clickEdit", toggle);