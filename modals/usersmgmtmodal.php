
<!-- Delete Modal HTML -->
<div id="delusersmgmt" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="users.php" id="formusersdeletemgmt">
					<div class="modal-header">						
						<h4 class="modal-title">Delete users</h4>
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_d" name="id" class="form-control">	
            
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value="Cancel">
						<button onClick="window.location.reload()" type="submit" id ="deleteusersmgmt" name ="deleteusersmgmt" class="btn btn-danger" id="delete">Delete</button>
					</div>

				</form>
			</div>
		</div>
	</div>

	 <!-- Edit Users Modal -->              
	 <div class="modal fade" id="editadminusersmgmt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           
           <form method="POST" action="users.php" id="editposmgmtform" name="editposmgmtform" enctype="multipart/form-data">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                    <div class="modal-body">
                  <input type="hidden" id="id_u" name="id" class="form-control">
                            
                  <div class="form-group" id="formusers">
                      <label><b>First Name</b></label>
                      <input type="text" name="editfullname" id="editfullname" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' placeholder="Enter First Name" required>
                  </div>

                  <div class="form-group" id="formusers">
                      <label><b>Email</b></label>
                      <input type="text" name="editemail" id="editemail" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' placeholder="Enter Email" required>
                  </div>

                  <div class="form-group" id="formusers">
                      <label><b>Username</b></label>
                      <input type="text" name="editusername" id="editusername" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' placeholder="Enter Username" required>
                  </div>
                  
                  <div class="form-group" id="formusers">
                      <label><b>Password</b></label>
                      <input type="text" name="editpassword" id="editpassword" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' placeholder="Enter Password" required>
                  </div>

                  <div class="form-group" id="formusers">
                      <label><b>User Type</b></label>
                      <select class="form-control my-2" id="pvusertype_edit" name="pvusertype" required
															style='background-color: white;text-align:left;width:200px;border: 1px solid #ccc;margin-bottom: 15px;!important'>
															<option value="0">--Select User Type--</option>
															<option value="2">Admin</option>
															<option value="5">User </option>
													</select>
                  </div>

                  <div class="modal-footer">
                    <input type="hidden" value="2" name="type">
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button onClick="window.location.reload()" type="submit" id="updatenewusersmgmt" name="updatenewusersmgmt" class="btn btn-success">Update</button>
                  </div>
             </div>
           </form>
         </div>
       </div>
     </div>


     <!-- Add Users Modal -->              
  <div class="modal fade" id="addadminusersmgmt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           
           <form method="POST" action="users.php" id="usersmgmtform" name="usersmgmtform" enctype="multipart/form-data">
           <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
             <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
        <div class="modal-body">
                    <div class="form-group" id="formusers">
                                  <label><b>First Name</b></label>
                                  <input type="text" name="addfirstname" id="addfirstname" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' placeholder="Enter First Name" required>
                    </div>

                    <div class="form-group" id="formusers">
                        <label><b>Surname</b></label>
                        <input type="text" name="addlastname" id="addlastname" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' placeholder="Enter Surname" required>
                    </div>

                    <div class="form-group" id="formusers">
                        <label><b>Phone</b></label>
                        <input type="text" name="addphone" id="addphone" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' placeholder="Enter Phone" required>
                    </div>

                    <div class="form-group" id="formusers">
                        <label><b>Username</b></label>
                        <input type="text" name="addusername" id="addusername" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' placeholder="Enter Username" required>
                    </div>

                    <div class="form-group" id="formusers">
                        <label><b>Password</b></label>
                        <input type="text" name="addpassword" id="addpassword" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' placeholder="Enter Username" required>
                    </div>

                    <div class="form-group" id="formusers">
                        <label><b>User Type</b></label>
                        <select class="form-control my-2" id="pvusertype_add" name="pvusertype" required
                                style='background-color: white;text-align:left;width:250px;border: 1px solid #ccc;margin-bottom: 15px;!important'>
                                <option value="0">--Select User Type--</option>
                                <option value="2">Admin</option>
                                <option value="5">User </option>
                            </select>
                    </div>

                    <div class="modal-footer">
                        <input type="hidden" value="1" name="type">
                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button onClick="window.location.reload()" type="submit" id="addnewusersmgmt" name="addnewusersmgmt" class="btn btn-success">Save</button>
                    </div>
              </div>
            </form>
          </div>
        </div>
        </div>
     