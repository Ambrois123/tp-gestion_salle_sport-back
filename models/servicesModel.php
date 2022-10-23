<?php

require_once './config/Database.php';

class ServicesModel extends Database
{
    public function getDBServices()
    {
        $req= "SELECT * FROM table_services";

        $stmt = $this->getConnection()->prepare($req);
        $stmt->execute();
        $dataServices = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

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
}