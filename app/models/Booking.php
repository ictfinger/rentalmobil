<?php
require_once '../app/libraries/Database.php';

class Booking {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function createBooking($data){
        $this->db->query('INSERT INTO bookings (customer_id, car_id, start_date, end_date, total_price) VALUES (:customer_id, :car_id, :start_date, :end_date, :total_price)');
        // Bind values
        $this->db->bind(':customer_id', $data['customer_id']);
        $this->db->bind(':car_id', $data['car_id']);
        $this->db->bind(':start_date', $data['start_date']);
        $this->db->bind(':end_date', $data['end_date']);
        $this->db->bind(':total_price', $data['total_price']);

        // Execute
        return $this->db->execute();
    }
}
