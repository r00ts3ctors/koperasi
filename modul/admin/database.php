<?php  
  $db = mysqli_connect('localhost', 'root', ''); // connect ke database dengan user root
  if (!$db) {
      die('Could not connect: ' . mysqli_error($db));
  }

  mysqli_select_db($db, 'kontrak'); // gunakan database cetakdokumen
  
 
  function delete($table, $array) // fungsi untuk delete data 
  {
	  global $db;
	$query = "delete from $table ";
	if(count($array) > 0)
	{
		$query = $query . " where ";
		foreach($array as $key => $value)
		{
			$query = $query . $key . " = '" . $value . "' and ";
		}
	}
	$query = rtrim($query, "and ");
	mysqli_query($db,$query) or die( mysqli_error($db));
  }
  
  function update($table, $array, $condition) // fungsi untuk update data
  {
	  global $db;
	$query = "update $table set ";
	
	foreach($array as $key => $value)
	{
		$query = $query . $key . " = '" . $value . "', ";
	}
	$query = rtrim($query, ", ");
	
	if(count($condition) > 0)
	{
		$query = $query . " where ";
		foreach($condition as $key => $value)
		{
			$query = $query . $key . " = '" . trim($value) . "' and ";
		}
	}
	$query = rtrim($query, "and ");		
	
	mysqli_query($db,$query) or die( mysqli_error($db));
  }
  
  function insert($table, $array) // fungsi untuk insert data
  {
	  global $db;
	$query = "insert into $table ( ";
	foreach($array as $key => $value)
	{
		$query = $query . $key . ", ";
	}
	$query = rtrim($query, ", ");
	$query = $query . " ) values (";
	
	foreach($array as $key => $value)
	{
		$query = $query . "'" . $value . "', ";
	}
	
	$query = rtrim($query, ", ");
	$query = $query . ")";
	
	mysqli_query($db,$query) or die( mysqli_error($db));
  }
  
  function select($table, $array, &$count)
  {
	global $db;
	$query = "select * from $table ";
	
	if(count($array) > 0)
	{
		$query = $query . " where ";
		foreach($array as $key => $value)
		{
			$query = $query . $key . " = '" . $value . "' and ";
		}
	}
	$query = rtrim($query, "and ");

	$result = mysqli_query($db, $query) or die(mysqli_error($db));
	$count = mysqli_num_rows($result);
	return $result;
  }
  
    function getId($table, $col, $prefix, $length)
   {
	   global $db;
      $query = sprintf("select max($col) from $table");    
      $result = mysqli_query($db,$query) or die( mysqli_error($db));
      if (!$result) {
        die('Invalid query: ' . mysql_error());
      }        
      $idStr = mysqli_result($result, 0, 0);

      $nextId = intval(str_replace($prefix, "", mysqli_result($result, 0, 0))) + 1;
      
      return $prefix . str_pad($nextId, $length, '0', STR_PAD_LEFT);
   }  
  
  function mysqli_result($res,$row=0,$col=0){ 
    $numrows = mysqli_num_rows($res); 
    if ($numrows && $row <= ($numrows-1) && $row >=0){
        mysqli_data_seek($res,$row);
        $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        if (isset($resrow[$col])){
            return $resrow[$col];
        }
    }
    return false;
}  
      
?>