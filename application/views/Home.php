<!DOCTYPE html>
<html lang="en">
<head>
    <?php

    $url_css = base_url().'assets/css/';
    $url_js = base_url().'assets/js/';
    $url_img = base_url().'assets/img/';
    ?>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Interbind Technologies</title>
<!-- Title icon-->
    <link rel="icon" href="<?php echo $url_img;?>title_icon.png">
<!--Css -->
    <link rel="stylesheet" href="<?php echo $url_css;?>jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo $url_css;?>jquery-ui.structure.min.css">
    <link rel="stylesheet" href="<?php echo $url_css;?>jquery-ui.theme.min.css">
    <link rel="stylesheet" href="<?php echo $url_css;?>bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url_css;?>bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?php echo $url_css;?>bootstrap-reboot.min.css">
    <link rel="stylesheet" href="<?php echo $url_css;?>font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $url_css;?>animate.css">
    <link rel="stylesheet" href="<?php echo $url_css;?>style.css">
<!-- Js -->
    <script type="text/javascript" src="<?php echo $url_js;?>jquery-3.2.1.min.js"></script>
    <!--script type="text/javascript" src="<?php echo $url_js;?>typed.min.js"></script-->
    <script type="text/javascript" src="<?php echo $url_js;?>popper.min.js"></script>
    <script type="text/javascript" src="<?php echo $url_js;?>bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo $url_js;?>wow.min.js"></script>

    <script>
		$(document).ready(function () { //
			new WOW().init();
			
            $(function () {
                $(document).scroll(function () {
				
                    var $nav = $(".fixed-top");
                    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
                    var $nav_link = $(".navbar-light .navbar-nav .nav-link");
                    $nav_link.toggleClass('scrolled-link', $(this).scrollTop() > $nav.height());
                });
            });
			
			
			$(document).on('click', "#submit", function(){

				var formValidation = false;
				
				var username = $("#username");
				var email = $("#email");
				var subject = $("#subject");
				var message = $("#message");
				
				var error_msg = "";
				
				if (username.val() == "" || username.val() == null){					
					error_msg = "<p><i class='fa fa-exclamation-circle' style='color: red;'></i> " + username.attr("data-error") + "</p>";
					$(".err_username").html(error_msg).show();					
				} else {
					$(".err_username").hide();
					formValidation = true;
				}
				
				
				if (email.val() == "" || email.val() == null){					
					error_msg = "<p><i class='fa fa-exclamation-circle' style='color: red;'></i> " + email.attr("data-error") + "</p>";
					$(".err_email").html(error_msg).show();					
				} else {
					$(".err_email").hide();
					formValidation = true;
				}
				
				
				if (subject.val() == "" || subject.val() == null){					
					error_msg = "<p><i class='fa fa-exclamation-circle' style='color: red;'></i> " + subject.attr("data-error") + "</p>";
					$(".err_subject").html(error_msg).show();					
				} else {
					$(".err_subject").hide();
					formValidation = true;
				}
				
				
				if (message.val() == "" || message.val() == null){					
					error_msg = "<p><i class='fa fa-exclamation-circle' style='color: red;'></i> " + message.attr("data-error") + "</p>";
					$(".err_message").html(error_msg).show();					
				} else {
					$(".err_message").hide();
					formValidation = true;
				}
				
				if(formValidation == true)
				{
					var form = $("#form_contact_us").serializeArray();
					var form_status = $('<div class="form_status"></div>');
					$.ajax({
						method: 'POST',
						url: "<?php echo base_url(); ?>" + "index.php/contact_form",
						data:form,
						dataType: 'json',
						beforeSend: function(){
							$('.beforeSend').html('<p><i class="fa fa-circle-o-notch fa-spin"></i> Please wait...</p>').fadeIn();
						}
					}).done(function(response){
						if(response.ok == 1){
							$('.beforeSend').delay(2800).fadeOut();
							$(".success_msg").html(response.message).delay(3000).fadeIn();
							$(".error_msg").hide();
							$("#form_contact_us").hide();
						}
						else{
							$(".error_msg").html(response.message).show();
							$("#errorModal").modal();
							$('.beforeSend').hide();
							//alert(response.message);
							$(".success_msg").hide();
						}
					});
				} 
				
			});
			
			$(".btn_form_close").on("click",function(){
				$(".success_msg").hide();
				$(".err_username").hide();
				$(".err_email").hide();
				$(".err_subject").hide();
				$(".error_msg").hide();
				$(".err_message").hide();
				$("#form_contact_us")[0].reset();
				$("#form_contact_us").show();
			});
        });
    </script>
