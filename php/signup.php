<?php 

if(isset($_POST['email']) && 
   isset($_POST['page_name']) && 
   isset($_POST['pass'])){

    include "../db_conn.php";

    $email = $_POST['email'];
    $page = $_POST['page_name'];
    $pass = $_POST['pass'];
    $phone = $_POST['phone'];

    $data = "email=".$email."&pass=".$pass;
    
    if (empty($page)) {
    	$em = "Page Name is required";
    	header("Location: ../signup.php?error=$em&$data");
	    exit;
    }else if(empty($email)){
    	$em = "Email is required";
    	header("Location: ../signup.php?error=$em&$data");
	    exit;
    }else if(empty($phone)){
    	$em = "Phone is required";
    	header("Location: ../signup.php?error=$em&$data");
	    exit;
    }else if(empty($pass)){
    	$em = "Password is required";
    	header("Location: ../signup.php?error=$em&$data");
	    exit;
    }else {

    	// hashing the password
    	$pass = password_hash($pass, PASSWORD_DEFAULT);

    	$sql = "INSERT INTO users(email, page_name, password , phone) 
    	        VALUES(?,?,?,?)";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$email, $page, $pass , $phone]);

    	header("Location: ../login.php?success=Your account has been created successfully");
	    exit;
    }


}else {
	header("Location: ../signup.php?error=error");
	exit;
}
