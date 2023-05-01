<?php
use App\Controllers\SensorController;

if ( !empty($_POST['method']) ) {

    switch ( $_POST['method'] ) {

      case "readSensor":
        $sensor = 0;
        if(!empty($_POST['sensor']) && (int)$_POST['sensor'] > 0 ) {
            $reader = new SensorController();
            $response = $reader->readSensor( (int)$_POST['sensor'] );
            if($response) {
                echo $response[0].'#'.$response[1];
            }
        } else {
            echo "Sensor not found";
        }

        break;


      case "pushSensor":
          if(!empty($_POST['sensor']) && (int)$_POST['sensor'] > 0 && !empty($_POST['temperature']) ) {
              $setter = new SensorController();
              $response = $setter->pushSensor( (int)$_POST['sensor'], $_POST['temperature'] );
              if($response == 'saved') {
                  echo 'saved';
              }
          } else {
              echo "Wrong data";
          }
        break;

      default:
        echo "Invalid method.";
        break;
    }


    exit;
}

//echo '<pre>'; print_r($_POST); echo '</pre>';