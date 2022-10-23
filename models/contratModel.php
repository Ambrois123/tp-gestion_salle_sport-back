<?php

require_once './config/Database.php';

class ContratModel extends Database 
{
    public function getDBContrat() 
    {
        $req = "SELECT * FROM table_contrat";
        $stmt= $this->getConnection()->prepare($req);
        $stmt->execute();
        $dataContrat = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dataContrat;
    }
}