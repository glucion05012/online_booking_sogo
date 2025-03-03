<?php
    class Admincontroller extends CI_Controller{
        function __construct()
        {
            parent::__construct();
            $this->load->model('Admin_model');
        }

        public function index(){
            $this->form_validation->set_rules('username', 'Username',
            'required');
            $this->form_validation->set_rules('password', 'Password',
                    'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('login');
            }else{
                if($this->login_model->login()) {
                    $data['users'] =  $this->login_model->login();
                
                    $_SESSION['name'] = $data['users'][0]['name'];
                    $_SESSION['type'] = $user_id = ($data['users'][0]['type']);
                    $_SESSION['branch_id'] = $user_id = ($data['users'][0]['branch_id']);

               
                    redirect('dashboard');
                }     
                else{
                    $this->session->set_flashdata('errormsg', 'No User found!');

                    $this->load->view('login');
                } 
            } 
        }

        public function logout(){
            unset($_SESSION['name']);
            unset($_SESSION['type']);
            unset($_SESSION['branch_id']);
            $this->load->view('login');
        }


        public function dashboard(){
            if(isset($_SESSION['name'])){
                $data['branches'] =  $this->Admin_model->branches();
            
                $this->load->view('admin/templates/header', $data);
                $this->load->view('admin/dashboard');
                $this->load->view('admin/templates/footer');
            }else{
                $this->load->view('login');
            }

           
        }

        public function calendar(){
            $data['branches'] =  $this->Admin_model->branches();
            $data['rooms'] =  $this->Admin_model->rooms();
            $data['allocate'] =  $this->Admin_model->allocate();
            
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/calendar');
            $this->load->view('admin/templates/footer');
        }

        public function manage_rooms(){
            $data['rooms'] =  $this->Admin_model->rooms();

            $data['branches'] =  $this->Admin_model->branches();
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/manage_rooms', $data);
            $this->load->view('admin/templates/footer');
        }

        public function bookings(){
            $data['branches'] =  $this->Admin_model->branches();
            $data['rooms'] =  $this->Admin_model->rooms();
            $data['booking'] =  $this->Admin_model->booking();
            
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/bookings', $data);
            $this->load->view('admin/templates/footer');
        }

        public function history(){
            $data['branches'] =  $this->Admin_model->branches();
            $data['rooms'] =  $this->Admin_model->rooms();
            $data['booking'] =  $this->Admin_model->booking();
            
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/history', $data);
            $this->load->view('admin/templates/footer');
        }

        public function add_room(){
            $data['rooms'] =  $this->Admin_model->add_room();

            $url = $_SERVER['HTTP_REFERER'];
            redirect($url);
        }

        public function allocate(){
            $data['allocate'] =  $this->Admin_model->allocate_room();

            // $url = $_SERVER['HTTP_REFERER'];
            // redirect($url);
        }
        
        public function update_room($id){
            $data['rooms'] =  $this->Admin_model->update_room($id);

            $url = $_SERVER['HTTP_REFERER'];
            redirect($url);
        }

        public function delete_room($id){
            $data['rooms'] =  $this->Admin_model->delete_room($id);

            $url = $_SERVER['HTTP_REFERER'];
            redirect($url);
        }

        public function branchSession(){
            $_SESSION['branch_id'] = $_POST['branch_id'];
            $_SESSION['branch_name'] = $_POST['branch_name'];
            return true;
        }

        public function startDateSession(){
            $_SESSION['startDate'] =  date('F d', strtotime( $_POST['startDate']));
            return true;
        }

        public function checkDate(){
            $data['checkDate'] =  $this->Admin_model->checkDate();
            echo json_encode( $data['checkDate'] );
            // return $data['checkDate'];
            // if($this->Admin_model->checkDate()) {
            //     echo json_encode($this->Admin_model->checkDate());
            // }else{
            //     echo json_encode($this->Admin_model->checkDate());
            // } 
        }

        public function roomInfo(){
            $data['roomInfo'] =  $this->Admin_model->roomInfo();
            echo json_encode( $data['roomInfo'] );
            
        }

        public function cancel(){
            
            $data['cancelBooking'] =  $this->Admin_model->cancelBooking();
            $url = $_SERVER['HTTP_REFERER'];
            redirect($url);
        }
        
        public function checkin(){
            
            $data['checkinBooking'] =  $this->Admin_model->checkinBooking();
            $url = $_SERVER['HTTP_REFERER'];
            redirect($url);
        }

        public function recheckin(){
            
            $data['checkinBooking'] =  $this->Admin_model->recheckinBooking();
            $url = $_SERVER['HTTP_REFERER'];
            redirect($url);
        }

        public function checkout(){
            
            $data['checkoutBooking'] =  $this->Admin_model->checkoutBooking();
            $url = $_SERVER['HTTP_REFERER'];
            redirect($url);
        }

        public function user(){
            $data['branches'] =  $this->Admin_model->branches();
            $data['rooms'] =  $this->Admin_model->rooms();
            $data['booking'] =  $this->Admin_model->booking();
            $data['user_list'] =  $this->Admin_model->user_list();
            
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/user', $data);
            $this->load->view('admin/templates/footer');
        }

        public function addUser(){
            $this->Admin_model->addUser();
            $url = $_SERVER['HTTP_REFERER'];
            redirect($url);
        }

        public function updateUser($id){
            
            $data['updateUser'] =  $this->Admin_model->updateUser($id);
            $url = $_SERVER['HTTP_REFERER'];
            redirect($url);
        }

        public function deleteUser($id){
            $this->Admin_model->deleteUser($id);
            $url = $_SERVER['HTTP_REFERER'];
            redirect($url);
        }
       
}