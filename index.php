<?php

// definite a constant for an absolute route toward ours ressources
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

//require
require_once './controllers/clientController.php';
require_once './controllers/salleController.php';
require_once './controllers/clientSalleController.php';

//instantiate
$clientController = new ClientController();
$salleController = new SalleController();
$clientSalleController = new ClientSalleController();


//system of route
try{ 
    if(empty($_GET['page'])){
        throw new Exception("Page Not Found");
    } else {
        $url = explode("/",filter_var($_GET['page'],FILTER_SANITIZE_URL));
        if (empty($url[0]) || empty($url[1])) throw new Exception ("Page Not Found");
        switch($url[0]){
            case "front" : 
                switch($url[1]){
                    case "clients" : $clientController->getClient();
                    break;
                    case "client" : 
                        if (empty($url[2])) throw new Exception ("ID Client Not Found");
                        $clientController->getSingleClient($url[2]);
                    break;
                    case "salles" : $salleController->getSalle();
                    break;
                    case "salle" : 
                        if(empty($url[2])) throw new Exception("ID Salle Not Found");
                        $salleController->getSingleSalle($url[2]);
                    break;
                    case "clientSalles" : $clientSalleController->getClientSalle();
                    break;
                    default : throw new Exception ("Page Not Found");
                }
            break;
            case "admin" : echo "admin asked";
            break;
            default : throw new Exception ("Page Not Found");
        }
    }
}catch(PDOException $e){
    $msg = $e->getMessage();
    echo $msg;
}