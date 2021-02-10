$(document).ready(function(){
    $("#driverDrives").click(function() {
        let driverId = $("#driverDrivesDropdown").val();
        let postData = {
            action: "DRIVER_DRIVES",
            driver: driverId
        };
        $.post("./appHandler.php", postData, function (data) {
            $("#driverDrivesResults").empty();
            data = JSON.parse(data);
            let $table = $("<table>").addClass("table");
            let tableHead = $("<thead>")
                    .append($("<th>").text("Driver"))
                    .append($("<th>").text("Customer"))
                    .append($("<th>").text("Time"));
            $table.append(tableHead);
            $.each(data,function (k,v) {
                let $row = $("<tr>")
                    .append($("<td>").text(v.driver))
                    .append($("<td>").text(v.customer))
                    .append($("<td>").text(v.time));
                $table.append($row);
            });
            $("#driverDrivesResults").append($table);
        });
    });


    
    $("#customerRides").click(function() {
        let customerId = $("#customerDropdown").val();
        let postData = {
            action: "CUSTOMER_RIDES",
            customer: customerId
        };
        $.post("./appHandler.php", postData, function (data) {
            $("#customerResults").empty();
            data = JSON.parse(data);
            let $table = $("<table>").addClass("table");
            let tableHead = $("<thead>")
                    .append($("<th>").text("Customer"))
                    .append($("<th>").text("Driver"))
                    .append($("<th>").text("Time"));
            $table.append(tableHead);
            $.each(data,function (k,v) {
                let $row = $("<tr>")
                    .append($("<td>").text(v.customer))
                    .append($("<td>").text(v.driver))
                    .append($("<td>").text(v.time));
                $table.append($row);
            });
            $("#customerResults").append($table);
        });
    });
    
    
    $("#vehicleLog").click(function() {
        let driverId = $("#vehicleDropdown").val();
        let vehDate = $("#vehDate").val();
        let postData = {
            action: "VEHICLE_LOG",
            vehicle: driverId,
            date: vehDate
        };
        $.post("./appHandler.php", postData, function (data) {
            $("#vehicleLogResults").empty();
            data = JSON.parse(data);
            let $table = $("<table>").addClass("table");
            let tableHead = $("<thead>")
                .append($("<th>").text("Vehicle"))
                .append($("<th>").text("Driver"))
                .append($("<th>").text("Date"));
            $.each(data,function (k,v) {
                let $row = $("<tr>")
                    .append($("<td>").text(v.name))
                    .append($("<td>").text(v.driver))
                    .append($("<td>").text(v.date));
                $table.append($row);
            });
            $("#vehicleLogResults").append($table);
        });
    });
    
    
    
    $("#carCheck").click(function() {
        let driverId = $("#driverDropdown").val();
        let logDate = $("#logDate").val();
        alert(driverId);
        let postData = {
            action: "VEHICLE_LOG",
            driver: driverId,
            date: logDate
        };
        $.post("./App.php", postData, function (data) {
            
        });
    });
    
    
});