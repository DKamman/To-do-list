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

// var array = [
//     {type: 'minute', seconds: 60}, 
//     {type: 'hour', seconds: 3600}, 
//     {type: 'day', seconds: 86400},
//     {type: 'week', seconds: 604800}, 
//     {type: 'month', seconds: 2419200},
//     {type: 'year', seconds: 29030400}
// ];

// var number = 2;
// var time = array[2];

// function durationCalculation() {
//     return number * time.seconds;
// }

// if (number > 1) {
//     console.log(number + " " + time.type + "s");
// } else {
//     console.log(number + " " + time.type);
// }

// console.log(durationCalculation(time));