<?php
    class Post {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getPost(){
            $this->db->query('SELECT *, 
                                        posts.id as postId,
                                        users.id as userId
                                        FROM posts 
                                        INNER JOIN users 
                                        ON posts.user_id = users.id
                                        ORDER BY posts.date DESC
                                        ');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getPostById($id){
            $this->db->query('SELECT * FROM posts WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();
            return $row;
        }

        public function getMyPost($id){
            $this->db->query('SELECT * FROM posts WHERE user_id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->resultSet();
            return $row;
        }

        public function addPost($data){
            $this->db->query('INSERT INTO posts (title, category, image, content, user_id) VALUES(:title, :category, :image, :content, :user_id)');
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':category', $data['category']);
            $this->db->bind(':image', $data['image']);
            $this->db->bind(':content', $data['content']);
            $this->db->bind(':user_id', $data['user_id']);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function updatePost($data){
            $this->db->query('UPDATE posts SET title = :title, category = :category, image = :image, content = :content WHERE id = :id');
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':category', $data['category']);
            $this->db->bind(':image', $data['image']);
            $this->db->bind(':content', $data['content']);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }


        public function deletePost($id){
            $this->db->query('DELETE FROM posts WHERE id = :id');
            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

    }