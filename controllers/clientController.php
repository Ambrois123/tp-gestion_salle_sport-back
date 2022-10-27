<?php 
require_once './models/clientModel.php';
require_once './config/BaseController.php';
require_once './controllers/security.php';


class clientController extends BaseController
{
    private $clientModel;

    public function __construct()
    {
        $this->clientModel = new ClientModel();
    }

    public function getClient()
    {
        $clients = $this->clientModel->getDBClient();
        $this->sendJSON($clients);
        // echo "<pre>";
        // print_r($clients);
        // echo "</pre>";
        
    }

    public function getSingleClient($idClient) 
    {
        $singleClient = $this->clientModel->getDBSingleClient($idClient);
        $this->sendJson($singleClient);
    }

    //another verification before modified table
    public function display() 
    {
        if (Security::verifyAccessSession()){

            $clients= $this->clientModel->getDBClient();

            require_once './views/clientVisualisation.php';
        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }

    public function delete() 
    {
        if (Security::verifyAccessSession()){
           

            //verify if client is connect to other tables 

            $idClient = (int)Security::secureHTML($_POST['client_id']);

            if ($this->clientModel->relateToOtherTabs($idClient) > 0){

                //code à revoir
                
                $_SESSION['alert'] = [
                    'message' => "Le client n'a pas été supprimé.",
                    'type' => "alert-danger"
                ];
            } else {

                $_SESSION['alert'] = [
                    'message' => "Le client a bien été supprimé.",
                    'type' => "alert-success"
                ];
                $this->clientModel->deleteDBClient($idClient);
            }
            
            header("Location: ".URL.'admin/clients/visualisation');

        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }

    public function update() 
    {
        if (Security::verifyAccessSession()){
            //Update in database
            $idClient = (int)Security::secureHTML($_POST['client_id']);
            $name = Security::secureHTML($_POST['client_name']);
            $email = Security::secureHTML($_POST['client_email']);
            $phone = Security::secureHTML($_POST['client_tel']);
            $address = Security::secureHTML($_POST['client_address']);
            $is_active = Security::secureHTML($_POST['client_active']);
            $description = Security::secureHTML($_POST['client_description']);
            $presentation = Security::secureHTML($_POST['client_presentation']);
            $url = Security::secureHTML($_POST['client_url']);
            $logo = Security::secureHTML($_POST['client_logo']);
            $dpo = Security::secureHTML($_POST['client_dpo']);
            $tech = Security::secureHTML($_POST['client_tech']);
            $com = Security::secureHTML($_POST['client_com']);

            $_SESSION['alert'] = [
                'message' => "Le client a bien été mis à jour.",
                'type' => "alert-success"
            ];

            $this->clientModel->updateClient($idClient, $name, $email,$phone,$address,$is_active,$description,$presentation,$url,$logo,$dpo,$tech,$com);


            header("Location: ".URL.'admin/clients/visualisation');

        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }
}