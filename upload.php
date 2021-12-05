<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>List Product</title>
</head>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Catalogue Application</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="">Home</a></li>
      <li><a href="listed.php">See Listed Products</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
    </ul>
  </div>
</nav>

  <div class="fill">
    <h2>List Your Product For Free</h2>
    <p>Enter Product Details and get listed in no time</p>

    <form action="upload.php" method="post" enctype="multipart/form-data">
      <label for="name">Product Name: </label>
      <input type="text" name="name" id="name" placeholder="Enter Product Name" required>

      <label for="mrp">Product MRP: </label>
      <input type="text" name="mrp" id="mrp" placeholder="Enter Product MRP" required>

      <label for="size">Size: </label>
      <input type="text" name="size" id="size" placeholder="S, L, XL, XXL">

      <label for="length">Length: </label>
      <input type="text" name="length" id="length" placeholder="Enter Product Length" required>

      <label for="width">Width: </label>
      <input type="text" name="width" id="width" placeholder="Enter Product Width" required>

      <label for="height">Height: </label>
      <input type="text" name="height" id="height" placeholder="Enter Product Height" required>

      <label for="weight">Weight: </label>
      <input type="text" name="weight" id="weight" placeholder="Enter Product Weight" required>

      <label for="image">Upload Image: </label>
      <input type="file" name="image[]" id="image" placeholder="Upload Product Image" required multiple>

      <input type="Submit" value="Submit" name="upload">
    </form>
    <?php
        session_start();

        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
        {
            header("location: index.php");
        }

    if(isset($_POST['name']))
    {
      
      require_once "config.php";
    $idd = $_SESSION["userid"];
    //echo $idd;
    //$con = mysqli_connect($server, $username, $password);

    if(!$conn)
    {
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // if (isset($_POST['image'])) {
  
    //   $filename = $_FILES["image"]["name"];
    //   $tempname = $_FILES["image"]["tmp_name"];    
    //       $folder = "uploadimage/".$filename;
    
    $extension=array('jpeg','jpg','png','gif');
	foreach ($_FILES['image']['tmp_name'] as $key => $value) {
		$filename=$_FILES['image']['name'][$key];
		$filename_tmp=$_FILES['image']['tmp_name'][$key];
		echo '<br>';
		$ext=pathinfo($filename,PATHINFO_EXTENSION);

		$finalimg='';
		if(in_array($ext,$extension))
		{
			if(!file_exists('images/'.$filename))
			{
			move_uploaded_file($filename_tmp, 'images/'.$filename);
			$finalimg=$filename;
			}else
			{
				 $filename=str_replace('.','-',basename($filename,$ext));
				 $newfilename=$filename.time().".".$ext;
				 move_uploaded_file($filename_tmp, 'images/'.$newfilename);
				 $finalimg=$newfilename;
			}
			//$creattime=date('Y-m-d h:i:s');
			//insert
			// $insertqry="INSERT INTO `catalogueapplication`.`product_details`(`filename`) VALUES ('$finalimg')";
			// mysqli_query($conn,$insertqry);
    }
  }


    $name = $_POST['name'];
    $mrp = $_POST['mrp'];
    $size = $_POST['size'];
    $length = $_POST['length'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $width = $_POST['width'];

    //echo "Name of the product is : ".$name;
    $isValid = false;
    if($size == 'S' || $size == 's')
	{
	  if($length==8 && $width==6 && $height==7 && $weight==250)
	  $isValid = true;
	}
	else
	if($size == 'M' || $size == 'm')
	{
	  if($length==9 && $width==7 && $height==8 && $weight==250)
	  $isValid = true;
	}
	else
	if($size == 'L' || $size == 'l')
	{
	  if($length==10 && $width==7 && $height==12 && $weight==250)
	  $isValid = true;
	}
	
	else
	if($size == 'XL' || $size == 'xl')
	{
	  if($length==12 && $width==9 && $height==13 && $weight==500)
	  $isValid = true;
	}
	
	else
	if($size == 'XXL' || $size == 'xxl')
	{
	  if($length==12 && $width==11 && $height==15 && $weight==750)
	  $isValid = true;
	}
	
	if($size=='')
    {
        //below 500 gms then dimension should be are L: 8,H:6,W:7 (cms)
        if($width<500)
        {
            if($length==8 && $width==6 && $height==7)
            $isValid = true;
        }
        //If weight is between 500 to 1000 gms then dimension should be L: 10,H:7,W:12 (cms)
        else
        if($width>=500 && $width<1000)
        {
            if($length==10 && $width==7 && $height==12)
            $isValid = true;
        }
        // If weight is more than 1000 gms then dimension should be L: 12,H:11,W:15 (cms)
        else
        if($width>=1000)
        {
            if($length==12 && $width==11 && $height==15)
            $isValid = true;
        }
    }


    $sql = "INSERT INTO `catalogueapplication`.`product_details` 
    (`id`, `name`, `mrp`, `size`, `length`, `width`, `height`, `weight`, `valid`,`filename`) 
    VALUES ('$idd','$name', '$mrp', '$size','$length', '$width', '$height', '$weight', '$isValid', '$finalimg')";
    
    if($conn->query($sql) == true)
    {
    echo "Successfully Inserted In DataBase";
    }

    if($isValid)
    echo "<p>Congarts you product has been succesfully listed. To check visit <a href='listed.php'>Listing Page</a></p>";
    else
    echo "<p>OHNO! Something went wrong, please check the <a href='Instruction.html'>Instruction Page</a></p>";
    }
  
    
?>
  </div>

</body>
</html>