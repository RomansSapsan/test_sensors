<?php

namespace App\Repositories;

use App\Models\BaseModel;
use PDO;

class BaseRepository
{
    public static function dbConnect(): bool|object
    {
        $config = parse_ini_file($_SERVER['HOME'] .'/.env');
        $host = $config['DB_HOST'];
        $dbname = $config['DB_DATABASE'];
        $user = $config['DB_USERNAME'];
        $pass = $config['DB_PASSWORD'];

        $baseModel = new BaseModel($host, $dbname, $user, $pass);

        $dsn = "mysql:host=".$baseModel->host.";dbname=".$baseModel->dbname.";charset=utf8";
        $DBconnection = new PDO($dsn, $user, $pass);
        $baseModel->setDBConnection($DBconnection);

        return $baseModel->DBconnection;
    }


    public static function checkTables(object $DBconnection, string $tableSensors): bool
    {
        $statement = $DBconnection->prepare("SHOW TABLES LIKE :table_name");
        $statement->bindValue(':table_name', $tableSensors, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if( !$result ) return false;

        return true;
    }


    public static function createDbTables($DBconnection): void
    {
        $sqlScript = file_get_contents(BaseModel::SQL_SCRIPT_FILE_PATH);
        $DBconnection->exec($sqlScript);
        echo "============ DB tables just created. Please Refresh the page. ==============";
        //header("Location: http://localhost:8000/");
        exit;
    }


}
