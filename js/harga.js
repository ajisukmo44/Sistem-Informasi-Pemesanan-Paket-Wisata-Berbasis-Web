$(document).ready(function () {
    // code to get all records from table via select box
    $("#harga").change(function () {
        var id = $(this).find(":selected").val();
        var dataString = 'empid=' + id;
        $.ajax({
            url: 'getHarga.php',
            dataType: "json",
            data: dataString,
            cache: false,
            success: function (hargaData) {
                if (hargaData) {
                    $("#heading").show();
                    $("#no_records").hide();
                    $("#emp_harga").text(hargaData.harga);
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