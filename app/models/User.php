<?php
require_once '../app/libraries/Database.php';

class User {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        // Check row
        if($this->db->rowCount() > 0){
            return $row;
        } else {
            return false;
        }
    }

    public function register($data){
        $this->db->query('INSERT INTO users (first_name, last_name, email, phone_number, password) VALUES (:first_name, :last_name, :email, :phone_number, :password)');
        // Bind values
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone_number', $data['phone_number']);
        $this->db->bind(':password', $data['password']);

        // Execute
        return $this->db->execute();
    }

    public function login($email, $password){
        $row = $this->findUserByEmail($email);

        if($row == false){
            return false;
        }

        $hashed_password = $row->password;
        if(password_verify($password, $hashed_password)){
            return $row;
        } else {
            return false;
        }
    }
}
