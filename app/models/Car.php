<?php
require_once '../app/libraries/Database.php';

class Car {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getCars(){
        $this->db->query('SELECT * FROM cars');
        return $this->db->resultSet();
    }

    public function getCarById($id){
        $this->db->query('SELECT * FROM cars WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
}
