<?php

class Model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
    * Add a user to database
    * @param array $data User Data
    */
    
    public function addUser( $data = array() ){
        if( !empty( $data ) ){
            $sql = "INSERT INTO user (user_name, password, first_name, last_name, email, phone_no, address, role, status, created, updated) VALUES (:user_name, :password, :first_name, :last_name, :email, :phone_no, :address, :role, :status, :created, :updated)";
            $query = $this->db->prepare($sql);

            // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

            if( $query->execute($data) ){
                return true;
            }
            return false;
        }
        return false;
    }

        /**
    * Add a lead to database
    * @param array $data Lead Data
    */
    
    function addLead( $data = array() ){
        if( !empty( $data ) ){
            $sql = "INSERT INTO lead (first_name, last_name, email, phone, address, status_id, semester_id, is_active, is_student, managed_by, created_at, updated_at) VALUES (:first_name, :last_name, :email, :phone_no, :address, :status_id, :semester_id, :is_active, :is_student, :managed_by, :created_at, :updated_at)";
            $query = $this->db->prepare($sql);
            if( $query->execute($data) ){
                return true;
            }
            return false;
        }
        return false;
    }




    /**
     * Get all users from database
     */
    public function getAllUsers( $params=array(), $specific = false ){
        $where = '';
        $_where = [];
        if( $specific ){
            foreach ($params as $key => $value) {
                $_where[] = $key.'=\''.$value.'\'';
            }
        }
        else{
            if( isset( $params['role'] ) ){
                $_where[] = 'role=\''.$params['role'].'\'';
            }
            if( isset( $params['status_c'] ) ){
                $_where[] = 'status '.$params['status_c'];
            }
            if( isset( $params['status'] ) ){
                $_where[] = 'status=\''.$params['status'].'\'';
            }
        }
        if( count( $_where ) > 0 ){
            $where = 'WHERE '. implode(' AND ', $_where);
        }
        $sql = "SELECT * FROM user " . $where;
        // echo $sql;
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }





 public function view_all_leads()
    {
        $sql = "SELECT * FROM lead WHERE managed_by = ".$_SESSION['user_id'];
        echo $sql;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

public function view_lead($lead_id)
    {
        $sql = "SELECT * FROM lead WHERE id = :lead_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':lead_id' => $lead_id);        
        $query->execute($parameters);
        return $query->fetchAll(PDO::FETCH_ASSOC);        
    }



      public function getAllLeads( $params=array(), $specific = false ){
        $where = '';
        $_where = [];
        if( $specific ){
            foreach ($params as $key => $value) {
                $_where[] = $key.'=\''.$value.'\'';
            }
        }
        else{
            if( isset( $params['is_active'] ) ){

                $_where[] = 'is_active=\''.$params['is_active'].'\'';
            }
            if( isset( $params['is_student'] ) ){
                $_where[] = 'is_student=\''.$params['is_student'].'\'';
            }
            if( isset( $params['managed_by'] ) ){
                $_where[] = 'managed_by=\''.$params['managed_by'].'\'';
            }
        }
        if( count( $_where ) > 0 ){
            $where = 'WHERE '. implode(' AND ', $_where);
        }
        $sql = "SELECT * FROM lead " . $where;
        // echo $sql;
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }



    /**
     * Get user from database
     */
    public function getUserBy( $key = '', $value = '' ){
        $where = '';
        if( !empty( $key ) && !empty( $value ) ){
            $where = 'WHERE '.$key.' = \''.$value.'\'';
        }
        $sql = "SELECT * FROM user " . $where;
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


   function followupLead($data = array())
    {    
            if( !empty( $data ) ){      
        $sql = "INSERT INTO follow_up (user_id, feedback, lead_id, folup_date) VALUES ( :user_id, :feedback, :lead_id, :folup_date)";        
        $query = $this->db->prepare($sql);
            if( $query->execute($data) ){
                return true;
            }
            return false;
        }
        return false;
    }



    /**
     * Remove User from database using flag
     */

    // public function deleteUser( $user_id = 0 ){
    //     if( $user_id ){
    //         $sql = "UPDATE user SET status = 3 WHERE id = :user_id";
    //         $query = $this->db->prepare($sql);
    //         $parameters = array(':user_id' => $user_id);

    //         if( $query->execute($parameters) ){
    //             return true;
    //         }

    //         return false;
    //     }
    //     return false;
    // }

    public function updateUser($data){
        $password = '';
        if( isset($data[':password']) ){
            $password = ',password = :password ';
        }
        $sql = "UPDATE user SET first_name = :first_name, last_name = :last_name, email = :email, phone_no = :phone_no, address = :address, status = :status, updated = :updated ".$password." WHERE id = :user_id";
        $query = $this->db->prepare($sql);
        if( $query->execute($data) ){
            return true;
        }
        return false;
    }


    /**
     * Get status from database
     */
    public function getStatus( $key='', $value='' ){
        $where = '';
        if( !empty( $key ) && !empty( $value ) ){
            $where = 'WHERE '.$key.' = \''.$value.'\'';
        }
        $sql = "SELECT * FROM status " . $where;

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addStatus( $data = array() ){
        if( !empty( $data ) ){
            $sql = "INSERT INTO status (title) VALUES (:title)";
            $query = $this->db->prepare($sql);

            if( $query->execute($data) ){
                return true;
            }
            return false;
        }
        return false;
    }
    
    public function updateStatus($data){
       
        $sql = "UPDATE status SET title = :title WHERE id = :status_id";
        $query = $this->db->prepare($sql);
        if( $query->execute($data) ){
            return true;
        }
        return false;
    }


    // public function deleteStatus( $status_d ){
    //     $sql = "DELETE FROM status WHERE id = :status_d";
    //     $query = $this->db->prepare($sql);
    //     $parameters = array(':status_d' => $status_d);

    //     $query->execute($parameters);   
    // }
    /**
     * Get semester from database
     */
    public function getSemester(){
        $sql = "SELECT * FROM semester";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }


    // Lead



    public function updateLead($data){
       
        $sql = "UPDATE lead SET first_name = :first_name, last_name = :last_name, email = :email, phone = :phone, address = :address, status_id = :status_id, semester_id = :semester_id, managed_by = :managed_by, updated_at = :updated_at WHERE id = :lead_id";

        $query = $this->db->prepare($sql);
        if( $query->execute($data) ){
            return true;
        }
        return false;
    }
    /**
     * Remove Lead from database using flag
     */

    // public function deleteLead( $lead_id = 0 ){
    //     if( $lead_id ){
    //         $sql = "UPDATE lead SET is_active = 0 WHERE id = :lead_id";
    //         $query = $this->db->prepare($sql);
    //         $parameters = array(':lead_id' => $lead_id);

    //         if( $query->execute($parameters) ){
    //             return true;
    //         }

    //         return false;
    //     }
    //     return false;
    // }
    /**
     * Get all lead from database
     */
    public function getLeads( $params=array() ){
        $where = '';
        $_where = [];
        if( isset( $params['is_active'] ) ){
            $_where[] = 'is_active='.$params['is_active'];
        }
        if( isset( $params['is_student'] ) ){
            $_where[] = 'is_student='.$params['is_student'];
        }
        if( isset( $params['managed_by'] ) ){
            $_where[] = 'managed_by='.$params['managed_by'];
        }
        if( isset( $params['status'] ) ){
            $_where[] = 'status=\''.$params['status'].'\'';
        }

        if( count( $_where ) > 0 ){
            $where = 'WHERE '. implode(' AND ', $_where);
        }
        $sql = "SELECT * FROM lead " . $where;
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

     /**
     * Get lead from database
     */
    public function getLeadBy( $key = '', $value = '' ){
        $where = '';
        if( !empty( $key ) && !empty( $value ) ){
            $where = 'WHERE '.$key.' = \''.$value.'\'';
        }
        $sql = "SELECT * FROM lead " . $where;
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get all songs from database
     */

    function view_feedback($lead_id)
    {
        $sql = "SELECT * FROM follow_up WHERE lead_id = :lead_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':lead_id' => $lead_id);        
        $query->execute($parameters);
        $followup_rows = $query->fetchAll(PDO::FETCH_ASSOC);        
        return $followup_rows;
    }

    function view_lead_report()
    {
        if(isset($_POST['status']) && $_POST['status'] != '' )
        {
            $status = $_POST['status'];
            $sql = "SELECT * FROM lead WHERE status_id = :status";
            $query = $this->db->prepare($sql);            
            $parameters = array(':status' => $status);
            $query->execute($parameters);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            $sql = "SELECT * FROM lead";
            $query = $this->db->prepare($sql);            
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    function view_all_counselors()
    {
        $sql = "select * from user u WHERE u.role = 'counselor'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


     function view_counselorwise_report()
    {
        if(isset($_POST['counselor_id']) && $_POST['counselor_id'] != '' )
        {
            $counselor_id = $_POST['counselor_id'];
            $sql = "SELECT * FROM lead WHERE managed_by = :counselor_id";
            $query = $this->db->prepare($sql);            
            $parameters = array(':counselor_id' => $counselor_id);
            $query->execute($parameters);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            $sql = "SELECT * FROM lead";
            $query = $this->db->prepare($sql);            
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }

     function view_customized_report()
    {
        if(isset($_POST['counselor_id']) && $_POST['counselor_id'] != '' )
        {
            $counselor_id = $_POST['counselor_id'];
            $from = $_POST['from'];
            $to = $_POST['to'];           
            $sql = "SELECT * FROM lead WHERE created_at >= :from AND created_at <= :to AND managed_by = :counselor_id";
            $query = $this->db->prepare($sql);            
            $parameters = array(':counselor_id' => $counselor_id, ':from' => $from, ':to' => $to);
            $query->execute($parameters);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            if(isset($_POST['from']) && $_POST['from'] != '' && isset($_POST['to']) && $_POST['to'] != '' )
            {
                $from = $_POST['from'];
                $to = $_POST['to'];            
                $sql = "SELECT * FROM lead WHERE added_date >= :from AND added_date <= :to";
                $query = $this->db->prepare($sql);
                $parameters = array(':from' => $from, ':to' => $to);
                $query->execute($parameters);
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }
            else
            {
                $sql = "SELECT * FROM lead";
                $query = $this->db->prepare($sql);
                $query->execute();
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }
        }       
    }


}
