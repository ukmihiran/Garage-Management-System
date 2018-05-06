<?php
    include 'stock.php';
?>

<?php
    $av = new Stock();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $insertstock = $av->insertstock($_POST);
	
    }
?>


<!DOCTYPE html>
<html>
<head>
<link href="Garage/css/style.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<title>Add Stock</title>
</head>
<body>

	<div class="wrap">
		<div class="header">
			<img style="position:relative; left:400px; top:10px;" src="Garage/images/logo2.png"/>
		</div>
	<form  method="post" action=" ">
			<input type='submit' name='logout' value='Log Out' style='position:absolute; top:5%; left:87%; background-color:ash; color:black; width:100px; height:30px; border-radius:45px; border-style:none;'>;
				
		</form>
		
		<div class="header-bottom" style="position:relative; top:20px;">
			<div class="menu">
				<li><a href="ManagerHome.php">Home</a></li>
				<li class="active"><a href="addstock.php">Add Stock</a></li>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	
	<div class="clear"></div>
		<?php 
		
		if(isset($insertstock)){
			 $insertstock;
			
		}
		?>
	<div class="wrap">
	<div class="main">
	    <div class="content">

	<form method="POST" enctype="multipart/form-data" action="" style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:#E5B840;">
	
	<h3 class="header-3" >Add Item</h3>
	
	<br/>
	
	<table width="400">
	
		<tr>
			<td><p style="color:#E5B840;">Name: </td>
			<td><input style="position:absolute; top:175px; left:220px;" class="form-input" name="name" required  placeholder="Enter Name"/></td>
		</tr>
		
		<!--tr>
			<td><p style="color:#E5B840; padding-top:30px;">SID: </td>
			<td><input style="position:absolute; top:240px; left:220px;" class="form-input" name="stockid" required  placeholder="Enter SID"/></td>
		</tr-->
		
		<tr>
			<td><p style="color:#E5B840; padding-top:30px;">Qty: </td>
			<td><input style="position:absolute; top:240px; left:220px;" min="1" class="form-input" type="number" name="qty" required  placeholder="Enter Quantity"/></td>
		</tr>
		
		<tr>
			<td><p style="color:#E5B840; padding-top:30px;">Model: </td>
			<td><input style="position:absolute; top:300px; left:220px;" class="form-input" name="model" required  placeholder="Enter Model"/></td>
		</tr>
				
		<tr>
			<td><p style="color:#E5B840; padding-top:30px;">Type: </td>
			<td><input style="position:absolute; top:370px; left:220px;" class="form-input" list="type" name="type" required  placeholder="Enter Type"/></td>
			<datalist id="type">
				<option value="ahamed">
				<option value="ahamed">
			</datalist>
		</tr>
		<tr>
			<td><p style="color:#E5B840; padding-top:30px;">supplierName: </td>
			<td><input style="position:absolute; top:435px; left:220px;" class="form-input" name="supliername" required  placeholder="Enter suplier Name"/></td>
		</tr>
		<tr>
			<td><p style="color:#E5B840; padding-top:30px;">supplierEmail: </td>
			<td><input type="email" style="position:absolute; top:500px; left:220px;" class="form-input" name="suplieremail" required  placeholder="Enter suplier Email"/></td>
		</tr>
		
		<tr>
			<td><p style="color:#E5B840; padding-top:30px;">part_Milage: </td>
			<td><input style="position:absolute; top:575px; left:220px;" type="number" min="0" class="form-input" name="partmilage" required  placeholder="Enter part Milage"/></td>
		</tr>
		<tr>
			<td><p style="color:#E5B840; padding-top:30px;">Price: </td>
			<td><input style="position:absolute; top:650px; left:220px;" type="number" min="0" class="form-input" name="price" required  placeholder="Enter price"/></td>
		</tr>
					
		
		
		<tr>
			<td colspan=2>
				<button style='width:100px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; top:650; left:460px' class="form-button" name="submit" type="submit">Add</button>
				<button style='width:100px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; top:650; left:600px;'class="form-button" name="reset" type="reset">Reset</button>
			</td>
		</tr>
	</table>
	
	
</form>
</div>
</div>
</div>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
 <script>
       window.setTimeout(function() {
    $("#logalert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 1000);
      </script> 
</body>
</html>



<?php
include('UserM.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(isset($_POST['logout']))
	{
		$lg=new User();
		$lg->logout();
	}
}
?>

