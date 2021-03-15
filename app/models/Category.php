<?php

require_once('data_provider.php');

class Category extends DataProvider {

    public function __construct($name = "")
    {
        $this->name = $name;
    }

    public function getAllCategories() {
        $db = $this->connect();
        if($db == null) {
            return;
        }
        $query = $db->query('SELECT * FROM categories');
        $data = $query->fetchAll(PDO::FETCH_OBJ);
        $query = null;
        $db = null;
        return $data;
    }

    public function addCategory($name) {
        $db = $this->connect();
        if($db == null) {
            return;
        }
        $sql = "INSERT INTO categories (name) VALUES (:name)";
        $smt = $db->prepare($sql);
        $smt->execute([
            ":name" => $name,
        ]);
        $smt = null;
        $db = null;
    }

    public function getCategoryById($id) {
        $db = $this->connect();
        if($db == null) {
            return;
        }
        $sql = "SELECT * FROM categories WHERE id = :id";
        $smt = $db->prepare($sql);
        $smt->execute([
            ":id" => $id
        ]);
        $data = $smt->fetch(PDO::FETCH_OBJ);
        $smt = null;
        $db = null;
        if(!$data) {
            return "Data not found 404";
        }
        return $data;
    }

    public function updateCategory($id, $name) {
        $db = $this->connect();
        if($db == null) {
            return;
        }
        $sql = "UPDATE categories SET name = :name WHERE id = :id";
        $smt = $db->prepare($sql);
        $smt->execute([
            ":name" => $name,
            ":id" => $id
        ]);
        $smt = null;
        $db = null;
    }
    public function deleteCategory($id) {
        $db = $this->connect();
        if($db == null) {
            return;
        }
        $sql = "DELETE FROM `categories` WHERE id = :id";
        $smt = $db->prepare($sql);
        $smt->execute([
            ":id" => $id
        ]);
        $smt = null;
        $db = null;
    }
}