
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