<?php

try{
    $pdo = new PDO('mysql:host=localhost', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($pdo->exec('DROP DATABASE IF EXISTS gestion_sport') !== false){
        if($pdo->exec('CREATE DATABASE gestion_sport') !== false){
            $gestion_sport = new PDO('mysql:dbname=gestion_sport;host=localhost', 'root', '');
            if ($gestion_sport ->exec('CREATE TABLE table_client(
                client_id INT (11) PRIMARY KEY AUTO_INCREMENT,
                client_name VARCHAR(200) NOT NULL,
                client_email VARCHAR(200) NOT NULL,
                client_tel VARCHAR (45) NOT NULL,
                client_address VARCHAR (200),
                client_active BOOLEAN NOT NULL DEFAULT FALSE,
                client_description text NOT NULL,
                client_presentation TEXT NOT NULL,
                client_url VARCHAR(100) NOT NULL,
                client_logo VARCHAR(100) NOT NULL,
                client_dpo VARCHAR(100) NOT NULL,
                client_tech VARCHAR(100) NOT NULL,
                client_com VARCHAR(100) NOT NULL
            )') !== false) {
                if($gestion_sport->exec('CREATE TABLE table_contrat(
                    contrat_id INT PRIMARY KEY AUTO_INCREMENT,
                    formule_esssentiel BOOLEAN NOT NULL DEFAULT FALSE,
                    formule_premium BOOLEAN NOT NULL DEFAULT FALSE,
                    formule_business BOOLEAN NOT NULL DEFAULT FALSE

                )') !== false) {
                    if ($gestion_sport->exec('CREATE TABLE table_services(
                        service_id INT PRIMARY KEY AUTO_INCREMENT,
                        gestion_membres BOOLEAN NOT NULL DEFAULT FALSE,
                        gestion_abonnement BOOLEAN NOT NULL DEFAULT FALSE,
                        gestion_collabo BOOLEAN NOT NULL DEFAULT FALSE,
                        gestion_compta BOOLEAN NOT NULL DEFAULT FALSE,
                        gestion_prelevement BOOLEAN NOT NULL DEFAULT FALSE,
                        relance_imp BOOLEAN NOT NULL DEFAULT FALSE,
                        acces_tourniquet BOOLEAN NOT NULL DEFAULT FALSE,
                        acces_badge BOOLEAN NOT NULL DEFAULT FALSE,
                        acces_qrcode BOOLEAN NOT NULL DEFAULT FALSE,
                        video_surv BOOLEAN NOT NULL DEFAULT FALSE,
                        vente_boisson BOOLEAN NOT NULL DEFAULT FALSE,
                        org_evenement BOOLEAN NOT NULL DEFAULT FALSE,
                        contratId INT NOT NULL,
                        FOREIGN KEY (contratId) REFERENCES table_contrat(contrat_id)
                    )') !== false) {
                        if ($gestion_sport->exec('CREATE TABLE table_branch(
                            branch_id INT PRIMARY KEY AUTO_INCREMENT,
                            branch_name VARCHAR(200) NOT NULL
                        )') !== false) {
                            if ($gestion_sport->exec('CREATE TABLE table_zone(
                                zone_id INT PRIMARY KEY AUTO_INCREMENT,
                                zone_name VARCHAR(200) NOT NULL,
                                branchId INT NOT NULL,
                                FOREIGN KEY (branchId) REFERENCES table_branch(branch_id)
                            )') !== false) {
                                if ($gestion_sport->exec('CREATE TABLE table_salle(
                                    salle_id INT PRIMARY KEY AUTO_INCREMENT,
                                    salle_name VARCHAR(200) NOT NULL,
                                    salle_address VARCHAR(200) NOT NULL,
                                    salle_active BOOLEAN NOT NULL DEFAULT FALSE,
                                    clientId INT NOT NULL,
                                    serviceId INT nOT NULL,
                                    zoneId INT NOT NULL,
                                    FOREIGN KEY (clientId) REFERENCES table_client(client_id),
                                    FOREIGN KEY (serviceId) REFERENCES table_services(service_id),
                                    FOREIGN KEY (zoneId) REFERENCES table_zone(zone_id)
                                   
                                )') !== false) {
                                    if ($gestion_sport->exec('CREATE TABLE administrator(
                                        login VARCHAR(100) NOT NuLL,
                                        password VARCHAR(250) NOT NULL
                                    )') !== false) {
                                        echo 'Installation réussie';
                                    } else {echo 'Impossible de créer administrator';}
                                } else {echo 'Impossible de créer table_salle';}
                            }else {echo 'Impossible de créer table_zone';}
                        }else {echo 'Impossible de créer table_branch';}
                    }else {echo 'Impossible de créer table_service';}
                }else {echo 'Impossible de créer table_contrat';}
            }else {echo 'Impossible de créer table_client';}
        }else {echo 'Impossible de créer BD';}
    }else {echo 'Impossible de supprimer DB';}
    
}catch(PDOException $e){

    echo $e->getMessage();
}