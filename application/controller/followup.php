<?php

class FollowUp extends Controller
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
    }

  public function followup()
    {
        $this->model->followupLead();
        header("Location: ".URL."leads?msg=Leads Follow-up done!");
    }  

    function followupview($lead_id)
    {
        $lead_rows = $this->model->view_lead($lead_id);
        $feedback_rows = $this->model->view_feedback($lead_id);
        require APP . 'view/_templates/header.php';
            require APP . 'view/lead/followupview.php';
            require APP . 'view/_templates/footer.php';  
    }     




}