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
        $this->userModel = $this->model('User');
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
                'title' => trim($_POST['title']),
                'post' =>  trim($_POST['post']),
                'user_id' => $_SESSION['user_id'],
                'price' => trim($_POST['price']),
                'title_err' => '',
                'post_err' => '',
                'price_err' => '',
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
               if ($this->postModel->addPost($data)){
                   flash('addedPost','Post added');
                   redirect('Posts');
               }
                redirect('Posts');
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

    public function edit($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'title' => trim($_POST['title']),
                'post' =>  trim($_POST['post']),
                'user_id' => $_SESSION['user_id'],
                'price' => trim($_POST['price']),
                'title_err' => '',
                'post_err' => '',
                'price_err' => '',
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
                if ($this->postModel->updatePost($data)){
                    $idNr = $data['id'];
                    flash('updatedPost','Post updated');
                    redirect('Posts/show/' . $data['id']);
                }
            }else{
                $this->view('posts/edit', $data);
            }
        }else{
            // get existing post
            $post = $this->postModel->getPostById($id);
            $user = $this->userModel->getUserById($post->user_id);

            $data = [
                'title' => $post->title,
                'post' =>  $post->post,
                'id' => $id,
                'user' => $user,
            ];
            //check for owner
            if ($post->user_id != $_SESSION['user_id']){
                flash('cantEdit','Only ' . "'" . $data['user']->name . "' can edit this post");
                redirect('Posts');
            }else{
                $data = [
                    'title' => $post->title,
                    'post' =>  $post->post,
                    'id' => $id,
                    'user' => $user,
                ];

                $this->view('posts/edit', $data);
            }

        }

    }

    public function show($id){
        $post = $this->postModel->getPostById($id);
        $user = $this->userModel->getUserById($post->user_id);

        $data = [
            'post' => $post,
            'user' => $user,
        ];
        $this->view('posts/showPost', $data);
    }

    public function delete($id){
        if ($_SERVER['REQUEST_METHOD'] == POST){
            if ($this->postModel->deletePost($id)){
                flash('deleted', 'Postimi u fshi.');
                redirect('Posts');
            }else{
                die("Ka nje problem me serverin.");
            }
        }else{
            redirect('Posts');
        }
    }
}