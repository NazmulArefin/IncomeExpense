<?php
	include('DBhelper.php');
	$warning = "";
	if(isset($_POST['submit']))
	{
		
		$id_income = $_POST['income_id'];
		$amount = $_POST['Amount'];
		$description = $_POST['Description'];
		$dateTime = $_POST['dateAndTime'];
		$is_active = 1; 

		$income_transection = array();

		$income_transection['id_income'] = $id_income;
		$income_transection['date_time'] = $dateTime;
		$income_transection['description'] = $description;
		$income_transection['is_active'] = $is_active;
		$income_transection['amount'] = $amount;		
		
		$link = mysqli_connect("localhost","root","","daily_account");
		if(!$link){
			echo "Failed to connect: ".mysqli_error($link);
		}
		else{
		$is_insert = table_value_insert("income_transection", $income_transection);
		if($is_insert){
			$warning = "inserted";
		}
		else{
			$warning = "something went wrong: ".mysqli_error($link);
		}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="main.css"><!-- 
	<link rel="stylesheet" type="text/css" href="income.css"> -->
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
	<link rel="stylesheet" href="C:\xampp\htdocs\hw\jquery-ui-1.12.1.custom\jquery-ui.css">
	<script type="text/javascript" src="incomeTransScript.js"></script>
</head>
<body>
	<div class="header">
		<div class="head_center">
		</div>		
	</div>
	<div class="main_panel">
		<div class="side_menu">
			<a href="main.php">
				<div class="side_menu_items" >
					Home
				</div>
			</a>
			<a href="income.php">
				<div class="side_menu_items" >Income</div>
			</a>
			<a href="expense.php">
				<div class="side_menu_items"> Expense</div>
			</a>
			<a href="income-transaction.php">
				<div class="side_menu_items" style="color: Black; background-color: #22c3bb">Income transaction</div>
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
		<div class="main_page">
			
			<button id="add_income">Add income</button>
			<div id="income"></div>
			<form action="" method="POST">
				<!--name-->
				<div class="row"><?php echo $warning; ?></div>
				<div class="row">
					<div class="item-name">Income Name</div>
					<div class="item-input">
						<select class="box-design" name="income_id" required="require">						
							<option value="">--Select income--</option>
							<?php
							$link = mysqli_connect("localhost","root","","daily_account");
							if(!$link){
								echo "Failed to connect: ".mysqli_error($link);
							}	

							$query_res = mysqli_query($link,"SELECT * FROM income");
							if( $query_res ) {
								while( $row = mysqli_fetch_array($query_res) ) {
									?>
									<option value="<?php echo $row['Id_income']; ?>"><?php echo $row['Income_name']; ?></option>
									<?php } 
									}
									?>
						</select>						
					</div>
					<div class="clear-fix"></div>
				</div>
				<!-- Amount -->
				<div class="row">
					<div class="item-name">Amount</div>
					<div class="item-input">
						<input class="box-design" type="number" name="Amount"
						placeholder="Amount" required="require"/>		
					</div>
					<div class="clear-fix"></div>
				</div>
				<!-- Description -->
				<div class="row">
					<div class="item-name">Description</div>
					<div class="item-input">
						<textarea class="box-design" row="5" col="2" name="Description" placeholder="Description"></textarea>
					</div>
					<div class="clear-fix"></div>
				</div>
				<!-- date and time -->
				<div class="row">
					<div class="item-name">Date of income</div>
					<div class="item-input">
						<input class="box-design" type="date" required="require" id="datepicker" name="dateAndTime"/>
					</div>
					<div class="clear-fix"></div>
				</div>
				<!-- submit -->
				<div class="row">
					<div class="item-name">Send</div>
					<div class="item-input">
						<input class="box-design" type="submit" name="submit"/>
					</div>
					<div class="clear-fix"></div>
				</div>
				
			</form>
		</div>
		<div class="clear"></div>
	</div>
	<div class="footer_panel">
		
	</div>
	<script src="C:\xampp\htdocs\hw\jquery-ui-1.12.1.custom\query-ui.js"></script>
	<script>
		$( function() {
		$( "#datepicker" ).datepicker({
		  changeMonth: true,
		  changeYear: true
		});
		} );
	</script>
</body>
</html>