<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stayverse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Istok+Web:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:wght@400;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url()?>/assets1/css/main.css">
    <link rel="shortcut icon" type="image/png" href="<?= base_url();?>assets1/img/logo/favicon.png"/>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <div class="main-wrapper">
        <div class="main-wrapper-con">

            <div class=" main-area-con no-min-height">
                <div class="container container-style">
                    <header class="head-style big-toggle">
                        <div class="logo-con">
                            <a href="<?= base_url('index')?>" class="logo">
                                    <img class="logo-img" src="<?= base_url()?>/assets1/images/logo.png" alt="">
                                </a>
                        </div>
                        <div class="navtogglebtn">
                            <i class="fa-solid fa-bars"></i>
                        </div>
                        <div class="navheadbox">
                            <div class="tabs">
                                <a class="tab-style active" href="">
                                    <div class="tab-left percent">
                                        <i class="fa-solid fa-percent"></i>
                                    </div>
                                    <div class="tab-right">
                                        <h5>Super Offers</h5>
                                        <h5>Manage Your Bookings</h5>
                                    </div>
                                </a>
                                <a class="tab-style" href="">
                                    <div class="tab-left bag">
                                        <i class="fa-solid fa-bag-shopping"></i>
                                    </div>
                                    <div class="tab-right">
                                        <h5>Introducing My Bizz</h5>
                                        <h5>Manage Your Bookings</h5>
                                    </div>
                                </a>
                                <a class="tab-style" href="">
                                    <div class="tab-left trip">
                                        <i class="fa-solid fa-suitcase-rolling"></i>
                                    </div>
                                    <div class="tab-right">
                                        <h5>My Trips</h5>
                                        <h5>Manage Your Bookings</h5>
                                    </div>
                                </a>
                            </div>
                            <div class="btn-con">
                                <?php if($login == 1){?>
                                <a  class="login-btn" href="<?= base_url('userpanel/user_logout');?>">
                                    <h5>Logout</h5>
                                </a>
                              <?php }elseif($login == 0){?>
                                 <button type="button" class="login-btn" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal1">
                                    <h5>Login Or Create Account</h5>
                                </button>
                              <?php }?>
                            </div>
                        </div>
                    </header>
                    <div class="head-style phone-toggle">
                        <div class="head-control">
                            <div class="logo-con">
                                 <a href="<?= base_url('index')?>" class="logo">
                                    <img class="logo-img" src="<?= base_url()?>/assets1/images/logo.png" alt="">
                                </a>
                            </div>
                            <div class="navtogglebtn">
                                <i class="fa-solid fa-bars"></i>
                            </div>
                        </div>
                        <div class="navheadbox">
                            <div class="tabs">
                                <a class="tab-style active" href="">
                                    <div class="tab-left percent">
                                        <i class="fa-solid fa-percent"></i>
                                    </div>
                                    <div class="tab-right">
                                        <h5>Super Offers</h5>
                                        <h5>Manage Your Bookings</h5>
                                    </div>
                                </a>
                                <a class="tab-style" href="">
                                    <div class="tab-left bag">
                                        <i class="fa-solid fa-bag-shopping"></i>
                                    </div>
                                    <div class="tab-right">
                                        <h5>Introducing My Bizz</h5>
                                        <h5>Manage Your Bookings</h5>
                                    </div>
                                </a>
                                <a class="tab-style" href="">
                                    <div class="tab-left trip">
                                        <i class="fa-solid fa-suitcase-rolling"></i>
                                    </div>
                                    <div class="tab-right">
                                        <h5>My Trips</h5>
                                        <h5>Manage Your Bookings</h5>
                                    </div>
                                </a>
                            </div>
                            <div class="btn-con">
                                <?php if($login == 1){?>
                                <a  class="login-btn" href="<?= base_url('userpanel/user_logout');?>">
                                    <h5>Logout</h5>
                                </a>
                              <?php }elseif($login == 0){?>
                                 <button type="button" class="login-btn" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal1">
                                    <h5>Login Or Create Account</h5>
                                </button>
                              <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb-area">
                <img class="breadcrumb-image" src="<?= base_url()?>/assets1/images/breadcrumb-img.jpg" alt="">
                <div class="breadcrumb-con">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('index')?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $page_title;?></li>
                        </ol>
                    </nav>
                </div>
            </div>