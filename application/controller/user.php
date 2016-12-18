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
			$session = json_decode($_COOKIE['session'], true);
			if ($session['loggedIn'] === false) {
				$session['loginError'] = 'You must be logged in to do that!';
				setcookie('session', json_encode($session), 0, '/');
				header('location: ' . URL . 'home/login');
				exit();
			}
			$search_options = $this->model->getSearchOptions();
			$location = 'createlisting';

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

		public function logout() {
			$session = array(
				'loggedIn' => false
			);
			setcookie('session', json_encode($session), 0, '/');
			header('location: ' . URL . 'home');
	    }
	}
?>
