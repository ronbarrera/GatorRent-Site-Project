<?php
	class User extends Controller
	{
		public function index()
		{
			require APP . 'view/_templates/header.php';
			require APP . 'view/user/index.php';
			require APP . 'view/_templates/footer.php';
		}

		public function createlisting()
		{
			require APP . 'view/_templates/header.php';
			require APP . 'view/user/create_listing.php';
			require APP . 'view/_templates/footer.php';
		}

		public function login()
		{
			$email = $_POST['email'];
			$password = $_POST['password'];

			$this->userModel->login($email, $password);
		}

		public function register()
		{
			$userType = $_POST['user_type'];
			$firstName = $_POST['first_name'];
			$lastName = $_POST['last_name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$passwordVerify = $_POST['password_verify'];
			$tosComply = $_POST['toscomply'];

			if ($userType == 'Renter') {
				$renterId = $_POST['renter_id'];
			} else {
				$renterId = NULL;
			}

			$errors = $this->userModel->register($userType, $firstName, $lastName, $email, $password, $passwordVerify, $renterId, $tosComply);

			header('location: ' . URL . 'home');
		}
	}
?>
