<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/registration.css">
	<link rel="stylesheet" type="text/css" href="js/bootstrap.min.css">
	<title>Add time Slot</title>
	<style type="text/css">
		.boxStyle{width: 100%;
			border: 1px solid #ccc;
			background: #FFF;
			margin: 0 0 5px;
			padding: 10px;
			font-style: normal;
			font-variant-ligatures: normal;
			font-variant-caps: normal;
			font-variant-numeric: normal;
			font-weight: 400;
			font-stretch: normal;
			font-size: 12px;
			line-height: 16px;
			font-family: Roboto, Helvetica, Arial, sans-serif;
			
		}
		.wrapper{
			text-align: center;
		}
		body, html {
			height: 100%;
			margin: 0;
		}

		
		.bg { 
			/* The image used */
			background-image: url("images/timeslot.jpg");

			/* Full height */
			height: 100%; 

			/* Center and scale the image nicely */
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
</head>
<body >
	<?php include_once "header.php"; ?>
	<div class="bg" ">
		
		<div class="container">  
			<form id="contact" action="addTimeSlot.php" method="post" enctype="multipart/form-data">

				<input  name="timeSlot" placeholder="Time Slot" type="text" tabindex="1" required autofocus>
				<input style="font-size: larger;background-color: #c2fbb8;font-family: cursive;font-weight: bold;" 
				class="boxStyle" type="submit" name="submit" value="Add Time Slot"> 
				<p class="copyright"></p>

			</form>
			<div class="wrapper">
				<button style="text-align: center;" class="btn btn-default" onclick="document.location.href='adminpage.php'" ><span class='glyphicon glyphicon-chevron-left'> </span>BACK TO THE ADMIN PAGE</button>
			</div>
		</div>
	</div>

</body>
</html>

<?php 
if (isset($_POST['submit'] )&& !empty($_POST['submit']))

{
	$timeSlot=$_POST['timeSlot'];
	if (!(empty($timeSlot) ))
	{
		$var=new AddProduct();
		$var->productAdd($conn);
	}
}

?>

<?php 
class AddProduct{
	public function productAdd($conn)
	{
		$sql="insert into timeSlot(timeslotId,time) values('',?);";

		if(($stmt=$conn->prepare($sql))) {
			$stmt->bind_param("s",$timeSlot);

		}else
		{
			var_dump($conn->error);
		}
		$timeSlot=$_POST['timeSlot'];
		$stmt->execute();
		$stmt->close();
		$_SESSION['msg']="Time Slot Successfully Added";
		header ("Location: adminpage.php" );
	}
}
?>