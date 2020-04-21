<?php


class Users extends Controller
{
    public function __construct()
    {
        
    }

    public function index(){
        //check for post
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //procced with form
            }else{
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => '',
                ];
    
                $this->view('home', $data);
            }
        }

    public function sign_up(){
    //check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //procced with form
        }else{
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_pass' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_pass_err' => '',
            ];

            $this->view('inc/signup', $data);
        }
    }

    
}