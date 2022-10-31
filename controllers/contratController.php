<?php

require_once './models/contratModel.php';
require_once './config/BaseController.php';
require_once './controllers/security.php';

class contratController extends BaseController
{
    private $contratModel;

    public function __construct()
    {
        $this->contratModel = new ContratModel();
    }

    public function getContrat()
    {
        $contrat = $this->contratModel->getDBContrat();
        $this->sendJSON($contrat);
    }

    public function getSingleContrat($idContrat)
    {
        $singleContrat = $this->contratModel->getDBSingleContrat($idContrat);
        $this->sendJSON($singleContrat);
    }

    public function displayContrat()
    {
        if (Security::verifyAccessSession()) {

            $contrats = $this->contratModel->getDBDisplayContrat();
            require_once './views/contratVisualisation.php';
        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }

    public function delete()
    {
        if (Security::verifyAccessSession()) {

            //verify if client is connect to other tables 

            $idContrat = (int)Security::secureHTML($_POST['contrat_id']);

            $this->contratModel->deleteDBContrat($idContrat);
            $_SESSION['alert'] = [
                'message' => "Le service a bien été supprimée.",
                'type' => "alert-success"
            ];

            header("Location: " . URL . 'admin/contrat/visualisation');
        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }

    public function create()
    {
        if (Security::verifyAccessSession()) {

            require_once "./views/createContrat.php";
        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }

    public function validateCreation() 
    {
        if (Security::verifyAccessSession()){
            $name = Security::secureHTML($_POST['contrat_name']);
            

            $idContrat = $this->contratModel->createSalle($name);

            $_SESSION['alert'] = [
                'message' => "Le contrat a bien été crée avec l'ID : ".$idContrat,
                'type' => "alert-success"
            ];
            
            header("Location: ".URL.'admin/contrat/visualisation');

        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }
    
    public function update() 
    {
        if (Security::verifyAccessSession()){

            $idContrat = (INT) Security::secureHTML($_POST['contrat_id']);
            $name = Security::secureHTML($_POST['contrat_name']);

            $this->contratModel->updateContrat($idContrat,$name);

            $_SESSION['alert'] = [
                'message' => "Le contrat a bien été mis à jour ",
                'type' => "alert-success"
            ];

            header("Location: ".URL.'admin/contrat/visualisation');

        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }

    
}
