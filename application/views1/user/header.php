<!DOCTYPE html>
<html lang="en">


<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Stayverse - kerala best homestay service</title>
   <!--Favicon img-->
   <link rel="shortcut icon" href="<?= base_url();?>assets1/img/logo/favicon.png">
   <!--nice select css-->
   <link rel="stylesheet" href="<?= base_url();?>assets1/css/nice-select.css">
   <!--datepicker css-->
   <link rel="stylesheet" href="<?= base_url();?>assets1/css/datepickerboot.css">
   <!--main css-->
   <link rel="stylesheet" href="<?= base_url();?>assets1/css/main.css">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>

<!-- Header top Here -->
<header class="header-section">
   <div class="container">
      <div class="header-wrapper">
         <div class="logo-menu">
            <a href="<?= base_url().'index'?>" class="logo">
               <img src="<?= base_url();?>assets1/img/logo/logo.png" alt="logo">
            </a>
            <a href="<?= base_url().'index'?>" class="small__logo d-xl-none">
               <img src="<?= base_url();?>assets1/img/logo/favicon.png" alt="logo">
            </a>
         </div>
         <div class="menu__right__components d-flex align-items-center">
            <ul class="navbar-nav ml-auto p-3">
               <li class="nav-item" style="border-right: rgb(100, 59, 59) dotted;"><a href="">
                   <div>
                       <i class="fa-solid fa-gift"style="color: rgb(13, 11, 166);"></i>
                   </div>
                   <div>
                       <h4>Super Offers</h4>
                       <h6>Manage Your Bookings</h6>
                   </div>
               </a></li>
               <li class="nav-item"style="border-right: rgb(100, 59, 59) dotted;"><a href="">
                   <div>
                       <i class="fa-solid fa-bag-shopping" style="  color: rgb(184, 56, 56);"></i>
                   </div>
                   <div>
                       <h4>Introducing MyBizz</h4>
                       <h6>Manage Your Bookings</h6>
                   </div>
               </a></li>
               <li class="nav-item"><a href="">
                   <div>
                       <i class="fa-solid fa-suitcase-rolling" style="color: rgb(205, 178, 0);"></i>
                   </div>
                   <div>
                       <h4>My Trips</h4>
                       <h6>Manage Your Bookings</h6>
                   </div>
               </a></li>
               <?php if($login == 1){?>
               <li class="nav-item top-dropdown"><a href="<?= base_url().'userpanel/user_logout'?>">
                  <div class=" login-btn ">
                     Logout
                  </div>
              </a></li>
               <?php }elseif($login == 0){?>
               <li class="nav-item top-dropdown"><a href="<?= base_url().'userpanel/login'?>">
                  <div class=" login-btn ">
                     Login Or Create Account
                  </div>
              </a></li>
               <?php }?>
               
            
           </ul>
            <div class="header-bar d-lg-none">
               <span></span>
               <span></span>
               <span></span>
            </div>
         </div>
         
   
      </div>
   </div>
</header>
<!-- Header top End -->