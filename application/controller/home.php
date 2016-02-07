<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    // public function index()
    // {

    //     // load views
    //     require APP . 'view/_templates/header.php';
    //     require APP . 'view/lead/index.php';
    //     require APP . 'view/_templates/footer.php';
    // }

    // /**
    //  * PAGE: exampleone
    //  * This method handles what happens when you move to http://yourproject/home/exampleone
    //  * The camelCase writing is just for better readability. The method name is case-insensitive.
    //  */
    // public function exampleOne()
    // {
    //     // load views
    //     require APP . 'view/_templates/header.php';
    //     require APP . 'view/home/example_one.php';
    //     require APP . 'view/_templates/footer.php';
    // }

    // /**
    //  * PAGE: exampletwo
    //  * This method handles what happens when you move to http://yourproject/home/exampletwo
    //  * The camelCase writing is just for better readability. The method name is case-insensitive.
    //  */
    // public function exampleTwo()
    // {
    //     // load views
    //     require APP . 'view/_templates/header.php';
    //     require APP . 'view/home/example_two.php';
    //     require APP . 'view/_templates/footer.php';
    // }


public function index(){
    if (isset($_SESSION['is_logged_in']))
    {

    require APP . 'view/_templates/header.php';
        require APP . 'view/counselor/index.php';
        require APP . 'view/_templates/footer.php';  
    }
    else
    {
        $this->login();  
    }
    
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
                
                 $role= $_SESSION['role'];
                 if ($role== admin) {
                    header('Location: ' .URL . 'counselor/index');
                    }

                else {
                    header('Location: ' .URL . 'lead/index');
                    }
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
            header('Location: ' . URL . 'home/login');
        }
        header('Location: ' . URL . 'home/login');

    }


}
