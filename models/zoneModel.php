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

    public function getDBSingleZone($idZone) 
    {
        $req = "SELECT * FROM table_zone
        WHERE zone_id = :idZone
        ";

        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(":idZone", $idZone, PDO::PARAM_INT);
        $stmt->execute();
        $dataSingleZone = $stmt->fetch(PDO::FETCH_ASSOC);

        return $dataSingleZone;
    }

    public function getDBDisplayZOne() 
    {
        $req = "SELECT * FROM table_zone";

        $stmt = $this->getConnection()->prepare($req);
        $stmt->execute();
        $dataZone = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dataZone;
    }

    public function deleteDBZone($idZone) 
    {
        $req= "DELETE FROM table_zone
        WHERE zone_id = :idZone
        ";

        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(":idZone", $idZone, PDO::PARAM_INT);
        $stmt->execute();
    }
}