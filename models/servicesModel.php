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
        $dataServices = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            //boolean display false or true not 1 or 0
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

            $dataServices[] = $row;
        }
        return $dataServices;
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

        //boolean display false or true not 1 or 0

        if ($dataSingleService !== false){

            $dataSingleService["gestion_membres"] = (bool)$dataSingleService["gestion_membres"];
            $dataSingleService["gestion_abonnement"] = (bool)$dataSingleService["gestion_abonnement"];
            $dataSingleService["gestion_collabo"] = (bool)$dataSingleService["gestion_collabo"];
            $dataSingleService["gestion_compta"] = (bool)$dataSingleService["gestion_compta"];
            $dataSingleService["gestion_prelevement"] = (bool)$dataSingleService["gestion_prelevement"];
            $dataSingleService["relance_imp"] = (bool)$dataSingleService["relance_imp"];
            $dataSingleService["acces_tourniquet"] = (bool)$dataSingleService["acces_tourniquet"];
            $dataSingleService["acces_badge"] = (bool)$dataSingleService["acces_badge"];
            $dataSingleService["acces_qrcode"] = (bool)$dataSingleService["acces_qrcode"];
            $dataSingleService["video_surv"] = (bool)$dataSingleService["video_surv"];
            $dataSingleService["vente_boisson"] = (bool)$dataSingleService["vente_boisson"];
            $dataSingleService["org_evenement"] = (bool)$dataSingleService["org_evenement"];

        }
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

     
    public function createServices($membre,$abonnement,$collabo,$compta,$prelev,$relance,$tourniquet,$badge,$qrcode,$video,$vente,$org) 
    {
        $req = "INSERT INTO table_services (gestion_membres,gestion_abonnement,gestion_collabo,gestion_compta,gestion_prelevement,
        relance_imp,acces_tourniquet,acces_badge,acces_qrcode,video_surv,vente_boisson,org_evenement)
        VALUES (:membre,:abonnement,:collabo,:compta,:prelev,:relance,:tourniquet,:badge,:qrcode,:video,:vente,:org)
        ";

        $stmt = $this->getConnection()->prepare($req);

        $stmt->bindValue(":membre",$membre,PDO::PARAM_BOOL);
        $stmt->bindValue(":abonnement",$abonnement,PDO::PARAM_BOOL);
        $stmt->bindValue(":collabo",$collabo,PDO::PARAM_BOOL);
        $stmt->bindValue(":compta",$compta,PDO::PARAM_BOOL);
        $stmt->bindValue(":prelev",$prelev,PDO::PARAM_BOOL);
        $stmt->bindValue(":relance",$relance,PDO::PARAM_BOOL);
        $stmt->bindValue(":toruniquet",$tourniquet,PDO::PARAM_BOOL);
        $stmt->bindValue(":badge" ,$badge,PDO::PARAM_BOOL);
        $stmt->bindValue(":qrcode",$qrcode,PDO::PARAM_BOOL);
        $stmt->bindValue(":video",$video,PDO::PARAM_BOOL);
        $stmt->bindValue(":vente",$vente,PDO::PARAM_BOOL);
        $stmt->bindValue(":org",$org,PDO::PARAM_BOOL);

        $stmt->execute();

        return $this->getConnection()->lastInsertId();
    }
   

}