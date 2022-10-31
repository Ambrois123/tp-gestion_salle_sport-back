<?php

function addImage($file, $dir){
    if(!isset($file['salle_image']) || empty($file['salle_image']))
        throw new Exception("Vous devez indiquer une image");

    if(!file_exists($dir)) mkdir($dir,0777);

    $extension = strtolower(pathinfo($file['salle_image'],PATHINFO_EXTENSION));
    $random = rand(0,99999);
    $target_file = $dir.$random."_".$file['salle_image'];
    
    if(!getimagesize($file["tmp_salle_image"]))
        throw new Exception("Le fichier n'est pas une image");
    if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
        throw new Exception("L'extension du fichier n'est pas reconnu");
    if(file_exists($target_file))
        throw new Exception("Le fichier existe déjà");
    if($file['size'] > 500000)
        throw new Exception("Le fichier est trop gros");
    if(!move_uploaded_file($file['tmp_salle_image'], $target_file))
        throw new Exception("l'ajout de l'image n'a pas fonctionné");
    else return ($random."_".$file['salle_image']);
}
