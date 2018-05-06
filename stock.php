<?php
include_once 'Database.php';
include_once 'Format.php';	

?>
<?php
class Stock{
	
    private $db;
    private $fm;
    
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insertstock($data){
    
      //  $stockid = mysqli_real_escape_string($this->db->link,$data['stockid']);
        $qty = mysqli_real_escape_string($this->db->link,$data['qty']);
        $name= mysqli_real_escape_string($this->db->link,$data['name']);
        $model= mysqli_real_escape_string($this->db->link,$data['model']);
        $type= mysqli_real_escape_string($this->db->link,$data['type']);
        $supliername= mysqli_real_escape_string($this->db->link,$data['supliername']);
		$suplieremail = mysqli_real_escape_string($this->db->link,$data['suplieremail']);
	    $partmilage = mysqli_real_escape_string($this->db->link,$data['partmilage']);
	    $price= mysqli_real_escape_string($this->db->link,$data['price']);
        
        if( empty($qty) || empty($name) ||empty($model)|| empty($type) || empty($supliername) ||empty($suplieremail) ||empty($partmilage) ||empty($price)){
           echo ' <div id="logalert" class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Field must be not Empty !</div>';
           
        }else{
            $query = "INSERT INTO stock( qty, name, model, type, supplierName, supplierEmail, part_mileage, price) VALUES('$qty','$name','$model','$type','$supliername','$suplieremail','$partmilage','$price')";
            //echo $query;
			$bInsert = $this->db->insert($query);
				if($bInsert){
					$msg="values insert Success !";
					
					
					
					$this->conn=mysqli_connect("localhost","root","","garage_management_system");
				$query="SELECT sid FROM stock ORDER BY sid DESC LIMIT 1";
				$this->result=mysqli_query($this->conn,$query);
				$this->row=mysqli_fetch_array($this->result);
				$this->sid=$this->row[0];
			
				$this->val='S00'.$this->sid;
				echo $this->val;
				$query="UPDATE stock SET stockid='$this->val' WHERE sid='$this->sid'";
				$this->result=mysqli_query($this->conn,$query);
					
					
					return $msg;
				}
				else{
					$msg="Values not Inserted !";
					return $msg;
				}
				/*$this->conn=mysqli_connect("localhost","root","","garage_management_system");
				$query="SELECT sid FROM stock ORDER BY sid DESC LIMIT 1";
				$this->result=mysqli_query($this->conn,$query);
				$this->row=mysqli_fetch_array($this->result);
				$this->sid=$this->row[0];
			
				$this->val='S00'.$this->sid;
				echo $this->val;
				$query="UPDATE stock SET stockid='$this->val' WHERE sid='$this->sid'";
				$this->result=mysqli_query($this->conn,$query);*/
				
        }
    }

   
    
    
   public function getallstock(){
        $query = "SELECT * FROM stock ";
        $result = $this->db->select($query);
        return $result;
    }
    
    
    public function getnutri(){
        $query = "SELECT * FROM nutritionplan";
        $result = $this->db->select($query);
        return $result;
    }
      public function getStockById($sid){
        $query = "SELECT * FROM stock WHERE sid='$sid'";
        $result = $this->db->select($query);
        return $result;
    }
    
    public function stockUpdate($data,$sid){
        $name = mysqli_real_escape_string($this->db->link,$data['name']);
        $qty = mysqli_real_escape_string($this->db->link,$data['qty']);
        $model= mysqli_real_escape_string($this->db->link,$data['model']);
        $type= mysqli_real_escape_string($this->db->link,$data['type']);
        $supliername= mysqli_real_escape_string($this->db->link,$data['supplierName']);
		$suplieremail= mysqli_real_escape_string($this->db->link,$data['supplieremail']);
		$part_mileage= mysqli_real_escape_string($this->db->link,$data['part_milage']);
		$price= mysqli_real_escape_string($this->db->link,$data['price']);
		
	//	$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		
		
		
		/*if( $name = mysqli_real_escape_string($this->db->link,$data['name']))
		{
			
			
			$query = "SELECT * FROM stock WHERE stockid='$sid'";
			$this->result=mysqli_query($this->conn,$query);
			$this->row=mysqli_fetch_array($this->result);
			
		
			$this->name=$name;
			$this->qty=$this->row[1];
			$this->model=$this->row[3];
			$this->type=$this->row[4];
			$this->supliername=$this->row[5];
			$this->suplieremail=$this->row[6];
			$this->part_mileage=$this->row[7];
			$this->price=$this->row[8];
		}
		if( $qty = mysqli_real_escape_string($this->db->link,$data['qty']))
		{
			
			$query = "SELECT * FROM stock WHERE stockid='$sid'";
			$this->result=mysqli_query($this->conn,$query);
			$this->row=mysqli_fetch_array($this->result);
			
			$this->name=$this->row[2];
			$this->qty=$qty;
			$this->model=$this->row[3];
			$this->type=$this->row[4];
			$this->supliername=$this->row[5];
			$this->suplieremail=$this->row[6];
			$this->part_mileage=$this->row[7];
			$this->price=$this->row[8];
		}
		*/
		
		
		
       if($name== "" || $qty ==""|| $model="" || $type="" || $supliername="" || $suplieremail="" || $part_mileage="" || $price=""){
         
        }else{
            $query = "UPDATE stock SET name = '$name',qty = '$qty',model='$model',type='$type',supplierName='$supliername',supplierEmail='$suplieremail',part_mileage='$part_mileage',price='$price' WHERE stockid ='$sid'";
            
			$updated_row = $this->db->update($query);
             if($updated_row){
             $msg=' <div id="logalert" class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Brand Update Successfully !</div>';
            return $msg;
             }

            else{
                $msg=' <div id="logalert" class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Brand could not be Update !</div>';
            return $msg;
            }
        }
    }
    
    public function delstock($sid){
        $sid = mysqli_real_escape_string($this->db->link,$sid);
        $query = "DELETE FROM stock WHERE sid = '$sid'";
        $deldata = $this->db->delete($query);
        if($deldata){
             $msg=' <div id="logalert" class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Remove Successfully !</div>';
            return $msg;
           
        }else{
             $msg=' <div id="logalert" class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Brand could not be Removed !</div>';
            return $msg;
        }
        
    }
	
}
?>