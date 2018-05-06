
<?php
    include 'stock.php';
    
?>
<?php 
        if(!isset($_GET['sid']) || $_GET['sid'] == NULL){
            echo "<script>window.location = 'stockupdate.php';</script>";
        }else{
            $sid = $_GET['sid'];
        }
    $ab = new Stock();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $Update = $ab->stockUpdate($_POST,$sid);
    }

?>

<html>
<head>

<link rel="stylesheet" type="text/css" href="table.css">
<link href="Garage/css/style.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<title>Update Stock</title>
</head>
<body>
	<div class="wrap">
		<div class="header">
			<img style="position:relative; left:400px; top:10px;" src="Garage/images/logo2.png"/>
		</div>
		
		<input type='button' name='logout' value='Logout' style='position:absolute; top:50%; left:90%; background-color:ash; color:black; width:100px; height:30px; border-radius:45px; border-style:none;'>
		
		
		<div class="header-bottom" style="position:relative; top:20px;">
			<div class="menu">
				<li><a href="ManagerHome.html">Home</a></li>
				<li class="active"><a href="payment.html">Update Items</a></li>
			</div>
			<div class="clear"></div>
		</div>
		</div>

		<div class="wrap">
	<div class="main">
	    <div class="content">
	<div class="row">
	<div class="col-md-8">
	<form method="POST" action="save.php" style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:#E5B840;">
			
</form>
</div>
</div>
 <?php if(isset($Update)){echo $Update;}?>
 <div class="container">
    <div class="row">
	 <?php
                                    $getst = $ab->getStockById($sid);
                                    if($getst){
                                        while($result2 = $getst->fetch_assoc()){
                                     
                                    ?>
    <form  style="color:white;" action="" method="post" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                                           
                                                 <!--Model-->
												<div class="form-group">
                                                    <label for="EngineCap" class="col-sm-3 control-label">Name</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" value="<?php $result2['name'];?>" name="name" class="form-control">
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <label for="EngineCap" class="col-sm-3 control-label">Qty</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" value="<?php $result2['qty'];?>" name="qty" class="form-control">
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <label for="EngineCap" class="col-sm-3 control-label">Model</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="model" value="<?php $result2['model'];?>"class="form-control">
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <label for="EngineCap" class="col-sm-3 control-label">Type</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="type" value="<?php $result2['type'];?>"class="form-control">
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <label for="EngineCap" class="col-sm-3 control-label">supplierName</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="supplierName" value="<?php $result2['supplierName'];?>" class="form-control">
                                                    </div>
                                                </div><div class="form-group">
                                                    <label for="EngineCap" class="col-sm-3 control-label">supplierEmail</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="supplieremail"value="<?php $result2['supplierEmail'];?>" class="form-control">
                                                    </div>
                                                </div><div class="form-group">
                                                    <label for="EngineCap" class="col-sm-3 control-label">part_Milage</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="part_milage"value="<?php $result2['part_mileage'];?>"class="form-control">
                                                    </div>
                                                </div><div class="form-group">
                                                    <label for="EngineCap" class="col-sm-3 control-label">Price</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="price" value="<?php $result2['price'];?>"class="form-control">
                                                    </div>
                                                </div>
												
													<div style=" margin-bottom:10px;margin-left:320px;">
                                                     <input name="submit" type="submit" class="btn btn-default"value="Insert">
                                                     <a type="button" href="stockupdate.php.php"class="btn btn-default" data-dismiss="modal">Back</a>
												</div>
											</form>
									<?php } }?>
        
		
		


</div></div>
</div>
</div>
</div>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>

<script type="text/javascript">
          $(document).ready(function(e){
              $("#search").keyup(function(){
                    $("#here").show();
                  var x =$(this).val();
                  $.ajax({
                      type:'GET',
                      url:'fetch.php',
                      data:'q='+x,
                      success:function(data){
                          $("#here").html(data);
                      }
                  });
              });
           
          });
          
          </script>
</body>
</html>

