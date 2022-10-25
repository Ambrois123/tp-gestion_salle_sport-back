<?php 
require_once './models/clientModel.php';
require_once './config/BaseController.php';
require_once './controllers/security.php';


class clientController extends BaseController
{
    private $clientModel;

    public function __construct()
    {
        $this->clientModel = new ClientModel();
    }

    public function getClient()
    {
        $clients = $this->clientModel->getDBClient();
        $this->sendJSON($clients);
        // echo "<pre>";
        // print_r($clients);
        // echo "</pre>";
        
    }

    public function getSingleClient($idClient) 
    {
        $singleClient = $this->clientModel->getDBSingleClient($idClient);
        $this->sendJson($singleClient);
    }

    //another verification before modified table
    public function display() 
    {
        if (Security::verifyAccessSession()){

            $clients= $this->clientModel->getDBClient();

            require_once './views/clientVisualisation.php';
        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }
}