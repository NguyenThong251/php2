<?php
// require_once 'pdo.php';
namespace model;

class product {
    //$db
    private $conn;
    private $table_name = "sanpham";
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

    
    public function getAllProducts($limit) {
        // $conn = $this->db->getConnection();
        $sql = "SELECT * FROM
                    " . $this->table_name . "
                ORDER BY
                    id DESC
                LIMIT
                {$limit}";
        // $sql = "SELECT * FROM sanpham LIMIT :limit";
        $stmt = $this -> conn->prepare($sql);
        // $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        // return $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $stmt;
    }
    public function AllProducts() {
        // $conn = $this->db->getConnection();
        $sql = "SELECT * FROM
                    " . $this->table_name . "
                ORDER BY
                    id DESC
                ";
        // $sql = "SELECT * FROM sanpham LIMIT :limit";
        $stmt = $this -> conn->prepare($sql);
        // $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        // return $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $stmt;
    }
    public function get_product_sale($limit) {
        $sql = "SELECT * FROM
                    " . $this->table_name . "
                    WHERE bestseller = 1
                ORDER BY
                    id DESC
                LIMIT
                {$limit}";
        $stmt = $this -> conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    public function get_product_hot($limit) {
        $sql = "SELECT * FROM
                    " . $this->table_name . "
                    WHERE dacbiet = 1 
                ORDER BY
                id DESC
                LIMIT
                {$limit}";
                $stmt = $this -> conn->prepare($sql);
                $stmt->execute();
                return $stmt;
            }
    public function get_product_view($limit) {
        $sql = "SELECT * FROM
                    " . $this->table_name . "
                    WHERE view > 0
                ORDER BY
                    id DESC
                LIMIT
                {$limit}";
        $stmt = $this -> conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    // public function create($name,$price,$img,$iddm) {
    //     $sql = "INSERT INTO $this->table_name (name, price, img,iddm) VALUES (?, ?, ?,?)";
    //     $stmt = $this->conn->prepare($sql);
        
    //     // Use $this->name, $this->price, $this->img instead of $stmt->name, $stmt->price, $stmt->img
    //     $stmt->bindParam(1, $name);
    //     $stmt->bindParam(2, $price);
    //     $stmt->bindParam(3, $img);
    //     $stmt->bindParam(4, $iddm);
    //     $stmt->execute();
    // }
    public function create() {
            $sql = "INSERT INTO $this->table_name (name, price, img, iddm) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(1, $this->name);
            $stmt->bindParam(2, $this->price);
            $stmt->bindParam(3, $this->img);
            $stmt->bindParam(4, $this->iddm);
            $stmt->execute();
    
            return true; // Success
    }
    // public function update($name,$price,$img,$iddm,$id) {
    //     $sql = "UPDATE $this->table_name SET name = ?, price = ?, img = ? , iddm = ? WHERE id = ?";
    //     $stmt = $this->conn->prepare($sql);
    
    //     // Use $this->name, $this->price, $this->img instead of $stmt->name, $stmt->price, $stmt->img
    //     $stmt->bindParam(1, $name);
    //     $stmt->bindParam(2, $price);
    //     $stmt->bindParam(3, $img);
    //     $stmt->bindParam(4, $iddm);
    //     $stmt->bindParam(5, $id);
    //     $stmt->execute();
    // }
    public function update() {
       
            $sql = "UPDATE $this->table_name SET name = ?, price = ?, img = ?, iddm = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
        
            $stmt->bindParam(1, $this->name);
            $stmt->bindParam(2, $this->price);
            $stmt->bindParam(3, $this->img);
            $stmt->bindParam(4, $this->iddm);
            $stmt->bindParam(5, $this->id);
            $stmt->execute();
    
            return true; 
    }
    
    // public function delete($id) {
    //     $sql = "DELETE FROM $this->table_name WHERE id = ?";
    //     $stmt = $this->conn->prepare($sql);
    
    //     // Use $this->name, $this->price, $this->img instead of $stmt->name, $stmt->price, $stmt->img
    //     $stmt->bindParam(1, $id);
    //     $stmt->execute();
    //     // return $stmt->affected_rows; 
    // }
    public function delete() {
            $sql = "DELETE FROM $this->table_name WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
        
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
    
            return true; // Success
    }

    function show_product($dssp)
    {
        $html_dssp = '';
        foreach ($dssp as $sp) {
            extract($sp);
            $link="index.php?pg=sanphamchitiet&idpro=".$id;
            $html_dssp .=
                '<a href="'.$link.'" class="product col-md-6 col-lg-4 col-xl-3 text-decoration-none">
                <img src="./img/'.$img.'" alt="">
                <div class="py-2">
                <h3 class="fs-5 text-dark">'.$name.'</h3>
                <p class="fs-5 text-dark"> '.number_format($price).'đ</p>
                </div>
            </a>';
        }
        return $html_dssp;
    }
    function product_admin($dssp)
    {
        $html_dssp = '';
        foreach ($dssp as $sp){
            extract($sp);
            // $link="index.php?pg=sanphamchitiet&idpro=".$id;
            $edit="<a href='/php2/editProduct?id={$id}'><span class='edit'>&#9998; Edit</span></a>";
            $delete="<a href='/php2/deleteProduct?id={$id}'><span class='delete'>&#128465; Delete</span></a>";
            $html_dssp .= '
            <li class="product-item">
            <img src="./img/'.$img.'" alt="Product 1" />
            <span>'.$name.'</span>
            <span class="actions">
                '.$edit.'
                '.$delete.'
            </span>
        </li>
            ';
        }
        return $html_dssp;
    }      
}
// function get_product_all($limi)
// {
//     $sql = "SELECT *
//             FROM sanpham 
//             ORDER BY img DESC
//             LIMIT " . $limi;
//     return pdo_query($sql);
// }
// function get_sp_by_id($id_sp){
//     $sql = "SELECT * FROM sanpham WHERE id=?";
//     return pdo_query_one($sql, $id_sp);
// }
// function get_product_lienquan($id_danhmuc,$id_sp,$limi){
//     $sql = "SELECT * FROM sanpham  WHERE iddm=? AND id<>?   ORDER BY id ASC LIMIT  ".$limi;
//     return pdo_query($sql,$id_danhmuc,$id_sp);
// }
// function get_product_sale($limi){
//     $sql = "SELECT * FROM sanpham WHERE bestseller = 1  ORDER BY id ASC LIMIT ".$limi;
//     return pdo_query($sql);
// }
// function get_product_hot($limi){
//     $sql = "SELECT * FROM sanpham   WHERE dacbiet = 1   ORDER BY id ASC LIMIT  ".$limi;
//     return pdo_query($sql);
// }
// function get_product_view($limi){
//     $sql = "SELECT * FROM sanpham   WHERE view > 0   ORDER BY id ASC LIMIT  ".$limi;
//     return pdo_query($sql);
// }