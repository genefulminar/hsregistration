
<!-- Delete Modal HTML -->
<div id="deleteguestModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="suguanmgmt.php" id="formdelete">
					<div class="modal-header">						
						<h4 class="modal-title">Delete Menu</h4>
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="text" id="id_d" name="id" class="form-control">	
						<input type="hidden" id="assetid_d" name="assetid" class="form-control">	
						<input type="hidden" id="pvid_d" name="pvid" class="form-control">
            
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="hidden" value="2" name="type">
						<input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value="Cancel">
						<button onClick="window.location.reload()" type="submit" id ="deletesuguan" name ="deletesuguan" class="btn btn-danger" id="delete">Delete</button>
					</div>

				</form>
			</div>
		</div>
	</div>

