<?php
require_once 'db.php' ;
class User
{
private $conn;
public function __construct(){
    $database =new Db();
    $this->conn =$database->conn;
}
public function get_all_users(){
    $query = "SELECT * FROM users";
    $stmt =$this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function get_user_by_id($id){
    $query = "SELECT * FROM users WHERE userid=:id";
    $stmt =$this->conn->prepare($query);
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
public function create_user($name , $password)
{
$query = "INSERT INTO users (username, userpass) VALUES (:name, :password)";
$stmt =$this->conn->prepare($query);
return $stmt->execute([':name' => $name, ':password' => $password]);

}
public  function update_user($id , $name , $password)
{
$query = "UPDATE users SET username=:name, userpass=:password WHERE userid=:id";
$stmt =$this->conn->prepare($query);
return $stmt->execute([':name' => $name, ':password' => $password, ':id' => $id]);
}
public function delete_user($id){
    $query = "DELETE FROM users WHERE userid=:id";
    $stmt =$this->conn->prepare($query);
    return $stmt->execute([':id' => $id]);
}
}
?>