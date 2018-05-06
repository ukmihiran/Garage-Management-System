<?php
    include 'stock.php';
?>

<html>
<head>
<link href="Garage/css/style.css" rel="stylesheet">
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
				<li class="active"><a href="payment.html">Update Stock</a></li>
			</div>
			<div class="clear"></div>
		</div>
		</div>

		<div class="wrap">
	<div class="main">
	    <div class="content">

	<form method="POST" action="save.php" style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:#E5B840;">
	
	<h3 class="header-3" >Update Stock</h3>
	
	<br/>
	
	<table>
		<tr>
			<td><p style="color:#E5B840; padding-top:10px;">SID: </td>
			<td><input style="position:absolute; top:135px; left:200px;" class="form-input" name="sid" placeholder="Enter SID"/></td>
		</tr>
		
	
		<tr>
			<td><p style="color:#E5B840; padding-top:20px;">Name: </td>
			<td><input style="position:absolute; top:180px; left:200px;" class="form-input" name="name" placeholder="Enter Name"/></td>
		</tr>
		
		
		<tr>
			<td><p style="color:#E5B840; padding-top:30px;">Qty: </td>
			<td><input style="position:absolute; top:240px; left:200px;" class="form-input" name="qty" placeholder="Enter Quantity"/></td>
		</tr>
		
		<tr>
			<td><p style="color:#E5B840; padding-top:30px;">Model: </td>
			<td><input style="position:absolute; top:290px; left:200px;" class="form-input" name="model" placeholder="Enter Model"/></td>
		</tr>
				
		<tr>
			<td><p style="color:#E5B840; padding-top:30px;">Type: </td>
			<td><input style="position:absolute; top:340px; left:200px;" class="form-input" name="type" placeholder="Enter Type"/></td>
		</tr>
					
		<tr>
			<td><p style="color:#E5B840; padding-top:30px;">Suplier: </td>
			<td>
				<select style="position:absolute; top:390px; left:200px;" class="form-input" name="suplier" placeholder="Select Suplier">
					<option value="1">Suplier 1</option>
					<option value="2">Suplier 2</option>
					<option value="3">Suplier 3</option>
					<option value="4">Suplier 4</option>
					<option value="5">Suplier 5</option>
					
				</select>
			</td>
		</tr>
		
		<tr>
			<td colspan=2>
				<button style='width:100px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; top:450; left:100px' class="form-button" name="save" type="submit">Save</button>
				<button style='width:100px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; top:450; left:250px;'class="form-button" name="reset" type="reset">Reset</button>
			</td>
		</tr>
	</table>
	
</form>
 <div class="panel-body table-responsive">
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        <th><em class="fa fa-cog"></em></th>
                        <th class="hidden-xs">Stock ID</th>
                        <th>Item name</th>
                        <th>Unit Price</th>
						<th>Quantity</th>
                        <th>Description</th>
						<th>Point</th>
                  
                        
                    </tr> 
                  </thead>
                  <tbody id="myTable">
				  
				   <?php
                                        $getallstock = $av->getallstock();
                                        if( $getallstock){
                                            $i=0;
                                            while($result1 = $getallstock->fetch_assoc()){
                                                $i++; 
                                    ?>
				
                         <tr>
                          
                           <th><?php echo $result1['stockid'];?></th>
                           <th><?php echo $result1['qty'];?></th>
                           <th><?php echo $result1['name'];?></th>
                           <th><?php echo $result1['model'];?></th>
                           <th><?php echo $result1['type'];?></th>
                           <th><?php echo $result1['supplierName'];?></th>
						   <th><?php echo $result1['supplierEmail'];?></th>
                           <th><?php echo $result1['part_mileage'];?></th>
                           <th><?php echo $result1['price'];?></th>
							
                           
                          </tr>
                         
                          <?php ?>
                
                          
                          
                        </tbody>
                </table>
              </div>
</div>
</div>
</div>
   
</body>
</html>