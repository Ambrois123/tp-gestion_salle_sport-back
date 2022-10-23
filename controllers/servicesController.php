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
    public function getSingleServices($id) 
    {
        echo "INfo single Services: ".$id;
    }
}
