<?php
session_start();
if(!isset( $_SESSION['email'] )) {
	header("Location:main.php");
}

	//include('DBhelper.php');
	$link = mysqli_connect("localhost","root","","daily_account");
	if(!$link){
		echo "Failed to connect: ".mysqli_error($link);
	}
	$warning = "";
	/* if(isset($_POST['submit']))
	{
		
		$expense = $_POST['expense'];
		$is_active = 1; 

		$expense_array = array();

		$expense_array['expense_name'] = $expense;	
		
		$link = mysqli_connect("localhost","root","","daily_account");
		if(!$link){
			echo "Failed to connect: ".mysqli_error($link);
		}
		else{
			$is_insert = table_value_insert("expense", $expense_array);
			if($is_insert){
				$warning = "inserted";
			}
			else{
				$warning = "something went wrong: ".mysqli_error($link);
			}
		}
	} */	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="main.css"><!-- 
	<link rel="stylesheet" type="text/css" href="expense.css"> -->
	<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="expenseScript.js"></script>
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
</head>
<body>
	<div class="header">
		<div class="head_center">
		</div>		
	</div>
	<div class="main_panel">
		<div class="side_menu">
			<a href="main.php">
				<div class="side_menu_items" >Home</div>
			</a>
			<a href="income.php">
				<div class="side_menu_items" >Income</div>
			</a>
			<a href="expense.php">
				<div class="side_menu_items" style="color: Black; background-color: #22c3bb"> Expense</div>
			</a>
			<a href="income-transaction.php">
				<div class="side_menu_items" >Income transaction</div>
			</a>
			<a href="expense-transaction.php">
				<div class="side_menu_items" >Expense transaction</div>
			</a>
			<a href="expenseInfo.php">
				<div class="side_menu_items">expense Info</div>
			</a>
			<a href="expenseInfo.php">
				<div class="side_menu_items">Exp Info</div>
			</a>
			<a href="logout.php">
				<div class="side_menu_items">Log Out</div>
			</a>
						
			<div class="clear"></div>
		</div>
		<div class="main_page">
			<fieldset>
				<legend>Expense Chart</legend> 
				<div id="expenseTable">	
					<table class="table">
						<thead class="thead-inverse">
							<th>expense</th>
							<th><button class="button button2" id="addNewItem">Add Item</button></th>
						</thead>
						<tbody>
							<?php 
								$queryString = "SELECT * FROM expense ORDER BY expense_name";
								$query_res = mysqli_query($link, $queryString);
								while($row = mysqli_fetch_array($query_res))
								{?>
								<tr>
									<td id="expense_column"><?php echo $row['expense_name']; ?></td>
									<td>
										<i style="cursor: pointer; color: #4CAF50;" class="fa fa-pencil-square-o fa-lg edit" aria-hidden="true" value="<?php echo $row['id_expense']; ?>"></i>
										<i style="padding-left: 5px; cursor: pointer; color: red;" class="fa fa-trash-o fa-lg delete" aria-hidden="true" value="<?php echo $row['id_expense']; ?>"></i>
									</td>
								</tr>
								<?php
								}
							?>
						</tbody>
					</table>
									
				</div>
				
				<?php //echo $_SESSION['email']; ?>
	<!-- ---------------------------------------------------------------------------------->
	<!-- ----------------------------------------adding items----------------------------->
	<!-- ---------------------------------------------------------------------------------->
				<div id="addItemField">
					<form action="" method="POST">
						<!--name-->
						<div class="row"><?php echo $warning; ?></div>
						<div class="row">
							<div class="item-name">expense Name</div>
							<div class="item-input">
								<input class="box-design" id="name" required="required" type="text" name="expense">					
							</div>
							<div class="clear-fix"></div>
						</div>
						
						<!-- submit -->
						<div class="row">
							<div class="item-input">
								<input class="box-design" id="submit" type="submit" name="submit" value="Add" />
							</div>
							<div class="clear-fix"></div>						
						</div>
						<div class="row">
							<div class="item-input">
								<button class="box-design" id="cancel">Close</button>	
							</div>
							<div class="clear-fix"></div>						
						</div>
					</form>
				</div>
	<!-- ---------------------------------------------------------------->
	<!-- ------------------------------------------------editing items -->
	<!-- ---------------------------------------------------------------->
				<div id="editItemField">
					<form action="" method="POST">
						<!--name-->
						<div class="row" id="message"><?php echo $warning; ?></div>
						<div class="row">
							<div class="item-name">expense Name</div>
							<div class="item-input">
								<input id="update_name" class="box-design" required="required" type="text" name="expense_edit">					
							</div>
							<div class="clear-fix"></div>
						</div>
						
						<!-- submit -->
						<div class="row">
							<div class="item-input">
								<input class="box-design" id="update_submit" type="submit" name="submit" value="Update" />
							</div>
							<div class="clear-fix"></div>						
						</div>
						<div class="row">
							<div class="item-input">
								<button class="box-design" id="edit_cancel">Close</button>	
							</div>
							<div class="clear-fix"></div>						
						</div>
					</form>
				</div>			
			</fieldset>
		</div>		
		<div class="clear"></div>
	</div>
	<div class="footer_panel">
		
	</div>

</body>
</html>