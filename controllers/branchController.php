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

    public function getSingleBranch($id) 
    {
        echo "INfo single Branch: ".$id;
    }
}
