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
    public function getSingleZone($id) 
    {
        echo "INfo single Zone: ".$id;
    }
}