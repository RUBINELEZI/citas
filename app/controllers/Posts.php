<?php


class Posts extends Controller
{

    public function __construct()
    {
        if (!isLogedIn()){
            redirect('Users');
            flash('access_denied', 'You should Sign In first');
        }
    }

    public function index(){
        $data = [];

        $this->view('posts/postsV', $data);
    }
}