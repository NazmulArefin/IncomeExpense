
$(document).ready(function(){
	$("#done").click(function(e){
		e.preventDefault();
		$("#warning").html(
			'<div style="background-color:red">HEllo</div>'
		);		
	});
	/* var id = (this).attr('href',id_income_transection);
	$.ajax({
		type: "GET",
		url: "newphp.php", 
		data: {value: id},
		dataType: 'json',
		success: function(data){
			
		}
	});			 */
});