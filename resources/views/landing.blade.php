<!DOCTYPE html>

<html lang="en-US">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="{{asset('assets/landing/fonts/font-awesome.css')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="{{asset('assets/landing/bootstrap/css/bootstrap.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('assets/landing/css/bootstrap-select.min.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('assets/landing/css/owl.carousel.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('assets/landing/css/style.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('assets/landing/css/selectize.css')}}" type="text/css">
	<title>Real Estate</title>

	<script type="text/javascript" src="{{asset('assets/landing/js/jquery-2.1.4.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/landing/js/jquery-migrate-1.2.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/landing/bootstrap/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/landing/js/jquery.placeholder.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/landing/js/owl.carousel.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/landing/js/retina-1.1.0.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/landing/js/masonry.pkgd.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/landing/js/selectize.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('assets/landing/js/custom.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/landing/js/ie.js')}}"></script>

</head>

<body class="page-homepage" id="page-top">
<!-- Preloader -->
<div id="page-preloader">
	<div class="loader-ring"></div>
	<div class="loader-ring2"></div>
</div>
<!-- End Preloader -->

<!-- Wrapper -->
<div class="wrapper">
	<!-- Start Header -->
	<div id="header" class="menu-wht">
		@include('layouts.landing_header_page')
	</div>
	<!-- End Header -->
	<!-- Page Content -->
	<div id="page-content_home">
		<div class="home_2">
			<div id="owl-demo-header" class="owl-carousel owl-theme carousel-full-width">
				<div class="item">
					<span class="filter"></span>
					<div class="head-title-2" style="background: url('assets/landing/img/header_image_2.jpg') center;background-size: cover;">
						<div class="container">
							<div class="title col-lg-6 col-lg-offset-0 col-md-6 col-sm-8 col-sm-offset-1 col-xs-9 col-xs-offset-1">
								<h1>The simplest way <br> to find the right Property</h1>
								<h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it</h4>
								<span class="ffs-bs"><a href="property_page.html" class="btn btn-large btn-primary">learn more</a></span>
							</div>
						</div>
					</div>
				</div>
				<div class="item">
					<span class="filter"></span>
					<div class="head-title-2" style="background: url('assets/landing/img/header_image.jpg') center;background-size: cover;">
						<div class="container">
							<div class="title col-lg-6 col-lg-offset-0 col-md-6 col-sm-8 col-sm-offset-1 col-xs-9 col-xs-offset-1">
								<h1>The simplest way <br> to find the right Property</h1>
								<h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it</h4>
								<span class="ffs-bs"><a href="property_page.html" class="btn btn-large btn-primary">learn more</a></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="explore">
				<h2>Explore Properties in Your Area</h2>
				<h5><i class="fa fa-map-marker"></i>Warsaw, Poland <span class="team-color">Change location</span></h5>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<a href="search_result.html" class="exp-img" style="background:url('assets/landing/img/home_1.jpg') center;background-size: cover;">
						<span class="filter"></span>
						<div class="img-info">
							<h3>Studio Apartment’s</h3>
							<h6>33 Properties</h6>
							<span class="ffs-bs btn btn-small btn-primary">explore more</span>
						</div>
					</a>
				</div>
				<div class="col-md-4 col-sm-6">
					<a href="search_result.html" class="exp-img" style="background:url('assets/landing/img/home_2.jpg') center;background-size: cover;">
						<span class="filter"></span>
						<div class="img-info">
							<h3>1+ Bedroom Apt</h3>
							<h6>33 Properties</h6>
							<span class="ffs-bs btn btn-small btn-primary">explore more</span>
						</div>
					</a>
				</div>
				<div class="col-md-4 col-sm-6">
					<a href="search_result.html" class="exp-img" style="background:url('assets/landing/img/home_3.jpg') center;background-size: cover;">
						<span class="filter"></span>
						<div class="img-info">
							<h3>Cozy Houses</h3>
							<h6>33 Properties</h6>
							<span class="ffs-bs btn btn-small btn-primary">explore more</span>
						</div>
					</a>
				</div>
				<div class="col-md-4 col-sm-6">
					<a href="search_result.html" class="exp-img" style="background:url('assets/landing/img/home_4.jpg') center;background-size: cover;">
						<span class="filter"></span>
						<div class="img-info">
							<h3>Luxury House</h3>
							<h6>33 Properties</h6>
							<span class="ffs-bs btn btn-small btn-primary">explore more</span>
						</div>
					</a>
				</div>
				<div class="col-md-8">
					<a href="search_result.html" class="exp-img" style="background:url('assets/landing/img/home_5.jpg') center;background-size: cover;">
						<span class="filter"></span>
						<div class="img-info">
							<h3>With Swimming Pool</h3>
							<h6>33 Properties</h6>
							<span class="ffs-bs btn btn-small btn-primary">explore more</span>
						</div>
					</a>
				</div>
			</div>
		</div>
		<!-- end container -->
		<div class="wide-1">
			<div class="container rel-img">
				<div class="col-md-8 col-sm-8 ab-us">
					<h2>We are Suburb Real Estate Agency</h2>
					<div class="row">
						<div class="col-md-6 col-sm-6 ex-block">
							<h4><i class="fa fa-circle-o"></i>Wide Range of Properties</h4>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</div>
						<div class="col-md-6 col-sm-6 ex-block">
							<h4><i class="fa fa-circle-o"></i>About us</h4>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry five centuries, but also the leap.</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-sm-6 ex-block">
							<h4><i class="fa fa-circle-o"></i>14 Agents for Your Service</h4>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</div>
						<div class="col-md-6 col-sm-6 ex-block">
							<h4>&nbsp;</h4>
							<p>Typesetting, remaining essentially unchanged. It was popularised in the 1960s.</p>
						</div>
					</div>
					<span class="ffs-bs"><a href="property_page.html" class="btn btn-large">explore property</a></span>
				</div>
			</div>
			<div class="ab-us-img col-md-4 col-sm-4"></div>
		</div>
		<!-- end wide-1 -->
		<div class="wide-2">
			<div class="container">
				<div class="explore">
					<h2>Our New Exclusive Homes</h2>
					<h5 class="team-color">Lorem Ipsum is simply dummy text of the printing and typesetting industry. <br>Lorem Ipsum has been the industry's standard dummy text ever since</h5>
				</div>
				<div class="row">
					<div class="col-md-3 col-sm-3 col-xs-6 prop">
						<div class="wht-cont">
							<div class="exp-img-2" style="background:url('assets/landing/img/shortcodes-header.jpg') center;background-size: cover;">
								<span class="filter"></span>
								<span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">browse photos</label></span>
								<div class="overlay">
									<div class="img-counter">23 Photo</div>
								</div>
							</div>
							<div class="item-title">
								<h4><a href="property_page.html">AVA High Line 89 - 916 Apartments</a></h4>
								<p class="team-color">525 W 28th St, New York, NY 10001</p>
								<div class="col-md-7 col-sm-7 col-xs-7">
									<p>Studio - 2 bd</p>
								</div>
								<div class="col-md-5 col-sm-5 col-xs-5">
									<p>86 m<span class="rank">2</span></p>
								</div>
								<div class="col-md-7 col-sm-7 col-xs-7 lft-brd"></div>
								<div class="col-md-5 col-sm-5 col-xs-5 lft-brd"></div>
							</div>
							<hr>
							<div class="item-title btm-part">
								<div class="row">
									<div class="col-md-8 col-sm-8 col-xs-8">
										<p>$5,000,000</p>
										<p class="team-color">FOR SALE</p>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-4 favorite">
										<div class="bookmark" data-bookmark-state="empty">
											<span class="title-add">Add to bookmark</span>
										</div>
										<div class="compare" data-compare-state="empty">
											<span class="plus-add">Add to compare</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-6 prop">
						<div class="wht-cont">
							<div class="exp-img-2" style="background:url('assets/landing/img/home_7.jpg') center;background-size: cover;">
								<span class="filter"></span>
								<span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">browse photos</label></span>
								<div class="overlay">
									<div class="img-counter">23 Photo</div>
								</div>
							</div>
							<div class="item-title">
								<h4><a href="property_page.html">Prism at Park Avenue South Apar</a></h4>
								<p class="team-color">525 W 28th St, New York, NY 10001</p>
								<div class="col-md-7 col-sm-7 col-xs-7">
									<p>Studio - 2 bd</p>
								</div>
								<div class="col-md-5 col-sm-5 col-xs-5">
									<p>86 m<span class="rank">2</span></p>
								</div>
								<div class="col-md-7 col-sm-7 col-xs-7 lft-brd"></div>
								<div class="col-md-5 col-sm-5 col-xs-5 lft-brd"></div>
							</div>
							<hr>
							<div class="item-title btm-part">
								<div class="row">
									<div class="col-md-8 col-sm-8 col-xs-8">
										<p>$5,000,000</p>
										<p class="team-color">FOR SALE</p>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-4 favorite">
										<div class="bookmark" data-bookmark-state="empty">
											<span class="title-add">Add to bookmark</span>
										</div>
										<div class="compare" data-compare-state="empty">
											<span class="plus-add">Add to compare</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-6 prop">
						<div class="wht-cont">
							<div class="exp-img-2" style="background:url('assets/landing/img/home_8.jpg') center;background-size: cover;">
								<span class="filter"></span>
								<span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">browse photos</label></span>
								<div class="overlay">
									<div class="img-counter">23 Photo</div>
								</div>
							</div>
							<div class="item-title">
								<h4><a href="property_page.html">Avalon Morningside Park Apartment</a></h4>
								<p class="team-color">525 W 28th St, New York, NY 10001</p>
								<div class="col-md-7 col-sm-7 col-xs-7">
									<p>Studio - 2 bd</p>
								</div>
								<div class="col-md-5 col-sm-5 col-xs-5">
									<p>86 m<span class="rank">2</span></p>
								</div>
								<div class="col-md-7 col-sm-7 col-xs-7 lft-brd"></div>
								<div class="col-md-5 col-sm-5 col-xs-5 lft-brd"></div>
							</div>
							<hr>
							<div class="item-title btm-part">
								<div class="row">
									<div class="col-md-8 col-sm-8 col-xs-8">
										<p>$5,000,000</p>
										<p class="team-color">FOR SALE</p>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-4 favorite">
										<div class="bookmark" data-bookmark-state="empty">
											<span class="title-add">Add to bookmark</span>
										</div>
										<div class="compare" data-compare-state="empty">
											<span class="plus-add">Add to compare</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-6 prop">
						<div class="wht-cont">
							<div class="exp-img-2" style="background:url('assets/landing/img/home_9.jpg') center;background-size: cover;">
								<span class="filter"></span>
								<span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">browse photos</label></span>
								<div class="overlay">
									<div class="img-counter">23 Photo</div>
								</div>
							</div>
							<div class="item-title">
								<h4><a href="property_page.html">Prism at Park Avenue South Apar</a></h4>
								<p class="team-color">525 W 28th St, New York, NY 10001</p>
								<div class="col-md-7 col-sm-7 col-xs-7">
									<p>Studio - 2 bd</p>
								</div>
								<div class="col-md-5 col-sm-5 col-xs-5">
									<p>86 m<span class="rank">2</span></p>
								</div>
								<div class="col-md-7 col-sm-7 col-xs-7 lft-brd"></div>
								<div class="col-md-5 col-sm-5 col-xs-5 lft-brd"></div>
							</div>
							<hr>
							<div class="item-title btm-part">
								<div class="row">
									<div class="col-md-8 col-sm-8 col-xs-8">
										<p>$5,000,000</p>
										<p class="team-color">FOR SALE</p>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-4 favorite">
										<div class="bookmark" data-bookmark-state="empty">
											<span class="title-add">Add to bookmark</span>
										</div>
										<div class="compare" data-compare-state="empty">
											<span class="plus-add">Add to compare</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<span class="ffs-bs bottom"><a href="property_page.html" class="btn btn-default btn-large">explore property</a></span>
		</div>
		<!-- end wide-2 -->
		<div class="wide-3 carousel-full-width">
			<div class="explore">
				<h2>Meet the Suburb Team</h2>
				<h5 class="team-color">Lorem Ipsum is simply dummy text of the printing and typesetting industry. <br>Lorem Ipsum has been the industry's standard dummy text ever since</h5>
			</div>
			<div id="owl-demo" class="owl-carousel owl-theme ">
				<div class="item">
					<div class="image" style="background:url('assets/landing/img/sara-1.png') center"></div>
					<div class="img-info">
						<div class="row">
							<div class="half col-xs-7">
								<h3><a href="agent_profile.html">Sara Strawberry</a></h3>
								<h6>Manager</h6>
							</div>
							<div class="half col-xs-5 info-right">
								<p></p>
							</div>
							<hr>
						</div>
						<p>“Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry”</p>
					</div>
				</div>
				<div class="item">
					<div class="image" style="background:url('assets/landing/img/sara-2.png') center"></div>
					<div class="img-info">
						<div class="row">
							<div class="half col-xs-7">
								<h3><a href="agent_profile.html">Marta Haufman</a></h3>
								<h6>Manager Assistent</h6>
							</div>
							<div class="half col-xs-5 info-right">
								<p></p>
							</div>
							<hr>
						</div>
						<p>“Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry”</p>
					</div>
				</div>
				<div class="item">
					<div class="image" style="background:url('assets/landing/img/sara-3.png') center"></div>
					<div class="img-info">
						<div class="row">
							<div class="half col-xs-7">
								<h3><a href="agent_profile.html">Lisa Milk</a></h3>
								<h6>Realtor</h6>
							</div>
							<div class="half col-xs-5 info-right">
								<p></p>
							</div>
							<hr>
						</div>
						<p>“Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry”</p>
					</div>
				</div>
				<div class="item">
					<div class="image" style="background:url('assets/landing/img/sara-4.png') center"></div>
					<div class="img-info">
						<div class="row">
							<div class="half col-xs-7">
								<h3><a href="agent_profile.html">Jason Satti</a></h3>
								<h6>Superhero</h6>
							</div>
							<div class="half col-xs-5 info-right">
								<p>415 Deals Done</p>
							</div>
							<hr>
						</div>
						<p>“Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry”</p>
					</div>
				</div>
				<div class="item">
					<div class="image" style="background:url('assets/landing/img/sara-5.png') center"></div>
					<div class="img-info">
						<div class="row">
							<div class="half col-xs-7">
								<h3><a href="agent_profile.html">Someone</a></h3>
								<h6>Realtor</h6>
							</div>
							<div class="half col-xs-5 info-right">
								<p></p>
							</div>
							<hr>
						</div>
						<p>“Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry”</p>
					</div>
				</div>
			</div>
			<span class="ffs-bs"><a href="about_us.html" class="btn btn-default btn-large">more about us</a></span>
		</div>
		<!-- end wide-3 carousel-full-width -->
		<div class="container">
			<section class="block testimonials">
				<header class="center">
					<h2 class="no-border">We love Suburb Work!</h2>
				</header>
				<div class="owl-carousel testimonials-carousel">
					<blockquote class="item">
						<aside class="cite">
							<p class="team-color">"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled"</p>
						</aside>
						<figure>
							<div class="image">
								<img src="{{asset('assets/landing/img/sara-3.png')}}" alt="">
							</div>
							<p>Johan Nordquist</p>
							<p class="team-color">Someone From Company</p>
						</figure>
					</blockquote>
					<blockquote class="item">
						<aside class="cite">
							<p class="team-color">"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled"</p>
						</aside>
						<figure>
							<div class="image">
								<img src="{{asset('assets/landing/img/sara-4.png')}}" alt="">
							</div>
							<p>Sara Genergy</p>
							<p class="team-color">Someone From Company</p>
						</figure>
					</blockquote>
					<blockquote class="item">
						<aside class="cite">
							<p class="team-color">"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled"</p>
						</aside>
						<figure>
							<div class="image">
								<img src="{{asset('assets/landing/img/sara-5.png')}}" alt="">
							</div>
							<p>Sara Strawberry</p>
							<p class="team-color">Someone From Company</p>
						</figure>
					</blockquote>
				</div>
			</section>
		</div>
		<!-- end container -->
		<div class="wide-3">
			<div class="container">
				<div class="logo-cont">
					<div class="logos" style="background:url('assets/landing/img/brand_1.png') center no-repeat"></div>
				</div>
				<div class="logo-cont">
					<div class="logos" style="background:url('assets/landing/img/brand_2.png') center no-repeat"></div>
				</div>
				<div class="logo-cont">
					<div class="logos" style="background:url('assets/landing/img/brand_3.png') center no-repeat"></div>
				</div>
				<div class="logo-cont">
					<div class="logos" style="background:url('assets/landing/img/brand_4.png') center no-repeat"></div>
				</div>
				<div class="logo-cont">
					<div class="logos" style="background:url('assets/landing/img/brand_5.png') center no-repeat"></div>
				</div>
			</div>
		</div>
		<!-- end wide-3 -->
	</div>
	<!-- end Page Content -->

	<!-- Start Footer -->
	<div id="footer">
		@include('layouts.footer')

	</div>
	<!-- End Footer -->
</div>


</body>
</html>