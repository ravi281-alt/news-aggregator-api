<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>GreatKart | One of the Biggest Online Shopping Platform</title>

<link href="{{asset('images/favicon.ico')}}" rel="shortcut icon" type="image/x-icon">

<!-- jQuery -->
<script src="{{asset('js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="{{asset('js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css"/>

<!-- Font awesome 5 -->
<link href="{{asset('fonts/fontawesome/css/all.min.css')}}" type="text/css" rel="stylesheet">

<!-- custom style -->
<link href="{{asset('css/ui.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('css/responsive.css')}}" rel="stylesheet" media="only screen and (max-width: 1200px)" />

<!-- custom javascript -->
<script src="{{asset('js/script.js')}}" type="text/javascript"></script>

<script type="text/javascript">
/// some script

// jquery ready start
$(document).ready(function() {
	// jQuery code

}); 
// jquery end
</script>

</head>
<body>


<header class="section-header">
<nav class="navbar p-md-0 navbar-expand-sm navbar-light border-bottom">
<div class="container">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTop4">
    <ul class="navbar-nav mr-auto">
    	<li class="nav-item dropdown">
		 	<a href="#" class="nav-link">   English </a>
		    
		</li>
		<li class="nav-item dropdown">
			<a href="#" class="nav-link"> USD </a>
		</li>
    </ul>
    <ul class="navbar-nav">
		<li><a href="#" class="nav-link"> <i class="fa fa-envelope"></i> Email </a></li>
		<li><a href="#" class="nav-link"> <i class="fa fa-phone"></i> Call us </a></li>
	</ul> <!-- list-inline //  -->
  </div> <!-- navbar-collapse .// -->
</div> <!-- container //  -->
</nav>

<section class="header-main border-bottom">
	<div class="container">
<div class="row align-items-center">
	<div class="col-lg-2 col-md-3 col-6">
		<a href="{{asset('./')}}" class="brand-wrap">
			<img class="logo" src="{{asset('./images/logo.png')}}">
		</a> <!-- brand-wrap.// -->
	</div>
	<div class="col-lg col-sm col-md col-6 flex-grow-0">
		<div class="category-wrap dropdown d-inline-block float-right">
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> 
				<i class="fa fa-bars"></i> All category 
			</button>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="#">Machinery / Mechanical Parts / Tools </a>
				<a class="dropdown-item" href="#">Consumer Electronics / Home Appliances </a>
				<a class="dropdown-item" href="#">Auto / Transportation</a>
				<a class="dropdown-item" href="#">Apparel / Textiles / Timepieces </a>
				<a class="dropdown-item" href="#">Home & Garden / Construction / Lights </a>
				<a class="dropdown-item" href="#">Beauty & Personal Care / Health </a> 
			</div>
		</div>  <!-- category-wrap.// -->
	</div> <!-- col.// -->
	<a href="{{asset('./store.html')}}" class="btn btn-outline-primary">Store</a>
	<div class="col-lg  col-md-6 col-sm-12 col">
		<form action="#" class="search">
			<div class="input-group w-100">
			    <input type="text" class="form-control" style="width:60%;" placeholder="Search">
			    
			    <div class="input-group-append">
			      <button class="btn btn-primary" type="submit">
			        <i class="fa fa-search"></i>
			      </button>
			    </div>
		    </div>
		</form> <!-- search-wrap .end// -->
	</div> <!-- col.// -->
	<div class="col-lg-3 col-sm-6 col-8 order-2 order-lg-3">
				<div class="d-flex justify-content-end mb-3 mb-lg-0">
					<div class="widget-header">
						<small class="title text-muted">Welcome guest!</small>
						<div> 
							<a href="{{asset('./signin.html')}}">Sign in</a> <span class="dark-transp"> | </span>
							<a href="{{asset('./register.html')}}"> Register</a>
						</div>
					</div>
					<a href="{{asset('./cart.html')}}" class="widget-header pl-3 ml-3">
						<div class="icon icon-sm rounded-circle border"><i class="fa fa-shopping-cart"></i></div>
						<span class="badge badge-pill badge-danger notify">0</span>
					</a>
				</div> <!-- widgets-wrap.// -->
			</div> <!-- col.// -->
</div> <!-- row.// -->
	</div> <!-- container.// -->
</section> <!-- header-main .// -->




</header> <!-- section-header.// -->