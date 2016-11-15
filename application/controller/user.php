<?php
	class User extends Controller
	{
		public function index()
		{
			require APP . 'view/_templates/header.php';
			require APP . 'view/user/index.php';
			require APP . 'view/_templates/footer.php';
		}

		public function authenticateLogin()
		{
			$username = $_POST['username'];
			$password = $_POST['password'];

			$this->userModel->login($username, $password);
		}

		public function register()
		{
			$user_type = $_POST['user_type'];
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$email = $_POST['email'];
			$password = $_POST['password'];

			if ($user_type = 'Renter') {
				$renter_id = $_POST['renter_id'];
			}

			$this->userModel->register($user_type, $first_name, $last_name, $email, $password, $renter_id);

			header('location: ' . URL . 'home');
		}
	}
?>
