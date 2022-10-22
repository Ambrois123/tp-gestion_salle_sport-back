<?php 

class salleController 
{
    public function getSalle()
    {
        echo "Info sur les Salles.";
    }
    public function getSingleSalle($id) 
    {
        echo "Info single Salle: ".$id;
    }
}