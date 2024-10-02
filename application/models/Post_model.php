<?php
class Post_model extends CI_Model{
    public function __construct(){
        $this->load->database();
        $this->sogo = $this->load->database('sogo', TRUE);
    }

    public function reserve(){
        $reference = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);

        // $checkin =  date("F j, Y g:i:a  ", strtotime($this->input->post('checkin')));
        // $checkout =  date("F j, Y g:i:a  ", strtotime($this->input->post('checkout')));

        date_default_timezone_set('Asia/Manila');
        $date_now = date('F j, Y g:i:a  ');

        $date_from = date('n/j/Y', strtotime($this->input->post('checkin')));
        $date_to = date('n/j/Y', strtotime($this->input->post('checkout')));

        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'adults' => $this->input->post('adults'),
            'children' => $this->input->post('children'),
            'checkin' => $date_from,
            'checkout' => $date_to,
            'branch_id' => $this->input->post('branch'),
            'room_id' => $this->input->post('room'),
            'promo_code' => $this->input->post('promo_code'),
            'notes' => $this->input->post('notes'),
            'reference' => $reference,
            'amount' => $this->input->post('amount2'),
            'bookingdate' => $date_now,
            'status' => 0,
            
        );

        $this->db->insert('booking', $data);
        $res_id = $this->db->insert_id();

        //deduct number of days to the room
        $room_id = $this->input->post('room');
        $this->db->query("UPDATE room_calendar set quantity=(quantity-1) where room_id = '$room_id' and (date BETWEEN '$date_from' AND '$date_to')");

        $query = $this->db->query("SELECT * FROM booking where id = $res_id");
        return $query->result_array();
    }

    public function admin(){
        $query = $this->db->get('booking');
        return $query->result_array();
    }

    public function checkin($id){
        $query = $this->db->query("UPDATE booking SET status = 1 where id = '$id'");
        return $query->result_array();
    }

    public function branches(){
        $query = $this->sogo->query("SELECT * FROM branches");
        return $query->result_array();
    }

    public function rates(){
        $query = $this->sogo->query("SELECT a.*, b.*, c.name as room_name 
        from branches a 
        left join rates b on b.branch_id=a.id 
        left join categories c on c.id=b.room_id");
        return $query->result_array();
    }
    
    public function allocatej(){
        $query = $this->db->query("SELECT a.id, a.name, a.branch_id, b.date, b.quantity, b.status FROM room a LEFT JOIN room_calendar b on a.id = b.room_id where b.status = 1");
        return $query->result_array();
    }
    

}
?>