function getTemperature(sensorId) {
    $.ajax({
        url: "/",
        method: "POST",
        data: {
            sensor: sensorId,
            method: "readSensor"
        },
        dataType: "text"
    })
        .done(function(response) {
            const arr = response.split('#');
            if(arr[1] == 0) {
                $("#temtId").val('-');
                $("#sensorId").val('-');
            } else {
                $("#temtId").val(arr[0]);
                $("#sensorId").val(arr[1]);
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.log("Error: " + errorThrown);
        });
}


function setTemperature(sensorId, temperature) {
    $.ajax({
        url: "/",
        method: "POST",
        data: {
            sensor: sensorId,
            temperature: temperature,
            method: "pushSensor"
        },
        dataType: "text"
    })
        .done(function(response) {
            if(response == true) {
                $("#responseId").html("Temperature from sensor #" + sensorId + " (" + temperature + ") saved.");
            } else {
                $("#responseId").html(" Not saved...something went wrong...");
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.log("Error: " + errorThrown);
        });
}



$( document ).ready(function() {

    $('#btn1').on('click', function (event) {
        getTemperature(1);
    });

    $('#btn2').on('click', function (event) {
        getTemperature(2);
    });

    $('#btn3').on('click', function (event) {
        setTemperature($('#sensorId').val(), $('#temtId').val());
    });

});


