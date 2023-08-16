

    //Save
    $(document).on('click','#btnRegister',function(e) {
        
        var data = $("#registersmgmtform").serialize();
       alert(data);
        $.ajax({
            data: data,
            type: "post",
            url: "backend/saveregistermgmt.php",
            success: function(dataResult) {
                var dataResult = JSON.parse(dataResult);
                if(dataResult.statusCode == 200) {
                    alert('Data updated successfully !'); // Redirect to guestlist.php after successful save
                    window.location.href = "guestlist.php";
                }
                else if(dataResult.statusCode == 201) {
                    alert(dataResult);
                }
            }
        });
    });
    
    //Edit info
    $(document).on('click','.update',function(e) 
    {
        var id=$(this).attr("data-id");
        var Firstname=$(this).attr("data-Firstname");
        var Lastname=$(this).attr("data-Lastname");
        var Age=$(this).attr("data-Age");
        var District=$(this).attr("data-District");
        var Locale=$(this).attr("data-Locale");
        var guesttype=$(this).attr("data-guesttype");
     
        $('#id_e').val(id);
        $('#editfirstname').val(Firstname);
        $('#editsurname').val(Lastname);
        $('#editage').val(Age);
        $('#editlocale').val(Locale);
        $('#editdistrict').val(District);
        $('#guesttype_edit ').val(guesttype);
    });

    //Update 
    $(document).on('click','#updatenewguestmgmt',function(e) {
        var data = $("#editposmgmtform").serialize();
    
        $.ajax({
            data: data,
            type: "POST",
            url: "backend/saveregistermgmt.php",
            success: function(dataResult){
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode==200){
                        $('#editadminteammgmt').modal('hide');
                        alert('Data updated successfully !!!!'); 
                        location.reload();						
                    }
                    else if(dataResult.statusCode==201){
                        alert(dataResult);
                    }
            }
        });
    });

    $(document).on("click", ".delete", function() { 
        var id=$(this).attr("data-id");

        $('#id_d').val(id);
        
    });

    
$(document).on("click", "#deleteguestmgmt", function() { 

	var data = $("#formguestdeletemgmt").serialize();

	$.ajax({
		type: "POST",
        url: "backend/saveregistermgmt.php",
        data:{
			type:3,
			id: $("#id_d").val()
		},
		success: function(dataResult){
            $('#deleteguestModal').modal('hide');
            alert('Data deleted successfully !'); 
            location.reload();	
		
		}
	});
});


