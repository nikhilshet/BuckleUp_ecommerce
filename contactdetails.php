<?php 
require 'config.php';


if($_SERVER["REQUEST_METHOD"] == "POST"){
$c_fname = $_POST['c_fname'];
$c_lname = $_POST['c_lname'];
$c_email = $_POST['c_email'];
$c_subject = $_POST['c_subject'];
$c_message = $_POST['c_message'];

if (empty($c_fname) || empty($c_lname) || empty($c_email) || empty($c_subject) || empty($c_message )) {
    $_SESSION['message'] = "<h3>Please fill in all the required fields.</h3>";
}else{
    $query = "insert into contact (fname , lname , email , subject , message) values ('$c_fname', '$c_lname' ,'$c_email' ,'$c_subject', '$c_message')";

if(mysqli_query($conn , $query)){
    $_SESSION['message'] =  "<h3>Your Details are submitted</h3>";
}else{
    $_SESSION['message'] = "<h3>There was an error submitting your details. Please try again.</h3>";
}
}
    mysqli_close($conn);
    header("Location: contact.php");
    exit();
}
?>