</head>
<body class="bg-light" style="font-family: Eurostile® Next, Eurostile Round, Eurostile® LT;">
<header>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
	<a class="nav_logo_small" href="#"><img src="<?php echo $url_img;?>logo_4.png" width="215"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav w-100">
                <div class="col text-center">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">HOME <span class="sr-only">(current)</span></a>
                    </li>
                </div>
                <div class="col text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#ibt_services">SERVICES</a>
                    </li>
                </div>
                <div class="col text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#ibt_abt_us">ABOUT US</a>
                    </li>
                </div>
                <div class="col-4 text-center">
                    <li class="nav-item nav_logo">
                        <a class="" href="#"><img src="<?php echo $url_img;?>logo_4.png" width="280"></a>
                    </li>
                </div>
                <div class="col text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#ibt_portfolio">PORTFOLIO</a>
                    </li>
                </div>
                <div class="col text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#ibt_joinus">JOIN US</a>
                    </li>
                </div>
                <div class="col text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#ibt_contact_us">CONTACT US</a>
                    </li>
                </div>
            </ul>
        </div>
    </nav>
    <div id="main_carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#main_carousel" data-slide-to="0" class="active"></li>
            <li data-target="#main_carousel" data-slide-to="1"></li>
            <li data-target="#main_carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100 carousel_img" src="<?php echo $url_img;?>ibt_creative_1.jpg" alt="First slide">
                <div class="carousel-caption d-md-block">
                    <h1>WE ARE <span class="caption1 ibt_animated typewriter-1" style="color: #027db3; display: inline-block;">CREATIVE</span></h1>
                    <h5>We always implement new, different and fresh ideas</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 carousel_img" src="<?php echo $url_img;?>ibt_web_banner_1.jpg" alt="Second slide">
                <div class="carousel-caption d-md-block">
                    <h1>WE ARE <span class="caption2 ibt_animated typewriter-2" style="color: #027db3; display: inline-block;">WEB DEVELOPERS</span></h1>
                    <h5>We develop modern, trendy and state of the art websites using latest technologies</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 carousel_img" src="<?php echo $url_img;?>ibt_sys_int.jpg" alt="Third slide">
                <div class="carousel-caption d-md-block">
                    <h1>WE ARE <span class="caption3 ibt_animated typewriter-3" style="color: #027db3; display: inline-block;">SYSTEM INTEGRATORS</span></h1>
                    <h5>We enable B2B, B2C integration using advanced framework with scope for scaling in the future</h5>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#main_carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" id="prev" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#main_carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" id="next" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>
