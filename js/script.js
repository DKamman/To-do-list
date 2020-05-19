listStandard = document.getElementById('standardlist');
listEdit = document.getElementById('editlist');

function editList() { 
    listStandard.style.display = "none";
    listEdit.style.display = "block";

    console.log("test" + listStandard);
}

function cancelEdit() {
    listEdit.style.display = "none";
    listStandard.style.display = "block";
}