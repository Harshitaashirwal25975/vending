<?php 
if(isset($_GET['id']) & isset($_GET['amount']))
{
	$id = $_GET['id'];
	$amount = $_GET['amount'];
	//echo("ID = $id");
	include 'conn.php';
	$sql = "SELECT * FROM user where rfid= \"$id\"";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
		$row = $result->fetch_assoc();
		
		$name=$row['name'];
		$bal = $row['balance'];
		if($bal > $amount)
		{
			$sql = "UPDATE `user` SET `balance` = balance-'$amount' WHERE `rfid` = '$id'";
			//   echo($sql);
			if ($conn->query($sql) === TRUE) {
			// echo "Recharge successfully";
				//$status = "1";
			} else {
				//$status = "Error: " . $sql . "<br>" . $conn->error;
			}
			$sql = "INSERT INTO `history` (`rfid`, `type`, `amount`, `note`) VALUES ('$id', 'DABIT', '$amount', 'Purchase');";
			 //echo($sql);
			 if ($conn->query($sql) === TRUE) {
				$res['status'] = 1;
				$res['amount'] = $bal-$amount;
				$res['name'] = $name;
				$resJSON = json_encode($res);
				echo($resJSON);
			  } else {
				  
				$res['status'] = 0;
				$res['amount'] = $amount;
				$resJSON = json_encode($res);
				echo($resJSON);
			  }
		}
		else
		{
			
			$res['name'] = $name;
			$res['status'] = -2;
			$res['amount'] = $bal;
			$resJSON = json_encode($res);
			echo($resJSON);
		}
		
	}
	else
	{
		
				$res['status'] = -3;
				$res['amount'] = $amount;
				$resJSON = json_encode($res);
				echo($resJSON);
	}
	
}



?>