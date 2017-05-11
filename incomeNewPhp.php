<?php

	$link = mysqli_connect("localhost","root","","daily_account");
	if(!$link){
		echo "Failed to connect: ".mysqli_error($link);
	}
	
	
	if(count($_POST) < 2) //we want to show the current item name in the input field
	{		
		$id = $_POST['id'];
		$queryString = 'SELECT Income_name FROM income WHERE Id_income = '.$id;
		$query_res = mysqli_query($link, $queryString);
		if($query_res)
		{
			$name = mysqli_fetch_row($query_res);
			echo json_encode($name);
		}	
	}
	else
	{
		if($_POST['id'] == null) //Item inserting code 
		{
			$name = $_POST['name'];
			$queryString = "SELECT * FROM income WHERE Income_name = '".$name."'";
			$query_res = mysqli_query($link, $queryString);
			if(mysqli_num_rows($query_res) > 0)
			{
				$message = "Item name already exist!";			
			}
			else{		
				$queryString = "INSERT INTO income (Income_name) VALUES ('".$name."')";
				$query_res = mysqli_query($link, $queryString);
				if($query_res)
				{
					$message = "Successfully Inserted!";
				}
				else
					$message = ":( Not inserted";
			}
			echo json_encode($message);
		}
		else if($_POST['name'] == '') //we've sent empty string to identify the delete option. 
		{
			$id = $_POST['id'];
			$queryString = 'DELETE FROM income WHERE Id_income = '.$id;
			$query_res = mysqli_query($link, $queryString);
			if($query_res)
			{
				$message = "Successfully Deleted!";
				echo json_encode($message);
			}
		}
		else{					//$_POST has id & name both value for updating the items. 
			$id = $_POST['id'];
			$name = $_POST['name'];
			$queryString = "SELECT * FROM income WHERE Income_name = '".$name."'";
			$query_res = mysqli_query($link, $queryString);
			if(mysqli_num_rows($query_res) > 0)
			{
				$message = "Sorry! Item name already exist!";			
			}
			else{		
				$queryString = "UPDATE income SET Income_name = '".$name."' WHERE Id_income = ".$id;
				$query_res = mysqli_query($link, $queryString);
				if($query_res)
				{
					$message = "Successfully Updated!";
				}
			}
			echo json_encode($message);
		}
		
	}
?>



