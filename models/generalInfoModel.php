<?php 

require_once './config/Database.php';

class GeneralInfoModel extends Database
{
    public function getDBGeneralInfo() 
    {
        $req = "SELECT  FROM table_salle s
        INNER JOIN table_service ON 
        
        ";
    }
}