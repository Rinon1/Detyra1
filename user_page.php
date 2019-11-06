<?php

if(isset($_POST['submit']) && $_POST['submit'] == "Submit") {
    session_start();
    $name = $_POST['firstname'] ?? null;
    $lastn = $_POST['lastname'] ?? null;
    $email = $_POST['email'] ?? null;
    $phone = $_POST['number'] ?? null;
    $msg = $_POST["message"] ?? null;

    if($name == null || $lastn == null || $email == null || $phone == null || $msg == null){
        $_SESSION['error'] = "All fields are required";
        header("Location: index.php");
        exit();
    }
    require_once("connection.php");
    $connection = new Connection();
    $db_connect = $connection->getConnection();

    $query = 'INSERT INTO messages (`firstname`, `lastname`, `email`, `num`, `message`) VALUES (
        "'.$name.'","'.$lastn.'","'.$email.'","'.$phone.'","'.$msg.'")';
    
    $db_connect->query($query);
    $db_connect->close();

    $subject = $email . " has sent you an email";
    $message = $msg . "<br>-- </br>".$name. " " . $lastn ."<br>".$phone;

    mail("rinonkrasniqi@gmail.com", $subject, $message); 
    $_SESSION['success'] = "Email was sent successfully";
    header("Location: index.php");
    exit();
}
