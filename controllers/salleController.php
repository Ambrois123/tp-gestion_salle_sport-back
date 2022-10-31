<?php 

require_once './models/salleModel.php';
require_once './config/BaseController.php';
require_once './controllers/security.php';
require_once './utils/utils.php';

//require for menu deroulant in createSalle
require_once './models/clientModel.php';
require_once './models/branchModel.php';
require_once './models/zoneModel.php';
require_once './models/contratModel.php';
require_once './models/servicesModel.php';

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

    public function delete() 
    {
        if (Security::verifyAccessSession()){
           
            //verify if client is connect to other tables 

            $idSalle= (int)Security::secureHTML($_POST['salle_id']);

            $this->salleModel->deleteDBSalle($idSalle);

                $_SESSION['alert'] = [
                    'message' => "La salle a bien été supprimée.",
                    'type' => "alert-success"
                ];
            
            header("Location: ".URL.'admin/salles/visualisation');

        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }

    public function create()
    {
        if (Security::verifyAccessSession()){

            //require for menu deroulant in createSalle

            $clientModel = new ClientModel();
            $clients = $clientModel->getDBClient();

            $branchModel = new BranchModel();
            $branches = $branchModel->getDBBranch();

            $zoneModel = new ZoneModel();
            $zones = $zoneModel->getDBZone();

            $contratModel = new ContratModel();
            $contrats = $contratModel->getDBContrat();

            $servicesModel = new ServicesModel();
            $services = $servicesModel->getDBServices();
            
            // echo "<pre>";
            // print_r($salles);
            // echo "</pre>";

            require_once "./views/createSalle.php";

        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }

    public function validateCreation() 
    {
        if (Security::verifyAccessSession()){
            $name = Security::secureHTML($_POST['salle_name']);
            $address = Security::secureHTML($_POST['salle_address']);
            $is_active = Security::secureHTML($_POST['salle_active']);
            $image = "";
            if($_FILES['salle_image']['size'] > 0){
                $repertoire = "public/images/";
                $image = addImage($_FILES['salle_image'],$repertoire);

            }
            
            $client = (INT) Security::secureHTML($_POST['clientId']);
            $branch = (INT) Security::secureHTML($_POST['branchId']);
            $contrat = (INT) Security::secureHTML($_POST['contratId']);
            $zone = (INT) Security::secureHTML($_POST['zoneId']);
            $service = (INT) Security::secureHTML($_POST['serviceId']);
            

            $idSalle = $this->salleModel->createSalle($name,$address,$is_active,$image,$client,$branch,$contrat,$zone,$service);

            $_SESSION['alert'] = [
                'message' => "La salle a bien été crée avec l'ID : ".$idSalle,
                'type' => "alert-success"
            ];
            
            header("Location: ".URL.'admin/salles/visualisation');

        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }

    public function update() 
    {
        if (Security::verifyAccessSession()){

            $idSalle = (INT) Security::secureHTML($_POST['salle_id']);
            $name = Security::secureHTML($_POST['salle_name']);
            $address = Security::secureHTML($_POST['salle_address']);
            $is_active= Security::secureHTML($_POST['salle_active']);

            $this->salleModel->updateSalle($idSalle,$name,$address,$is_active);

            $_SESSION['alert'] = [
                'message' => "La salle a bien été mise à jour ",
                'type' => "alert-success"
            ];

            header("Location: ".URL.'admin/salles/visualisation');

        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }
}