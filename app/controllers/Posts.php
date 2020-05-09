<?php


class Posts extends Controller
{

    public function __construct()
    {
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
        if (!isLogedIn()){
           redirect('Users');
           flash('access_denied', 'Duhet te beheni Login ose Register per te shtuar postim.');
        }else{
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Validate upload
                // Get the info from input, store on variables
                $fileName = $_FILES['file']['name'];
                $fileSize = $_FILES['file']['size'];
                $fileTmpLocation = $_FILES['file']['tmp_name'];
                $fileType = $_FILES['file']['type'];
                $fileError = $_FILES['file']['error'];
                //explode filename from extension
                $fileExt = explode('.', $fileName);
                //grab file extension
                $fileActualExtension = strtolower(end($fileExt));
                //allowed file extensions
                $allowed = ['jpg', 'jpeg', 'png'];

                $newFileName = uniqid('', true) . '.' . $fileActualExtension;
                $fileDestination = 'img/uploads/' . $newFileName;


                $data = [
                    'title' => trim($_POST['title']),
                    'post' =>  trim($_POST['post']),
                    'user_id' => $_SESSION['user_id'],
                    'price' => trim($_POST['price']),
                    'img_url' => $fileDestination,
                    'title_err' => '',
                    'post_err' => '',
                    'price_err' => '',
                    'img_err' => '',
                ];

                // Validate title
                if(empty($data['title'])){
                    $data['title_err'] = 'Please enter a title';
                }

                // Validate body
                if(empty($data['post'])){
                    $data['post_err'] = 'Please enter body';
                }


                //check to see filet type
                if (in_array($fileActualExtension,$allowed)){
                    if ($fileError === 0){
                        if ($fileSize < 2000000){

                            if (move_uploaded_file($fileTmpLocation, $fileDestination)){
                                redirect("Posts");
                            }else{
                                $data['img_err'] = 'Something went Wrong';
                            }
                        }else{
                            $data['img_err'] = 'Fotoja eshte shume e madhe';
                        }
                    }else{
                        $data['img_err'] = 'Kan nje problem nuk mun te ngarkohet fotoja';
                    }
                }else{
                    $data['img_err'] = 'Lejonen vetem .jpg .jpeg dhe .png';

                }

                if(empty($data['title_err'] || $data['post_err'] || $data['img_err'] )){
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
                    'img' => '',

                    'title_err' => '',
                    'post_err' => '',
                    'img_err' => '',
                ];

                $this->view('posts/add', $data);
            }
        }



    }

    public function edit($id){
        if (!isLogedIn()){
            redirect('Users');
            flash('access_denied', 'Duhet te beheni Login ose Register.');
        }else{
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Validate upload
                // Get the info from input, store on variables
                $fileName = $_FILES['file']['name'];
                $fileSize = $_FILES['file']['size'];
                $fileTmpLocation = $_FILES['file']['tmp_name'];
                $fileType = $_FILES['file']['type'];
                $fileError = $_FILES['file']['error'];
                //explode filename from extension
                $fileExt = explode('.', $fileName);
                //grab file extension
                $fileActualExtension = strtolower(end($fileExt));
                //allowed file extensions
                $allowed = ['jpg', 'jpeg', 'png'];

                $newFileName = uniqid('', true) . '.' . $fileActualExtension;
                $fileDestination = 'img/uploads/' . $newFileName;


                $data = [
                    'id' => $id,
                    'title' => trim($_POST['title']),
                    'post' =>  trim($_POST['post']),
                    'user_id' => $_SESSION['user_id'],
                    'price' => trim($_POST['price']),
                    'img_url' => $fileDestination,
                    'title_err' => '',
                    'post_err' => '',
                    'price_err' => '',
                    'img_err' => '',
                ];

                // Validate title
                if(empty($data['title'])){
                    $data['title_err'] = 'Please enter a title';
                }

                // Validate title
                if(empty($data['post'])){
                    $data['post_err'] = 'Please enter body';
                }

                //check to see filet type
                if (in_array($fileActualExtension,$allowed)){
                    if ($fileError === 0){
                        if ($fileSize < 2000000){

                            if (move_uploaded_file($fileTmpLocation, $fileDestination)){
                                redirect("Posts");
                            }else{
                                $data['img_err'] = 'Something went Wrong';
                            }
                        }else{
                            $data['img_err'] = 'Fotoja eshte shume e madhe';
                        }
                    }else{
                        $data['img_err'] = 'Kan nje problem nuk mun te ngarkohet fotoja';
                    }
                }else{
                    $data['img_err'] = 'Lejonen vetem .jpg .jpeg dhe .png';
                }

                if(empty($data['title_err'] || $data['post_err'] || $data['img_err'])){
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
                    'img_err' => '',
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
                        'img_err' => '',
                    ];

                    $this->view('posts/edit', $data);
                }

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
        if (!isLogedIn()){
            redirect('Users');
            flash('access_denied', 'Duhet te beheni Login ose Register.');
        }else{
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
}