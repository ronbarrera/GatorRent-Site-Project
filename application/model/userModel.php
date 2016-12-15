<?php

class UserModel {

    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function login($email, $password) {
        $sql = "SELECT email FROM Renters WHERE email = :email AND password = :password UNION SELECT email FROM Lessors WHERE email = :email AND password = :password;";
        $query = $this->db->prepare($sql);

        $password = hash('sha256', $password);

        $parameters = array();
        $parameters[':email'] = $email;
        $parameters[':password'] = $password;

        $query->execute($parameters);
        $result = $query->fetchAll();
        print_r($result);
        //$value = $result == 1;
        //print($value);
        // checks if email and password are the same
        if (!$result) {
            // return false, lets view output error message
            echo "Error, email or password does not match";
        } else {
            // return true
            echo "Success!";
        }
    }
}

?>
