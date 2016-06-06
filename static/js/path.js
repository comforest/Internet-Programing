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

window.onload = function () {
    var editButton = document.getElementById("edit");
    editButton.addEventListener("click", toggle);
);