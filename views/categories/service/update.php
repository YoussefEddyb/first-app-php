<?php 
    require_once('../../../app/models/Category.php');

    $name = "";
    $id="";
    if(in_array($_SERVER['REQUEST_METHOD'], ['POST'])) {
        $name = $_REQUEST['name'] ? htmlspecialchars($_REQUEST['name']) : "" ;
        $id = $_REQUEST['id'] ? htmlspecialchars($_REQUEST['id']) : "" ;
        $category = new Category();
        $newCategory = $category->updateCategory($id,$name);
        header("Location:../index.php");
    }