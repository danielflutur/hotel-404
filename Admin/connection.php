<?php 
	$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));     
    $host = $cleardb_url["host"];  
    $user = $cleardb_url["user"];  
    $password = $cleardb_url["pass"];  
    $db_name = substr($cleardb_url["path"],1);  
    
    $active_group = 'default';
	$query_builder = TRUE;
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>