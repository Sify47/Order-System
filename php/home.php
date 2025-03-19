<?php 
// session_start();
// include "db_conn.php";
function getAll($conn){
    $sql = "SELECT * FROM orders where page_name=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_SESSION['page_name']]);
 
    if($stmt->rowCount() >= 1){
           $data = $stmt->fetchAll();
           return $data;
    }else {
         return 0;
    }
 }

function getid($conn , $order_id){
     $sql = "SELECT * FROM orders where order_id=?";
     $stmt = $conn->prepare($sql);
     $stmt->execute([$order_id]);
  
     if($stmt->rowCount() == 1){
               $data = $stmt->fetch();
               return $data;
     }else {
          return 0;
     }
  }