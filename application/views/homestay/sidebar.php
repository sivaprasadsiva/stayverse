<!--**********************************
Sidebar start
***********************************-->
<div class="dlabnav">
	<div class="dlabnav-scroll">
		<ul class="metismenu" id="menu">



			<li><a href="<?= base_url('homestay') ?>" aria-expanded="false">
					<i class="bi bi-grid"></i>

					<span class="nav-text"><b>Dashboard</b></span>
				</a>


			</li>
			<!-- <li><a class="" href="<?= base_url('homestay/rooms_booking') ?>" aria-expanded="false">
					<img src="assets/icons/booking.png" width="20px" style="color:green">&nbsp;
					<span class="nav-text"><b>Rooms Booking</b></span>
				</a>

			</li> -->
			<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
					<i class="fa fa-hotel" aria-hidden="true"></i>

					<span class="nav-text"><b>Homestay</b></span>
				</a>
				<ul aria-expanded="false">
					<!-- <li><a href="<?= base_url('homestay/owner') ?>"><b>Homestay Update</b></a></li> -->
					<li><a href="<?= base_url('homestay/rooms') ?>"><b>Rooms</b></a></li>
					<li><a href="<?= base_url('homestay/gallery') ?>"><b>Gallery</b></a></li>
				</ul>

			</li>
			<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
					<i class="fa fa-credit-card" aria-hidden="true"></i>

					<span class="nav-text"><b>Payment</b></span>
				</a>
				<ul aria-expanded="false">
					<li><a href="<?= base_url('homestay/pending') ?>"><b>Pending Payment</b></a></li>
					<li><a href="<?= base_url('homestay/credited') ?>"><b>Credit Payment</b></a></li>
				</ul>

			</li>
			

			

		</ul>




	</div>
</div>
<!--**********************************
Sidebar end
***********************************-->