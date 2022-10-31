<?php

//start variable session

session_start();

// definite a constant for an absolute route toward ours ressources
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

//require
require_once './controllers/clientController.php';
require_once './controllers/salleController.php';
require_once './controllers/servicesController.php';
require_once './controllers/zoneController.php';
require_once './controllers/branchController.php';
require_once './controllers/contratController.php';
require_once './controllers/adminController.php';


//instantiate
$clientController = new ClientController();
$salleController = new SalleController();
$servicesController = new ServicesController();
$zoneController = new ZoneController();
$branchController = new BranchController();
$contratController = new ContratController();
$adminController = new AdminController();


//system of route
try {
    if (empty($_GET['page'])) {
        throw new Exception("Page Not Found");
    } else {
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
        if (empty($url[0]) || empty($url[1])) throw new Exception("Page Not Found");
        switch ($url[0]) {
            case "front":
                switch ($url[1]) {
                    case "clients":
                        $clientController->getClient();
                        break;
                    case "client":
                        if (empty($url[2])) throw new Exception("ID Client Not Found");
                        $clientController->getSingleClient($url[2]);
                        break;
                    case "salles":
                        $salleController->getSalle();
                        break;
                    case "salle":
                        if (empty($url[2])) throw new Exception("ID Salle Not Found");
                        $salleController->getSingleSalle($url[2]);
                        break;
                    case "services":
                        $servicesController->getServices();
                        break;
                    case "service":
                        if (empty($url[2])) throw new Exception("ID Service Not Found");
                        $servicesController->getSingleServices($url[2]);
                        break;
                    case "zone":
                        $zoneController->getZone();
                        break;
                    case "single_zone":
                        if (empty($url[2])) throw new Exception("ID Zone Not Found");
                        $zoneController->getSingleZone($url[2]);
                        break;
                    case "branch":
                        $branchController->getBranch();
                        break;
                    case "single_branch":
                        if (empty($url[2])) throw new Exception("ID Branch Not Found");
                        $branchController->getSingleBranch($url[2]);
                        break;
                    case "contrat":
                        $contratController->getContrat();
                        break;
                    case "single_contrat":
                        if (empty($url[2])) throw new Exception("ID Contrat Not Found");
                        $contratController->getSingleContrat($url[2]);
                        break;
                        //response to validation form
                    case "SendMessage" : $adminController->sendMessage();
                        break;
                    default:
                        throw new Exception("Page Not Found");
                }
                break;
            case "admin":
                switch ($url[1]) {
                    case "login":
                        $adminController->getPageLogin();
                        break;
                    case "connexion": $adminController->connexion();
                        break;
                    case "adminPanel" : $adminController->getAdminPanel();
                        break;
                    case "deconnexion": $adminController->deconnexion() ;
                        break;
                    case "clients" : 
                        switch($url[2]){
                            case "visualisation" : $clientController->display();
                                break;
                            case "validateDelete" : $clientController->delete();
                                break;
                            case "updateValidate" : $clientController->update();
                                break;
                            case "creation" : $clientController->createTemplate();
                                break;
                            case "validateCreate" : $clientController->create();
                                break;
                            default:
                                throw new Exception("Page Not Found");
                        } 
                        break;
                            case "branche" : 
                                switch($url[2]){
                                    case "visualisation" : $branchController->displayBranch();
                                        break;
                                    case "validateDelete" : $branchController->delete();
                                        break;
                                    case "creation" : $branchController->create();
                                        break;
                                    case "validateCreate" : $branchController->validateCreation();
                                        break;
                                    case "updateValidate" : $branchController->update();
                                        break;
                                    default:
                                        throw new Exception("Page Not Found");
                                } 
                                break;
                                case "contrat" : 
                                    switch($url[2]){
                                        case "visualisation" : $contratController->displayContrat();
                                            break;
                                        case "validateDelete" : $contratController->delete();
                                            break;
                                        case "creation" : $contratController->create();
                                            break;
                                        case "validateCreate" : $contratController->validateCreation();
                                            break;
                                        case "updateValidate" : $contratController->update();
                                            break;
                                        default:
                                            throw new Exception("Page Not Found");
                                    } 
                                    break;
                                    case "zone" : 
                                        switch($url[2]){
                                            case "visualisation" : $zoneController->displayZone();
                                                break;
                                            case "validateDelete" : $zoneController->delete();
                                                break;
                                            case "creation" : $zoneController->create();
                                                break;
                                            case "validateCreate" : $zoneController->validateCreation();
                                                break;
                                            case "updateValidate" : $zoneController->update();
                                                break;
                                            default:
                                                throw new Exception("Page Not Found");
                                        } 
                                        break;
                            case "services" : 
                                switch($url[2]){
                                    case "visualisation" : $servicesController->displayServices();
                                        break;
                                    case "validateDelete" : $servicesController->delete();
                                        break;
                                    case "creation" : $servicesController->create();
                                        break;
                                    case "validateCreate" : $servicesController->validateCreation();
                                        break;
                                    case "updateValidate" : $servicesController->update();
                                        break;
                                    default:
                                        throw new Exception("Page Not Found");
                                } 
                                break;
                                case "salles" : 
                                    switch($url[2]){
                                        case "visualisation" : $salleController->displaySalles();
                                            break;
                                        case "validateDelete" : $salleController->delete();
                                            break;
                                        case "creation" : $salleController->create();
                                            break;
                                        case "validateCreate" : $salleController->validateCreation();
                                            break;
                                        case "updateValidate" : $salleController->update();
                                            break;
                                        default:
                                            throw new Exception("Page Not Found");
                                    } 
                                    break;
                }
                break;
            default:
                throw new Exception("Page Not Found");
        }
    }
} catch (PDOException $e) {
    $msg = $e->getMessage();
    echo $msg;
}
