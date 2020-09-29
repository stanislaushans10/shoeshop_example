var minDate = "2020-09-03";
var today = new Date();
var dd = today.getDate();  // +7 days
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear()-17;

if(dd<10){
    dd='0'+dd
}

if(mm<10){
    mm='0'+mm
}

today = yyyy+'-'+mm+'-'+dd;

document.getElementById("dateofbirth").setAttribute("max", today);
// document.getElementById("dateofbirth").setAttribute("min", minDate);

// var coba = document.getElementById("date1").value;
// var coba = "2020-09-03";
// document.getElementById("date2").setAttribute("min", coba);
