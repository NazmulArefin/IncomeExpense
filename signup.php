<?php
	include('DBhelper.php');
	$warning = "";
	if(isset($_POST['signup']))
	{
		
		$name = $_POST['name'];		
		$email = $_POST['email'];
		$password = $_POST['password'];
		$re_password = $_POST['re_password'];
		$phone = $_POST['phone'];
		$pro_pic_name = $_FILES['pro_pic']['name'];
		$pro_pic_error = $_FILES['pro_pic']['error'];
		$pro_pic_size = $_FILES['pro_pic']['size'];
		$pro_pic_type = $_FILES['pro_pic']['type'];
		$pro_pic_temp_name = $_FILES['pro_pic']['tmp_name'];
		$is_active = 1; 

		echo $pro_pic_name."=".$pro_pic_error."=".$pro_pic_size."=".$pro_pic_type."=".$pro_pic_temp_name;

		$user_signup = array();

		$user_signup['full_name'] = $name;
		$user_signup['email'] = $email;
		$user_signup['password'] = $password;
		$user_signup['phone'] = $phone;
		$user_signup['profile_picture_path'] = $pro_pic_name;
		$user_signup['is_active'] = $is_active;	
		
		$emailNotMatched = false; 

		$link = mysqli_connect("localhost","root","","daily_account");
		if(!$link){
			echo "Failed to connect: ".mysqli_error($link);
		}
		else{

			$query = "SELECT * FROM user WHERE user.email = '$email'";
			$query_res = mysqli_query($link, $query);
			if(mysqli_num_rows($query_res) > 0)
			{
				$warning = "Account already exist!";
			}
			else if($password == $re_password)
			{
				if($pro_pic_error == 0){
					move_uploaded_file($pro_pic_temp_name, "pics/".$pro_pic_name);
					$user_signup['profile_picture_path'] = "pics/".$pro_pic_name;
				}
				$is_insert = table_value_insert("user", $user_signup);		
				if($is_insert){
					header("location:profile.php?email=$email");
				}
				else{
					$warning = "something went wrong: ".mysqli_error($link);
				}
			}
			else{
				$warning = "Password not matched";
			}
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
			<h3 style="text-align: center; font-family: Arial Black;color: #F83708">Sign Up </h3>
				<form action="" method="POST" enctype="multipart/form-data"> 
					<!--name-->
					<div class="row"><?php echo $warning; ?></div>
					<div class="row">
						<div class="item-name">Full Name</div>
						<div class="item-input">
							<input class="box-design" type="text" name="name" placeholder="Full Name" required="require"/>			
						</div>
						<div class="clear-fix"></div>
					</div>
					<!-- Email -->
					<div class="row">
						<div class="item-name">Email</div>
						<div class="item-input">
							<input class="box-design" type="email" name="email"
							placeholder="Email" required="require"/>		
						</div>
						<div class="clear-fix"></div>
					</div>
					<!-- Password -->
					<div class="row">
						<div class="item-name">Password</div>
						<div class="item-input">
							<input class="box-design" type="Password" name="password" placeholder="Password" required="require"/>
						</div>
						<div class="clear-fix"></div>
					</div>
					<!-- Password -->
					<div class="row">
						<div class="item-name">Re enter Password</div>
						<div class="item-input">
							<input class="box-design" type="Password" name="re_password" placeholder="Password" required="require"/>
						</div>
						<div class="clear-fix"></div>
					</div>
					<!-- Phone -->
					<div class="row">
						<div class="item-name">Phone Number</div>
						<div class="item-input">
							<input class="box-design" type="number"  placeholder="Phone number" required="require" name="phone"/>
						</div>
						<div class="clear-fix"></div>
					</div>
					<!-- Pro pic -->
					<div class="row">
						<div class="item-name">Profile picture</div>
						<div class="item-input">
							<input class="box-design" type="file" name="pro_pic" />
						</div>
						<div class="clear-fix"></div>
					</div>
					<!-- submit -->
					<div class="row">
						<div class="item-name">Sign Up</div>
						<div class="item-input">
							<input class="box-design" type="submit" name="signup" value="signup" />
						</div>
						<div class="clear-fix"></div>
					</div>
					
				</form>
			</div>			
		</div>
		<div class="clear"></div>
	</div>
	<footer>
		
	</footer>

</body>
</html>