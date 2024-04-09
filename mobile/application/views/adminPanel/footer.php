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
<script src="vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"> </script>

<!-- Dashboard 1 -->
<script src="<?= base_url(); ?>assets/js/dashboard/dashboard-1.js"> </script>


<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script src="<?= base_url(); ?>assets/js/custom.js"> </script>
<script src="<?= base_url(); ?>assets/js/dlabnav-init.js"> </script>
<script src="<?= base_url(); ?>assets/js/demo.js"> </script>
<script src="<?= base_url()?>assets_ifda/js/jquery.imgareaselect.js"></script>
<script>
	$(function () {
		$('#datetimepicker').datetimepicker({
			inline: true,
		});
	});

	$(document).ready(function () {
		$(".booking-calender .fa.fa-clock-o").removeClass(this);
		$(".booking-calender .fa.fa-clock-o").addClass('fa-clock');
		$(".category").select2({
			 placeholder: {
    		text: 'Select category'
  		}
		});
		$(".roomtype").select2({
			placeholder:'Select roomtype'
		});
		$(".rules").select2({
			 placeholder: {
    		text: 'Select rules'
  		}
		});
		$(".services").select2({
			placeholder:'Select services'
		});

	});
	$('#data').on('click','.delete_homestay',function(){
			var r = confirm("Are You Sure!.");
      		if (r == true) {
      			var id = $(this).data('id');
        		$.ajax({
        		url:"<?= base_url()?>dashboard_admin/delete_homestay",
        		method:"POST",
        		data:{id:id},
        		success:function(response){
          		location.reload();
        		}
      		});
      	}
	});
	
	$('.delete_gallery').on('click',function(){
			var r = confirm("Are You Sure!.");
      		if (r == true) {
      			var id = $(this).data('id');
        		$.ajax({
        		url:"<?= base_url()?>dashboard_admin/delete_gallery",
        		method:"POST",
        		data:{id:id},
        		success:function(response){
          		location.reload();
        		}
      		});
      	}
	});
	$('#data').on('click','.delete_roomtype',function(){
			var r = confirm("Are You Sure!.");
      		if (r == true) {
      			var id = $(this).data('id');
        		$.ajax({
        		url:"<?= base_url()?>dashboard_admin/delete_roomtype",
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
        		url:"<?= base_url()?>dashboard_admin/delete_rooms",
        		method:"POST",
        		data:{id:id},
        		success:function(response){
          		location.reload();
        		}
      		});
      	}
	});
	$('#data').on('click','.delete_state',function(){
			var r = confirm("Are You Sure!.");
      		if (r == true) {
      			var id = $(this).data('id');
        		$.ajax({
        		url:"<?= base_url()?>dashboard_admin/delete_state",
        		method:"POST",
        		data:{id:id},
        		success:function(response){
          		location.reload();
        		}
      		});
      	}
	});
	$('#data').on('click','.delete_district',function(){
			var r = confirm("Are You Sure!.");
      		if (r == true) {
      			var id = $(this).data('id');
        		$.ajax({
        		url:"<?= base_url()?>dashboard_admin/delete_district",
        		method:"POST",
        		data:{id:id},
        		success:function(response){
          		location.reload();
        		}
      		});
      	}
	});
	$('#data').on('click','.delete_events',function(){
			var r = confirm("Are You Sure!.");
      		if (r == true) {
      			var id = $(this).data('id');
        		$.ajax({
        		url:"<?= base_url()?>dashboard_admin/delete_events",
        		method:"POST",
        		data:{id:id},
        		success:function(response){
          		location.reload();
        		}
      		});
      	}
	});
	$('#data').on('click','.delete_category',function(){
			var r = confirm("Are You Sure!.");
      		if (r == true) {
      			var id = $(this).data('id');
        		$.ajax({
        		url:"<?= base_url()?>dashboard_admin/delete_category",
        		method:"POST",
        		data:{id:id},
        		success:function(response){
          		location.reload();
        		}
      		});
      	}
	});
	$('#data').on('click','.delete_location',function(){
			var r = confirm("Are You Sure!.");
      		if (r == true) {
      			var id = $(this).data('id');
        		$.ajax({
        		url:"<?= base_url()?>dashboard_admin/delete_location",
        		method:"POST",
        		data:{id:id},
        		success:function(response){
          		location.reload();
        		}
      		});
      	}
	});
	$('#data').on('click','.delete_guestlove',function(){
			var r = confirm("Are You Sure!.");
      		if (r == true) {
      			var id = $(this).data('id');
        		$.ajax({
        		url:"<?= base_url()?>dashboard_admin/delete_guestlove",
        		method:"POST",
        		data:{id:id},
        		success:function(response){
          		location.reload();
        		}
      		});
      	}
	});
	$('#data').on('click','.delete_pricerange',function(){
			var r = confirm("Are You Sure!.");
      		if (r == true) {
      			var id = $(this).data('id');
        		$.ajax({
        		url:"<?= base_url()?>dashboard_admin/delete_pricerange",
        		method:"POST",
        		data:{id:id},
        		success:function(response){
          		location.reload();
        		}
      		});
      	}
	});
	$('#data').on('click','.delete_homerules',function(){
			var r = confirm("Are You Sure!.");
      		if (r == true) {
      			var id = $(this).data('id');
        		$.ajax({
        		url:"<?= base_url()?>dashboard_admin/delete_homerules",
        		method:"POST",
        		data:{id:id},
        		success:function(response){
          		location.reload();
        		}
      		});
      	}
	});
	$('#data').on('click','.delete_wonderland',function(){
			var r = confirm("Are You Sure!.");
      		if (r == true) {
      			var id = $(this).data('id');
        		$.ajax({
        		url:"<?= base_url()?>dashboard_admin/delete_wonderland",
        		method:"POST",
        		data:{id:id},
        		success:function(response){
          		location.reload();
        		}
      		});
      	}
	});
	$('.state').change(function(){
            var id = $(this).val();
            $.ajax({
                url:"<?= base_url()?>login_register/district",
                method:"POST",
                data:'id='+id,
                success:function(response){
                    $('.district').html(response);
                }

            });
        });
	$('.district').change(function(){
            var id = $(this).val();
            $.ajax({
                url:"<?= base_url()?>login_register/location",
                method:"POST",
                data:'id='+id,
                success:function(response){
                    $('.location').html(response);
                }

            });
        });
</script>
</body>

</html>