<div class="container bg-white" style="margin-top: 4%">
    <div class="row" style="padding: 15px">
        <div class="col-12 col-md-6 col-lg-6 col-xl-6">
            <div class="row">
                <div class="col  text-center ibt_header">
                    <h3>Our Vision</h3>
                    <hr/>
                </div>
            </div>
            <div class="row" style="padding: 10px">
                <div class="col text-justify ibt_content">
                    <p>Interbind's vision is to become the strategic IT partner for our customers world-wide, a one-stop shop for all technological support required for our client's business needs. We aim to become a globally renowned corporation with a highly competent and passionate team delivering best-in-class, reliable and scalable IT solutions for businesses.</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6 col-xl-61">
            <div class="row">
                <div class="col text-center ibt_header">
                    <h3>Our Mission</h3>
                    <hr/>
                </div>
            </div>
            <div class="row" style="padding: 10px">
                <div class="col text-justify ibt_content">
                    <p>Our mission is to combine our technical expertise and domain knowledge to provide cost-effective IT solutions for our client's business needs. The company’s core belief lies in service and quality. We will strive to stretch beyond the call of duty to deliver with trust and commitment in the professional world. Achieving customer delight is our motto.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container bg-white" id="ibt_services" style="margin-top: 4%">
    <div class="row" style="padding: 15px;">
        <div class="col text-center ibt_header">
            <h3>Our Services</h3>
            <hr/>
            <div class="row" style="padding: 10px">
                <div class="col text-center ibt_content">
                    <p>We offer a range of standard and bespoke software development and support services to match your business needs. At Interbind, we have handled projects in a wide spectrum from simple website to complicated business to business integration services.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="padding: 10px; margin-top: 4%;">
        <div class="col col-xs-6 text-center ibt_serv_icons icon_col_1">
            <div style="padding: 10px;">
               <div class="ibt_sprite_icons etp_icon"></div>
                <h5 class="">Enterprise Applications</h5>
                <hr class="serv_hr"/>
                <p class="ibt_serv_info">End to End Application Development Re-Engineering existing applications move to Cloud Computing Deployments Business Architecture Development Jumpstart Application Development Process</p>
            </div>
        </div>
        <div class="col col-xs-6 text-center ibt_serv_icons icon_col_2">
            <div style=" padding: 10px;">
                <div class="ibt_sprite_icons etp_int_icon"></div>
                <h5>Enterprise Integration</h5>
                <hr class="serv_hr"/>
                <p class="ibt_serv_info etp_int_info">B2B & B2C Integration Initiatives
                    Scope for integration and POC implementation
                    Migration to Service Oriented Architecture
                    Rapid & Continuous Deployments
                    Devise Quick to Market Strategies</p>
            </div>
        </div>
        <div class="col col-xs-6 text-center ibt_serv_icons icon_col_3">
            <div style="padding: 10px;">
                <div class="ibt_sprite_icons mg_serv_icon"></div>
                <h5>Managed Services</h5>
                <hr class="serv_hr"/>
                <p class="ibt_serv_info mg_serv_info">Design & Develop Managed Services
                    Create New Services Portfolio
                    Enable B2B through Services
                    Web and Microservices Platforms
                    API Development & Integrations</p>
            </div>
        </div>
    </div>
    <div class="row" style="padding: 10px; margin-top: 4%;">
        <div class="col col-xs-6 text-center ibt_serv_icons icon_col_4">
            <div style="padding: 10px;">
                <div class="ibt_sprite_icons mob_icon"></div>
                <h5>Mobile Applications</h5>
                <hr class="serv_hr"/>
                <p class="ibt_serv_info mob_info">Native, HTML5 and Hybrid Applications
                    iOS / iPhone / iPad Mobile Applications
                    Android Mobile Applications
                    Windows 10 Mobile Applications
                    Enterprise Mobility Solutions</p>
            </div>
        </div>
        <div class="col col-xs-6 text-center ibt_serv_icons icon_col_5">
            <div style=" padding: 10px;">
                <div class="ibt_sprite_icons etp_sln_icon"></div>
                <h5>Enterprise Solutions</h5>
                <hr class="serv_hr"/>
                <p class="ibt_serv_info etp_sln_info">Sugar CRM / vTiger CRM Solutions
                    ERP Solutions
                    Business Process Management
                    SaaS Based System Deployments
                    Custom Application Development</p>
            </div>
        </div>
        <div class="col col-xs-6 text-center ibt_serv_icons icon_col_6">
            <div style="padding: 10px;">
                <div class="ibt_sprite_icons ecom_icon"></div>
                <h5>ECommerce Web Solutions</h5>
                <hr class="serv_hr"/>
                <p class="ibt_serv_info ecom_info">Magento ECommerce Development
                    Web Design and Development
                    SEO / SEM and Branding Services
                    Consultancy on Web 2.0 Solutions
                    Open Source CRM and CSM Solutions</p>
            </div>
        </div>
    </div>
    <div class="row" style="padding: 10px; margin-top: 4%;">
        <div class="col col-xs-6 text-center ibt_serv_icons icon_col_7">
            <div style="padding: 10px;">
                <div class="ibt_sprite_icons offshore_icon"></div>
                <h5>Offshore Development Team</h5>
                <hr class="serv_hr"/>
                <p class="ibt_serv_info offshore_info">Product Engineering
                    Conceptualization of Business Ideas
                    Prototype Development
                    Implementation and Launch
                    Post Launch Support and Enhancements</p>
            </div>
        </div>
        <div class="col col-xs-6 text-center ibt_serv_icons icon_col_8">
            <div style=" padding: 10px;">
                <div class="ibt_sprite_icons conslt_icon"></div>
                <h5>Consulting</h5>
                <hr class="serv_hr"/>
                <p class="ibt_serv_info conslt_info">Business Process and System Design
                    Business and IT Systems Improvements
                    Re-Engineering Existing Systems
                    Project Scoping and Planning
                    Project Management Support</p>
            </div>
        </div>
        <div class="col col-xs-6 text-center ibt_serv_icons icon_col_9">
            <div style="padding: 10px;">
                <div class="ibt_sprite_icons it_supt_icon"></div>
                <h5>IT Support</h5>
                <hr class="serv_hr"/>
                <p class="ibt_serv_info it_supt_info">24x7 Technical Support
                    Multi-level Support
                    T&M IT Support
                    Corporate Training
                    Project Management Support</p>
            </div>
        </div>
    </div>
