<?php
class login_model extends CI_Model{
    public function __construct(){
        // $this->opmsdb = $this->load->database('opms', TRUE);
        $this->load->database();
    }

    public function login(){
        $uname = $this->input->post('username');
        $psw = $this->input->post('password');
        

        $this->db->where('username', $uname);
        $this->db->where('password', $psw);
        $this->db->where('status', 1);
        $query1 = $this->db->get('users');
        $loginCnt1 = $query1->num_rows();
        
        if($loginCnt1 == 0){
            return false;
        }else{
            // true
            return $query1->result_array();
        }
        return false;


    }

}

?>