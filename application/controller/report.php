<?php
class Report extends Controller
{    
    public function __construct(){
        parent::__construct();
        if( !isset( $_SESSION['is_logged_in'] ) ){
            header('location: ' . URL . 'user/login');
        }

       
    }

    public function view_lead_report()
    {        
        $leads_rows = $this->model->view_lead_report();
        
        // die;        
        require APP . 'view/_templates/header.php'; 
        require APP . 'view/report/lead_report.php';
        require APP . 'view/_templates/footer.php'; 
    }   


    public function view_feedbacks_report($leads_id)
    {
        $leads_rows = $this->model->view_lead($leads_id);
        $feedback_rows = $this->model->view_feedbacks($leads_id);
        $page = 'followup/feedbacks_report_view.php';
        require APP . 'view/dashboard/layout.php';  
    }

    public function view_customized_report()
    {
        $counselor_rows = $this->model->view_all_counselors();
        $leads_rows = $this->model->view_customized_report();    

         require APP . 'view/_templates/header.php'; 
        require APP . 'view/report/customized_report.php';
        require APP . 'view/_templates/footer.php'; 
    }
    public function view_counselor_report()
    {
        $counselor_rows = $this->model->view_all_counselors();
        $leads_rows = $this->model->view_counselorwise_report();   

        require APP . 'view/_templates/header.php'; 
        require APP . 'view/report/counselor_report.php';
        require APP . 'view/_templates/footer.php'; 
    }    
}
