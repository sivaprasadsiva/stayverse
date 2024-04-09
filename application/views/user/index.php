<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stayverse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Istok+Web:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:wght@400;600&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url();?>assets1/css/main.css">
    <link rel="stylesheet" href="<?= base_url();?>assets1/css/slider.css">
    <link rel="stylesheet" href="<?= base_url();?>assets1/scss/_date.scss">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="<?= base_url();?>assets1/css/swiper-bundle.min.css">

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <!-- double date picker -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />





</head>

<body>
    <div class="main-wrapper">
        <div class="main-wrapper-con">
            <div class=" main-area-con">
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

               
                <div class="container main-head-center container-style">
                    <section class="body-area">
                        <div class="body-head">
                            <h4>Book your ideal<span>Homestay Villas Apartments</span>  & more.</h4>
                        </div>
                        <?= form_open((base_url().'userpanel/index'))?>
                        <div class="body-section ">
                            <div class="box-style">
                                <i class="box-icon-style fa-solid fa-location-dot"></i>
                                <div class="box-right">
                                    <input class="input-style location" placeholder="Enter Locality City" id="searchInput" type="text" name="location" autocomplete="off" required>
                                </div>
                                <div class="box-style-inner">
                                    <i class="fa-solid fa-location-crosshairs"></i>
                                    <span>Near me</span>
                                </div>
                            </div>
                            <div class="box-style">
                                <div class="box-right date-con">
                                    <!-- <input id="checkin" class="date-select input-style inp-box-style"
                                        placeholder="Check In" onfocus="changeInputType(this)"
                                        onblur="changeInputType(this)" mtype="text">
                                    <label for="checkin" class="calendar-icon"></label> -->
                                    <?php $currentDate = date('d-m-Y');
                                            $newDate = date('d-m-Y', strtotime($currentDate .'+1 day'));?>
                                    <input type="text" name="daterange" value="<?= $currentDate.' - '.$newDate;?>"/>

                                    <script>
                                          $(function() {
                                            $('input[name="daterange"]').daterangepicker({
                                              opens: 'left',
                                              startDate: '<?= $currentDate; ?>',
                                              endDate: '<?= $newDate; ?>',
                                              locale: {
                                                format: 'DD-MM-YYYY' // Adjust the format as needed
                                              }
                                            }, function(start, end, label) {
                                              console.log("A new date selection was made: " + start.format('DD-MM-YYYY') + ' to ' + end.format('DD-MM-YYYY'));
                                            });
                                          });
                                    </script>
                                    
                                </div>
                            </div>
                            <!-- <div class="box-style">
                                <div class="box-right date-con">
                                    <input id="checkout" class="date-select input-style inp-box-style"
                                        placeholder="Check Out" onfocus="changeInputType(this)"
                                        onblur="changeInputType(this)" mtype="text">
                                    <label for="checkout" class="calendar-icon"></label> 
                                </div>
                            </div> -->
                            <div class="box-style">
                                <div class="booking-form__input guests-input ">
                                    <!-- <label for="guests-input-btn">Guests</label> -->
                                    <button name="guests-btn" id="guests-input-btn">Guets,Rooms</button>
                                    <div class="guests-input__options" id="guests-input-options">
                                        <div>
                                            <span class="guests-input__ctrl minus" id="adults-subs-btn">-</span><!-- /.guests-input__ctrl -->
                                            <span class="guests-input__value"><span id="guests-count-adults">1</span>Guests</span><!-- /.guests-input__value -->
                                            <span class="guests-input__ctrl plus" id="adults-add-btn">+</span><!-- /.guests-input__ctrl -->
                                            <script type="text/javascript">
                                                $('#adults-subs-btn').click(function(){
                                                    var no = $('#guests-count-adults').html();
                                                    if(no > 1){
                                                        $('input[name="guests"]').val(no - 1);
                                                    }
                                                    
                                                })
                                                $('#adults-add-btn').click(function(){
                                                    var no = $('#guests-count-adults').html();
                                                    if(no <= 14){
                                                    $('input[name="guests"]').val(parseInt(no) + 1);
                                                }
                                                })
                                            </script>
                                        </div>
                                        <div>
                                            <span class="guests-input__ctrl minus" id="children-subs-btn">-</span><!-- /.guests-input__ctrl -->
                                            <span class="guests-input__value"><span id="guests-count-children">1</span>Rooms</span><!-- /.guests-input__value -->
                                            <span class="guests-input__ctrl plus" id="children-add-btn">+</span><!-- /.guests-input__ctrl -->

                                            <script type="text/javascript">
                                                $('#children-subs-btn').click(function(){
                                                    var no = $('#guests-count-children').html();
                                                    if(no > 0){
                                                        $('input[name="rooms"]').val(no - 1);
                                                    }
                                                    
                                                })
                                                $('#children-add-btn').click(function(){
                                                    var no = $('#guests-count-children').html();
                                                    if(no <= 13){
                                                    $('input[name="rooms"]').val(parseInt(no) + 1);
                                                    }
                                                })

                                                
                                            </script>
                                        </div>
                                    </div><!-- /.guests-input__options -->
                                </div><!-- /.booking-form__input -->
                            </div>
                            <!-- <div class=" box-style-search">
                                <div class="body-foot">
                           
                                    <a href="properties.html" class="login-btn search-btn">Search</a>
                                </div>
                            </div> -->
                            <input type="hidden" name="guests" value="1"/>
                            <input type="hidden" name="rooms" value="0"/>
                            <div class="box-style box-style-1">
                                <div class="box-right date-con">
                                    <button type="submit" name="submit" class="login-btn " style="padding: 0;">Search</button>
                                </div>
                            </div> 
                            
                            <!-- ------ -->
                            
                    
                            <!-- ------ -->
                        </div>

                        <div class="row" style="width: 100%;">
                            <div class="col-md-12 recent-search">
                                <?php if(!empty($search)){$s = 0;?><h4>Recent search : <?php foreach($search as $se){?><a href="<?= base_url('userpanel/recentSearch1/'.$s)?>"><?= $se['location']?></a><?php $s++;}?></h4>
                            <?php }?>
                            </div>
                        </div><br>
                        <div id="searchResult" style="height:100%;"></div>
                        
                        <?= form_close()?>
                    </section>
                </div>
            </div>
            <section class="container section-style event-con">
                <div class="section-head-style event-head">
                    <h1>Event and Festivals</h1>
                </div>
                <div class="container">
                    <div class="slider" data-slider>
                        <ul class="slider__track" data-slider-track>
                            <?php if(!empty($events)){foreach($events as $e){?>
                            <a class="each-slide pr-0" href="<?= base_url().'userpanel/events/'.$e['id']?>">
                                <li class="slide-container p-15px">
                                    <div class="slide ">
                                        <img src="<?= base_url();?>assets/images/<?= $e['photo']?>"
                                            alt="">
                                    </div>
                                    <h5><?= $e['name']?></h5>
                                </li>
                            </a>
                           <?php }}?>
                        </ul>
                        <div class="slider__buttons">
                            <button class="slider__button prev" data-slider-prev disabled>
                            </button>
                            <button class="slider__button nxt" data-slider-next>
                            </button>
                        </div>
                    </div>
                </div>


            </section>
            <section class="container section-style wonderland-con">
                <div class="section-head-style wonderland-head">
                    <h1>Find your wonderland</h1>
                </div>
                <div class="container">
                    <div class="slider wanderland-slider" data-slider-wander>
                        <ul class="slider__track" data-slider-track>
                            <?php if(!empty($wonderland)){foreach($wonderland as $wonder){?>
                            <a class="each-slide" href="<?= base_url().'userpanel/wonderland/'.$wonder['id']?>">
                                <li class="slide-container">
                                    <div class="slide box-slide">
                                        <img src="<?= base_url();?>assets/images/<?= $wonder['image']?>"
                                            alt="">
                                    </div>
                                    <h5><?= $wonder['name']?></h5>
                                </li>
                            </a>
                            <?php }}?>
                        </ul>
                        <div class="slider__buttons">
                            <button class="slider__button prev" data-slider-prev disabled>
                            </button>
                            <button class="slider__button nxt" data-slider-next>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            <section class="container section-style services-con">
                <div class="section-head-style services-head">
                    <h1>Offers & Deals</h1>
                </div>
                <div class="container">
                    <div class="wrapper">
                        <div class="carousel">
                            <?php if(!empty($offers)){foreach($offers as $offer){?>
                            <a href="<?= base_url('userpanel/offers/'.$offer['id'])?>">
                                <div class="carousel-con">
                                    <img src="<?= base_url();?>assets/images/offers/<?= $offer['image']?>" alt="" draggable="false">
                                </div>
                            </a>
                            <?php }}?>
                            
                        </div>
                    </div>
                </div>
            </section>
            <section class="container section-style services-con">
                <div class="section-head-style services-head">
                    <h1>Our services</h1>
                </div>
                <div class="container-fluid">
                    <div class="slider carousel-service-slider-con" data-slider-service>
                        <?php if($slide){foreach($slide as $s){if($s['status'] == 2){?>
                        <ul class="slider__track track-style" data-slider-track>
                            <a class="carousel-slide" href="">
                                <div class="plans-body row-style row">
                                    <div class="image-section col-lg-12 col-md-12 col-sm-12 col-12">
                                        <img src="<?= base_url();?>assets/images/<?= $s['image']?>" alt="">
                                    </div>
                                </div>
                            </a>
                            <?php }}}?>
                            
                        </ul>
                        <div class="slider__buttons">
                            <button class="slider__button prev" data-slider-prev disabled>
                            </button>
                            <button class="slider__button nxt" data-slider-next>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section-style ychoose-con">
                <div class="container">
                    <div class="ychoose-head row">
                        <div class="ychoose-left col-lg-7 col-md-12 col-sm-12 col-12">
                            <div class="ychoose-left-head">
                                <h1>Why Choose us ?</h1>
                            </div>
                            <div class="ychoose-left-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Tenetur aspernatur ad ea quae neque nulla similique nisi rerum error provident sed
                                    reiciendis iusto quam, nam laudantium vero reprehenderit? Laboriosam, consectetur.
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Tenetur aspernatur ad ea quae neque nulla similique nisi rerum error provident sed
                                    reiciendis iusto quam, nam laudantium vero reprehenderit? Laboriosam, consectetur.
                                </p>
                            </div>
                            <div class="ychoose-left-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Tenetur aspernatur ad ea quae neque nulla similique nisi rerum error provident sed
                                    reiciendis iusto quam, nam laudantium vero reprehenderit? Laboriosam, consectetur.
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Tenetur aspernatur ad ea quae neque nulla similique nisi rerum error provident sed
                                    reiciendis iusto quam, nam laudantium vero reprehenderit? Laboriosam, consectetur.
                                </p>
                            </div>
                            <div class="ychoose-left-foot">
                                <ul class="ul-style y-choose-ul">
                                    <li class="ychoose-li">
                                        <h1>10K+</h1>
                                        <h2>Success Tour</h2>
                                    </li>
                                    <li class="ychoose-li">
                                        <h1>15K+</h1>
                                        <h2>Happy Clients</h2>
                                    </li>
                                    <li class="ychoose-li">
                                        <h1>10+</h1>
                                        <h2>Success Tour</h2>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="ychoose-right col-lg-5 col-md-12 col-sm-12 col-12 row">
                            <div class="ychoose-img col-lg-12 col-md-12 col-sm-4 col-4">
                                <div class="ychoose-img-con">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/42/Shaqi_jrvej.jpg/1200px-Shaqi_jrvej.jpg"
                                        alt="" srcset="">
                                </div>
                            </div>
                            <div class="ychoose-img col-lg-6 col-md-6 col-sm-4 col-4">
                                <div class="ychoose-img-con">
                                    <img src="https://img.freepik.com/free-photo/forest-landscape_71767-127.jpg?size=626&ext=jpg&ga=GA1.1.1413502914.1696377600&semt=ais"
                                        alt="" srcset="">
                                </div>
                            </div>
                            <div class="ychoose-img col-lg-6 col-md-6 col-sm-4 col-4">
                                <div class="ychoose-img-con">
                                    <img src="https://img.freepik.com/free-photo/forest-landscape_71767-127.jpg?size=626&ext=jpg&ga=GA1.1.1413502914.1696377600&semt=ais"
                                        alt="" srcset="">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <section class="section-style activities-con">
                <div class="section-head-style activities-head">
                    <h1>Activities</h1>
                </div>
                <div class="container">
                    <div class="slider" data-slider-2>
                        <ul class="slider__track" data-slider-track>
                            <?php if(!empty($activities)){foreach($activities as $activity){?>
                            <a class="each-slide" href="<?= base_url('userpanel/activity/'.$activity['id'])?>">
                                <li class="slide-container activities-slider-con">
                                    <div class="slide">
                                        <img src="<?= base_url();?>assets/images/activity/<?= $activity['image']?>"
                                            alt="">
                                    </div>
                                    <h5><?= $activity['name']?></h5>
                                </li>
                            </a>
                            <?php }}?>
                            
                        </ul>
                        <div class="slider__buttons">
                            <button class="slider__button prev" data-slider-prev disabled>
                            </button>
                            <button class="slider__button nxt" data-slider-next>
                            </button>
                        </div>
                    </div>
                </div>
            </section>

<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAyeT851_xjSqnmyjgCU1kCUFxwhNP2Xlw&callback=initMaps" async defer></script>
<script>

function initMaps() {
    var map = new google.maps.Map(document.getElementById('searchResult'), {
      center: {lat: -33.8688, lng: 151.2195},
      zoom: 13
    });
    
    var input = document.getElementById('searchInput');    
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }
  
        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
        marker.setIcon(({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
        }));
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);
    
        var address = '';
        if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }
    
        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);
      
        showPosi(place.geometry.location.lat(),place.geometry.location.lng());

        
    });
}

</script>




    

</body>

</html>