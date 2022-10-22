<?php 
require_once './models/clientModel.php';
require_once './config/BaseController.php';

class clientController 
{
    public function getClient()
    {
        echo "Info sur les clients.";
    }
    public function getSingleClient($id) 
    {
        echo "INfo single Client: ".$id;
    }
}