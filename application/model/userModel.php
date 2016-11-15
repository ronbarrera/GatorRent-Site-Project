<?php

class UserModel {

    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function register($username, $password, $email) {
        $sql = "INSERT INTO user (username, password, email) VALUES (:username, :password, :email)";
        $query = $this->db->prepare($sql);

        $query->bind_param(':username', $username);
        $query->bind_param(':password', hash('sha256', $password));
        $query->bind - param(':email', $email);

        $query->execute();
    }

    public function login($username, $password) {
        $sql = "SELECT * FROM user WHERE username=:username AND password=:password ;";
        $query = $this->db->prepare($sql);

        $query->bindParam(':username', $username);
        $query->bindParam(':password', hash('sha256', $password));

        $query->execute();
        $result = $query->fetchAll();
        print_r($result);
        //$value = $result == 1;
        //print($value);
        // checks if username and password are the same
        if (!$result) {
            // return false, lets view output error message
            echo "Error, username or password does not match";
        } else {
            // return true
            echo "Success!";
        }
    }

}

?>
