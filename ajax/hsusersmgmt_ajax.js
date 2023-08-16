

    //Save
    $(document).on('click','#addnewusersmgmt',function(e) {
        var data = $("#usersmgmtform").serialize();
        
        $.ajax({
            data: data,
            type: "post",
            url: "backend/saveusersmgmt.php",
            success: function(dataResult){
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode==200){
                        $('#addadminusersmgmt').modal('hide');
                        alert('Data added successfully !'); 
                        location.reload();						
                    }
                    else if(dataResult.statusCode==201){
                    alert(dataResult);
                    }
            }
        });
    });
        
    //Edit info
    $(document).on('click','.update',function(e) {
        
        var id=$(this).attr("data-id");
        var fullname=$(this).attr("data-fullname");
        var email=$(this).attr("data-email");
        var username=$(this).attr("data-username");
        var password=$(this).attr("data-password");

        $('#id_u').val(id);
        $('#editfullname').val(fullname);
        $('#editemail').val(email);
        $('#editusername').val(username);
        $('#editpassword').val(password);
    });

    //Update 
    $(document).on('click','#updatenewusersmgmt',function(e) {
        var data = $("#editposmgmtform").serialize();

        $.ajax({
            data: data,
            type: "post",
            url: "backend/saveusersmgmt.php",
            success: function(dataResult){
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode==200){
                        $('#editadminteammgmt').modal('hide');
                        alert('Data updated successfully !'); 
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

    $(document).on("click", "#deleteusersmgmt", function() { 

        var data = $("#formusersdeletemgmt").serialize();

        $.ajax({
            url: "backend/saveusersmgmt.php",
            type: "POST",
            cache: false,
            data:{
                type:3,
                id: $("#id_d").val()
            },
            success: function(dataResult){
                    $('#delusersmgmt').modal('hide');
                    $("#"+dataResult).remove();
            
            }
        });
    });

    //Change Password 
    $(document).on('click','#changepassword',function(e) {
        var data = $("#editposmgmtform").serialize();

        $.ajax({
            data: data,
            type: "post",
            url: "backend/saveusersmgmt.php",
            success: function(dataResult){
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode==200){
                        $('#editadminteammgmt').modal('hide');
                        alert('Data updated successfully !'); 
                        location.reload();						
                    }
                    else if(dataResult.statusCode==201){
                        alert(dataResult);
                    }
            }
        });
    });