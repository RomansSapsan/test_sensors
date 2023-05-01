<?php

namespace App\Repositories;


class SensorRepository
{
    public static function addNewRow(object $DBconnection, array $data): bool
    {
        $stmt = $DBconnection->prepare('INSERT IGNORE INTO sensors (sensorName, sensor_uuid, created_at) VALUES (:sensorName, :sensor_uuid, NOW())');
        $sensorName = "Sensor-".$data['sensor_uuid'];
        $stmt->bindParam(':sensorName', $sensorName);
        $stmt->bindParam(':sensor_uuid', $data['sensor_uuid']);
        $stmt->execute();

        $stmt = $DBconnection->prepare('INSERT INTO readings (sensor_uuid, temperature, created_at) VALUES (:sensor_uuid, :temperature, NOW())');
        $stmt->bindParam(':sensor_uuid', $data['sensor_uuid']);
        $stmt->bindParam(':temperature', $data['temperature']);
        $stmt->execute();

        return true;
    }

}
