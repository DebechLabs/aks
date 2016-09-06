<div class = "box box-success">
	<div class = "box-header with-border">
		<h3 class = "box-title"><i class = "fa fa-credit-card"></i> <span>New Incident Report</span></h3>
		<p><b>Incident NR: </b><span><?php echo $new_nr; ?></span></p>
	</div>
	<div class = "box-body">
		<form method="POST" action = "<?php echo base_url(); ?>IncidentReport/newReport">
			<legend>Fault Details</legend>
			<div class = "form-group">
				<label class = "control-label">Site Name</label>
				<input type="text" name="site_name" class = "form-control" required>
			</div>
			<div class = "form-group">
				<label class = "control-label">Fault Description</label>
				<textarea class = "form-control" name = "fault_description" required></textarea>
			</div>

			<div class = "form-group">
				<label class = "control-label">Request ID</label>
				<input type="text" name="request_id" class = "form-control">
			</div>

			<div class = "form-group">
				<label class = "control-label">Date and Time Fault Occured</label>
				<input type="text" name="date_time_fault_occured" class = "form-control">
			</div>

			<legend>Assignees</legend>
			<div class="form-group">
				<label class = "control-label">Assigned Individual(s)</label>
				<select name = "assigned_individuals[]" class = "form-control" multiple="multiple" id = "assigned_individuals">
					
				</select>
			</div>

			<div class="form-group">
				<button class = "btn btn-success"><i class = "fa fa-credit-card"></i> <span>Add Report</span></button>
			</div>
		</form>
	</div>
</div>