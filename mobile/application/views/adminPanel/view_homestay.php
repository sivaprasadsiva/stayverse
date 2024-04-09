<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h1>
                    <?php echo $title ?>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <table class="table table-striped">
                    <tr>
                        <td><b>Name</b></td>
                        <td><?= $name?></td>
                    </tr>
                     <tr>
                        <td><b>Phone</b></td>
                        <td><?= $phone?></td>
                    </tr>
                     <tr>
                        <td><b>E-mail</b></td>
                        <td><?= $email?></td>
                    </tr>
                     <tr>
                        <td><b>Address</b></td>
                        <td class="text-wrap"><?= $address?></td>
                    </tr>
                    <tr>
                        <td><b>Rooms</b></td>
                        <td><?= $rooms?></td>
                    </tr>
                    <tr>
                        <td><b>Contact Person</b></td>
                        <td><?= $contact_person?></td>
                    </tr>
                    <tr>
                        <td><b>Contact Number</b></td>
                        <td><?= $contactnumber?></td>
                    </tr>
                    <tr>
                        <td><b>Contact Name</b></td>
                        <td><?= $contactname?></td>
                    </tr>
                    <tr>
                        <td><b>Description</b></td>
                        <td class="text-wrap"><?= $description?></td>
                    </tr>
                    <tr>
                        <td><b>State</b></td>
                        <td><?= $state?></td>
                    </tr>
                    <tr>
                        <td><b>District</b></td>
                        <td><?= $district?></td>
                    </tr>
                    <tr>
                        <td><b>Location</b></td>
                        <td><?= $location?></td>
                    </tr>
                    <tr>
                        <td><b>Room Type</b></td>
                        <td><?php if(!empty($roomtype)){foreach($roomtype as $rt){if($rt['homestay_id'] == $id){echo $rt['roomtype'].',<br>';}}}?></td>
                    </tr>
                    <tr>
                        <td><b>Category</b></td>
                        <td><?php if(!empty($category)){foreach($category as $cat){if($cat['homestay_id'] == $id){echo $cat['category'].',<br>';}}}?></td>
                    </tr>
                    <tr>
                        <td><b>Services</b></td>
                        <td><?php if(!empty($services)){foreach($services as $serv){if($serv['homestay_id'] == $id){echo $serv['guestlove'].',<br>';}}}?></td>
                    </tr>
                    <tr>
                        <td><b>Rules</b></td>
                        <td ><?php if(!empty($rules)){foreach($rules as $rule){if($rule['homestay_id'] == $id){echo $rule['homerules'].',<br>';}}}?></td>
                    </tr>
                    <tr>
                        <td><b>Password</b></td>
                        <td><?= $password?></td>
                    </tr>
                </table>
            </div>
        </div>
        
    </div>
</div>
</div>

