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
}