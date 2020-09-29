$(document).ready(function () {
  $('.Tgl1 input').on('change', function() {
    var datearray = $('.Tgl1 input').val().split("-");
    var montharray = ["Jan", "Feb", "Mar","Apr", "May", "Jun","Jul", "Aug", "Sep","Oct", "Nov", "Dec"];
    var year = "20" + datearray[2];
    var month = montharray.indexOf(datearray[1])+1;
    var day = datearray[0];
    var minDate = (year +"-"+ month +"-"+ day);
    $('.Tgl2 input').attr('min',minDate);
  });
});
