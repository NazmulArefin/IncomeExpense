$(document).ready(function(){
	/*$("._div").hide();
	$("#sky").show();
	$("#on").dblclick(function(){
		$("#light").slideDown(1000);
	});
	$("#off").dblclick(function(){
		$("#light").slideUp(1000);
	});	*/
	//Color Chooser
	// $("._div").click(function(){
		// var bg = $(this).css('background-color');
		// $("#area").css('background-color',bg);
	// });
	
	// $("#on").dblclick(function(){
		// $("#light").css('width',"+=100px");
	// });
	// $("#off").dblclick(function(){
		// $("#light").css('width',"-=100px");
	// });	
	

	// $("#font").click(function(){
		// $("#area").css('font-family','arial');
	// });

	// $("#fontBig").click(function(){
		// $("#area").css('font-size','+=10px');
	// });

	// $("#fontSmall").click(function(){
		// $("#area").css('font-size','-=10px');
	// });

	// $("._div").click(function(){
		// var Color = $(this).css('background-color');
	// });/* 
		// $("#area").css('color',Color);
	
	$(".tab a").click(function(){
		$("._div").hide();
		var id = $(this).attr('href');
		$(id).show();
		$(id).animate({'height':'+=20px','width':'200px'},3000);
	});
	$("#submit").click(function(e){
		e.preventDefault();
		var a = $("#name").val();
		if(a.length <=0 ) {
			$("#name").css('background-color','red');
			$("#warning").html('<h1 style="color:red;">a is required</h1>');
		}
		var name = $("#name").val();
		var b = $("#b").val();
		$.ajax({
			type: "POST",
			url: "newphp.php", 
			data: {name: name, university: b},
			dataType: 'json',
			success: function(data){
				alert(data.name);
				alert(data.university);
			}			
		});
	}); 

	$(".edit").click(function(e){
		e.preventDefault();
		var id = $(this).atrr('href');
		$.ajax({
			type: "POST",
			url: "newphp.php", 
			data: {id: id},
			dataType: 'json',
			success: function(data){
				$("#income-name").val(data.income_name);
				$("#view-table").hide();
				$("#edit-form-area").show();
			}			
		});		
	});
	$(document).on('click', '#submit',function(e){
		e.preventDefault();
		var id = $(this).atrr('href');
		$.ajax({
			type: "POST",
			url: "newphp.php", 
			data: {id: id},
			dataType: 'json',
			success: function(data){
				$("#income-name").val(data.income_name);
				$("#view-table").hide();
				$("#edit-form-area").show();
			}			
		});			
	});
	//accordion jquery code
	
	// $(".acc").hide();
	// var count = 0;
	// var id = "";
	// var same = "";
	// $("a").click(function(){		
		// $(".acc").slideUp(800);
		// id = $(this).attr('href');
		// if(id != same )
		// {
			// $(id).slideDown(800);
			// same = id; 
			// count = 0;
		// }
		// else{
			// if(count%2 == 1){
				// $(id).slideDown(800);
			// }
			// count = count+1;
		// }
	// });
	
	$("#addNewItem").click(function(){
		$("#addItemField").show();		
	});
	
});










