<?php
session_start();
error_reporting(0);
require_once "config.php";

if(isset($_POST['username']))
  {
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    echo $password;
    $param_password = password_hash($password, PASSWORD_DEFAULT);
    echo $param_password;
    $query=mysqli_query($con,"select id from users where  username='$username' && password='$password' ");
    $ret=mysqli_fetch_array($query);
    echo $ret;
    if($ret>0){
      $_SESSION['detsuid']=$ret['id'];
     header('location:upload.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }
  ?>