<?php
	$link = mysqli_connect("localhost","root","","daily_account");
		if(!$link){
			echo "Failed to connect: ".mysqli_error($link);
		}
		
	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">	
	<script type="text/javascript" src="incomeInfoScript.js"></script>
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
				<div class="side_menu_items" style="color: Black; background-color: #22c3bb"><i class="fa fa-cc-mastercard fa-3g" aria-hidden="true"></i> Income Info</div>
			</a>
			<a href="expenseInfo.php">
				<div class="side_menu_items"><i class="fa fa-cc-mastercard fa-3g" aria-hidden="true"></i> Exp Info</div>
			</a>
			<div class="clear"></div>
		</div>
		<div class="main_page">
			<!-- Search -->
			<form action="" method="POST" >
				<div class="row">
					<div class="Search">
						<input class="box-design" type="sel"
						placeholder="Search" name="income_name" />		
					</div>
					<div class="Search">
						<input class="Search_box" type="submit" name="search" value="Search"/>
					</div>
					<div class="clear"></div>
				</div>
			</form>
			<!-- info -->
			<div id="Warning"></div>
			<div id="main" style="width: 100%; margin: 10px; padding-right: 25px;">
				<table style="width: 100%; font-family: arial; font-size: 15px;">
				  <tr style="text-align: left; background-color: #D8D8D8">
					<th>Serial No</th>
					<th>Income name</th>
					<th>Description</th>
					<th>Amount</th> 
					<th>DateTime</th>
					<th colspan="2">Action</th>
				  </tr>		
					<?php
					$link = mysqli_connect("localhost","root","","daily_account");
					if(!$link){
						echo "Failed to connect: ".mysqli_error($link);
					}	
					$count = 0;
					$query_res = '';
					$per_page = 4;
					$starting_from = 0;
					if(isset($_GET['starting_from'])){
						$starting_from = $_GET['starting_from'];
					}

					$query_str = "SELECT COUNT(*) AS number_of_row FROM income_transection";
					$query_res = mysqli_query($link, $query_str);

					$row = mysqli_fetch_array($query_res);
					$number_of_row = $row['number_of_row'];
					$number_of_page = ceil($number_of_row/$per_page); 



					if( isset($_POST['search']) ) {
						$income_name = $_POST['income_name'];
						$query_str = "SELECT i.income_name, it.Id_income_transection, it.description, it.date_time, it.amount FROM income_transection as it join income as i on it.id_income = i.Id_income where i.income_name LIKE '%$income_name%' ORDER BY i.Income_name";
						$query_res = mysqli_query($link, $query_str);
					}else{
						$query_res = mysqli_query($link,"SELECT i.Id_income,i.income_name,it.Id_income_transection,it.description, it.amount, it.date_time FROM income_transection as it LEFT JOIN income as i ON i.Id_income = it.id_income  limit $starting_from,$per_page");
					}
					if( $query_res ) {
						while( $row = mysqli_fetch_array($query_res) ) {
							$count++;
							?>
							  <tr>
								<td><?php echo $count ?></td>
								<td><?php echo $row['income_name']?></td>
								<td><?php echo $row['description']?></td>
								<td><?php echo $row['amount']?></td>
								<td><?php echo $row['date_time']?></td> 
								<td><a href="#" id = "done">hello</a></td>
								<td id="edit"><a style="color: green; font-weight: bold;" href="income-transaction-edit.php?id_income_transection=<?php echo $row['Id_income_transection'];?>">Edit</a></td>
								<td id="delete"><a style="color: red; font-weight: bold;" href="<?php echo $row['Id_income_transection'];?>">Delete</a></td>
							  </tr>
							  
							<?php
							}
						}?>
						<tfoot> 
						<td colspan="3"><h3>Total Amount</h3></td>
						<td style="text-align: right; font-size: 20px; font-weight: bold;"> 
						 <?php
							if ($query_res != null) {
									$query_str = "SELECT SUM(amount) AS totalAmount FROM income_transection";
									$query_res = mysqli_query($link, $query_str);
									while( $row = mysqli_fetch_array($query_res) ) {
										echo $row['totalAmount'];
									}
								}
						 ?>
						 </td>
					</tfoot>
				</table>
			<?php
			for($i = 1; $i<= $number_of_page; $i++)
			{
				$temp_starting_form = ($i - 1) * $per_page;
				?>
				<a href="?starting_from=<?php echo $temp_starting_form;?>"><?php echo $i; ?></a>
				<?php
			}
			?>
			</div>			
		<div class="clear"></div>
	</div>
	<div class="footer_panel">
		
	</div>
	
</body>
</html>







