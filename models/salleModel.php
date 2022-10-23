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
            $row['salle_active'] = (bool)$row['salle_active'];

            $dataSalle[] = $row;
        }
        return $dataSalle;
    }
}