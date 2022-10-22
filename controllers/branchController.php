<?php 

class branchController 
{
    public function getBranch()
    {
        echo "Info sur les Branchs.";
    }
    public function getSingleBranch($id) 
    {
        echo "INfo single Branch: ".$id;
    }
}
