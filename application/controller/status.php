<?php

class Status extends Controller
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
        $type = 'add';
        $status = $this->model->getStatus();
        // die;
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/status/index.php';
        require APP . 'view/_templates/footer.php';
    }


    public function add()
    {   
        if( isset( $_POST['action'] ) ){
            if( $_POST['action'] == 'add' ){
                $error = array();
                $_data = array();
                $insert_data = array(
                    ':title'         => $_POST['title'],
                );
                foreach( $insert_data as $key => $value ){
                    $_nk = str_replace( ':', '', $key );
                    $_data[ $_nk ] = $value;
                }

                if( !$_POST['title'] ){
                    $error[] = 'Title is required.';
                }

                if( empty( $error ) ){
                    if( $this->model->addStatus( $insert_data ) ){
                        Helper::flash('success', 'Status has been added successfully.');
                        header('location: ' . URL . 'status/index');
                        die;
                    }
                    Helper::flash('error', 'Error! Could not add Status.');
                    header('location: ' . URL . 'status/index');
                    die;

                }
                else{
                    Helper::flash( 'error', implode( '<br>', $error ) );
                }

            }
        }
        header('location: ' . URL . 'status/index');
        die;
    }


    public function edit( $status_id = 0 ){   
        $type = 'edit';
        if( !$status_id ){
            header('Location: ' . URL . 'status/index');
        }

        $_status = $this->model->getStatus( 'id', $status_id );
        if( count( $_status ) == 0 ){
            header('Location: ' . URL . 'counselor/index');
        }
        $_data = array();

        $_data['title'] = $_status[0]->title;

        $status = $this->model->getStatus();

        if( isset( $_POST['action'] ) ){
            if( $_POST['action'] == 'edit' ){
                $error = array();
                $insert_data = array(
                    ':status_id'           => $status_id,
                    ':title'        => $_POST['title'],
                );
                foreach( $insert_data as $key => $value ){
                    $_nk = str_replace( ':', '', $key );
                    $_data[ $_nk ] = $value;
                }

                if( !$_POST['title'] ){
                    $error[] = 'Title is required.';
                }

                if( empty( $error ) ){
                    if( $this->model->updateStatus( $insert_data ) ){
                        Helper::flash('success', 'Status has been updated successfully.');
                        header('location: ' . URL . 'status/index');
                        die;
                    }
                    Helper::flash('error', 'Error! Could not update Status.');
                    header('location: ' . URL . 'status/index');
                    die;
                }
                else{
                    Helper::flash( 'error', implode( '<br>', $error ) );
                }

            }
        }

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/status/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function delete( $status_id = 0 ){
        if( $status_id ){
            $this->model->deleteStatus( $status_id );
            Helper::flash('success', 'Status has been removed successfully.');
        }

        header('location: ' . URL . 'status/index');

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
