<?php

require_once './config/Database.php';

class SalleModel extends Database 
{
    public function getDBSalle() 
    {
        $req = "SELECT *
                FROM table_salle";
        $stmt=$this->getConnection()->prepare($req);
        $stmt->execute();
        $dataSalle= [];

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            //boolean display false or true not 1 or 0
            $row['salle_active'] = (bool)$row['salle_active'];

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
}