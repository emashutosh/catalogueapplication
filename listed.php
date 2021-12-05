<!DOCTYPE html>
<html lang="en">
<head>
  <title>Listed Product </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Catalogue Application</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="">Home</a></li>
      <li><a href="upload.php">List a Product</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
<?php
    session_start();

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
    {
        header("location: index.php");
    }
    require_once "config.php";
    $idd = $_SESSION["userid"];
    $sql = "select * from `product_details` where `id` = $idd";
    $result = mysqli_query($conn,$sql);
    //echo var_dump($result);
    //mysqli_query(connection, query, resultmode
    $num = mysqli_num_rows($result);
    //echo $num;
    //echo " records found in the DataBase<br>";
    
    echo "<h1>Details About The Products in the DataBase for user </h1>".  $_SESSION["username"];
    while($row=mysqli_fetch_assoc($result))
    {
        //echo "Product with name ".$row['name']. " and Product ID = " .$row['id'];
        if($row['valid']==1)
        echo "<p style='background-color:green;'> 
        Product with name ".$row['name'] ." and Product ID = " .$row['sno'] . " has passed the checks and listed succesdully</p> <br>";
        else
        echo "<p style='background-color:red;'> 
        Product with name ".$row['name']. " and Product ID = " .$row['sno'] . 
        " has failed the checks and cannot be listed</p> <br>";
    }
?>
</div>

</body>
</html>
