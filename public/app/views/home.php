<!DOCTYPE html>
<html>
<head>
    <title>Sample PHP MVC App</title>
    <link rel="stylesheet" href="/resources/css/styles.css">
    <script src="../resources/js/jquery-3.6.4.min.js"></script>
    <script src="../resources/js/scripts.js"></script>
</head>
<body>
<h1>Dinatech Test</h1>
<br>
<br>
<br>

<div class="btn-div">
    <div class="div-btn-in">
        <button id="btn1">Read sensor 1</button>
        <br>
        <button id="btn2">Read sensor 2</button>
    </div>
    <div class="div-btn-in">
        <button  id="btn3" class="btn2">Put sensor value</button>
        <br>
        Sensor ID:<br><input  id="sensorId" type="text" name="sensor_uuid" value="" readonly />
        <br>
        <br>
        Sensor value:<br><nobr><input  id="temtId" type="text" name="temperature" value="" readonly /> C</nobr>
        <br>
        <br>
        <div id="responseId"></div>
    </div>
</div>

<div class="btn-div">
    <div class="div-btn-in" style="border-right: 1px solid gray;">
        <div class="du-text">
            Average temperature from all sensors, during last X days. X is sent as a parameter in submitted number of days range in JSON format
        </div>
        <br>
        <code class="i">
            SELECT s.sensorName, AVG(r.temperature) AS avg_temp<br>
            FROM sensors s<br>
            JOIN readings r ON s.sensor_uuid = r.sensor_uuid<br>
            WHERE r.created_at >= DATE_SUB(NOW(), INTERVAL 3 DAY)<br>
            GROUP BY s.sensorName;
        </code>
    </div>
    <div class="div-btn-in">
        <div class="du-text">
        Average temperature for a particular sensor reading, in one-hour range in JSON format
        </div>
        <br>
        <code class="i">
            SELECT AVG(temperature) AS average_temperature<br>
            FROM readings<br>
            WHERE sensor_uuid = :sensor_uuid<br>
            AND created_at BETWEEN :start_time AND :end_time
        </code>
    </div>
</div>





</body>
</html>
