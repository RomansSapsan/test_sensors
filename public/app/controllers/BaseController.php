<?php
namespace App\Controllers;

use App\Models\BaseModel;
use App\Repositories\BaseRepository;
use PDO;

class BaseController
{
    public function isSetDb(): bool {
        $response = false;

        try {
            // check connection
            $DBconnection = BaseRepository::dbConnect();

            //check for tables. Creates them if not exists
            $isSetTables = BaseRepository::checkTables($DBconnection,BaseModel::T_SENSORS);
            if( $isSetTables === false ) {
                BaseRepository::createDbTables($DBconnection);
            }

            $response = true;

        } catch (\Throwable $t) {
            echo 'Error: ' . $t->getMessage();
            echo '<br />';
        }

        return $response;
    }
}
