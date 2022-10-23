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
}