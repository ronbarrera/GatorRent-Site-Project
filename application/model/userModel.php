<?php

class UserModel {

    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function register($user_type, $first_name, $last_name, $email, $password, $renter_id) {
        $sql = "INSERT INTO ";
        if ($user_type = 'Renter') {
            $sql .= 'Renters (renter_id, ';
        } else if ($user_type = 'Lessor') {
            $sql .= 'Lessors (';
        }
        $sql .= "first_name, last_name, email, password) VALUES (";
        if ($user_type = 'Renter') {
            $sql .= ':renter_id, ';
        }
        $sql .= ":first_name, :last_name, :email, :password)";

        $query = $this->db->prepare($sql);

        $password = hash('sha256', $password);

        $parameters = array();
        if ($user_type = 'Renter') {
            $parameters[':renter_id'] = $renter_id;
        }
        $parameters[':first_name'] = $first_name;
        $parameters[':last_name'] = $last_name;
        $parameters[':email'] = $email;
        $parameters[':password'] = $password;

        $query->execute($parameters);
    }

    public function login($username, $password) {
        $sql = "SELECT * FROM Renters WHERE username = :username AND password = :password UNION SELECT * FROM Lessors WHERE username = :username AND password = :password;";
        $query = $this->db->prepare($sql);

        $password = hash('sha256', $password);

        $query->bind_param(':username', $username);
        $query->bind_param(':password', $password);

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
