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
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="stylesheet" type="text/css" href="DataTables-1.10.13/media/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
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
				<div class="side_menu_items" ><i class="fa fa-cc-mastercard fa-3g" aria-hidden="true"></i> Income Info</div>
			</a>
			<a href="expenseInfo.php">
				<div class="side_menu_items" style="color: Black; background-color: #22c3bb"><i class="fa fa-cc-mastercard fa-3g" aria-hidden="true"></i> Exp Info</div>
			</a>
			<div class="clear"></div>
		</div>
		<div class="main_page">
			<div class="row">
				<div class="col-sm-6">
					<div class="dataTables_length" id="example_length">
						<label>Show 
						<select name="example_length" aria-controls="example" class="form-control input-sm">
							<option value="10">10</option>
							<option value="25">25</option>
							<option value="50">50</option>
							<option value="100">100</option>
						</select> entries</label>
					</div>
				</div>
				<div class="col-sm-6">
					<div id="example_filter" class="dataTables_filter">
						<label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example">
						</label>
					</div>
				</div>
			</div>
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Serial No</th>
						<th>Income name</th>
						<th>Description</th>
						<th>Amount</th> 
						<th>DateTime</th>
						<th colspan="2">Action</th>
					</tr>
				</thead>
				 <tfoot>
					
				</tfoot>
				<tbody>
					<?php
						$count = 0;
						$link = mysqli_connect("localhost","root","","daily_account");
						if(!$link){
							echo "Failed to connect: ".mysqli_error($link);
						}	
						
						$query_res = mysqli_query($link,"SELECT i.Id_income,i.income_name,it.Id_income_transection,it.description, it.amount, it.date_time FROM income_transection as it LEFT JOIN income as i ON i.Id_income = it.id_income");

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
									<td><a style="color: green; font-weight: bold;" href="income-transaction-edit.php?id_income_transection=<?php echo $row['Id_income_transection'];?>">Edit</a></td>
									<td><a style="color: red; font-weight: bold;" href="income-transaction-delete.php?id_income_transection=<?php echo $row['Id_income_transection'];?>">Delete</a></td>
								  </tr>
								  
								<?php
								}
							}?>      
				</tbody>
			</table>		
			<div>
				<h3>total amount:-  
				<?php
					if ($query_res != null) {
						$query_str = "SELECT SUM(amount) AS totalAmount FROM income_transection";
						$query_res = mysqli_query($link, $query_str);
						while( $row = mysqli_fetch_array($query_res) ) {
							echo $row['totalAmount'];
						}
					}
				?>
				</h3>
			</div>
		</div>
	</div>
	<script src="DataTables-1.10.13/media/js/jquery.js"></script>
	<script src="DataTables-1.10.13/media/js/jquery.dataTables.min.js"></script>
	<script src="DataTables-1.10.13/media/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#example').DataTable();
			
		} );
	</script>
</body>
</html>