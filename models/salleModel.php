<?php

require_once './config/Database.php';

class SalleModel extends Database 
{
    public function getDBSalle() 
    {
        $req = "SELECT *
                FROM table_salle
                INNER JOIN table_client ON table_client.client_id = table_salle.clientId
                INNER JOIN table_branch ON table_branch.salleId = table_salle.salle_id
                INNER JOIN table_zone ON table_zone.salleId = table_salle.salle_id
                INNER JOIN table_services ON table_services.salleId = table_salle.salle_id

                ";
        $stmt=$this->getConnection()->prepare($req);
        $stmt->execute();
        $dataSalle= [];

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            //boolean display false or true not 1 or 0
            $row['salle_active'] = (bool)$row['salle_active'];
            $row["client_active"] = (bool)$row["client_active"];
            $row["gestion_membres"] = (bool)$row["gestion_membres"];
            $row["gestion_abonnement"] = (bool)$row["gestion_abonnement"];
            $row["gestion_collabo"] = (bool)$row["gestion_collabo"];
            $row["gestion_compta"] = (bool)$row["gestion_compta"];
            $row["gestion_prelevement"] = (bool)$row["gestion_prelevement"];
            $row["relance_imp"] = (bool)$row["relance_imp"];
            $row["acces_tourniquet"] = (bool)$row["acces_tourniquet"];
            $row["acces_badge"] = (bool)$row["acces_badge"];
            $row["acces_qrcode"] = (bool)$row["acces_qrcode"];
            $row["video_surv"] = (bool)$row["video_surv"];
            $row["vente_boisson"] = (bool)$row["vente_boisson"];
            $row["org_evenement"] = (bool)$row["org_evenement"];

            $dataSalle[] = $row;
        }
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

    public function createSalle($name,$address,$is_active,$image,$client) 
    {
        $req = "INSERT INTO table_salle (salle_name,salle_address,salle_active,salle_image,clientId)
        VALUES (:name,:address,:is_active,:image,:clientId)
        ";

        $stmt = $this->getConnection()->prepare($req);

        $stmt->bindValue(":name",$name,PDO::PARAM_STR);
        $stmt->bindValue(":address",$address,PDO::PARAM_STR);
        $stmt->bindValue(":is_active",$is_active,PDO::PARAM_BOOL);
        $stmt->bindValue(":image",$image,PDO::PARAM_STR);
        $stmt->bindValue(":clientId",$client,PDO::PARAM_INT);

        $stmt->execute();

        return $this->getConnection()->lastInsertId();
    }
}