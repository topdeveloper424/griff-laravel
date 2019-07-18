	<div class="navigation">
		<header class="navbar" id="top">  
			<div class="container">
				<div class="navbar-brand nav">
					<a class="navbar-brand nav logo" href="/" title="" rel="home">
						<object class="master-logo" type="image/svg+xml"></object>
					</a>
					<a class="navbar-brand nav logo retina" href="/" title="" rel="home">
						<object class="master-logo" type="image/svg+xml"></object> 
					</a>
				</div>
				<nav class="primary start main-menu">
					<ul class="nav navbar-nav pull-right">
						<li><a href="add_property.html">Contact us</a></li>
						<li><a href="{{route('login')}}">Log in<i class="fa fa-arrow-right"></i></a></li>
						<li><a href="{{route('register')}}">Registration</a></li>
					</ul>
				</nav>
			</div>
			<div class="site-header">
				<a href="#" data-toggle="dropdown" class="pull-right drop-left">Menu
					<div class="gamb-button"> 
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</div>
				</a>
				<div class="navbar-brand nav">
					<a class="navbar-brand nav logo" href="index_v_1.html" title="" rel="home">
						<object class="master-logo" type="image/svg+xml"></object> 
					</a>
					<a class="navbar-brand nav logo retina" href="index_v_1.html" title="" rel="home">
						<object class="master-logo" type="image/svg+xml"></object> 
					</a>
				</div>
				<div class="mob-menu drop-close hidden">
					<a href="#" data-toggle="dropdown" class="pull-right drop-close hidden black-cross">Close
						<span class="cross"></span>
					</a>
					<nav class="secondary">
						<ul class="nav navbar-nav">
							<li><a href="{{route('contact-us')}}">Contact us</a></li>
							<li><a style="cursor: pointer" onclick="signIn()">Log in</a></li>
							<li><a style="cursor: pointer" onclick="signUp()">Registration</a></li>
						</ul>
					</nav><!-- /.navbar collapse-->
				</div>

			</div>
		</header><!-- /.navbar -->
	</div>

