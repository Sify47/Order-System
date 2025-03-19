<?php 
session_start();
include "../db_conn.php";
    $order_id = $_GET['order_id'];
      $page = $_POST['page_name'];
      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $state = $_POST['state'];
      $product1 = $_POST['pro_name'];
      $price1 = $_POST['price'];
      $quantity_1 = $_POST['quantity_1'];

      $product2 = $_POST['pro_name2'];
      $price2 = $_POST['price2'];
      $quantity_2 = $_POST['quantity_2'];

      $product3 = $_POST['pro_name3'];
      $price3 = $_POST['price3'];
      $quantity_3 = $_POST['quantity_3'];

      $product4 = $_POST['pro_name4'];
      $price4 = $_POST['price4'];
      $quantity_4 = $_POST['quantity_4'];

      $del_price = $_POST['del_price'];
      $comment = $_POST['comment'];

      if(empty($name)){
        $em = "Name is required"; 
        header("Location: ../home.php?error=$em");
        exit;
     }else if(empty($page)){
        $em = "Page Name is required"; 
        header("Location: ../home.php?error=$em");
        exit;
     }else if(empty($phone)){
        $em = "Phone is required"; 
        header("Location: ../home.php?error=$em");
        exit;
     }else if(empty($address)){
        $em = "Address is required"; 
        header("Location: ../home.php?error=$em");
        exit;
     }else{
        $sql = "UPDATE orders SET page_name=?, name=?, phone=? , address=? ,state=? , product1=? , quantity_1=? , price=? , delivery_price=? , comment=? , product2=? , quantity_2=? , price2=? , product3=? , quantity_3=? , price3=? , product4=? , quantity_4=? , price4=?  WHERE order_id=?";
          $stmt = $conn->prepare($sql);
          $res = $stmt->execute([$page, $name, $phone , $address,$state,$product1,$quantity_1,$price1,$del_price,$comment , $product2 , $quantity_2 , $price2 , $product3 , $quantity_3 , $price3 , $product4 , $quantity_4 , $price4 , $order_id ]);
     }
    
    if ($res){
        header("Location: ../single_order.php?order_id=$order_id?success");
    }