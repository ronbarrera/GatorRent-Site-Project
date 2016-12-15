<?php
	class Register extends Controller
	{
		// Class globals for storing filled registration fields and validation errors

		/**
		 * PAGE: Index
		 * Handles main registration page
		 */
		public function index()
		{
			session_id('register');
			session_start();
			if (isset($_SESSION['registration'])) {
				$currentForm = $_SESSION['registration'];
			} else {
				$currentForm = array();
			}
			if (isset($_SESSION['errors'])) {
				$formErrors = $_SESSION['errors'];
			} else {
				$formErrors = array();
			}
			session_write_close();
			require APP . 'view/_templates/header.php';
			require APP . 'view/register/index.php';
			require APP . 'view/_templates/footer.php';
		}

		/**
		 * PAGE: Success
		 * Handles successful registration page
		 */
		public function success()
		{
			session_id('register');
			session_start();
			session_destroy();
			require APP . 'view/_templates/header.php';
			require APP . 'view/register/success.php';
			require APP . 'view/_templates/footer.php';
		}

		/**
		 * ACTION: RegisterUser
		 * Handles the actual registration process (validation, return errors, store to DB)
		 */
		public function registerUser()
		{
			session_id('register');
			session_start();
			$registration = array(
				'userType' => $_POST['userType'],
				'firstName' => $_POST['firstName'],
				'lastName' => $_POST['lastName'],
				'email' => $_POST['email'],
				'password' => $_POST['password'],
				'passwordVerify' => $_POST['passwordVerify'],
				'renterId' => $_POST['renterId'],
			);
			if (isset($_POST['tosComply'])) {
				$registration['tosComply'] = $_POST['tosComply'];
			} else {
				$registration['tosComply'] = NULL;
			}

			$result = $this->registerModel->register($registration);
			if (!empty($result)) {
				// Store current registration fields and validation errors
				$_SESSION['registration'] = $registration;
				$_SESSION['errors'] = $result;
				session_write_close();

				// Redirect to registration page to display validation errors
				header('location: ' . URL . 'register');
			} else {
				// Clear any stored registration fields and errors
				$_SESSION['registration'] = array();
				$_SESSION['errors'] = array();
				session_write_close();

				// Redirect to registration success page
				header('location: ' . URL . 'register/success');
			}
		}
	}
?>
