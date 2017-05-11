<?php
session_start();
	$link = mysqli_connect("localhost","root","","daily_account");
		if(!$link){
			echo "Failed to connect: ".mysqli_error($link);
		}
	$email = $_GET['email'];
	$warning = "";
	$query = "SELECT * FROM user WHERE email = '".$email."'";
	$query_res = mysqli_query($link, $query);
	$profile = mysqli_fetch_array($query_res);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
</head>
<body>
	<div class="header">
		<div class="head_center">
		</div>		
	</div>
	<div class="main_panel">
		<div class="side_menu">	
			<a href="main.php">
				<div class="side_menu_items" style="color: Black; background-color: #22c3bb">
					HOME
				</div>
			</a>
			<a href="income.php">
				<div class="side_menu_items" >Income</div>
			</a>
			<a href="expense.php">
				<div class="side_menu_items"> Expense</div>
			</a>
			<a href="income-transaction.php">
				<div class="side_menu_items" >Income transaction</div>
			</a>
			<a href="expense-transaction.php">
				<div class="side_menu_items" >Expense transaction</div>
			</a>
			<a href="incomeInfo.php">
				<div class="side_menu_items"><i class="fa fa-cc-mastercard fa-3g" aria-hidden="true"></i> Income Info</div>
			</a>
			<a href="expenseInfo.php">
				<div class="side_menu_items"><i class="fa fa-cc-mastercard fa-3g" aria-hidden="true"></i> Exp Info</div>
			</a>
			<div class="clear"></div>
		</div>
		<div class="main_panel">
			<div class="main_page">
				<table style="margin:40px;">
					<tr style="font-size: 20px; color: #59ABE3; text-align: center;"> <td>Welcome <?php echo $profile['full_name']; ?></td></tr>
				</table>
				<img style=" margin-left: 40px; height: 200px; width: 200px; border-radius: 50%;" src="<?php echo $profile['profile_picture_path']; ?>"/>
				
			</div>			
		</div>
		<div class="clear"></div>
	</div>
	<footer>
		
	</footer>

</body>
</html>