function validateForm() {
    var x = document.forms["simpananPokok"]["nominal"].value;
      if (x == "0") {
        alert("Nominal Tidak Boleh 0");
        return false;
      }
}
