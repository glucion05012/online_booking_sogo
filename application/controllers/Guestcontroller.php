<?php
    class Guestcontroller extends CI_Controller{
        function __construct()
        {
            parent::__construct();
            $this->load->model('Admin_model');
            $this->load->model('Post_model');
        }
        
        public function index(){
            $data['branches'] =  $this->post_model->branches();
            $data['rooms'] =  $this->Admin_model->rooms();
            $data['allocatej'] =  $this->Post_model->allocatej();

            // echo json_encode($data['rooms']);
            $this->load->view('guest/booking', $data);
        }

        public function disclaimer(){
            $this->load->view('guest/disclaimer');
        }
        
        public function reserve(){

            $data['reserve'] =  $this->post_model->reserve();
            $this->load->view('guest/success', $data);
            // echo($this->input->post('amount2'));

        }


       
    }
?>