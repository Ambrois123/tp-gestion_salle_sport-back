<?php 

require_once './models/contratModel.php';
require_once './config/BaseController.php';
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

    public function getSingleContrat($id) 
    {
        echo "INfo single Contrat: ".$id;
    }
}