<?php

require_once './config/Database.php';

class ClientModel extends Database
{
    public function getDBClient()
    {
        $req = "SELECT * 
            FROM table_client";

        $stmt = $this->getConnection()->prepare($req);
        $stmt->execute();
        $dataClient = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            //boolean display false or true not 1 or 0

            $row["client_active"] = (bool)$row["client_active"];

            $dataClient[] = $row;

        }
        return $dataClient;
    }

    public function getDBSingleClient($idClient) 
    {
        $req = "SELECT * FROM table_client
        WHERE client_id = :idClient
        ";

        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(":idClient", $idClient, PDO::PARAM_INT);
        $stmt->execute();
        $dataSingleClient = $stmt->fetch(PDO::FETCH_ASSOC);

        //boolean display false or true not 1 or 0

        if ($dataSingleClient !== false){
            $dataSingleClient["client_active"] = (bool)$dataSingleClient["client_active"];
        }
        return $dataSingleClient;
    }
}