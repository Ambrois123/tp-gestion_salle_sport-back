<?php

// definite a constant for an absolute route toward ours ressources
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));


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
                    case "clients" : echo "Info JSON clients ";
                    break;
                    case "client" : echo "Info JSON singleClient :".$url[2];
                    break;
                    case "salles" : echo "Info JSON salles";
                    break;
                    case "salle" : echo "Info JSON singleSalle: ".$url[2];
                    break;
                    case "clientSalles" : echo "Info JSON clientSalles";
                    break;
                    default : throw new Exception ("Page Not Found");
                }
            break;
            case "admin" : echo "admin asked";
            break;
            default : throw new Exception ("Page Not Found");
        }
    }
}catch (PDOException $e){
    $msg = $e->getMessage();
    echo $msg;
}