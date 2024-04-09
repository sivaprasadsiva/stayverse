<!--**********************************
Footer start
***********************************-->
<div class="footer">
	<div class="copyright">
		<p>Copyright © Designed by
			<a href="https://themeforest.net/user/hugebinary" target="_blank">STAYVERS</a> 2023
		</p>
	</div>
</div>
<!--**********************************
Footer end
***********************************-->

<!--**********************************
Support ticket button start
***********************************-->

<!--**********************************
Support ticket button end
***********************************-->


</div>
<!--**********************************
Main wrapper end
***********************************-->

<!--**********************************
Scripts
***********************************-->
<!-- Required vendors -->
<script src="<?= base_url(); ?>assets/vendor/global/global.min.js"> </script>
<script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.bundle.min.js"> </script>
<script src="<?= base_url(); ?>assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"> </script>
<!-- Datatable -->
<script src="<?= base_url(); ?>assets/vendor/datatables/js/jquery.dataTables.min.js"> </script>
<script src="<?= base_url(); ?>assets/js/plugins-init/datatables.init.js"> </script>
<!-- Apex Chart -->
<script src="<?= base_url(); ?>assets/vendor/apexchart/apexchart.js"> </script>

<script src="<?= base_url(); ?>assets/vendor/bootstrap-datetimepicker/js/moment.js"> </script>
<!-- <script src="vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"> </script> -->

<!-- Dashboard 1 -->
<script src="<?= base_url(); ?>assets/js/dashboard/dashboard-1.js"> </script>


<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script src="<?= base_url(); ?>assets/js/custom.js"> </script>
<script src="<?= base_url(); ?>assets/js/dlabnav-init.js"> </script>
<script src="<?= base_url(); ?>assets/js/demo.js"> </script>


<script type="text/javascript">
   

	$('.delete_gallery').on('click',function(){
			var r = confirm("Are You Sure!.");
      		if (r == true) {
      			var id = $(this).data('id');
        		$.ajax({
        		url:"<?= base_url()?>homestay/delete_gallery",
        		method:"POST",
        		data:{id:id},
        		success:function(response){
          		location.reload();
        		}
      		});
      	}
	});
$('#data').on('click','.delete_rooms',function(){
			var r = confirm("Are You Sure!.");
      		if (r == true) {
      			var id = $(this).data('id');
        		$.ajax({
        		url:"<?= base_url()?>homestay/delete_rooms",
        		method:"POST",
        		data:{id:id},
        		success:function(response){
          		location.reload();
        		}
      		});
      	}
	});
$('#data').on('click','.delete_booking',function(){
			var r = confirm("Are you sure want to remove booking!.");
      		if (r == true) {
      			var id = $(this).data('id');
        		$.ajax({
        		url:"<?= base_url()?>homestay/delete_booking",
        		method:"POST",
        		data:{id:id},
        		success:function(response){
          		location.reload();
        		}
      		});
      	}
	});
$('.search_room').on('keyup',function(){
	var id = $(this).val();
		$.ajax({
	        		url:"<?= base_url()?>homestay/search",
	        		method:"POST",
	        		data:{id:id},
	        		success:function(response){
	          		$('.old_filter').hide();
	          		$('.new_filter').html(response);
	        		}
	        	});
	
});
	
	
</script>
</body>

</html>
