<?php

require_once './controllers/security.php';
require_once './models/adminModel.php';


class AdminController
{
    private $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
     }

    public function getPageLogin()
    {
        // Call of Login page that we create in view folder
        require_once "./views/pageLogin.php";
    }

    public function connexion()
    {
        //verification of informatiosn of connexion using security file created in controller folder
        
        if (!empty($_POST['login']) && !empty($_POST['password'])){
            $login = Security::secureHTML($_POST['login']);
            $password = Security::secureHTML($_POST['password']);

        //verification in Database using administrator file created in models folder.

        if ($this->adminModel->isConnexionValid($login,$password)){

            //if connexion ok manage in variable SESSION activate on index.php

            $_SESSION['access'] = "adminPanel";
            header('Location: '.URL."admin/adminPanel");

        }else { 
            header('Location: '.URL."admin/login");
        }
        }
    }

    public function getAdminPanel() 
    {
        //verification if adminstrator has access
        if (Security::verifyAccessSession()){
            require './views/adminPanel.php';
        }else {
            header('Location: '.URL."admin/login");
        }
        
    }

    public function deconnexion() 
    {
        //destroy session variable to deconnect
        session_destroy();
        header('Location: '.URL."admin/login");
    }

    public function sendMessage() 
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization");

        // $obj = json_decode(file_get_contents('php://input'));

        echo json_encode("Votre demande a été bien reçue et sera traité dans les meilleurs délais.
        L'équipe technique");
    }
}
