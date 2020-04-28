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
                //sanitize the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => '',
                ];

                // VALIDATE EMAIL    
                if(empty($data['email'])){
                    $data['email_err'] = 'Please add username or email';
                }
                
                 // VALIDATE PASSWORD   
                 if(empty($data['password'])){
                    $data['password_err'] = 'Please add correct password';
                }elseif(strlen($data['password']) < 6 ){
                    $data['password_err'] = 'Password should have at least 6 characters.';
                }

                if(empty($data['email_err']) && empty($data['password_err'])){
                    die('sucess');
                }else{
                    $this->view('home', $data);
                }

                
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
            //sanitize the data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['pass']),
                'confirm_pass' => trim($_POST['re_pass']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_pass_err' => '',
               
            ];

             // VALIDATE NAME    
             if(empty($data['name'])){
                $data['name_err'] = 'Please add username.';
            }
            

            // VALIDATE EMAIL    
            if(empty($data['email'])){
                $data['email_err'] = 'Please add email.';
            }
            
             // VALIDATE PASSWORD   
             if(empty($data['password'])){
                $data['password_err'] = 'Please add password';
            }elseif(strlen($data['password']) < 6 ){
                $data['password_err'] = 'Password should have at least 6 characters';
            }

            //VALIDATE CONFIRM PASSSWORD
            if($data['password'] != $data['confirm_pass_err']){
                $data['confirm_pass_err'] = 'Passwords did not match';
            }

            if(empty($data['email_err']) && empty($data['password_err'] &&  empty($data['name_err']) && empty($data['confirm_pass_err']))){
                die('sucess');
            }else{
                $this->view('inc/signup', $data);
            }
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