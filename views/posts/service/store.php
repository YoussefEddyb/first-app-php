<?php 
    require_once('../../../app/models/Post.php');

    if(in_array($_SERVER['REQUEST_METHOD'], ['POST'])) {
        $title = $_REQUEST['title'] ? htmlspecialchars($_REQUEST['title']) : "" ;
        $content = $_REQUEST['content'] ? htmlspecialchars($_REQUEST['content']) : "" ;
        $source = $_FILES['image']['tmp_name'];
        $destination = 'images/' . $_FILES['image']['name'];
        move_uploaded_file($source, $destination);
        $category_id = $_REQUEST['category_id'] ? htmlspecialchars($_REQUEST['category_id']) : "" ;
        //save
        $post = new Post();
        $post->addPost($title,$content,$destination,$category_id);
        header("Location:../index.php");
    }