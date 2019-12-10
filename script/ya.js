$(document).ready(function () {
    // code to get all records from table via select box
    $("#employee").change(function () {
        var id = $(this).find(":selected").val();
        var dataString = 'empid=' + id;
        $.ajax({
            url: 'getEmployee.php',
            dataType: "json",
            data: dataString,
            cache: false,
            success: function (employeeData) {
                if (employeeData) {
                    $("#heading").show();
                    $("#no_records").hide();
                    $("#emp_harga").text(employeeData.harga);
                    $("#records").show();
                } else {
                    $("#heading").hide();
                    $("#records").hide();
                    $("#no_records").show();
                }
            }
        });
    })
});