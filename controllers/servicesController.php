<?php 

require_once './models/servicesModel.php';
require_once './config/BaseController.php';

class ServicesController extends BaseController
{
    private$servicesModel;

    public function __construct()
    {
        $this->servicesModel = new ServicesModel();
    }
    public function getServices()
    {
        $services=$this->servicesModel->getDBServices();
        $this->sendJSON($services);
    }

    public function getSingleServices($idService) 
    {
        $dataSingleService = $this->servicesModel->getDBSingleService($idService);
        $this->sendJSON($dataSingleService);
    }

    public function displayServices() 
    {
        if (Security::verifyAccessSession()){

            $services= $this->servicesModel->getDBDisplayServices();
            require_once './views/servicesVisualisation.php';

        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }
}