</div>
<div class="container bg-white" id="ibt_abt_us" style="margin-top: 4%;">
    <div class="row" style="padding: 15px;">
        <div class="col text-center abt_us">
            <h3>About us</h3>
            <hr class="pf_hr"/>
            <a href="" data-toggle="modal" data-target="#exampleModal">Click Here to read more about Interbind</a>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="margin: 0 auto; font-size: 25px; font-weight: 400">About us</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Interbind Technologies Private Limited is a global IT Systems Integration, Development and Consulting Company committed to provide services to our clients with open source computing. We have always aimed to be value partners to our clients, taking pride in their business growth. We always thrive to provide better system integration solutions with intensive analysis and technical expertise that always focus on client needs. We are positioned to deliver rapid, reliable and robust Information Technology solutions that work.</p>
                    <p>Interbind Technologies Private Limited is a specific venture with a team of young professionals working smart for providing IT solutions to Large and Medium sized organisation’s across various verticals on IT Development and Services. Driven by a group of young Entrepreneurs & strong functional background, we cater to customer needs with speed, reliability and cost efficient. Every employee plays an important role in the company’s success. We believe that open communication and simple rules is the key to our success.</p>
                    <p>We at Interbind all of us enjoy a strong culture of fun collaboration, creativity and knowledge sharing. All these make Interbind a fun and challenging place to work.</p>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- modal ends here-->
    <div class="row" style="padding: 15px;">
        <div class="col text-left why_ibt">
            <h4>Why Interbind ?</h4>
            <p>Our customers choose us because we provide simple and pragmatic solution to problems using the best breed of technologies. We deliver on time with consistent result at all times, making us one of the most reliable software services provider.</p>
			<div id="why_carousel" class="carousel slide" data-ride="carousel">
			  <!--ol class="carousel-indicators">
				<li data-target="#why_carousel" data-slide-to="0" class="active"></li>
				<li data-target="#why_carousel" data-slide-to="1"></li>
				<li data-target="#why_carousel" data-slide-to="2"></li>
			  </ol-->
			  <div class="carousel-inner">
				<div class="carousel-item active">
					<div class="row" style="padding: 15px;">
						<div class="col text-center">
							<h5>Process oriented</h5>
							<hr class="hr">
							<div class="text-center why_mobile_icon animated zoomInUp">
								<img src="<?php echo $url_img;?>process oriented.png" width="120" height="120">
							</div>
							<p>We have defined standard set of process to be followed during product development or service deliveries. These processes can also be customised based on our customer needs.</p>
							<p>As we follow well defined process during project execution, end results are always predictable and consistent for every projects completed at Interbind.</p>
						</div>
						<div class="col text-center why_main_icon animated zoomInUp">
							<img src="<?php echo $url_img;?>process oriented.png" width="200" height="200">
						</div>
					</div>
				</div>
				<div class="carousel-item">
				  <div class="row" style=" padding: 15px;">						
						<div class="col text-center">
							<h5>Code Quality</h5>
							<hr class="hr">
							<div class="ext-center why_mobile_icon animated zoomInUp">
								<img src="<?php echo $url_img;?>code_quality.png" width="120" height="120">
							</div>
							<p>We always believe in high quality deliverables and that's why we have implemented stringent process in code reviews.</p>
							<p>Our developers must adhere to the industry's best practices and guidelines while writing programs regardless of technologies or programming languages used.</p>
						</div>
						<div class="col text-center why_main_icon animated zoomInUp">
							<img src="<?php echo $url_img;?>code_quality.png" width="200" height="200">
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="row" style=" padding: 15px;">
						<div class="col text-center">
							<h5>Customer Satisfaction</h5>
							<hr class="hr">
							<div class="text-center why_mobile_icon animated zoomInUp">
								<img src="<?php echo $url_img;?>customer-satisfaction_1.png" width="120" height="120">
							</div>
							<p>We work very closely with our customers to understand their problems and issues in making their business & IT systems co-exist.</p>
							<p>We spend great deal of our time in talking to our customers to get full context of the problem before jumping into offering solutions.</p>
						</div>
						<div class="col text-center why_main_icon animated zoomInUp">
							<img src="<?php echo $url_img;?>customer-satisfaction_1.png" width="200" height="200">
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="row" style=" padding: 15px;">					
						<div class="col text-center">
							<h5>Unique Team & Approach</h5>
							<hr class="hr">
							<div class="text-center why_mobile_icon animated zoomInUp">
								<img src="<?php echo $url_img;?>team_approach.png" width="120" height="120">
							</div>
							<p>Our core strength is the experience and expertise of our team of architect, developers and testers with focus on high quality and timely deliveries.</p>
							<p>Our team is trained extermely on process, design and technologies before we start the actual implementation.</p>
						</div>
						<div class="col text-center why_main_icon animated zoomInUp">
							<img src="<?php echo $url_img;?>team_approach.png" width="200" height="200">
						</div>
					</div>
				</div>
			  </div>
			  <!--a class="carousel-control-prev" href="#why_carousel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: rgba(0,0,0,.5);"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#why_carousel" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true" style="background-color: rgba(0,0,0,.5);"></span>
				<span class="sr-only">Next</span>
			  </a -->
			</div>
        </div>
    </div>
