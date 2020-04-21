<?php


class Users extends Controller
{
    public function __construct()
    {
        
    }

    public function index(){
        //should be there in case nothing is loaded
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

    public function log_in(){
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
}