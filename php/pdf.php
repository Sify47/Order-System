<?php 
// session_start();
// include "../db_conn.php";

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