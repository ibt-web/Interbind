<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$url_css = base_url().'assets/css/';
$url_js = base_url().'assets/js/';
$url_img = base_url().'assets/img/';
?>

<html>
<head>
<title>Enterprise Application</title>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	
	<script>
		$(document).ready(function(){
		
		$(function () {
                $(document).scroll(function () {
				
                    var $nav = $(".fixed-top");
                    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
                    var $nav_link = $(".navbar-light .navbar-nav .nav-link");
                    $nav_link.toggleClass('scrolled-link', $(this).scrollTop() > $nav.height());
                });
            });
		});
	
	</script>

</head>

<body>
<header>
	<nav class="navbar navbar-expand-lg navbar-light fixed-top">
	<a class="nav_logo_small" href="#home"><img src="<?php echo $url_img;?>logo_4.png" width="215"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav w-100">
                <div class="col text-center">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url(); ?>/Home" id="nav_home">HOME <span class="sr-only">(current)</span></a>
                    </li>
                </div>
                <div class="col text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#ibt_services" id="nav_services">SERVICES</a>
                    </li>
                </div>
                <div class="col text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#ibt_abt_us" id="nav_about">ABOUT US</a>
                    </li>
                </div>
                <div class="col-4 text-center">
                    <li class="nav-item nav_logo">
                        <a class="" href="#home" id="nav_logo"><img src="<?php echo $url_img;?>logo_4.png" width="280"></a>
                    </li>
                </div>
                <div class="col text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#ibt_portfolio" id="nav_portfolio">PORTFOLIO</a>
                    </li>
                </div>
                <div class="col text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#ibt_joinus" id="nav_joinus">JOIN US</a>
                    </li>
                </div>
                <div class="col text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#ibt_contact_us" id="nav_contact">CONTACT US</a>
                    </li>
                </div>
            </ul>
        </div>
    </nav>

</header>
<div class="container-fluid">
	<div class="row">
		<div class="col col_parallax" style="position: relative;">
			<div class="parallax"></div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col bg-light Enterprise_overview">
			<h3 class="text-center">Enterprise Application</h3>
			<p>End to End Application Development Re-Engineering existing applications move to Cloud Computing Deployments Business Architecture Development Jumpstart Application Development Process</p>
		</div>
	</div>
</div>

<div class="container" style="margin-top: 13%;">
	<div class="row text-center">
		<div class="col-6" style="border:1px solid red">
			<h3>Loreum Ipsum</h3>
			<ul style="list-style: none;">
				<?php 
					
					for($i = 1; $i<=6; $i++){
						echo "<li>list - ".$i."</li>";
					}
				
				?>
			</ul>
		</div>
		<div class="col-6" style="border:1px solid black">
			<div class="row">
				<div class="col-12">
					<h3> How loreum ipsum?</h3>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>