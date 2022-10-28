<?php 

require_once './models/branchModel.php';
require_once './config/BaseController.php';
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
}
