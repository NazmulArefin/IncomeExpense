<?php
session_start();
	$link = mysqli_connect("localhost","root","","daily_account");
		if(!$link){
			echo "Failed to connect: ".mysqli_error($link);
		}

	$warning = "";
	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$query_result = mysqli_query($link,"SELECT * FROM user where email = '$email' and password = '$password'");
		// if($query_result)  {

		// }else{
		// 	echo mysqli_error($link);
		// }
		$num_of_row = mysqli_num_rows($query_result);

		if( $num_of_row > 0 ) {
			$_SESSION['email'] = $email;
			header("Location:profile.php?email=$email");
		}
		else{
			$warning = "Wrong email or password";
		}
	}
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
				<div class="login">
					<form action="" method="POST">
					<div class="row" style="color: red;"><?php echo $warning; ?></div>
						<h3 style="text-align: center; font-family: Arial Black;color: #F83708"> Login </h3>
						<div class="row">
							<div class="item-name">Email</div>
							<div class="item-input">
								<input class="box-design" required="required" type="email" name="email">
							</div>
						</div>
						<div class="row">
							<div class="item-name">Password</div>
							<div class="item-input">
								<input class="box-design" required="required" type="Password" name="password">
							</div>
						</div>
						<div class="row">
							<div class="item-input">
								<input class="box-design" type="submit" name="login" value="Login" />
							</div>
						</div>
					</form>
				</div>
				<div class="row" style=" font-size: 15px;">
					<p>Don't have account?</p>
					<a href="signup.php">Sign Up</a>
				</div>
				
			</div>			
		</div>
		<div class="clear"></div>
	</div>
	<footer>
		
	</footer>

</body>
</html>