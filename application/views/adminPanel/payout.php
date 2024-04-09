<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <h2>Payout</h2>
    
    <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped" id="example4">
                        <thead>
                            <th>
                                No
                            </th>
                            <th>
                                Booking <br>Date & Time
                            </th>
                            <th>
                                Homestay Name
                            </th>
                            <th>
                                Room Type
                            </th>
                            <th>
                                Total price inc. tax & coupon
                            </th>
                            <th>
                                Paid
                            </th>
                            <th>
                                Balance Pay
                            </th>
                            <!-- <th>Action</th> -->
                        </thead>
                        <tbody id="data">
                            <?php  if(!empty($booking)){$n = 1;foreach($booking as $book){if(($book['payment_mode'] == 'online') && ($book['bstatus'] == 2)){$balance = 0;
                                if(!empty($paid)){ foreach($paid as $pay){ if($pay['booking_id'] == $book['bid']){ $balance = $pay['payment'];}}} $bal = $book['total_price_room'] - $balance;
                                ?>
                                 <tr>
                                    <td><?= $n?></td>
                                    <td><?= date('d M Y',strtotime($book['date'])).'<br>'.date('h:m a',strtotime($book['date']));?></td>
                                    <td><?php echo $book['homestay_name'];?></td>
                                    <td><?php foreach($rooms as $rs){if($rs['booking_id'] == $book['bid']){echo $rs['roomtype'].',<br>';}}?></td>
                                    <td><?= '₹ '.number_format($book['total_price'],2).' /-'?></td>
                                    <td><?= '₹ '. number_format($balance,2).' /-';?></td>
                                    <td><?php if($bal > 0){?><a class="btn btn-danger payout" data-id="<?= $book['bid'];?>" ><?= '₹ '.number_format($bal,2).' /-'?><p style="display:none;" id="payout_total" data-id="<?= $bal;?>"></a><?php }else{ echo $bal;}?></td><!-- 
                                    <td><a href="" class="btn" style="background:orange;"><i class="fa fa-pencil" style="color:black;"></i></a></td> -->
                                </tr>
                            <?php $n+=1;}}}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
        

    </div>
</div>
</div>

            <div class="modal fade" id="payout" aria-hidden="true">
                <div class="modal-dialog">


                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>ADD PAYMENT</h4>
                        </div>
                        <div class="modal-body">
                            <!-- <?php echo form_open_multipart(base_url().'dashboard_admin/payout')?> -->
                            <form id="payout_form">
                                <input type="text" name="payment" class="form-control" id="payout_payment" placeholder="Payment" value="" required>
                                <input type="hidden" name="booking_id" id="payout_booking_id" class="form-control" value="">
                                <input type="submit" name="submit"  class="form-control btn btn-primary mt-2" value="Pay" style="background-color:green;">
                            </form>
                            <!-- <?php echo form_close() ?> -->
                        </div>

                    </div>
                </div>
            </div>



<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $('#data').on('click','.payout',function(){
            var id = $(this).data('id');
            var amount = $(this).closest('tr').find('#payout_total').data('id');
            $('#payout').modal('show');
            $('#payout_payment').val(amount);
            $('#payout_booking_id').val(id);
    });
        $('#payout_form').submit(function(e){
            e.preventDefault();
            $.ajax({
                type:"POST",
                url:"<?= base_url('dashboard_admin/payout_values')?>",
                data:$(this).serialize(),
                success:function(){

                    location.reload();

                }
            })
        });
    </script>