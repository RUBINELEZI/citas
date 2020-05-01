<?php


class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function validateUserEmail($email){
        $this->db->query('SELECT * FROM users WHERE email =  :email');
        $this->db->bind(':email',$email);
        $this->db->singleResult();

        //check to see if it exists
        if ($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

}