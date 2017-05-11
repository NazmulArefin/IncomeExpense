$(document).ready(function(){
	var id_income;
	

//--------------------------------adding Code-----------------//
	$("#addNewItem").click(function(){
		$("#IncomeTable").hide();
		$("#addItemField").show();
	});
	
	$("#submit").click(function(e){
		e.preventDefault();
		var income_name = $("#name").val();
		id_income = null; 
		$.ajax({
			type: "POST",
			url: "incomeNewPhp.php", 
			data: {id: id_income, name: income_name},
			dataType: 'json',
			success: function(data){
				alert(data);											
			}
		});	
	});
	$("#cancel").click(function(){
		$("#IncomeTable").show();
		$("#addItemField").hide();
	});
	
//--------------------------------Deleting Code-----------------//
	$(".delete").click(function(){		
		var result = confirm("Are you sure you want to delete this?");
		if (result) 
		{
			id_income = $(this).attr('value');
			var task = ''; 
			$.ajax({
				type: "POST",
				url: "incomeNewPhp.php", 
				data: {id: id_income, name: task},
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
		$("#IncomeTable").hide();
		id_income = $(this).attr('value');
		$.ajax({
			type: "POST",
			url: "incomeNewPhp.php", 
			data: {id: id_income},
			dataType: 'json',
			success: function(data){
				$("#update_name").val(data);
				// alert(data);
			}	 		
		});
		
	});
	$("#update_submit").click(function(e){
		e.preventDefault();
		var income_name = $("#update_name").val();
		$.ajax({
			type: "POST",
			url: "incomeNewPhp.php", 
			data: {id: id_income, name: income_name},
			dataType: 'json',
			success: function(data){
				alert(data);											
			}
		});	
	});
	$("#edit_cancel").click(function(){
		$("#IncomeTable").show();
		$("#editItemField").hide();
	});
});




