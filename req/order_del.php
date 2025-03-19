<?php
session_start();
$order_id = $_GET['order_id'];
function deleteById($conn, $id){
    $sql = "DELETE FROM orders WHERE order_id=?";
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$id]);
 
    if($res){
           return 1;
    }else {
         return 0;
    }
}
include '../db_conn.php';

$ress = deleteById($conn , $order_id);
if ($ress){
    $sm = "Successfully deleted!"; 
      header("Location: ../home.php?success=$sm");
      exit;
  }else {
    $em = "Unknown error occurred"; 
    header("Location: ../home.php?error=$em");
    exit;
  }
// echo $order_id;


