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

    public function deleteDBClient($idClient) 
    {
        $req= "DELETE FROM table_client
                WHERE client_id = :idClient
            ";
        
        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(":idClient", $idClient, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function relateToOtherTabs($idClient) 
    {
        $req = " SELECT count (*) as 'nb'
        from table_client c inner join table_salle s on s.clientId = c.client_id
        WHERE c.client_id = idClient
        ";

        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(":idClient", $idClient, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['nb'];
    }

    public function updateClient($idClient, $name, $email,$phone,$address,$is_active,$description,$presentation,$url,$logo,$dpo,$tech,$com) 
    {
        $req = "UPDATE table_client
        SET client_name = :name,client_email = :email, client_tel = :phone, client_address = :address,client_active = :is_active,
        client_description = :description, client_presentation = :presentation, client_url = :url, client_logo = :logo,
        client_dpo = :dpo, client_tech = :tech, client_com = :com
        WHERE client_id = :idClient
        ";

        $stmt = $this->getConnection()->prepare($req);

        $stmt->bindValue(":idClient",$idClient,PDO::PARAM_INT);
        $stmt->bindValue(":name",$name,PDO::PARAM_STR);
        $stmt->bindValue(":email",$email,PDO::PARAM_STR);
        $stmt->bindValue(":phone",$phone,PDO::PARAM_STR);
        $stmt->bindValue(":address",$address,PDO::PARAM_STR);
        $stmt->bindValue(":is_active",$is_active,PDO::PARAM_BOOL);
        $stmt->bindValue(":description",$description,PDO::PARAM_STR);
        $stmt->bindValue(":presentation",$presentation,PDO::PARAM_STR);
        $stmt->bindValue(":url",$url,PDO::PARAM_STR);
        $stmt->bindValue(":logo",$logo,PDO::PARAM_STR);
        $stmt->bindValue(":dpo",$dpo,PDO::PARAM_STR);
        $stmt->bindValue(":tech",$tech,PDO::PARAM_STR);
        $stmt->bindValue(":com",$com,PDO::PARAM_STR);

        $stmt->execute();
        
    }
   
}