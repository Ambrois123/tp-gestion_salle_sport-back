<?php 

class Security 
{
    public static function secureHTML($string) 
    {
        //convert all caracter into html caracter
        return htmlentities($string);
    }

    public static function verifyAccessSession() 
    {
        return (!empty($_SESSION['access']) && $_SESSION['access'] === "adminPanel");
    }
}
?>