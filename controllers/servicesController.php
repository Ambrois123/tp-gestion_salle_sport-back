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
            $membre = Security::secureHTML($_POST['gestion_membres']);
            $abonnement = Security::secureHTML($_POST['gestion_abonnement']);
            $collabo = Security::secureHTML($_POST['gestion_collabo']);
            $compta = Security::secureHTML($_POST['gestion_compta']);
            $prelev = Security::secureHTML($_POST['gestion_prelevement']);
            $relance = Security::secureHTML($_POST['relance_imp']);
            $tourniquet = Security::secureHTML($_POST['acces_tourniquet']);
            $badge = Security::secureHTML($_POST['acces_badge']);
            $qrcode = Security::secureHTML($_POST['acces_qrcode']);
            $video = Security::secureHTML($_POST['video_surv"']);
            $vente = Security::secureHTML($_POST['vente_boisson']);
            $org = Security::secureHTML($_POST['org_evenement']);

            $idServices = $this->servicesModel->createServices($membre,$abonnement,$collabo,$compta,$prelev,$relance,$tourniquet,$badge,$qrcode,$video,$vente,$org);

            $_SESSION['alert'] = [
                'message' => "Le service a bien été crée avec l'ID :".$idServices,
                'type' => "alert-success"
            ];
        
            header("Location: ".URL.'admin/services/visualisation');


        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }
}
