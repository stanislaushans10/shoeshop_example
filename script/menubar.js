var lookup = {
'1': ['0', '1'],
'0': ['0'],
};

// When an option is changed, search the above for matching choices

$('#menu1').on('change', function() {
    // Set selected option as variable
    var selectValue = $(this).val();
    document.getElementById("demo").innerHTML = selectValue[0];
    // Empty the target field
    $('#menu11').empty();
    $('#menu12').empty();
    $('#menu111').empty();
    $('#menu112').empty();

    // For each chocie in the selected option
    for (i = 0; i < lookup[selectValue].length; i++) {
      // Output choice in the target field
        $('#menu11').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
        $('#menu12').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
        $('#menu111').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
        $('#menu112').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
    }
});

    $('#menu11').on('change', function() {
        // Set selected option as variable
        var selectValue = $(this).val();

        // Empty the target field
        $('#menu111').empty();
        $('#menu112').empty();

        // For each chocie in the selected option
        for (i = 0; i < lookup[selectValue].length; i++) {
          // Output choice in the target field
            $('#menu111').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
            $('#menu112').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
        }
    });

    $('#menu12').on('change', function() {
        // Set selected option as variable
        var selectValue = $(this).val();

        // Empty the target field
        $('#menu121').empty();
        $('#menu122').empty();

        // For each chocie in the selected option
        for (i = 0; i < lookup[selectValue].length; i++) {
          // Output choice in the target field
            $('#menu121').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
            $('#menu122').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
        }
    });

$('#menu2').on('change', function() {
    // Set selected option as variable
    var selectValue = $(this).val();
    document.getElementById("demo").innerHTML = selectValue[0];
    // Empty the target field
    $('#menu21').empty();
    $('#menu22').empty();

    // For each chocie in the selected option
    for (i = 0; i < lookup[selectValue].length; i++) {
      // Output choice in the target field
        $('#menu21').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
        $('#menu22').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
    }
});

$('#menu3').on('change', function() {
    // Set selected option as variable
    var selectValue = $(this).val();
    document.getElementById("demo").innerHTML = selectValue[0];
    // Empty the target field
    $('#menu31').empty();
    $('#menu32').empty();

    // For each chocie in the selected option
    for (i = 0; i < lookup[selectValue].length; i++) {
      // Output choice in the target field
        $('#menu31').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
        $('#menu32').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
    }
});
