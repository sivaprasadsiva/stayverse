
            <div class="container">
            <div >
               <br><br>
                  <div class="d-flex pb__40 gap-4 align-items-center">

                     <h2 class="dtext">
                        Reviews 
                     </h2>
                  </div>
                  <br><br>
                  <?php foreach($review as $r){?>
                  <div style="margin-left:50%;">
                     <div class="man">
                        <img src="<?= base_url();?>assets1/img/blog/jeromes.png" alt="img">
                     </div>
                     <div class="comment__content">
                        <br>
                        
                        <h5 >
                           <?= $r['name']?> <span style="margin-left: 10px;">
                            <?php
                            date_default_timezone_set('Asia/Kolkata');
                             $time = strtotime($r['created_at']);
                              $diff = time() - $time;

                              if(($diff / (12 * 30 * 24 * 60 * 60)) > 1){
                                 $out= $diff / (12 * 30 * 24 * 60 * 60);
                                 echo floor($out)." years ago";
                              }elseif(($diff / ( 30 * 24 * 60 * 60)) > 1){
                                 $out= $diff / ( 30 * 24 * 60 * 60);
                                 echo floor($out)." months ago";
                              }elseif(($diff / (  24 * 60 * 60)) > 1){
                                 $out= $diff / (  24 * 60 * 60);
                                 echo floor($out)." days ago";
                              }elseif(($diff / (  60 * 60)) > 1){
                                 $out= $diff / (  60 * 60);
                                 echo floor($out)." hours ago";
                              }elseif(($diff / ( 60)) > 1){
                                 $out= $diff / ( 60);
                                 echo floor($out)." minutes ago";
                              }elseif(($diff / 1) > 1){
                                 $out= $diff / 1;
                                 echo floor($out)." sec ago";
                              }
                         ?></span>
                        </h5>
                        
                        <?php               $rem = 0;
                                            $star = 5;
                                            $rem = $star - $r['rating'];
                                            for ($i = 1; $i <= $r['rating']; $i++) { ?><i class="fas fa-star"
                                            style="color:#ffc700;"></i>
                                    <?php }
                                            for ($i = 1; $i <= $rem; $i++) { ?><i class="fas fa-star"
                                        style="color:#ccc;"></i>
                                <?php }
                                         ?>
                        <p class="pb__20">
                           <?= $r['comment']?>
                        </p>
                        <!-- <div class="admin__commments">
                           <a href="#0">
                              <span class="icon">
                                 <img src="<?= base_url();?>assets1/img/svg/flike.svg" alt="icon">
                              </span>
                              <span class="text">
                                 18
                              </span>
                           </a>
                           <a href="#0">
                              <span class="icon">
                                 <img src="<?= base_url();?>assets1/img/svg/comments.svg" alt="icon">
                              </span>
                              <span class="text">
                                 Reply
                              </span>
                           </a>
                           <a href="#0">
                              <span class="icon">
                                 <img src="<?= base_url();?>assets1/img/svg/sshare.svg" alt="icon">
                              </span>
                              <span class="text">
                                 Share
                              </span>
                           </a>
                        </div> -->
                     </div>
                  </div>
                  <br><br><br>
               <?php }?>
               </div>
            </div>