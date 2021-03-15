<?php

require_once('data_provider.php');

class Post extends DataProvider {

    public function __construct($title = "", $content = "", $image = "",$category_id="")
    {
        $this->title = $title;
        $this->content = $content;
        $this->image =$image;
        $this->category_id = $category_id;
    }

    public function getAllPosts() {
        $db = $this->connect();
        if($db == null) {
            return;
        }
        $query = $db->query('SELECT * FROM posts');
        $data = $query->fetchAll(PDO::FETCH_OBJ);
        $query = null;
        $db = null;
        return $data;
    }

    public function addPost($title,$content,$image,$category_id) {
        $db = $this->connect();
        if($db == null) {
            return;
        }
        $sql = "INSERT INTO posts (`title`, `content`, `image`, `category_id`) VALUES (:title , :content , :image , :category_id)";
        $smt = $db->prepare($sql);
        $smt->execute([
            ":title" => $title,
            ":content" =>  $content,
            ":image" => $image,
            ":category_id" =>  $category_id
        ]);
        $smt = null;
        $db = null;
    }
}