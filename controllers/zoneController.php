<?php 

require_once './models/zoneModel.php';
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
}