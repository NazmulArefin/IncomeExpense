<?php
	include('DBhelper.php');
	if(isset($_POST['submit']))
	{
		
		$id_expense = $_POST['id_expense'];
		$amount = $_POST['Amount'];
		$description = $_POST['Description'];
		$dateTime = $_POST['dateAndTime'];
		$is_active = 1; 

		$expense_transection = array();

		$expense_transection['id_expense'] = $id_expense;
		$expense_transection['date_time'] = $dateTime;
		$expense_transection['amount'] = $amount;
		$expense_transection['description'] = $description;
		$expense_transection['is_active'] = $is_active;		
		 
		$is_insert = table_value_insert("expense_transection", $expense_transection);
		if($is_insert){
			echo "inserted";
		}
		else{
			echo "something went wrong: ".mysqli_error($link);
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
</head>
<body>
	<div class="header">
		<div class="head_center">
		</div>		
	</div>
	<div class="main_panel">
		<div class="side_menu">
			<a href="main.php">
				<div class="side_menu_items">
					HOME
				</div>
			</a>
			<a href="income.php">
				<div class="side_menu_items" >Income</div>
			</a>
			<a href="expense.php">
				<div class="side_menu_items" > Expense</div>
			</a>
			<a href="income-transaction.php">
				<div class="side_menu_items" >Income transaction</div>
			</a>
			<a href="expense-transaction.php">
				<div class="side_menu_items" style="color: Black; background-color: #22c3bb">Expense transaction</div>
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
			<form action="" method="POST">
				<!--name-->
				<div class="row">
					<div class="item-name">Expense Name</div>
					<div class="item-input">
						<select class="box-design" name="id_expense" required="require">
							<option value="">--Select Expense--</option>
							<?php 
							$link = mysqli_connect("localhost","root","","daily_account");
							if(!$link){
								echo "Failed to connect: ".mysqli_error($link);
							}
							$query_res = mysqli_query($link, "SELECT * FROM expense");
							if($query_res)
							{
								while ($row = mysqli_fetch_array($query_res)) {
									?>
									<option value="<?php echo $row['id_expense'];?>">
										<?php echo $row['expense_name']; ?>
									</option>
							<?php
								}
							}
							?>
						</select>						
					</div>
					<div class="clear-fix"></div>
				<div>
				<!-- Amount -->
				<div class="row">
					<div class="item-name">Amount</div>
					<div class="item-input">
						<input class="box-design" type="number" name="Amount"
						placeholder="Amount" required="require"/>		
					</div>
					<div class="clear-fix"></div>
				<div>
				<!-- Description -->
				<div class="row">
					<div class="item-name">Description</div>
					<div class="item-input">
						<textarea class="box-design" row="5" col="2" name="Description" placeholder="Description"></textarea>
					</div>
					<div class="clear-fix"></div>
				<div>
				<!-- date and time -->
				<div class="row">
					<div class="item-name">Date of income</div>
					<div class="item-input">
						<input class="box-design" type="date" required="require" name="dateAndTime"/>
					</div>
					<div class="clear-fix"></div>
				<div>
				<!-- submit -->
				<div class="row">
					<div class="item-name">Send</div>
					<div class="item-input">
						<input class="box-design" type="submit" name="submit"/>
					</div>
					<div class="clear-fix"></div>
				<div>
			</form>
		</div>
		<div class="clear"></div>
	</div>
	<div class="footer_panel">
		
	</div>

</body>
</html>