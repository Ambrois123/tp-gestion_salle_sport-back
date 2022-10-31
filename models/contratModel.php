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

    public function getDBSingleContrat($idContrat)
    {
        $req = "SELECT * FROM table_contrat
        WHERE contrat_id = :idContrat
        ";

        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(":idContrat", $idContrat, PDO::PARAM_INT);
        $stmt->execute();
        $dataSingleContrat = $stmt->fetch(PDO::FETCH_ASSOC);

        return $dataSingleContrat;
    }

    public function getDBDisplayContrat() 
    {
        $req = "SELECT * FROM table_contrat";
        $stmt= $this->getConnection()->prepare($req);
        $stmt->execute();
        $dataContrat = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dataContrat;
    }

    public function deleteDBContrat($idContrat) 
    {
        $req= "DELETE FROM table_contrat
        WHERE contrat_id = :idContrat
        ";

        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(":idContrat", $idContrat, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function createSalle($name) 
    {
        $req = "INSERT INTO table_contrat (contrat_name)
        VALUES (:name)
        ";

        $stmt = $this->getConnection()->prepare($req);

        $stmt->bindValue(":name",$name,PDO::PARAM_STR);

        $stmt->execute();

        return $this->getConnection()->lastInsertId();
    }

    public function updateContrat($idContrat,$name) 
    {
        $req = "UPDATE table_contrat
        SET contrat_name = :name
        WHERE contrat_id = :idContrat
        ";

        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(":idContrat", $idContrat, PDO::PARAM_INT);
        $stmt->bindValue(":name",$name,PDO::PARAM_STR);
        $stmt->execute();
    }
}