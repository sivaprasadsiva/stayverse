 <option selected disabled hidden>--- select district ---</option>
 <?php if(!empty($district)):foreach($district as $dis):?>
    <option value="<?= $dis['id']?>"><?= $dis['district']?></option>
<?php endforeach;endif;?>