<?php
	$id_income_transection = $_GET['id_income_transection'];
	$link = mysqli_connect("localhost","root","","daily_account");
		if(!$link){
			echo "Failed to connect: ".mysqli_error($link);
		}	
	$warning = "";
	$income_transection = array();
	if(isset($_POST['Delete']))
	{
		
		$id_income = $_POST['income_id'];
		$amount = $_POST['Amount'];
		$description = $_POST['Description'];
		$dateTime = $_POST['dateAndTime'];
		$id_income_transection = $_POST['id_income_transection'];
		 
		$is_delete = mysqli_query($link, " DELETE FROM income_transection WHERE Id_income_transection=$id_income_transection");
		if($is_delete){
			$warning = "Successfully deleted";
		}
		else{
			$warning = "something went wrong: ".mysqli_error($link);
		}
	}
	if($id_income_transection >= 0) {
		$query_res = mysqli_query($link,"SELECT * FROM income_transection WHERE Id_income_transection = $id_income_transection");
		$income_transection = mysqli_fetch_array($query_res);
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
				<div class="side_menu_items" >
					HOME
				</div>
			</a>
			<<a href="income.php">
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
		<div class="main_page">
			<form action="" method="POST">
				<!--name-->
				<input type="hidden" value="<?php echo $income_transection['Id_income_transection']; ?>" name="id_income_transection">
				<div class="row"><?php echo $warning; ?></div>
				<div class="row">
					<div class="item-name">Income Name</div>
					<div class="item-input">
						<select class="box-design" readonly name="income_id" required="require">						
							<option value="">--Select income--</option>
							<?php
							$link = mysqli_connect("localhost","root","","daily_account");
							if(!$link){
								echo "Failed to connect: ".mysqli_error($link);
							}	

							$query_res = mysqli_query($link,"SELECT * FROM income");
							if( $query_res ) {
								while( $row = mysqli_fetch_array($query_res) ) {

									if($row['Id_income'] == $income_transection['id_income']) {
										?>
											<option selected="selected" readonly value="<?php echo $row['Id_income']; ?>"><?php echo $row['Income_name']; ?></option>
										<?php
									}else{
									?>
									<option value="<?php echo $row['Id_income']; ?>"><?php echo $row['Income_name']; ?></option>
									<?php } }
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
						placeholder="Amount" readonly required="require" value="<?php if(isset($income_transection['amount'])){  echo $income_transection['amount']; }else { echo '';} ?>"/>		
					</div>
					<div class="clear-fix"></div>
				<div>
				<!-- Description -->
				<div class="row">
					<div class="item-name">Description</div>
					<div class="item-input">
						<textarea class="box-design" row="5" col="2" type= "text" readonly name="Description" ><?php if(isset($income_transection['description'])){ echo $income_transection['description']; }else{ echo '';} ?></textarea>
					</div>
					<div class="clear-fix"></div>
				<div>
				<!-- date and time -->
				<div class="row">
					<div class="item-name">Date of income</div>
					<div class="item-input">
						<input class="box-design" type="date" readonly required="require" name="dateAndTime" value="<?php if(isset($income_transection['date_time'])){  echo $income_transection['date_time']; }else { echo '';} ?>"/>
					</div>
					<div class="clear-fix"></div>
				<div>
				<!-- submit -->
				<div class="row">
					<div class="item-name">Delete</div>
					<div class="item-input">
						<input class="box-design" type="submit" name="Delete" value="Delete"/>
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