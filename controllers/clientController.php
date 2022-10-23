<?php 
require_once './models/clientModel.php';
require_once './config/BaseController.php';


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

    public function getSingleClient($id) 
    {
        echo "Info single Client: ".$id;
    }
}