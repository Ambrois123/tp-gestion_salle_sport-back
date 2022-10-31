<?php

require_once './config/Database.php';

class ServicesModel extends Database
{
    public function getDBServices()
    {
        $req= "SELECT * FROM table_services
        ";

        $stmt = $this->getConnection()->prepare($req);
        $stmt->execute();
        $dataService = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dataService;
    }

    public function getDBSingleService($idService) 
    {
        $req = "SELECT * FROM table_services
        WHERE service_id = :idService
        ";

        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(":idService", $idService, PDO::PARAM_INT);
        $stmt->execute();
        $dataSingleService = $stmt->fetch(PDO::FETCH_ASSOC);

        return $dataSingleService;
    }

    public function getDBDisplayServices() 
    {
        $req = "SELECT * FROM table_services";
        $stmt= $this->getConnection()->prepare($req);
        $stmt->execute();
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $services;
    }

    public function deleteDBService($idService) 
    {
        $req= "DELETE FROM table_services
                WHERE service_id = :idService
            ";
        
        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(":idService", $idService, PDO::PARAM_INT);
        $stmt->execute();
    }

     
    public function createServices($name) 
    {
        $req = "INSERT INTO table_services (service_name)
        VALUES (:name)
        ";

        $stmt = $this->getConnection()->prepare($req);

        $stmt->bindValue(":name",$name,PDO::PARAM_BOOL);
    

        $stmt->execute();

        return $this->getConnection()->lastInsertId();
    }

    public function updateService($idService,$name) 
    {
        $req = "UPDATE table_services 
        SET service_name= :name 
        WHERE service_id = :idService
        ";

        $stmt = $this->getConnection()->prepare($req);

        $stmt->bindValue(":idService", $idService, PDO::PARAM_INT);
        $stmt->bindValue(":name",$name,PDO::PARAM_BOOL);
      

        $stmt->execute();
    }

   

}