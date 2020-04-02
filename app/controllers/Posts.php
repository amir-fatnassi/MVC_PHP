<?php 
    class Posts extends Controller {
        public function __construct()
        {
            if(!isLoggedIn()){
                redirect('users/login');
            }

            $this->postmodel = $this->model('Post');
            $this->usermodel = $this->model('User');
        }
        public function index(){
            $posts = $this->postmodel->getPost();
            if(count($posts) > 5){
                $post = array_slice($posts, 0, 5);
            }
            $user = $this->usermodel->getUserById($_SESSION['user_id']);
            $data = [
                'post' => $post,
                'posts' => $posts,
                'user' => $user
            ];

            $this->view('posts/index', $data);
        }

        public function new_post(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                

                $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'title' => trim($post['title']),
                    'category' => trim($post['category']),
                    'user_id' => $_SESSION['user_id'],
                    'image' => '',
                    'content' => trim($post['content']),
                    'title_err' => '',
                    'category_err' => '',
                    'image_err' => '',
                    'content_err' => ''
                ];
                if(empty($data['title'])){
                    $data['title_err'] = 'please enter title';
                }
                if(empty($data['category'])){
                    $data['category_err'] = 'please enter category';
                }
                if(empty($data['content'])){
                    $data['content_err'] = 'please enter content';
                }
                $imgFile = $_FILES['image']['name'];
                $imgDir = $_FILES['image']['tmp_name'];
                $imgSize = $_FILES['image']['size'];
                if(!empty($imgFile)){
                    $upload_dir = UPLOADROOT.'/upload';
                    $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
                    $valid_Ext = array('jpg', 'jpeg', 'gif', 'png');
                    if(in_array($imgExt, $valid_Ext)){
                        if($imgSize < 50000000000){
                            $data['image'] = rand(100, 100000).'.'.$imgExt;
                            move_uploaded_file($imgDir, $upload_dir.'/'.$data['image']);
                        }else{
                            $data['image_err'] = "Sorry, your file is too large.";
                        }
                    }else{
                        $data['image_err'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    }
                }else{
                    $data['image_err'] = 'Please select image file';
                }

                if(empty($data['title_err']) && empty($data['category_err']) && empty($data['image_err']) && empty($data['content_err'])){
                    if($this->postmodel->addPost($data)){
                        flash('post_message', 'Post Added');
                        redirect('posts');
                    }else{
                        die('Something went wrong');
                    }
                }else {
                    $this->view('posts/new_post', $data);
                }

            }else{
                $data = [
                    'title' => '',
                    'category' => '',
                    'user_id' => '',
                    'image' => '',
                    'content' => ''
                ];
    
                $this->view('posts/new_post', $data);
            }
        }

        public function edit($id){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                

                $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'id' => $id,
                    'title' => trim($post['title']),
                    'category' => trim($post['category']),
                    'user_id' => $_SESSION['user_id'],
                    'image' => '',
                    'content' => trim($post['content']),
                    'title_err' => '',
                    'category_err' => '',
                    'image_err' => '',
                    'content_err' => ''
                ];
                if(empty($data['title'])){
                    $data['title_err'] = 'please enter title';
                }
                if(empty($data['category'])){
                    $data['category_err'] = 'please enter category';
                }
                if(empty($data['content'])){
                    $data['content_err'] = 'please enter content';
                }
                $imgFile = $_FILES['image']['name'];
                $imgDir = $_FILES['image']['tmp_name'];
                $imgSize = $_FILES['image']['size'];
                if(!empty($imgFile)){
                    $upload_dir = UPLOADROOT.'/upload';
                    $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
                    $valid_Ext = array('jpg', 'jpeg', 'gif', 'png');
                    if(in_array($imgExt, $valid_Ext)){
                        if($imgSize < 50000000000){
                            $data['image'] = rand(100, 100000).'.'.$imgExt;
                            move_uploaded_file($imgDir, $upload_dir.'/'.$data['image']);
                        }else{
                            $data['image_err'] = "Sorry, your file is too large.";
                        }
                    }else{
                        $data['image_err'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    }
                }else{
                    $data['image_err'] = 'Please select image file';
                }

                if(empty($data['title_err']) && empty($data['category_err']) && empty($data['image_err']) && empty($data['content_err'])){
                    if($this->postmodel->updatePost($data)){
                        flash('post_message', 'Post Updated');
                        redirect('posts');
                    }else{
                        die('Something went wrong');
                    }
                }else {
                    $this->view('posts/edit', $data);
                }

            }else{

                $post = $this->postmodel->getPostById($id);

                if($post->user_id != $_SESSION['user_id']){
                    redirect('posts');
                }

                $data = [
                    'id' => $id,
                    'title' => $post->title,
                    'category' => $post->category,
                    'image' => $post->image,
                    'content' => $post->content,
                ];
    
                $this->view('posts/edit', $data);
            }
        }

        public function update_profil($id){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                

                $user = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'id' => $id,
                    'name' => trim($user['name']),
                    'photo' => '',
                    'name_err' => '',
                    'photo_err' => ''
                ];
                if(empty($data['name'])){
                    $data['name_err'] = 'please enter name';
                }
                $imgFile = $_FILES['photo']['name'];
                $imgDir = $_FILES['photo']['tmp_name'];
                $imgSize = $_FILES['photo']['size'];
                if(!empty($imgFile)){
                    $upload_dir = UPLOADROOT.'/upload';
                    $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
                    $valid_Ext = array('jpg', 'jpeg', 'gif', 'png');
                    if(in_array($imgExt, $valid_Ext)){
                        if($imgSize < 50000000000){
                            $data['photo'] = rand(100, 100000).'.'.$imgExt;
                            move_uploaded_file($imgDir, $upload_dir.'/'.$data['photo']);
                        }else{
                            $data['photo_err'] = "Sorry, your file is too large.";
                        }
                    }else{
                        $data['photo_err'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    }
                }else{
                    $data['photo_err'] = 'Please select photo file';
                }

                if(empty($data['name_err']) && empty($data['photo_err'])){
                    if($this->usermodel->updateUser($data)){
                        flash('post_message', 'User Updated');
                        redirect('posts');
                    }else{
                        die('Something went wrong');
                    }
                }else {
                    $this->view('posts/update_profil', $data);
                }

            }else{

                $user = $this->usermodel->getUserById($_SESSION['user_id']);

                $data = [
                    'id' => $id,
                    'name' => $user->name,
                    'photo' => $user->photo
                ];
    
                $this->view('posts/update_profil', $data);
            }
        }

        public function profil($id){
            $posts = $this->postmodel->getPost();
            if(count($posts) > 5){
                $post = array_slice($posts, 0, 5);
            }
            $user = $this->usermodel->getUserById($id);
            $myPost = $this->postmodel->getMyPost($id);
            $data = [
                'mypost' => $myPost,
                'post' => $post,
                'user' => $user
            ];

            $this->view('posts/profil', $data);
        }

        public function show($id){
            $posts = $this->postmodel->getPost();
            if(count($posts) > 5){
                $posts = array_slice($posts, 0, 5);
            }
            $post = $this->postmodel->getPostById($id);
            $users = $this->usermodel->getUserById($post->user_id);
            $user = $this->usermodel->getUserById($_SESSION['user_id']);
            $data = [
                'posts' => $posts,
                'post' => $post,
                'users' => $users,
                'user' => $user
            ];

            $this->view('posts/show', $data);
        }

        public function delete($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if($this->postmodel->deletePost($id)){
                    flash('post_message', 'Post Deleted');
                    redirect('posts');
                }else{
                    die('something went wrong');
                }
            }else{
                redirect('posts');
            }
        }
    } 