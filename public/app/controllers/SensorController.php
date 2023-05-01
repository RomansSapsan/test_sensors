<?php
namespace App\Controllers;

use GuzzleHttp\Client;


class SensorController
{
    private float $temperature;
    private int $sensor_uuid;
    private string $virtualLocalIp;


    public function __construct() {
        $config = parse_ini_file('../.env');

        $this->temperature = "0.0";
        $this->sensor_uuid = "0";
        $this->virtualLocalIp = $config['VIRTUAL_LOCAL_IP'];

    }

    public function readSensor(int $sensorId): array {
        //$response = file_get_contents("http://192.168.56.179:8000/app/api/readerEndpoint.php");
        $client = new Client();
        $response = $client->get('http://'.$this->virtualLocalIp.':8000/app/api/readerEndpoint.php?sensor_uuid='.$sensorId);
        $response = explode(",", $response->getBody());

        if( !empty($response[1]) ) {
            $this->temperature = $response[1];
            $this->sensor_uuid = $response[0];
        }

        return [$this->temperature, $this->sensor_uuid];
    }


    public function pushSensor( int $sensorId, float $temperature ): bool {

        $client = new Client();
        $response = $client->post('http://'.$this->virtualLocalIp.':8000/app/api/setterEndpoint.php', [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'json' => [
                'sensor_uuid' => $sensorId,
                'temperature' => $temperature,
            ]
        ]);
        $response = json_decode((string)$response->getBody(), true);

        print_r($response);
        exit;

        if( $response === true ) {
            return true;
        }

        return false;
    }
}