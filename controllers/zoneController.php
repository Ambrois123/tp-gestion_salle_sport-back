<?php 

require_once './models/zoneModel.php';
require_once './models/salleModel.php';
require_once './config/BaseController.php';
class zoneController extends BaseController
{
    private $zoneModel;

    public function __construct()
    {
        $this->zoneModel = new ZoneModel();
    }
    public function getZone()
    {
        $zone = $this-> zoneModel->getDBZone();
        $this->sendJSON($zone);
    }
    public function getSingleZone($idZone) 
    {
        $singleZone = $this->zoneModel->getDBSingleZone($idZone);
        $this->sendJSON($singleZone);
    }

    public function displayZone() 
    {
        if (Security::verifyAccessSession()){

            $zones= $this->zoneModel->getDBDisplayZOne();
            require_once './views/zoneVisualisation.php';

        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }

    public function delete() 
    {
        if (Security::verifyAccessSession()){
           
            //verify if client is connect to other tables 

            $idZone= (int)Security::secureHTML($_POST['zone_id']);

            $this->zoneModel->deleteDBZone($idZone);
                $_SESSION['alert'] = [
                    'message' => "La zone a bien été supprimée.",
                    'type' => "alert-success"
                ];
            
            header("Location: ".URL.'admin/zone/visualisation');

        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }

     public function create() 
    {
        if (Security::verifyAccessSession()){

            $salleModel = new SalleModel();
            $salles = $salleModel->getDBSalle();

            require_once "./views/createZone.php";

        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }

    public function validateCreation() 
    {
        if (Security::verifyAccessSession()){
            $name = Security::secureHTML($_POST['zone_name']);
            $salle = (INT) Security::secureHTML($_POST['salleId']);
            

            $this->zoneModel->createSalle($name,$salle);

            $_SESSION['alert'] = [
                'message' => "La zone a bien été crée.",
                'type' => "alert-success"
            ];
            
            header("Location: ".URL.'admin/zone/visualisation');

        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }
}