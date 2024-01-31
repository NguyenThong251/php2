<?php
namespace model;
class user{

    //$db
    private $conn;
    private $table_name = "user";
    // object listdb
    public $id;
    public $name;
    public $img;
    public $price;
    public $hide;
    public $dacbiet;
    public $view;
    public $bestseller;
    public $iddm;

    public function __construct($db) {
        $this->conn = $db;
    }

}
?>