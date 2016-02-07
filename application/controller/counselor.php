<?php

class Counselor extends Controller
{
    var $user_id;
    public function __construct(){
        parent::__construct();
        if( !isset( $_SESSION['is_logged_in'] ) ){
            header('location: ' . URL . 'user/login');
        }

        $this->user_id = $_SESSION['user_id'];
    }

    public function index()
    {
        $counselors = $this->model->getAllUsers( array('status_c' => '<=2', 'role' => 'counselor') );
        // die;
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/counselor/index.php';
        require APP . 'view/_templates/footer.php';
    }


    public function add()
    {   
        if( isset( $_POST['action'] ) ){
            if( $_POST['action'] == 'add' ){
                $error = array();
                $_data = array();
                $insert_data = array(
                    ':user_name'         => $_POST['user_name'],
                    ':password'          => md5( $_POST['password'] ),
                    ':first_name'        => $_POST['first_name'],
                    ':last_name'         => $_POST['last_name'],
                    ':email'             => $_POST['email'],
                    ':phone_no'          => $_POST['phone_no'],
                    ':address'           => $_POST['address'],
                    ':role'              => 'counselor',
                    ':status'            => ($_POST['status']) ? $_POST['status'] : 1,
                    ':created'           => time(),
                    ':updated'           => '',
                );
                foreach( $insert_data as $key => $value ){
                    $_nk = str_replace( ':', '', $key );
                    $_data[ $_nk ] = $value;
                }

                if( !$_POST['user_name'] ){
                    $error[] = 'Username is required.';
                }

                if( $this->_check_username( $_POST['user_name'] ) ){
                    $error[] = 'Username already exists.';
                }

                if( !$_POST['password'] ){
                    $error[] = 'Password is required.';
                }
                if( $_POST['password'] != $_POST['confirm_password'] ){
                    $error[] = 'Password not matched.';
                }
                if( !$_POST['first_name'] ){
                    $error[] = 'Firstname is required.';
                }
                if( !$_POST['last_name'] ){
                    $error[] = 'Lastname is required.';
                }
                if( !$_POST['email'] ){
                    $error[] = 'Email is required.';
                }
                if( !$_POST['phone_no'] ){
                    $error[] = 'Phone Number is required.';
                }
                if( !$_POST['address'] ){
                    $error[] = 'Address is required.';
                }
                if( !$_POST['status'] ){
                    $error[] = 'Status is required.';
                }

                if( empty( $error ) ){
                    if( $this->model->addUser( $insert_data ) ){
                        Helper::flash('success', 'Counselor has been added successfully.');
                        header('location: ' . URL . 'counselor/index');
                        die;
                    }
                    Helper::flash('error', 'Error! Could not add counselor.');
                    header('location: ' . URL . 'counselor/index');
                    die;

                }
                else{
                    Helper::flash( 'error', implode( '<br>', $error ) );
                }

            }
        }

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/counselor/add.php';
        require APP . 'view/_templates/footer.php';
    }


    public function edit( $user_id = 0 ){   
        if( !$user_id ){
            header('Location: ' . URL . 'counselor/index');
        }
        $user = $this->model->getUserBy( 'id', $user_id );
        if( count( $user ) == 0 ){
            header('Location: ' . URL . 'counselor/index');
        }
        $_data = array();
        $_data = $user[0];

        if( isset( $_POST['action'] ) ){
            if( $_POST['action'] == 'edit' ){
                $error = array();
                $insert_data = array(
                    ':user_id'           => $user_id,
                    ':first_name'        => $_POST['first_name'],
                    ':last_name'         => $_POST['last_name'],
                    ':email'             => $_POST['email'],
                    ':phone_no'          => $_POST['phone_no'],
                    ':address'           => $_POST['address'],
                    ':status'            => ($_POST['status']) ? $_POST['status'] : 1,
                    ':updated'           => time(),
                );
                foreach( $insert_data as $key => $value ){
                    $_nk = str_replace( ':', '', $key );
                    $_data[ $_nk ] = $value;
                }

                
                if( isset( $_POST['user_name'] ) ){
                    if( !$this->_check_username( $_POST['user_name'] ) ){
                        $error[] = 'Username cannot be changed.';
                    }
                }
                if( !empty($_POST['password']) ){
                    if( $_POST['password'] != $_POST['confirm_password'] ){
                        $error[] = 'Password not matched.';
                    }
                    else{
                        $insert_data[':password'] = md5( $_POST['password'] );
                    }
                }

                if( !$_POST['first_name'] ){
                    $error[] = 'Firstname is required.';
                }
                if( !$_POST['last_name'] ){
                    $error[] = 'Lastname is required.';
                }
                if( !$_POST['email'] ){
                    $error[] = 'Email is required.';
                }
                if( !$_POST['phone_no'] ){
                    $error[] = 'Phone Number is required.';
                }
                if( !$_POST['address'] ){
                    $error[] = 'Address is required.';
                }

                if( !$_POST['status'] ){
                    $error[] = 'Status is required.';
                }

                if( empty( $error ) ){
                    // echo "<pre>";
                    // print_r(  $insert_data);
                    if( $this->model->updateUser( $insert_data ) ){
                        Helper::flash('success', 'Counselor has been updated successfully.');
                        header('location: ' . URL . 'counselor/index');
                        die;
                    }
                    Helper::flash('error', 'Error! Could not update counselor.');
                    header('location: ' . URL . 'counselor/index');
                    die;
                }
                else{
                    Helper::flash( 'error', implode( '<br>', $error ) );
                }


                // echo "<pre>";
                // print_r($_POST);
                // print_r($error);
                // die;

            }
        }

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/counselor/edit.php';
        require APP . 'view/_templates/footer.php';
    }

    public function delete( $user_id = 0 ){
        if( $user_id ){
            $this->model->deleteUser( $user_id );
            Helper::flash('success', 'Counselor has been removed successfully.');
        }

        header('location: ' . URL . 'counselor/index');

    }

    private function _check_username( $user_name = '' ){
        if( $user_name ){
            $user = $this->model->getUserBy( 'user_name', $user_name );
            if( count( $user ) > 0 ){
                return true;
            }
            return false;
        }
    }
}
