<?php 
    require_once('../../../app/models/Category.php');

    $name = "";
    if(in_array($_SERVER['REQUEST_METHOD'], ['POST'])) {
        $name = $_REQUEST['name'] ? htmlspecialchars($_REQUEST['name']) : "" ;
        $category = new Category();
        $newCategory = $category->addCategory($name);
        header("Location:../index.php");
    }