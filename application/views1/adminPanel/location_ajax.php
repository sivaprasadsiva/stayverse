 <option selected disabled hidden>--- select location ---</option>
 <?php if(!empty($location)):foreach($location as $l):?>
    <option value="<?= $l['id']?>"><?= $l['location']?></option>
<?php endforeach;endif;?>