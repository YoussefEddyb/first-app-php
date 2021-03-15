<?php 
    require_once('../../../app/models/Category.php');
    if(in_array($_SERVER['REQUEST_METHOD'], ['GET'])) {
        $category = new Category();
        $n=$category->deleteCategory($_GET['id']);
        header("Location:../index.php");
    }