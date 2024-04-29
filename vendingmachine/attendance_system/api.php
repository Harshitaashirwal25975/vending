<?php 

if(isset($_GET['id']))// and isset($_POST['newDeviceactive'])
{
	$id = $_GET['id'];
	echo("ID = $id");
	$sql = "SELECT * FROM attendance where id= \"$id\" ORDER BY time DESC LIMIT 1";
	include 'conn.php';
	
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
		$row = $result->fetch_assoc();
		
		//print_r($row);
		$att = '0';
		if($row['attendance'] == "IN")
		{
			print("<br>pressent");
			$att = 'OUT';
		}
		
		if($row['attendance'] == "OUT")
		{
			print("<br>Absent");
			$att = "IN";
			
		}
		$id =$row['id'];
		$name=$row['name'];
		
		$sql = "INSERT INTO attendance (id, name, time, attendance) VALUES (\"$id\",\"$name\",now(), \"$att\");";
		print("<br>");
		$result = $conn->query($sql);
		if($result == 1)
		{
			echo("DONE");
		}
	}
	
	
}

?>