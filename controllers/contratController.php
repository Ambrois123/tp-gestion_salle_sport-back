<?php 

class contratController 
{
    public function getContrat()
    {
        echo "Info sur les Contrats.";
    }
    public function getSingleContrat($id) 
    {
        echo "INfo single Contrat: ".$id;
    }
}