
   
   <div id="navbar">
      <!-- breadcumnd banner Here -->
      <div class="breadcrumb-area ">
         <nav class="container"style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <div class="breadcrumb-head">
               <h3>Events & Festivals</h3>
            </div>
            <ul class="breadcumnd__link ">
               <li>
                  <a href="<?= base_url().'index'?>">
                     Home
                  </a>
               </li>
               <li>
                  <i class="material-symbols-outlined">
                     chevron_right
                  </i>
               </li>
               <li>
                  <a href="javascript:void(0)">
                     Events & Festivals
                  </a>
               </li>
              
               <!-- <li>
                  <i class="material-symbols-outlined">
                     chevron_right
                  </i>
               </li>
               <li>
                  Hotel List Page
               </li> -->
            </ul>

          </nav>
      </div>
      <!-- breadcumnd banner end -->
         
         <!-- nav id -->
   </div>
</section>


<!-- -------------------------------------------------------- -->

<!-- hotel details here -->
<section class="hotel__details overflow-hidden pt__60">
   <div class="container">
      <div class="row g-4">
         <div class="col-xl-12 col-lg-12">
            <div class="hotel__details__wrapleft">
               <div class="details__bookslider owl-theme owl-carousel">
                  <div class="item" data-hash="zero">
                     <img src="<?= base_url();?>assets/images/<?= $image?>" alt="img">
                  </div>
               </div>
               <div class="text__box pt__60 pb__40">
                   <h3 class="mb__20 dtext xs-32">
                    <?=$name?>
                   </h3>
                   <p class="mb__20 xs-16">
                     <?=$details?>
                   </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- blog Related End -->


 