<?php
require_once "../../autoload.php";

use App\Repositories\BaseRepository;
use App\Repositories\SensorRepository;

$dataOut = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    if ($contentType !== 'application/json') {
        return false;
    } else {
        $content = trim(file_get_contents("php://input"));
        $data = json_decode($content, true);
        if(!empty($data['temperature']) && !empty($data['sensor_uuid'])) {
            $DBconnection = BaseRepository::dbConnect();
            if( SensorRepository::addNewRow($DBconnection, $data) ) {
                $dataOut = true;
            }
        }
    }

}

echo $dataOut;