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

<script >
	
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
    		text: 'Select category',
    		allowClear: true
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

	$('#data').on('click','.delete_activity',function(){
			var r = confirm("Are You Sure!.");
      		if (r == true) {
      			var id = $(this).data('id');
        		$.ajax({
        		url:"<?= base_url()?>dashboard_admin/delete_activity",
        		method:"POST",
        		data:{id:id},
        		success:function(response){
          		location.reload();
        		}
      		});
      	}
	});
	$('#data').on('click','.delete_offers',function(){
			var r = confirm("Are You Sure!.");
      		if (r == true) {
      			var id = $(this).data('id');
        		$.ajax({
        		url:"<?= base_url()?>dashboard_admin/delete_offers",
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
	$('#data').on('click','.delete_vehicle_type',function(){
			var r = confirm("Are You Sure!.");
      		if (r == true) {
      			var id = $(this).data('id');
        		$.ajax({
        		url:"<?= base_url()?>dashboard_admin/vehicle_type_delete",
        		method:"POST",
        		data:{id:id},
        		success:function(response){
          		location.reload();
        		}
      		});
      	}
	});
	$('#data').on('click','.delete_vehicle_model',function(){
			var r = confirm("Are You Sure!.");
      		if (r == true) {
      			var id = $(this).data('id');
        		$.ajax({
        		url:"<?= base_url()?>dashboard_admin/vehicle_model_delete",
        		method:"POST",
        		data:{id:id},
        		success:function(response){
          		location.reload();
        		}
      		});
      	}
	});
	$('#data').on('click','.delete_vehicle',function(){
			var r = confirm("Are You Sure!.");
      		if (r == true) {
      			var id = $(this).data('id');
        		$.ajax({
        		url:"<?= base_url()?>dashboard_admin/vehicle_delete",
        		method:"POST",
        		data:{id:id},
        		success:function(response){
          		location.reload();
        		}
      		});
      	}
	});
	$('#data').on('click','.delete_food_category',function(){
			var r = confirm("Are You Sure!.");
      		if (r == true) {
      			var id = $(this).data('id');
        		$.ajax({
        		url:"<?= base_url()?>dashboard_admin/food_category_delete",
        		method:"POST",
        		data:{id:id},
        		success:function(response){
          		location.reload();
        		}
      		});
      	}
	});
	$('#data').on('click','.delete_food',function(){
			var r = confirm("Are You Sure!.");
      		if (r == true) {
      			var id = $(this).data('id');
        		$.ajax({
        		url:"<?= base_url()?>dashboard_admin/food_delete",
        		method:"POST",
        		data:{id:id},
        		success:function(response){
          		location.reload();
        		}
      		});
      	}
	});
	$('#data').on('click','.delete_slide1',function(){
			var r = confirm("Are You Sure!.");
      		if (r == true) {
      			var id = $(this).data('id');
        		$.ajax({
        		url:"<?= base_url()?>dashboard_admin/slide1_delete",
        		method:"POST",
        		data:{id:id},
        		success:function(response){
          		location.reload();
        		}
      		});
      	}
	});
	$('#data').on('click','.delete_coupon',function(){
			var r = confirm("Are You Sure!.");
      		if (r == true) {
      			var id = $(this).data('id');
        		$.ajax({
        		url:"<?= base_url()?>dashboard_admin/coupon_delete",
        		method:"POST",
        		data:{id:id},
        		success:function(response){
          		location.reload();
        		}
      		});
      	}
	});
	$('#data').on('click','.delete_slide2',function(){
			var r = confirm("Are You Sure!.");
      		if (r == true) {
      			var id = $(this).data('id');
        		$.ajax({
        		url:"<?= base_url()?>dashboard_admin/slide2_delete",
        		method:"POST",
        		data:{id:id},
        		success:function(response){
          		location.reload();
        		}
      		});
      	}
	});
	$('#data').on('click','.delete_contact',function(){
			var r = confirm("Are You Sure!.");
      		if (r == true) {
      			var id = $(this).data('id');
        		$.ajax({
        		url:"<?= base_url()?>dashboard_admin/delete_contact",
        		method:"POST",
        		data:{id:id},
        		success:function(response){
          		location.reload();
        		}
      		});
      	}
	});

	$('#data').on('click','.delete_plan',function(){
			var r = confirm("Are You Sure!.");
      		if (r == true) {
      			var id = $(this).data('id');
        		$.ajax({
        		url:"<?= base_url()?>dashboard_admin/delete_plan",
        		method:"POST",
        		data:{id:id},
        		success:function(response){
          		location.reload();
        		}
      		});
      	}
	});
	$('#data').on('click','.delete_staff',function(){
            var r = confirm("Are You Sure!.");
            if (r == true) {
                var id = $(this).data('id');
                $.ajax({
                url:"<?= base_url()?>dashboard_admin/delete_staff",
                method:"POST",
                data:{id:id},
                success:function(response){
                location.reload();
                }
            });
        }
    });
    $('#data').on('click','.delete_tax',function(){
            var r = confirm("Are You Sure!.");
            if (r == true) {
                var id = $(this).data('id');
                $.ajax({
                url:"<?= base_url()?>dashboard_admin/delete_tax",
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
	$('.type').change(function(){
            var id = $(this).val();
            $.ajax({
                url:"<?= base_url()?>login_register/company_name",
                method:"POST",
                data:'id='+id,
                success:function(response){
                    $('.company_name').html(response);
                }

            });
        });
</script>
<style type="text/css">
.select2{
	margin-top: 15px;
}
.select2.select2-container .select2-selection--multiple .select2-search--inline .select2-search__field {
  margin-top: 0;
  height: 32px;
}

.select2.select2-container .select2-selection--multiple .select2-selection__rendered {
  display: block;
  padding: 0 4px;
  line-height: 29px;
}

.select2.select2-container .select2-selection--multiple .select2-selection__choice {
  background-color: #f8f8f8;
  border: 1px solid #ccc;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  margin: 4px 4px 0 0;
  padding: 0 6px 0 22px;
  height: 24px;
  line-height: 24px;
  font-size: 12px;
  position: relative;
}

.select2.select2-container .select2-selection--multiple .select2-selection__choice .select2-selection__choice__remove {
  position: absolute;
  top: 0;
  left: 0;
  height: 22px;
  width: 22px;
  margin: 0;
  text-align: center;
  color: #e74c3c;
  font-weight: bold;
  font-size: 16px;
}

</style>
</body>

</html>