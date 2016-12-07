<?php

class UserModel {

    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function register($user_type, $first_name, $last_name, $email, $password, $renter_id = NULL) {
        $sql = "INSERT INTO ";
        if ($user_type == 'Renter') {
            $sql .= 'Renters (renter_id, ';
        } else if ($user_type == 'Lessor') {
            $sql .= 'Lessors (';
        }
        $sql .= "first_name, last_name, email, password) VALUES (";
        if ($user_type == 'Renter') {
            $sql .= ':renter_id, ';
        }
        $sql .= ":first_name, :last_name, :email, :password)";

        $query = $this->db->prepare($sql);

        $password = hash('sha256', $password);

        $parameters = array();
        if ($user_type == 'Renter') {
            $parameters[':renter_id'] = $renter_id;
        }
        $parameters[':first_name'] = $first_name;
        $parameters[':last_name'] = $last_name;
        $parameters[':email'] = $email;
        $parameters[':password'] = $password;

        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM user WHERE email=:email AND password=:password ;";
        $query = $this->db->prepare($sql);
        $query->bindParam(':email', $email);
        // hash the password using sha256 and compares with the hashed pw in db
        $password1 = hash('sha256', $password);
        $query->bindParam(':password', $password1);
        $query->execute();
        $result = $query->fetch();

        //If the username's and password match, result will have an item.
        //If result is blank, then no match is found.
        if (!$result) {
            //If login fails, we redirect to home and exit() so php does not keep executing.
            $_SESSION['loggedIn'] = false;
            header("Location:" . URL . "home/index", true, 401);
            exit();
        } else {
            // Creates a session to store the users ID, and make them always log in upon visiting the site 
            $_SESSION['Renters'] = $result->Renters;
            $_SESSION['Lessors'] = $result->Lessors;
            $_SESSION['email'] = $result->email;
            $_SESSION['loggedIn'] = true;
            // start redirect to page user was at previously
            echo "<meta http-equiv=\"refresh\" content=\"5;url=" . $_SERVER['HTTP_REFERER'] . "\"/>";
            echo "Successfully logged in!";
        }
    }

    public function logout() {
        // code obtained from : http://php.net/manual/en/function.session-destroy.php
        // Unset all of the session variables.
        $_SESSION = array();

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
        }

        // Destroy the session.
        session_destroy();
    }

}

?>
