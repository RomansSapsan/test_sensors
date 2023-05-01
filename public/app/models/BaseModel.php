<?php
namespace App\Models;

class BaseModel
{
    public string $host;
    public string $dbname;
    public string $user;
    public string $pass;
    public object $DBconnection;
    public const T_SENSORS = 'sensors';
    public const T_READINGS = 'readings';
    public const SQL_SCRIPT_FILE_PATH = 'db/insert_db.sql';


    public function __construct(string $host, string $dbname, string $user, string $pass)
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->pass = $pass;
    }

    public function setDBConnection(object $DBconnection): void
    {
        $this->DBconnection = $DBconnection;
    }
}
