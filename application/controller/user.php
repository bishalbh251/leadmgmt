<?php
class User extends Controller{

	public function index(){

	}
	public function login(){
		if( isset( $_SESSION['is_logged_in'] ) ){
			header('Location: ' . URL);
		}
		$error = false;

		if( isset( $_POST['action'] ) && $_POST['action']=='login' ){

			if( empty( $_POST['user_name'] ) ){
				$error = true;
			}
			if( empty( $_POST['password'] ) ){
				$error = true;
			}
			$user = $this->model->getAllUsers( array( 'user_name' => $_POST['user_name'], 'password' => md5( $_POST['password'] ), 'status' => 1 ), true );
			if( count( $user ) > 0 ){
				$_SESSION['is_logged_in'] = true;
				$_SESSION['user_id'] = $user[0]->id;
				$_SESSION['role'] = $user[0]->role;
				$_SESSION['user_name'] = $user[0]->user_name;
				$_SESSION['user_info'] = $user[0];

				header('Location: ' . URL);
			}
			else{
				$error = true;
			}

		}

		require APP . 'view/user/login.php';
	}

	public function logout(){
		if( isset( $_SESSION['is_logged_in'] ) ){

			unset( $_SESSION['is_logged_in'] );
			unset( $_SESSION['user_id'] );
			unset( $_SESSION['role'] );
			unset( $_SESSION['user_name'] );
			unset( $_SESSION['user_info'] );
			header('Location: ' . URL . 'user/login');
		}
		header('Location: ' . URL . 'user/login');

	}
}