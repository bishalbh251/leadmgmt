<?php

class Lead extends Controller
{
    var $status;
    var $semester;
    var $user_id;
    public function __construct(){
        parent::__construct();
        if( !isset( $_SESSION['is_logged_in'] ) ){
            header('location: ' . URL . 'user/login');
        }

        $this->status = $this->model->getStatus();
        $this->semester = $this->model->getSemester();
        $this->user_id = $_SESSION['user_id'];
    }

    public function index()
    {
        // $leads = $this->model->getLeads( array('is_active' => 1, 'is_student' => 0,  'managed_by' => $this->user_id ) );
        // foreach( $leads as $lk => $lead ){
        //     $status =  $this->model->getStatus( 'id', $lead->status_id);
        //     $leads[$lk]->status =  $status[0]->title;
        // }
        $leads = $this->model->getAllLeads( array('is_active' => 1, 'is_student' => 0,  'managed_by' => $this->user_id ) );
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/lead/index.php';
        require APP . 'view/_templates/footer.php';
    }


    public function add()
    {   
        if( isset( $_POST['action'] ) ){
            if( $_POST['action'] == 'add' ){
                $error = array();
                $_data = array();
                $insert_data = array(
                    ':first_name'     => $_POST['first_name'],
                    ':last_name'      => $_POST['last_name'],
                    ':email'          => $_POST['email'],
                    ':phone_no'       => $_POST['phone_no'],
                    ':address'        => $_POST['address'],
                    ':status_id'      => ($_POST['status']) ? $_POST['status'] : 1,
                    ':semester_id'    => ($_POST['semester']) ? $_POST['semester'] : 1,
                    ':is_active'           => 1,
                    ':is_student'           => 0,
                    ':managed_by'           => $this->user_id,
                    ':created_at'           => date('Y-m-d'),
                    ':updated_at'           => $_POST['date'],
                );

                foreach( $insert_data as $key => $value ){
                    $_nk = str_replace( ':', '', $key );
                    $_data[ $_nk ] = $value;
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
                if( $this->_check_email( $_POST['email'] ) ){
                    $error[] = 'Email already exists.';
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

                if( !$_POST['date'] ){
                    $error[] = 'Followup date is required.';
                }

                if( $_POST['date'] <= date('Y-m-d') ){
                    $error[] = 'Followup date must be greater than current date.';
                }

              

                if( empty( $error ) ){
                    if( $this->model->addLead( $insert_data ) ){
                        Helper::flash('success', 'Lead has been added successfully.');
                        header('location: ' . URL . 'lead/index');
                        die;
                    }
                    Helper::flash('error', 'Error! Could not add lead.');
                    header('location: ' . URL . 'lead/index');
                    die;

                }
                else{
                    Helper::flash( 'error', implode( '<br>', $error ) );
                }

            }
        }

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/lead/add.php';
        require APP . 'view/_templates/footer.php';
    }



    public function edit( $lead_id = 0 ){   
       

        $lead = $this->model->getLeadBy( 'id', $lead_id );
        if( count( $lead ) == 0 ){
            header('Location: ' . URL . 'lead/index');
        }
        $_data = array();
        $_data = $lead[0];

        if( isset( $_POST['action'] ) ){
            if( $_POST['action'] == 'edit' ){
                $error = array();
              
                $insert_data = array(
                    ':first_name'        => $_POST['first_name'],
                    ':last_name'         => $_POST['last_name'],
                    ':email'             => $_POST['email'],
                    ':phone'          => $_POST['phone_no'],
                    ':address'           => $_POST['address'],
                    ':status_id'            => ($_POST['status']) ? $_POST['status'] : 1,
                    ':semester_id'           => ($_POST['semester']) ? $_POST['semester'] : 1,
                    ':managed_by'           => $this->user_id,
                    ':updated_at'           => time(),
                    ':lead_id'           => $lead_id,
                );
                foreach( $insert_data as $key => $value ){
                    $_nk = str_replace( ':', '', $key );
                    $_data[ $_nk ] = $value;
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
                if( $this->_check_email( $_POST['email'], $lead_id )  ){
                    $error[] = 'Email already exists.';
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
                    if( $this->model->updateLead( $insert_data ) ){
                        Helper::flash('success', 'Lead has been updated successfully.');
                        header('location: ' . URL . 'lead/index');
                        die;
                    }
                    Helper::flash('error', 'Error! Could not update lead.');
                    header('location: ' . URL . 'lead/index');
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
        require APP . 'view/lead/edit.php';
        require APP . 'view/_templates/footer.php';
    }





   public function followup( $lead_id ){   
       

        $lead = $this->model->getLeadBy( 'id', $lead_id );
        if( count( $lead ) == 0 ){
            header('Location: ' . URL . 'lead/index');
        }
        $_data = array();
        $_data = $lead[0];

        if( isset( $_POST['action'] ) ){
            if( $_POST['action'] == 'followup' ){
                $error = array();
              
                $insert_data = array(
                    
                    // ':user_id'            => ($_POST['status']) ? $_POST['status'] : 1,
                    ':user_id'      => $this->user_id,
                    ':lead_id'      => $lead_id,
                    ':folup_date'   => date('Y-m-d'),
                    ':feedback'     => $_POST['feedback'],
                   

                );
                foreach( $insert_data as $key => $value ){
                    $_nk = str_replace( ':', '', $key );
                    $_data[ $_nk ] = $value;
                }

               
                if( !$_POST['date'] ){
                    $error[] = 'Followup date is required.';
                }

                if( $_POST['date'] <= date('Y-m-d') ){
                    $error[] = 'Followup date must be greater than current date.';
                }


                if( empty( $error ) ){
                    // echo "<pre>";
                    // print_r(  $insert_data);
                    if( $this->model->followupLead( $insert_data ) ){
                        Helper::flash('success', 'Lead followup information is successfully updated.');
                        header('location: ' . URL . 'lead/index');
                        die;
                    }
                    Helper::flash('error', 'Error! Could not update lead followup information.');
                    header('location: ' . URL . 'lead/index');
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
        require APP . 'view/lead/followup.php';
        require APP . 'view/_templates/footer.php';
    }
        public function view( $lead_id ){   

    require APP . 'view/_templates/header.php';
        require APP . 'view/lead/view.php';
        require APP . 'view/_templates/footer.php';
    }

    
     public function followupview( $lead_id ){ 
        $leads_rows = $this->model->followupview();
        
        // die;        
        require APP . 'view/_templates/header.php'; 
        require APP . 'view/lead/followupview.php';
        require APP . 'view/_templates/footer.php'; 
           }  



    public function delete( $lead_id = 0 ){
        if( $lead_id ){
            $this->model->deleteLead( $lead_id );
            Helper::flash('success', 'Lead has been removed successfully.');
        }

        header('location: ' . URL . 'lead/index');

    }

    private function _check_email( $email = '', $lead_id = 0 ){
        if( $email ){
            $lead = $this->model->getLeadBy( 'email', $email );
            if( count( $lead ) > 0 ){
               
                if( $lead[0]['id'] == $lead_id ){
                    return false;
                }
                return true;
            }
            return false;
        }
    }
}
