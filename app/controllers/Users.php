<?php


class Users extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function index(){
        //Login controller
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
                }else{
                    if ($this->userModel->findUserByName(trim($data['email'])) xor $this->userModel->findUserByEmail(trim($data['email']))){

                    }else{
                        $data['email_err'] = 'Username or email are not correct';
                    }
                }
                
                 // VALIDATE PASSWORD   
                 if(empty($data['password'])){
                    $data['password_err'] = 'Please add a password';
                }elseif(strlen($data['password']) < 6){
                    $data['password_err'] = 'Password should have at least 6 characters.';
                }

                if(empty($data['email_err']) && empty($data['password_err'])){
                    //check password
                    $logedinUser = $this->userModel->validateLoginPass($data['email'], $data['email'] , $data['password']);

                    if($logedinUser){
                        $this->userSession($logedinUser);

                    }else{
                        $data['password_err'] = 'Incorrect password';
                        $this->view('home', $data);
                    }
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
            }else {
                 // Check email
                 if($this->userModel->findUserByName($data['name'])){
                     $data['name_err'] = 'Username is already taken';

                 }
             }
            

            // VALIDATE EMAIL    
            if(empty($data['email'])){
                $data['email_err'] = 'Please add email.';
            }else {
                // Check email
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'This email address is already registered';

                }
            }
            
             // VALIDATE PASSWORD   
             if(empty($data['password'])){
                $data['password_err'] = 'Please add password';
            }elseif(strlen($data['password']) < 6 ){
                $data['password_err'] = 'Password should have at least 6 characters';
            }

            //VALIDATE CONFIRM PASSSWORD
            if($data['password'] != $data['confirm_pass']){
                $data['confirm_pass_err'] = 'Passwords did not match';
            }

            if(empty($data['email_err']) && empty($data['password_err']) &&  empty($data['name_err']) && empty($data['confirm_pass_err'])){
                // Validated
                // Hash the password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //REGISTER
                if($this->userModel->register($data)){
                    redirect('Users');
                    flash('register_success', 'You are now registered and can login');
                }else{
                    die('Something went wrong');
                }
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

    public function userSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_email'] = $user->email;

        redirect('Posts');
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);
        session_destroy();

        redirect('Users');
    }

}