<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
    		var room_id = $('.calendar_id').data('id');
    		
    		var calendar = $('#calendar').fullCalendar({
				events: '<?= base_url('homestay/load_calendar/')?>'+room_id,
            	defaultView: 'month',
		 		timeZone: 'local',
				selectHelper: true,
            

        });

    		
<?php if(!empty($this->session->flashdata('popup_error'))){?>
         
            $('#event_entry_modal').modal('show');
       
<?php }?>


$('#aadhar_select').on('change',function(){
	$('#aadhar').show();
	$('#voter').hide();
});
$('#voter_select').on('change',function(){
	$('#voter').show();
	$('#aadhar').hide();
	$('#aadhar').removeAttr("required");
	$('#aadhar').removeAttr("name");

	$('#voter').attr("name","proofno");
	$('#aadhar').attr("required");
});

$('input[name="checkin"]').change(function(){
      var date = $(this).val();
      var startDate = new Date(date);
      
      var day = 60 * 60 * 24 * 1000;
      var endDate = new Date(startDate.getTime() + day);
      var month = endDate.getMonth()+1;
      var dateEnd = endDate.getFullYear()+'-'+ month +'-'+endDate.getDate();
      // alert(date);

      $('input[name="checkout"]').attr("min",dateEnd);
      $('input[name="checkout"]').val(dateEnd);
});

 

    	});

 </script>