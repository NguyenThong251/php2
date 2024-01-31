<?php
namespace model;
use Dotenv\Dotenv;
use PDO, PDOException;
class db
{

    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "php2";
    private $username = "root";
    private $password = "";
    public $conn;
    public function connect()
    {
            $dotenv = Dotenv::createImmutable(__DIR__. '/../');
            $dotenv->load();
            $this->conn = null;

            try {
                $this->conn = new PDO("mysql:host=".$_ENV["Host"].";dbname=" .$_ENV["Database"], $_ENV["Username"],$_ENV["Password"]);
            } catch (PDOException $exception) {
                echo "Connection error: " . $exception->getMessage();
            }

                return $this->conn;
            }
    }