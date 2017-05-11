$(document).ready(function(){
	var id_expense;
	

//--------------------------------adding Code-----------------//
	$("#addNewItem").click(function(){
		$("#expenseTable").hide();
		$("#addItemField").show();
	});
	
	$("#submit").click(function(e){
		e.preventDefault();
		var expense_name = $("#name").val();
		id_expense = null; 
		$.ajax({
			type: "POST",
			url: "expenseNewPhp.php", 
			data: {id: id_expense, name: expense_name},
			dataType: 'json',
			success: function(data){
				alert(data);											
			}
		});	
	});
	$("#cancel").click(function(){
		$("#expenseTable").show();
		$("#addItemField").hide();
	});
	
//--------------------------------Deleting Code-----------------//
	$(".delete").click(function(){		
		var result = confirm("Are you sure you want to delete this?");
		if (result) 
		{
			id_expense = $(this).attr('value');
			var task = ''; 
			$.ajax({
				type: "POST",
				url: "expenseNewPhp.php", 
				data: {id: id_expense, name: task},
				dataType: 'json',
				success: function(data){
					alert(data);
					location.reload();
				}	 		
			});					
		} 
	});
	
//--------------------------------Updating Code-----------------//	
	$(".edit").click(function(){
		$("#editItemField").show();
		$("#expenseTable").hide();
		id_expense = $(this).attr('value');
		$.ajax({
			type: "POST",
			url: "expenseNewPhp.php", 
			data: {id: id_expense},
			dataType: 'json',
			success: function(data){
				$("#update_name").val(data);
				// alert(data);
			}	 		
		});
		
	});
	$("#update_submit").click(function(e){
		e.preventDefault();
		var expense_name = $("#update_name").val();
		$.ajax({
			type: "POST",
			url: "expenseNewPhp.php", 
			data: {id: id_expense, name: expense_name},
			dataType: 'json',
			success: function(data){
				alert(data);											
			}
		});	
	});
	$("#edit_cancel").click(function(){
		$("#expenseTable").show();
		$("#editItemField").hide();
	});
});




