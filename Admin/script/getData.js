$(document).ready(function(){  
	// code to get all records from table via select box
	$("#selection").change(function() {    
		var id = $(this).find(":selected").val();
		var dataString = 'empid='+ id;    
		$.ajax({
			url: 'getEmployee.php',
			dataType: "json",
			data: dataString,  
			cache: false,
			success: function(employeeData) {
			   if(employeeData) {
					$("#heading").show();		  
					$("#no_records").hide();					
					$("#stid").text(employeeData.id);
					$("#stno").text(employeeData.enroll_number);
					$("#stdate").text(employeeData.date);
          $("#stselc").text(employeeData.selection);
					$("#records").show();		 
				} else {
					$("#heading").hide();
					$("#records").hide();
					$("#no_records").show();
				}   	
			} 
		});
 	}) 
});