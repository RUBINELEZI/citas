<?php


class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Register function
    public function register($data){
        $this->db->query('INSERT INTO users(name, email, password) VALUES(:name, :email, :password)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    // Find user by email
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function findUserByName($name){
        $this->db->query('SELECT * FROM users WHERE name = :name');
        $this->db->bind(':name', $name);

        $row = $this->db->single();

        // Check row
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function validateLoginPass($email, $name,  $password){
        $this->db->query('SELECT * FROM users WHERE email = :email OR name = :name');
        $this->db->bind(':email', $email);
        $this->db->bind(':name', $name);


        $row = $this->db->single();
        $hashedPass =  $row->password;


        if(password_verify($password , $hashedPass)){
            return $row;
        } else {
            return false;
        }
    }

}