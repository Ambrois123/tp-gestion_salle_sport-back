<?php

require_once './config/Database.php';

class AdminModel extends Database 
{
    private function getAdminPassword($login) 
    {
        $req = "SELECT * FROM administrator 
                WHERE login = :login";

        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        return $admin['password'];
    }

    //function to verify if connexion is valid

    public function isConnexionValid($login,$password) 
    {
        $passwordDB = $this->getAdminPassword($login);
        return password_verify($password,$passwordDB);
    }


}