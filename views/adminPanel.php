<?php ob_start(); ?>



<?php
//Put the content in the variable content
$content = ob_get_clean();
//title of the page
$title = "Page d'administration du site";
//call the template create in views.
require "./views/template.php";

?>
