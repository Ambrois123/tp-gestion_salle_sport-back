<?php 

require_once './models/branchModel.php';
require_once './config/BaseController.php';
require_once './controllers/security.php';
class branchController extends BaseController
{
    private $branchModel;

    public function __construct()
    {
        $this->branchModel = new BranchModel();
    }

    public function getBranch()
    {
        $branch = $this->branchModel->getDBBranch();
        $this->sendJSON($branch);
    }

    public function getSingleBranch($idBranch) 
    {
        $singleBranch = $this->branchModel->getDBSingleBranch($idBranch);
        $this->sendJSON($singleBranch);
    }

    public function displayBranch() 
    {
        if (Security::verifyAccessSession()){

            $branches= $this->branchModel->getDBDisplayBranch();
            require_once './views/branchVisualisation.php';

        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }

    public function delete() 
    {
        if (Security::verifyAccessSession()){
           
            //verify if client is connect to other tables 

            $idBranch= (int)Security::secureHTML($_POST['branch_id']);

            $this->branchModel->deleteDBBranch($idBranch);
                $_SESSION['alert'] = [
                    'message' => "La branche a bien été supprimée.",
                    'type' => "alert-success"
                ];
            
            header("Location: ".URL.'admin/branche/visualisation');

        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }

    public function create() 
    {
        if (Security::verifyAccessSession()){

            require_once "./views/createBranch.php";

        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }

    public function validateCreation() 
    {
        if (Security::verifyAccessSession()){

            $name = Security::secureHTML($_POST['branch_name']);
            $salle = (INT) Security::secureHTML($_POST['salleId']);
            

            $idBranch = $this->branchModel->createBranch($name);

            $_SESSION['alert'] = [
                'message' => "La branche a bien été crée avecl'ID : ".$idBranch,
                'type' => "alert-success"
            ];
            
            header("Location: ".URL.'admin/branche/visualisation');

        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }

    public function update() 
    {
        if (Security::verifyAccessSession()){
            $idBranch = (INT) Security::secureHTML($_POST['branch_id']);
            $name = Security::secureHTML($_POST['branch_name']);

            $this->branchModel->updateBranch($idBranch,$name);

            $_SESSION['alert'] = [
                'message' => "La branche a bien été mise à jour ",
                'type' => "alert-success"
            ];

            header("Location: ".URL.'admin/branche/visualisation');

        } else {
            throw new Exception("Vous n'avez pas accès à cette page");
        }
    }
}
