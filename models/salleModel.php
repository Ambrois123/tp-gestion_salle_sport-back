<?php

require_once './config/Database.php';

class SalleModel extends Database 
{
    public function getDBSalle() 
    {
        $req = "SELECT * FROM table_salle
                INNER JOIN table_client ON table_client.client_id = table_salle.clientId
                INNER JOIN table_branch ON table_branch.branch_id = table_salle.branchId
                INNER JOIN table_zone ON table_zone.zone_id = table_salle.zoneId
                INNER JOIN table_services ON table_services.service_id = table_salle.serviceId

                ";
        $stmt=$this->getConnection()->prepare($req);
        $stmt->execute();
        $dataSalle= $stmt->fetchAll(PDO::FETCH_ASSOC);;

        return $dataSalle;
    }

    public function getDBSingleSalle($idSalle) 
    {
        $req = "SELECT * FROM table_salle
        WHERE salle_id = :idSalle
        ";

        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(":idSalle", $idSalle, PDO::PARAM_INT);
        $stmt->execute();
        $dataSingleSalle = $stmt->fetch(PDO::FETCH_ASSOC);

        //boolean display false or true not 1 or 0

        if ($dataSingleSalle !== false){
            $dataSingleSalle["salle_active"] = (bool)$dataSingleSalle["salle_active"];
            
            }
        return $dataSingleSalle;
    }

    public function getDBDisplaySalle() 
    {
        $req = "SELECT * FROM table_salle
        ";

        $stmt = $this->getConnection()->prepare($req);
        $stmt->execute();
        $dataSalle = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            //boolean display false or true not 1 or 0

            $row["salle_active"] = (bool)$row["salle_active"];

            $dataSalle[] = $row;

        }
        return $dataSalle;
    }

    public function deleteDBSalle($idSalle) 
    {
        $req= "DELETE FROM table_salle
                WHERE salle_id = :idSalle
            ";
        
        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(":idSalle", $idSalle, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function createSalle($name,$address,$is_active,$image,$client,$branch,$contrat,$zone,$service) 
    {
        $req = "INSERT INTO table_salle (salle_name,salle_address,salle_active,salle_image,clientId,branchId,contratId,zoneId,serviceId)
        VALUES (:name,:address,:is_active,:image,:clientId,:branchId,:contratId,:zoneId,:serviceId)
        ";

        $stmt = $this->getConnection()->prepare($req);

        $stmt->bindValue(":name",$name,PDO::PARAM_STR);
        $stmt->bindValue(":address",$address,PDO::PARAM_STR);
        $stmt->bindValue(":is_active",$is_active,PDO::PARAM_BOOL);
        $stmt->bindValue(":image",$image,PDO::PARAM_STR);
        $stmt->bindValue(":clientId",$client,PDO::PARAM_INT);
        $stmt->bindValue(":branchId",$branch,PDO::PARAM_INT);
        $stmt->bindValue(":contratId",$contrat,PDO::PARAM_INT);
        $stmt->bindValue(":zoneId",$zone,PDO::PARAM_INT);
        $stmt->bindValue(":serviceId",$service,PDO::PARAM_INT);

        $stmt->execute();

        return $this->getConnection()->lastInsertId();
    }

    public function updateSalle($idSalle,$name,$address,$is_active) 
    {
        $req = "UPDATE table_salle
        SET salle_name = :name, salle_address = :address, salle_active = :is_active
        WHERE salle_id = :idSalle
        ";

        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(":idSalle", $idSalle, PDO::PARAM_INT);
        $stmt->bindValue(":name",$name,PDO::PARAM_STR);
        $stmt->bindValue(":address",$address,PDO::PARAM_STR);
        $stmt->bindValue(":is_active",$is_active,PDO::PARAM_BOOL);
        $stmt->execute();
    }
}