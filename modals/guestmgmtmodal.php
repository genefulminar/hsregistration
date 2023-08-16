
<!-- Delete Modal HTML -->
<div id="deleteguestModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="guestlist.php" id="formguestdeletemgmt">
					<div class="modal-header">						
						<h4 class="modal-title">Delete guest</h4>
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_d" name="id" class="form-control">	
            
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
          <input type="hidden" value="3" name="type">
						<input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value="Cancel">
						<button onClick="window.location.reload()" type="submit" id ="deleteguestmgmt" name ="deleteguestmgmt" class="btn btn-danger" id="delete">Delete</button>
					</div>

				</form>
			</div>
		</div>
	</div>

  <!-- Add guest Modal -->              
  <div class="modal fade" id="addadminguestmgmt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           
           <form method="POST" action="guestlist.php" id="registersmgmtform" name="registersmgmtform" enctype="multipart/form-data">
           <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Guest</h5>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                    <div class="modal-body">
                  <input type="hidden" id="id_u" name="id" class="form-control">
                            
                  <div class="form-group" id="formguest">
                      <label><b>First Name</b></label>
                      <input type="text" name="addfirstname" id="addfirstname" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' placeholder="Enter First Name" required>
                  </div>

                  <div class="form-group" id="formguest">
                      <label><b>Surname</b></label>
                      <input type="text" name="addlastname" id="addlastname" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' placeholder="Enter Surname" required>
                  </div>

                  <div class="form-group" id="formguest">
                      <label><b>Age</b></label>
                      <input type="text" name="addage" id="addage" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' placeholder="Enter Age" required>
                  </div>

                  <div class="form-group" id="formguest">
                      <label><b>District</b></label>
                      <input type="text" name="adddistrict" id="adddistrict" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' placeholder="Enter District" required>
                  </div>

                  <div class="form-group" id="formguest">
                      <label><b>Locale</b></label>
                      <input type="text" name="addlocale" id="addlocale" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' placeholder="Enter Locale" required>
                  </div>
                  
                  <div class="form-group" id="formguest">
                      <label><b>Guest Type</b></label>
                      <select class="form-control my-2" id="guesttype_add" name="guesttype_add" required
															style='background-color: white;text-align:left;width:200px;border: 1px solid #ccc;margin-bottom: 15px;!important'>
															<option value="0">--Select User Type--</option>
															<option value="1">Active</option>
															<option value="2">Inactive </option>
													</select>
                  </div>

                  <div class="modal-footer">
                    <input type="hidden" value="1" name="type">
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button onClick="window.location.reload()" type="submit" id="btnRegister" name="btnRegister" class="btn btn-success">Save</button>
                  </div>
             </div>
           </form>
         </div>
       </div>
     </div>

	 <!-- Edit guest Modal -->              
	 <div class="modal fade" id="editadminguestmgmt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           
           <form method="POST" action="guestlist.php" id="editposmgmtform" name="editposmgmtform" enctype="multipart/form-data">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Guest</h5>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                    <div class="modal-body">

                  <input type="hidden" id="id_e" name="id" class="form-control">
                            
                  <div class="form-group" id="formguest">
                      <label><b>First Name</b></label>
                      <input type="text" name="editfirstname" id="editfirstname" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' placeholder="Enter First Name" required>
                  </div>

                  <div class="form-group" id="formguest">
                      <label><b>Surname</b></label>
                      <input type="text" name="editsurname" id="editsurname" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' placeholder="Enter Surname" required>
                  </div>

                  
                  <div class="form-group" id="formguest">
                      <label><b>Age</b></label>
                      <input type="text" name="editage" id="editage" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' placeholder="Enter Surname" required>
                  </div>

                  <div class="form-group" id="formguest">
                      <label><b>District</b></label>
                      <input type="text" name="editdistrict" id="editdistrict" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' placeholder="Enter Phone" required>
                  </div>

                  <div class="form-group" id="formguest">
                      <label><b>Locale</b></label>
                      <input type="text" name="editlocale" id="editlocale" class="form-control" style='border: 1px solid #ccc;margin-bottom: 15px;' placeholder="Enter Username" required>
                  </div>
                  
                  <div class="form-group" id="formguest">
                      <label><b>Guest Status</b></label>
                      <select class="form-control my-2" id="guesttype_edit" name="guesttype_edit" required
															style='background-color: white;text-align:left;width:200px;border: 1px solid #ccc;margin-bottom: 15px;!important'>
															<option value="0">--Select Guest Status--</option>
															<option value="1">Active</option>
															<option value="2">Inactive </option>
													</select>
                  </div>

                  <div class="modal-footer">
                    <input type="hidden" value="2" name="type">
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button onClick="window.location.reload()" type="submit" id="updatenewguestmgmt" name="updatenewguestmgmt" class="btn btn-success">Update</button>
                  </div>
             </div>
           </form>
         </div>
       </div>
     </div>