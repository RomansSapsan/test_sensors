<?php

$min = -10;
$max = 80;
$randomFloat = rand() / getrandmax() * ($max - $min) + $min;

$output = [
    "sensor_uuid" => $_GET['sensor_uuid'],
    "temperature" => round($randomFloat, 1),
];

header('Content-Type: text/csv');
header('Content-Disposition: inline; filename="sensor'.$_GET['sensor_uuid'].'-time'.time().'.csv"');
echo $output['sensor_uuid'].','.$output['temperature'];