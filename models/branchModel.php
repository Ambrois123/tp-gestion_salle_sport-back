<?php

require_once './config/Database.php';

class BranchModel extends Database 
{
    public function getDBBranch() 
    {
        $req = "SELECT * FROM table_branch";

        $stmt = $this->getConnection()->prepare($req);
        $stmt->execute();
        $dataBranch = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dataBranch;

    }

    public function getDBSingleBranch($idBranch) 
    {
        $req = "SELECT * FROM table_branch
        WHERE branch_id = :idBranch
        ";

        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(":idBranch", $idBranch, PDO::PARAM_INT);
        $stmt->execute();
        $dataSingleBranch = $stmt->fetch(PDO::FETCH_ASSOC);

        return $dataSingleBranch;
    }

    public function getDBDisplayBranch() 
    {
        $req = "SELECT * FROM table_branch";

        $stmt = $this->getConnection()->prepare($req);
        $stmt->execute();
        $dataBranch = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dataBranch;
    }

    public function deleteDBBranch($idBranch) 
    {
        $req= "DELETE FROM table_branch
        WHERE branch_id = :idBranch
        ";

        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(":idBranch", $idBranch, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function createBranch($name) 
    {
        $req = "INSERT INTO table_branch (branch_name)
        VALUES(:name)        
        ";

        $stmt = $this->getConnection()->prepare($req);

        $stmt->bindValue(":name",$name,PDO::PARAM_STR);

        $stmt->execute();

        return $this->getConnection()->lastInsertId();

    }

    public function updateBranch($idBranch,$name) 
    {
        $req = "UPDATE table_branch
        SET branch_name = :name
        WHERE branch_id = :idBranch
        ";

        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(":idBranch", $idBranch, PDO::PARAM_INT);
        $stmt->bindValue(":name",$name,PDO::PARAM_STR);
        $stmt->execute();
    }
}