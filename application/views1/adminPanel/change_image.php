<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
    <div class="col-md-10">
                <h1>Change Image</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?php if(!empty($homestay)){?>
                    <?php echo form_open_multipart(base_url().'dashboard_admin/update_homestay_img/'.$id)?>
                        <input type="file" class="form-control" name="image" required>
                        <input type="submit" name="submit" class="form-control btn btn-primary mt-2">
                    <?php echo form_close()?>
                <?php }elseif(!empty($rooms)){?>
                    <?php echo form_open_multipart(base_url().'dashboard_admin/update_rooms_img/'.$room.'/'.$id)?>
                        <input type="file" class="form-control" name="image" required>
                        <input type="submit" name="submit" class="form-control btn btn-primary mt-2">
                    <?php echo form_close()?>
                <?php }elseif(!empty($events)){?>
                    <?php echo form_open_multipart(base_url().'dashboard_admin/update_events_img/'.$id)?>
                        <input type="file" class="form-control" name="image" required>
                        <input type="submit" name="submit" class="form-control btn btn-primary mt-2">
                    <?php echo form_close()?>
                <?php }elseif(!empty($wonder)){?>
                    <?php echo form_open_multipart(base_url().'dashboard_admin/update_wonder_img/'.$id)?>
                        <input type="file" class="form-control" name="image" required>
                        <input type="submit" name="submit" class="form-control btn btn-primary mt-2">
                    <?php echo form_close()?>
                <?php }elseif(!empty($food)){?>
                    <?php echo form_open_multipart(base_url().'dashboard_admin/update_food_img/'.$id)?>
                        <input type="file" class="form-control" name="image" required>
                        <input type="submit" name="submit" class="form-control btn btn-primary mt-2">
                    <?php echo form_close()?>
                <?php }elseif(!empty($img1)){?>
                    <?php echo form_open_multipart(base_url().'dashboard_admin/update_vehicle_img1/'.$id)?>
                        <input type="file" class="form-control" name="image" required>
                        <input type="submit" name="submit" class="form-control btn btn-primary mt-2">
                    <?php echo form_close()?>
                <?php }elseif(!empty($img2)){?>
                    <?php echo form_open_multipart(base_url().'dashboard_admin/update_vehicle_img2/'.$id)?>
                        <input type="file" class="form-control" name="image" required>
                        <input type="submit" name="submit" class="form-control btn btn-primary mt-2">
                    <?php echo form_close()?>
                <?php }elseif(!empty($img3)){?>
                    <?php echo form_open_multipart(base_url().'dashboard_admin/update_vehicle_img3/'.$id)?>
                        <input type="file" class="form-control" name="image" required>
                        <input type="submit" name="submit" class="form-control btn btn-primary mt-2">
                    <?php echo form_close()?>
                <?php }elseif(!empty($guestlove)){?>
                    <?php echo form_open_multipart(base_url().'dashboard_admin/update_guestlove_img/'.$id)?>
                        <input type="file" class="form-control" name="image" required>
                        <input type="submit" name="submit" class="form-control btn btn-primary mt-2">
                    <?php echo form_close()?>
                <?php }elseif(!empty($plan)){?>
                    <?php echo form_open_multipart(base_url().'dashboard_admin/update_plan_img/'.$id)?>
                        <input type="file" class="form-control" name="image" required>
                        <input type="submit" name="submit" class="form-control btn btn-primary mt-2">
                    <?php echo form_close()?>
                <?php }elseif(!empty($plan1)){?>
                    <?php echo form_open_multipart(base_url().'dashboard_admin/update_plan_img1/'.$id)?>
                        <input type="file" class="form-control" name="image" required>
                        <input type="submit" name="submit" class="form-control btn btn-primary mt-2">
                    <?php echo form_close()?>
                <?php }elseif(!empty($activity)){?>
                    <?php echo form_open_multipart(base_url().'dashboard_admin/update_activity_img/'.$id)?>
                        <input type="file" class="form-control" name="image" required>
                        <input type="submit" name="submit" class="form-control btn btn-primary mt-2">
                    <?php echo form_close()?>
                <?php }elseif(!empty($offers)){?>
                    <?php echo form_open_multipart(base_url().'dashboard_admin/update_offers_img/'.$id)?>
                        <input type="file" class="form-control" name="image" required>
                        <input type="submit" name="submit" class="form-control btn btn-primary mt-2">
                    <?php echo form_close()?>
                <?php }?>
            </div>
        </div>
    </div>
</div>