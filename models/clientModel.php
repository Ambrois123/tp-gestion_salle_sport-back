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

            $row["client_active"] = (bool)$row["client_active"];

            $dataClient[] = $row;

        }
        return $dataClient;
    }
}