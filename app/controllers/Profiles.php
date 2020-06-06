<?php


class Profiles extends Controller
{
    public function __construct()
    {
        $this->profileModel = $this->model('Post');
        $this->userModel = $this->model('User');
    }

    public function index($id){
        
       
            $profile = $this->profileModel->getProfilePostsById($id);
            $user = $this->userModel->getUserById($id);;
    
            $data = [
                'profile' => $profile,
                'user' => $user
            ];
            $this->view('profile/profileV', $data);
        
       
    }

}