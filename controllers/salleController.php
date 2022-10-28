<?php 

require_once './models/salleModel.php';
require_once './config/BaseController.php';

class salleController extends BaseController
{
    private $salleModel;

    public function __construct()
    {
        $this->salleModel = new SalleModel();
    }

    public function getSalle()
    {
        $salle= $this->salleModel->getDBSalle();
        $this->sendJSON($salle);
        // echo "<pre>";
        // print_r($salle);
        // echo "</pre>";
    }
    public function getSingleSalle($idSalle) 
    {
        $singleSalle = $this->salleModel->getDBSingleSalle($idSalle);
        $this->sendJSON($singleSalle);
    }

    public function displaySalles() 
    {
        if (Security::verifyAccessSession()){

            $salles= $this->salleModel->getDBDisplaySalle();
            require_once './views/salleVisualisation.php';

        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }
}