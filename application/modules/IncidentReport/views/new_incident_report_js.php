<script type="text/javascript">
	$(document).ready(function(){
		$('#assigned_individuals').select2({
			data: <?= @$users_list; ?>
		});

		$('input[name="date_time_fault_occured"]').datetimepicker();
	});
</script>