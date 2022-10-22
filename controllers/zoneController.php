<?php 

class zoneController 
{
    public function getZone()
    {
        echo "Info sur les Zones.";
    }
    public function getSingleZone($id) 
    {
        echo "INfo single Zone: ".$id;
    }
}