</div>

<div class="container bg-white" id="ibt_portfolio" style="margin-top: 4%">
    <div class="row" style="padding: 15px;">
        <div class="col text-center ibt_portfolio">
            <h3>Our Portfolio</h3>
            <hr class="hr"/>
            <p>Some of our projects and systems to show case our experience and expertise in software development & services. We have implemented various projects from simple web application to complicated systems integration.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-6 col-lg-3 col-xl-3 text-center">
            <div class="ibt_pf_icons">
                <div class="ibt_pf_sprite_icons wh_icon"></div>
                <h5>Warehouse Integration</h5>
                <hr class="hr"/>
                <p>Front end systems integrated with warehouse for real time order fulfilments, stock management etc.,</p>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-xl-3 text-center">
            <div class="ibt_pf_icons">
                <div class="ibt_pf_sprite_icons bi_icon"></div>
                <h5>Business Integration</h5>
                <hr class="hr"/>
                <p>Business model & services development, Business interfaces, Enabled business integration with other business via FTP, AS2, XML, Flat files, REST / Web Services</p>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-xl-3 text-center">
            <div class="ibt_pf_icons">
                <div class="ibt_pf_sprite_icons sap_icon"></div>
                <h5>SAP Integration</h5>
                <hr class="hr"/>
                <p>Enabled SAP system integration via SAP IDOC Formats, Reports and ABAP.</p>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-xl-3 text-center">
            <div class="ibt_pf_icons">
                <div class="ibt_pf_sprite_icons bui_icon"></div>
                <h5>Backend / Business Services</h5>
                <hr class="hr"/>
                <p>Implemented backend services to offer connectivity via website, interfaces etc.,</p>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 3%;">
        <div class="col-6 col-lg-3 col-xl-3 text-center">
            <div class="ibt_pf_icons">
                <div class="ibt_pf_sprite_icons ma_icon"></div>
                <h5>Mobile App Development</h5>
                <hr class="hr"/>
                <p>Native mobile application development in iOS & Android platforms. Hybrid application development using Ionic 2 & Angular 2.</p>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-xl-3 text-center">
            <div class="ibt_pf_icons">
                <div class="ibt_pf_sprite_icons esb_icon"></div>
                <h5>Enterprise Service Bus</h5>
                <hr class="hr"/>
                <p>Configured, provisioned and implemented enterprise service bus to enable efficient integrations between various services within enterprise.</p>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-xl-3 text-center">
            <div class="ibt_pf_icons">
                <div class="ibt_pf_sprite_icons pf_icon"></div>
                <h5>Performance Refactoring</h5>
                <hr class="hr"/>
                <p>Detail study of the current system to understand and remove performace bottle necks. Refactored to implement best practices and re-designed to accommodate scalability & extensibility.</p>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-xl-3 text-center">
            <div class="ibt_pf_icons">
                <div class="ibt_pf_sprite_icons html_icon"></div>
                <h5>HTML5, CSS3 & Bootstrap</h5>
                <hr class="hr"/>
                <p>Website development using best of the industry's framework (Bootstrap) and responsiveness through HTML5 and CSS3.</p>
            </div>
        </div>
    </div>
