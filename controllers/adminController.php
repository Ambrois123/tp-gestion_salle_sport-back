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
}
