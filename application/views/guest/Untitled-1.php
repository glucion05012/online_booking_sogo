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
            
            $branches =  $this->post_model->branches();
            
            foreach($branches as $br){
                if($data['reserve'][0]['branch'] == $br['id']){
                   $branch = $br['name']; 
                }
            }
            
            $reference = $data['reserve'][0]['reference'];
            $name = $data['reserve'][0]['name'];
            $email = $data['reserve'][0]['email'];
            $room = $data['reserve'][0]['room'];
            $hours = $data['reserve'][0]['hours'];
            $checkin = str_replace("12:00:am","", $data['reserve'][0]['checkin']);
            $checkout = str_replace("12:00:am","", $data['reserve'][0]['checkout']);
            $amount = $data['reserve'][0]['amount'];
            $phone = $data['reserve'][0]['phone'];
            $notes= $data['reserve'][0]['notes'];
            
            $this->load->view('guest/success', $data);
            
            $this->load->library('phpmailer_lib');

            $mail = $this->phpmailer_lib->load();

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            // $mail->Host = 'sg3plcpnl0048.prod.sin3.secureserver.net';
            $mail->SMTPAuth = true;
            // $mail->SMTPAuth = false;
            $mail->Username = 'sogocaresinquiry@gmail.com';
            $mail->Password = 'sogocaresinquiry123';
            $mail->SMTPSecure = 'tls';
            // $mail->SMTPSecure = 'none';
            $mail->Port = 25;
            // $mail->Port = 25;

            $mail->SMTPAutoTLS = false; 
            $mail->SMTPOptions = array(
            'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                            )
            );

            $mail->setFrom('roomreservation@hotelsogo.com', 'Hotel Sogo');

            $mail->addAddress($email);
            // $mail->addCC('roomreservation@hotelsogo.com');

            $mail->Subject = 'SOGO Website Reservation';

            $mail->isHTML(true);

            $mailContent =  '<p> Hi '. $name .'</p>
                            <br><br>
                            <p>A new appointment booking request has been submitted.</p>
                            <p>Reference Number: '. $reference .'</p>
                            <br>
                            <p>Name: '. $name .' </p>
                            <p>Contact Number: '. $phone .' </p>
                            <p>Email: '. $email .' </p>
                            <p>Hotel Sogo Branch: '. $branch .' </p>
                            <p>Room Type: '. $room .' </p>
                            <p>Length of Stay: '. $hours .' </p>
                            <p>Check-in date: '. $checkin .' </p>
                            <p>Check-out date: '. $checkout .' </p>
                            <p>Notes: '. $notes .' </p>
                            <br>
                            <b>TOTAL AMOUNT: '. $amount .'</b>';

            $mail->Body = $mailContent;

            if(!$mail->send()){
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }else{
                // echo 'Message sent.';
                // echo'
                // <script>
                //     alert("Inquiry Successfully Sent!");
                // </script>
                // ';
            }

        }

        public function dashboard_old(){
            $data['branches'] =  $this->post_model->branches();
            $data['reserve'] =  $this->post_model->admin();

            $this->load->view('admin/dashboard_old', $data);
            // echo('testse');
        }

        public function checkin(){
            return $this->post_model->checkin($this->input->post('id'));

            // echo('testse');
        }

       
    }
?>