</div>
<div class="container bg-white" id="ibt_joinus" style="margin-top: 4%;">
    <div class="row" style="padding: 15px;">
        <div class="col text-center join_us">
            <h3>Join us</h3>
            <hr class="hr"/>
            <p>If you share our vision and wants to be part of our mission, email your resume to <a href="mailto:careers@interbind.in">careers@interbind.in</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col join_us">
            <h5 style="">Current Openings <span class="badge badge-info">1</span></h5>			
            <table class="table table-responsive">
				<tbody>
					<tr>
						<td><a class="job_title" href="https://www.indeedjobs.com/jobs/dd90656968b04f728053" target="_blank">Senior Software Engineer</a></td>
						<td>Chennai</td>
						<td>Full-time</td>
					</tr>
				</tbody>			
			</table>
        </div>
    </div>
</div>
<div class="container bg-white" style="margin-top: 4%" id="ibt_contact_us">
    <div class="row" style="padding: 15px;">
        <div class="col">
            <div class="col text-center contact_us">
                <h3>Contact us</h3>
                <hr class="pf_hr"/>
                <a href="" data-toggle="modal" data-target="#formModal" data-backdrop="static" data-keyboard="false">Click Here to send message</a>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 4%">
        <div class="col contact_us text-center">
            <div class="row" style="margin-top: 3%;">
                <div class="col text-center location_address">
                    <h6>India</h6>
                    <hr class="hr"/>
                    <p><i class="fa fa-map-marker"></i> 2, Thiruvalluvar Salai,Kumaran Nagar,<br> Sholinganallur, Chennai - 600119, INDIA</p>
                    <p><i class="fa fa-phone"></i> Phone: +91 44 2450 1427 / 29</p>
                    <p><i class="fa fa-envelope"></i> <a href="mailto:contact@interbind.in">contac@interbind.in</a></p>
                    <p><i class="fa fa-globe"></i> <a href="#">www.interbind.in</a></p>
                </div>
                <div class="col text-center location_address">
                    <h6>Singapore</h6>
                    <hr class="hr"/>
                    <p><i class="fa fa-map-marker"></i> 90 Cecil Street #10-02 <br/> Singapore 069531</p>
                    <p><i class="fa fa-phone"></i> Phone: +65 6221 1008</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form Modal -->
