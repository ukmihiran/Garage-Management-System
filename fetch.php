<?php
include 'Database.php';
?>
<?php

$db = new Database();
    $q = $_GET['q'];
    $query = "SELECT * FROM stock WHERE stockid = '$q'";
	
if(!empty($_GET['q'])){ 
    $result = $db->select($query);
    if($result){
    while($output = $result->fetch_assoc()){
		
		
	?>
	
	<input type="hidden" name="sid" value="<?= $output['sid'] ?>"/>
	
	<?php
		
    echo '<div class="form-group">
                                                    <label for="EngineCap" class="col-sm-3 control-label">Name</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" value="'.$output['name'].'" name="name" placeholder=""class="form-control">
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <label for="EngineCap" class="col-sm-3 control-label">Qty</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" value="'.$output['qty'].'" name="qty" placeholder=""class="form-control">
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <label for="EngineCap" class="col-sm-3 control-label">Model</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="model" value="'.$output['model'].'" placeholder=""class="form-control">
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <label for="EngineCap" class="col-sm-3 control-label">Type</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="type" value="'.$output['type'].'"placeholder=""class="form-control">
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <label for="EngineCap" class="col-sm-3 control-label">supplierName</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="supplierName" value="'.$output['supplierName'].'"placeholder=""class="form-control">
                                                    </div>
                                                </div><div class="form-group">
                                                    <label for="EngineCap" class="col-sm-3 control-label">supplierEmail</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="supplieremail" value="'.$output['supplierEmail'].'" placeholder=""class="form-control">
                                                    </div>
                                                </div><div class="form-group">
                                                    <label for="EngineCap" class="col-sm-3 control-label">part_Milage</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="part_milage" value="'.$output['part_mileage'].'" placeholder=""class="form-control">
                                                    </div>
                                                </div><div class="form-group">
                                                    <label for="EngineCap" class="col-sm-3 control-label">Price</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="price" value="'.$output['price'].'"placeholder=""class="form-control">
                                                    </div>
                                                </div>';
    
        }
    }
    
}


?>




