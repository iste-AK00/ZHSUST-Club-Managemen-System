<?php
    require_once('functions/function.php');
    needtologin();
    $id=$_GET['d'];
    $delete="DELETE FROM user WHERE user_slug='$id'";
    if(mysqli_query($con,$delete)){
        $_SESSION['success_alert']='3';
        header('Location: all-club-person.php');
    }else{
        header('Location: all-club-person.php');
    } 
?>