<div class="modal fade bd-example-modal-lg" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel" style="margin: 0 auto; font-size: 25px; font-weight: 400">Contact us</h5>
                <button type="button" class="close btn_form_close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form_modal">
                <p>Thank you for your interest in Interbind Technologies. Please provide the following information about your business needs to help us serve you better. This information will enable us to route your request to the appropriate person. You should receive a response within 1 working day.</p>
				<!--div class="error_msg" style="display:none;margin-bottom: 10px;"></div-->
				<div class="beforeSend text-center"></div>
				<div class="success_msg text-center" style="display:none; margin-bottom: 10px; color:white; padding: 10px; background-color: darkseagreen;"></div>
                <div class="row">
                    <div class="col text-center">
                        <form id="form_contact_us" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="username" placeholder="Enter your name" data-error="Name is required"  name="username" > 
										<div class="form_errors err_username"></div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="email" placeholder="Enter your email" name="email" data-error="Email is required" >
										<div class="form_errors err_email"></div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" placeholder="Enter your subject" name="subject" data-error="Subject is required" >
										<div class="form_errors err_subject"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <textarea class="form-control text_area" id="message" name="message" placeholder="Enter your message" data-error="Message is required" ></textarea>
										<div class="form_errors err_message"></div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" id="submit" type="button" >Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- Form modal ends here-->

<!-- server error modal -->
<div class="modal fade bd-example-modal-lg" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel" style="margin: 0 auto; font-size: 25px; font-weight: 400">Check your fields.</h5>
                <button type="button" class="close btn_error_close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body errorModal">
                <div class="error_msg" style="display:none;margin-bottom: 10px;"></div>
            </div>
        </div>
    </div>
</div>
<!-- server error modal ends here-->

<div class="container bg-white" style="margin-top: 4%">
    <div class="row" style="padding: 15px">
        <div class="col text-center connect_us">
            <h3>Connect with us</h3>
            <hr class="hr"/>
            <a class="message" href="mailto:contact@interbind.in"><i class="fa fa-envelope-square fa-2x wow animated shake"></i></a>
            <a class="twitter" href="https://twitter.com/interbind" ><i class="fa fa-twitter-square fa-2x wow animated shake"></i></a>
            <a class="facebook" href="https://www.facebook.com/interbind/"><i class="fa fa-facebook-square fa-2x wow animated shake"></i></a>
            <a class="linkedin" href="https://www.linkedin.com/company/interbind-technologies"><i class="fa fa-linkedin-square fa-2x wow animated shake"></i></a>
        </div>
    </div>
</div>
<div class="container-fluid bg-white" style="margin-top: 4%">
    <div class="row" style="padding: 15px">
        <div class="col text-center ibt_footer">
            <p>© 2012-2017 Interbind Technologies Private Limited.</p>
        </div>
        <div class="col text-center ibt_footer">
            <p>Write to us <a href="mailto:contact@interbind.in">contact@interbind.in</a></p>
        </div>
    </div>
</div>
</body>
</html>