<?php
class Admin_model extends CI_Model{
    public function __construct(){
        $this->sogo = $this->load->database('sogo', TRUE);
        $this->load->database();
    }

    public function branches(){
        $query = $this->sogo->query("SELECT * FROM branches");
        return $query->result_array();
    }

    public function rooms(){
        $query = $this->db->query("SELECT * FROM room where status = 1");
        return $query->result_array();
    }

    public function view_room($id){
        $query = $this->db->query("SELECT * FROM room where id = $id");
        return $query->row_array();
    }

    public function booking(){
        $query = $this->db->query("SELECT
        a.id,
        b.id as `branch_id`,
        c.id as `room_id`,
        a.bookingdate,
        a.checkindate,
        a.name,
        c.name as `room_name`,
        a.checkin,
        a.checkout,
        a.promo_code,
        a.amount,
        a.notes,
        a.email,
        a.phone,
        a.status,
        a.adults,
        a.children,
        a.reference
        FROM `booking` a 
        left join newSogo.branches b on a.branch_id = b.id
        left join room c on a.room_id = c.id;");
        return $query->result_array();
    }

    public function add_room(){
        $data = array(
            'name' => $this->input->post('name'),
            'bed' => $this->input->post('bed'),
            'size' => $this->input->post('size'),
            'description' => $this->input->post('description'),
            'inclusions' => $this->input->post('inclusions'),
            'price' => $this->input->post('price'),
            'discounted_price' => $this->input->post('dprice'),
            'pax' => $this->input->post('pax'),
            'quantity' => $this->input->post('quantity'),
            'pax_children' => $this->input->post('cpax'),
            'status' => 1,
            'branch_id' => $_SESSION['branch_id']
        );
        
        return $this->db->insert('room', $data);
    }

    public function update_room($id){
        $data = array(
            'name' => $this->input->post('name'),
            'bed' => $this->input->post('bed'),
            'size' => $this->input->post('size'),
            'description' => $this->input->post('description'),
            'inclusions' => $this->input->post('inclusions'),
            'price' => $this->input->post('price'),
            'discounted_price' => $this->input->post('dprice'),
            'pax' => $this->input->post('pax'),
            'quantity' => $this->input->post('quantity'),
            'pax_children' => $this->input->post('cpax'),
            'status' => 1
        );
        
        $this->db->where('id', $id);
        return $this->db->update('room', $data);
    }

    public function delete_room($id){
        $query = $this->db->query("DELETE FROM room where id = $id");
        return true;
    }

    public function allocate_room(){
        $idate = $this->input->post('date');
        $iroom = $this->input->post('room_id');

        $queryrcal = $this->db->query("SELECT * FROM room_calendar where `date` = '$idate' and `room_id` = '$iroom'");
        $queryrcalCnt = $queryrcal->num_rows();
        $queryrcalRow = $queryrcal->row();

        foreach ($queryrcal as $row){
                $did = $queryrcalRow->id;
        }

        
        $data = array(
            'room_id' => $this->input->post('room_id'),
            'date' => $this->input->post('date'),
            'quantity' => $this->input->post('quantity'),
            'status' => 1,
        );
        
        if($queryrcalCnt == 0){
            return $this->db->insert('room_calendar', $data);
        }else{
            $this->db->where('id', $did);
            return $this->db->update('room_calendar', $data);
        }
        
    }
    
    public function allocate(){
        $query = $this->db->query("SELECT * FROM room_calendar where status = 1");
        return $query->result_array();
    }

    public function checkDate(){
        $branch_id = $this->input->post('branch_id');
        $date_from = $this->input->post('date_from');
        $date_to = $this->input->post('date_to');

        // $date_from = date('Y/n/j', strtotime($date_from));
        // $date_to = date('Y/n/j', strtotime($date_to));


        $query = $this->db->query("SELECT 
        b.id, 
        b.date, 
        b.room_id, 
        b.quantity, 
        a.branch_id, 
        a.name,
        c.count
        FROM room a 
        left join room_calendar b on a.id = b.room_id 
        left join (SELECT r.quantity, m.name, count(m.name) as count 
          FROM room_calendar r
          left join room m on r.room_id = m.id
          where r.quantity >= 1 and (r.date BETWEEN '$date_from' and '$date_to')
         GROUP by m.name) as c on c.name = a.name
        where b.quantity >= 1 and a.branch_id = '$branch_id' and (b.date BETWEEN '$date_from' and '$date_to');");
        
        // $dataCnt1 = $query->num_rows();
        
        // if($dataCnt1 == 0){
        //     return false;
        // }else{
        //     // true
        //     return $query->result_array();
        // }
        return $query->result_array();
    }

    public function roomInfo(){
        $room_id = $this->input->post('room_id');

        // $date_from = date('Y/n/j', strtotime($date_from));
        // $date_to = date('Y/n/j', strtotime($date_to));


        $query = $this->db->query("SELECT * from room where id = '$room_id'");
        return $query->result_array();
    }

    public function cancelBooking(){
        $booking_id = $this->input->post('booking_id');
        
        $data = array(
            'status' => 4,
        );

        $this->db->where('id', $booking_id);
        $this->db->update('booking', $data);

        $data = array(
            'booking_id' => $booking_id,
            'reason' => $this->input->post('reasonCancel')
        );
        
        return $this->db->insert('reason_cancel', $data);
        
    }

    public function checkinBooking(){
        $booking_id = $this->input->post('booking_id');
        
        date_default_timezone_set('Asia/Manila');
        $date_now = date('F j, Y g:i:a  ');

        $data = array(
            'status' => 1,
            'checkindate' => $date_now,
        );

        $this->db->where('id', $booking_id);
        return $this->db->update('booking', $data);
        
    }

    public function checkoutBooking(){
        $booking_id = $this->input->post('booking_id');
        
        date_default_timezone_set('Asia/Manila');
        $date_now = date('F j, Y g:i:a  ');

        $data = array(
            'status' => 2,
            'checkoutdate' => $date_now,
        );

        $this->db->where('id', $booking_id);
        return $this->db->update('booking', $data);
        
    }
}

?>