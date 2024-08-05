<?php
class query{
	function connection()
	{
		$con=mysqli_connect('localhost','root','','bus_booking_system');
		return $con;
	}
	function insert($table_name, $assoc_array)
	{
		if(isset($_POST['submit']))
		{
        	$assoc_array =array_slice($assoc_array, 0, -1);
 		}
        $keys = array();
        $values = array();
        foreach($assoc_array as $key => $value){
            $keys[] = $key;
            $values[] = $value;
        }
        $query = "INSERT INTO $table_name(".implode(",", $keys).") VALUES('".implode("','", $values)."')";

       $result= mysqli_query($this->connection(),$query);
       return $query;
        
    }
    function select($tablename,$criteria='',$value='',$criteria2='',$value2=''){
		$sql="SELECT * FROM $tablename";
		if(!empty($criteria)){
			$sql.=" WHERE $criteria='$value'";
		}
		if(!empty($criteria2)){
			$sql.=" AND $criteria2='$value2'";
		}
		$res=mysqli_query($this->connection(),$sql);
		return $res;	
	}
	function delete($tablename,$var,$value)
	{
		$sql="DELETE FROM $tablename WHERE $var='$value'";
		$res=mysqli_query($this->connection(),$sql);
		return $res;
	}
	function update($tablename,$assoc_array,$criteria,$value2)
	{
		$sql="UPDATE $tablename SET ";
		foreach ($assoc_array as $key => $value) {
				$sql.=$key."='$value',";
		}
		$sql=substr_replace($sql,"", -1);
		if(!empty($criteria)){
			$sql.=" WHERE $criteria='$value2'";
		}
		$res=mysqli_query($this->connection(),$sql);
		return $res;
		
           
     }  
}
$query=new query();
?>