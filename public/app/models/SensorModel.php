<?php
namespace App\Models;

class SensorModel
{
    public float $temperature;
    public int $sensor_uuid;

    public function __construct()
    {
        $this->sensor_uuid = 0;
        $this->temperature = 0;
    }
}
