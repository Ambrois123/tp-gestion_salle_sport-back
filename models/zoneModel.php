<?php

require_once './config/Database.php';

class ZoneModel extends Database
{

    public function getDBZone()
    {
        $req = "SELECT * FROM table_zone";

        $stmt = $this->getConnection()->prepare($req);
        $stmt->execute();
        $dataZone = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dataZone;
    }
}