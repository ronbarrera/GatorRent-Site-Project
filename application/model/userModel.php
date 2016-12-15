<?php

class UserModel {

    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function register($userType=NULL, $firstName=NULL, $lastName=NULL, $email=NULL, $password=NULL, $passwordVerify=NULL, $renterId=NULL, $tosComply=NULL) {
        // Create a registration key-value array for validation
        $registration = array(
            'userType' => $userType,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'password' => $password,
            'passwordVerify' => $passwordVerify,
            'renterId' => $renterId,
            'tosComply' => $tosComply
        );
        $errors = $this->_validateRegistration($registration);

        // If registration is invalid, return errors to prompt user
        if (!empty($errors)) {
            return $errors;
        }

        // Query builder for adding new user to database
        $sql = "INSERT INTO ";
        if ($userType == 'Renter') {
            $sql .= 'Renters (renter_id, ';
        } else if ($userType == 'Lessor') {
            $sql .= 'Lessors (';
        }
        $sql .= "first_name, last_name, email, password) VALUES (";
        if ($userType == 'Renter') {
            $sql .= ':renter_id, ';
        }
        $sql .= ":first_name, :last_name, :email, :password)";

        $query = $this->db->prepare($sql);

        $password = hash('sha256', $password);

        $parameters = array();
        if ($userType == 'Renter') {
            $parameters[':renter_id'] = $renterId;
        }
        $parameters[':first_name'] = $firstName;
        $parameters[':last_name'] = $lastName;
        $parameters[':email'] = $email;
        $parameters[':password'] = $password;

        // DEBUG
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
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

    /**
     * Function for validating registration before creating account.
     * @return boolen: true if valid; false if invalid
     */
    private function _validateRegistration($registration)
    {
        $errors = array();

        // userType
        if ($registration['userType'] !== 'Renter' && $registration['userType'] !== 'Lessor') {
            $errors['userType'] = 'Please select a valid user type.';
        }

        // firstName
        if (is_null($registration['firstName']) || $registration['firstName'] === '') {
            $errors['firstName'] = 'Please enter your first name.';
        } else if (preg_match('/[- A-Za-z]/', $registration['firstName'])) {
            $errors['firstName'] = 'First name may only contain letters, dashes (-), and spaces';
        } else if (strlen($registration['firstName']) > 20) {
            $errors['firstName'] = 'First name may be no longer than 20 characters.';
        }

        // lastName
        if (is_null($registration['lastName']) || $registration['lastName'] === '') {
            $errors['lastName'] = 'Please enter your last name';
        } else if (preg_match('/[- A-Za-z]/', $registration['lastName'])) {
            $errors['lastName'] = 'Last name may only contain letters, dashes (-), and spaces';
        } else if (strlen($registration['lastName']) > 20) {
            $errors['lastName'] = 'Last name may be no longer than 20 characters.';
        }

        // email
        if (is_null($registration['email']) || $registration['email'] === '') {
            $errors['email'] = 'Please enter your email address.';
        } else if (filter_var($registration['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter a valid email.';
        } else if ($registration['userType'] === 'Renter' && substr($registration['email'], -13) !== 'mail.sfsu.edu') {
            $errors['email'] = 'Email must be a valid "mail.sfsu.edu" email.';
        } else if (strlen($registration['email']) > 40) {
            $errors['email'] = 'Email may be no longer than 40 characters.';
        }

        // password
        if (is_null($registration['password']) || $registration['password'] === '') {
            $errors['password'] = 'Please enter a valid password.';
        } else if (strlen($registration['password']) < 4) {
            $errors['password'] = 'Password must contain at least 4 characters.';
        }

        // passwordVerify
        if (!is_null($registration['password']) && $registration['password'] !== '') {
            if (is_null($registration['passwordVerify']) || $registration['passwordVerify'] === '') {
                $errors['passwordVerify'] = 'Please verify your password.';
            } else if ($registration['passwordVerify'] !== $registration['password']) {
                $errors['passwordVerify'] = 'Passwords do not match.';
            }
        }

        // renterId
        if ($registration['userType'] === 'Renter') {
            if (is_null($registration['renterId']) || $registration['renterId'] === '') {
                $errors['renterId'] = 'Student ID must be provided.';
            } else if (preg_match('/[0-9]/', $registration['renterId'])) {
                $errors['renterId'] = 'Student ID may consist of numbers only.';
            } else if (strlen($registration['renterId']) !== 9){
                $errors['renterId'] = 'Student ID must be 9 digits long.';
            }
        }

        // tosComply
        if ($registration['tosComply'] !== true) {
            $errors['tosComply'] = 'Please agree to the Conditions of Use and Privacy Notice.';
        }

        return $errors;
    }
}

?>
