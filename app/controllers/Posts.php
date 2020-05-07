<?php


class Posts extends Controller
{

    public function __construct()
    {
        if (!isLogedIn()){
            redirect('Users');
            flash('access_denied', 'You should Sign In first');
        }

        $this->postModel = $this->model('Post');
    }

    public function index(){
        $posts = $this->postModel->getPost();

        $data = [
            'posts' =>$posts
        ];

        $this->view('posts/postsV', $data);
    }

    public function add(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => $_POST['title'],
                'post' =>  $_POST['post'],
                'title_err' => '',
                'post_err' => '',
            ];

            // Validate title
            if(empty($data['title'])){
                $data['title_err'] = 'Please enter a title';
            }

            // Validate title
            if(empty($data['post'])){
                $data['post_err'] = 'Please enter body';
            }

            if(empty($data['title_err'] || $data['post_err'])){
                die('success');
            }else{
                $this->view('posts/add', $data);
            }
        }else{
            $data = [
                'title' => '',
                'post' =>  '',
                'title_err' => '',
                'post_err' => '',
            ];

            $this->view('posts/add', $data);
        }

    }
}