<?php 

require_once './models/servicesModel.php';
require_once './config/BaseController.php';
require_once './controllers/security.php';

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

    //display in panel de gestion

    public function displayServices() 
    {
        if (Security::verifyAccessSession()){

            $services = $this->servicesModel->getDBDisplayServices();
            
            require_once './views/servicesVisualisation.php';

        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }

    public function delete() 
    {
        if (Security::verifyAccessSession()){
           
            //verify if client is connect to other tables 

            $idService= (int)Security::secureHTML($_POST['service_id']);

            $this->servicesModel->deleteDBService($idService);

                $_SESSION['alert'] = [
                    'message' => "Le service a bien été supprimée.",
                    'type' => "alert-success"
                ];
            
            header("Location: ".URL.'admin/services/visualisation');

        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }

    public function create() 
    {
        if (Security::verifyAccessSession()){

            require_once "./views/createServices.php";

        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }

    public function validateCreation() 
    {
        if (Security::verifyAccessSession()){

            $name= Security::secureHTML($_POST['service_name']);
        

            $idServices = $this->servicesModel->createServices($name);

            $_SESSION['alert'] = [
                'message' => "Le service a bien été crée avec l'ID :".$idServices,
                'type' => "alert-success"
            ];
        
            header("Location: ".URL.'admin/services/visualisation');


        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }

    public function update() 
    {
        if (Security::verifyAccessSession()){

           $idService = (INT) Security::secureHTML($_POST['service_id']);
           $name = Security::secureHTML($_POST['service_name']);
            

            $this->servicesModel->updateService($idService,$name);

            $_SESSION['alert'] = [
                'message' => "Le service a bien été crée mis à jour :",
                'type' => "alert-success"
            ];

            header("Location: ".URL.'admin/services/visualisation');

        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }
}
