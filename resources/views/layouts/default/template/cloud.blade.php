<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="App Launch - App Landing Page HTML5 Template">
    <meta name="keywords" content="beautiful, app, template, mobile, responsive, application, website, html5, promote, creative, unique, layout, features, cross, browser, compatible">
    <meta name="author" content="Awaiken">
	<!-- Page Title -->
	<title>Warrantii - Consumer Purchase Information System</title>
	<!-- Google Fonts css-->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
	<!-- Bootstrap css -->
<link href="{{ asset('sximo/logindesign/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ asset('sximo/logindesign/css/font-awesome.min.css')}}" rel="stylesheet">
<link href="{{ asset('sximo/logindesign/css/flaticon.css')}}" rel="stylesheet">
<link href="{{ asset('sximo/logindesign/css/swiper.min.css')}}" rel="stylesheet">
<link href="{{ asset('sximo/logindesign/css/swiper.min.css')}}" rel="stylesheet">
<link href="{{ asset('sximo/logindesign/css/custom.css')}}" rel="stylesheet">
        
       
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script>(function (a, s, y, n, c, h, i, d, e) {
              s.className += ' ' + y;
              h.start = 1 * new Date;
              h.end = i = function () {
                  s.className = s.className.replace(RegExp(' ?' + y), '')
              };
              (a[n] = a[n] || []).hide = h;
              setTimeout(function () {
                  i();
                  h.end = null
              }, c);
              h.timeout = c;
          })(window, document.documentElement, 'async-hide', 'dataLayer', 4000,{'GTM-5NJXWCW': true});
	</script>
    <script>
          (function (i, s, o, g, r, a, m) {
              i['GoogleAnalyticsObject'] = r;
              i[r] = i[r] || function () {
                  (i[r].q = i[r].q || []).push(arguments)
              }, i[r].l = 1 * new Date(); 
              a = s.createElement(o),
                      m = s.getElementsByTagName(o)[0];
              a.async = 1;
              a.src = g;
              m.parentNode.insertBefore(a, m)
          })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
          ga('create', 'UA-92211734-3', 'auto');
          ga('require', 'GTM-5NJXWCW');
          ga('send', 'pageview');
    </script>
</head>
<body data-spy="scroll" data-target="#navigation" data-offset="71">
	
	<!-- Preloader starts -->
	<div class="preloader">
		<div class="sk-wave">
			<div class="sk-rect sk-rect1"></div>
			<div class="sk-rect sk-rect2"></div>
			<div class="sk-rect sk-rect3"></div>
			<div class="sk-rect sk-rect4"></div>
			<div class="sk-rect sk-rect5"></div>
		</div>
	</div>
	<!-- Preloader Ends -->

	<!-- Header Section Starts-->
	<header>
		<nav id="main-nav" class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<!-- Logo starts -->
					<a class="navbar-brand" href="" >
					<img src="{{asset('sximo/logindesign/images/Warrantii.png')}}" alt="Logo" />
					</a>
					<!-- Logo Ends -->
					
					<!-- Responsive Menu button starts -->
					<div class="navbar-toggle">
					</div>
					<!-- Responsive Menu button Ends -->
				</div>
				<div id="responsive-menu"></div>
				<!-- Navigation starts -->
				<div class="navbar-collapse collapse" id="navigation">
					<ul class="nav navbar-nav navbar-right main-navigation" id="main-menu">
						<li class="active"><a href="#home">Home</a></li>
						<li><a href="#technology">Technology</a></li>
						<li><a href="#services">Services</a></li>
						<li><a href="#features">Features</a></li>
						<li><a href="#screenshot">Screenshot</a></li>
					<!--	<li><a href="#pricing">Pricing</a></li>	 -->			
						<li><a href="#contact">Contact</a></li>
                                                @if(Auth::check())
						 <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
                                                @else
                                                <li><a href="{{ url('user/profile?view=frontend') }}">Login</a></li>
                                               
                                                @endif
					</ul>
				</div>
				<!-- Navigation Ends -->
				
				<!-- Start pop-up -->
				<section class="pop-up">
					<div class="container">
			            <div class="row">
						
					<div class="col-md-3">
					
				    </div>
					    
						</div>
					</div>
				</section>
				<!-- End pop-up -->
			</div>
		</nav>
	</header>
	<!-- Header Section Ends-->
	
	<!-- Banner Section Starts -->
	<section class="banner" id="home">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-8">
					<div class="header-content wow fadeInUp">
						
						<h2>Know Your Customer</h2> <h3> <font color="white">Consumer Analysis & Trends</font></h3>
						
						<p>Use latest technologies to Collect Data, Assimilate Information, Analyze Trends and Derive Inferences on improving efficiencies in Supply Chain. Greater Sales Opportunities, Analysis of Consumer Behaviour, Increase in Profitability with Reduced Costs and Uptick in Sales.<br/><br/>Warrantii - A Consumer Purchase Information System (CPIS) is a continuously evolving Technology Platform that helps you analyse and leverage Consumer Purchases to a world of possibilities. </p>
						
						<div class="download-button">
							<a href="#" class="btn-download"><i class="fa fa-sign-in"></i> <span>Web Sign In</span>Click Here</a>
							<a href="#" class="btn-download"><i class="fa fa-desktop"></i> <span>Request for a</span>Online Demo</a>
						</div>
					</div>
				</div>
				
				<div class="col-md-4 col-sm-4">
					<div class="slider-image wow fadeInRight">
						<img src="{{asset('sximo/logindesign/images/header-image.png')}}" alt="" />
					</div>
				</div>
			</div>
		</div>	
	</section>
	<!-- Banner Section Ends -->
	
	<!-- Technology Section starts -->
	<section class="testimonials" id="technology">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title wow fadeInUp">
						<h2>Block Chain Technology</h2>
						<p>Warrantii gives you reliable, trustful & authentic record of transactions in your Supply Chain. And benefits dont stop there. We are working tirelessly to integrate IoT on Warrantii.</p>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<div class="swiper-container testimonials-slider">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<div class="testimonial-slide">
									<div class="author-info">
										<!--<img src="images/arun.jpg" alt="" />-->
										<br/> Product Genuinity<br/><span style="font-size:14px;">Case Study</span>
									</div>
									
									<div class="testimonial-entry">
										<p>Warrantii offers a solution by enabling product authentication at the unit level. The benefits of authentication and certification is particularly true for spare parts and after-market operations. By allowing individual items to be tagged with unique identifiers, they can be tracked and validated. Part certification provides full visibility into product lifecycle. </p>
										
										<!--<h4>Sweta Silva <span>/ Back end</span></h4>-->
									</div>
								</div>
							</div>							
							<div class="swiper-slide">
								<div class="testimonial-slide">
									<div class="author-info">
										<!--<img src="images/arun.jpg" alt="" />-->
										<br/> Returns & Credits<br/><span style="font-size:14px;">Case Study</span>
									</div>
									
									<div class="testimonial-entry">
										<p>Warrantii can securely validate the products sales history and associated financial transaction resulting in the ability to quickly facilitate a return along with associated refund to the customer with the help of Technology. This would allow the all aspects of Sales - Original Consumer Purchase, the Refund, and any subsequent Sales to be recorded in the Platform. </p>
										
										<!--<h4>Sweta Silva <span>/ Back end</span></h4>-->
									</div>
								</div>
							</div>														
							<div class="swiper-slide">
								<div class="testimonial-slide">
									<div class="author-info">
										<!--<img src="images/arun.jpg" alt="" />-->
										<br/>Warranty Claims<br/><span style="font-size:14px;">Case Study</span>
									</div>
									
									<div class="testimonial-entry">
										<p>Currently, when a claim is made, all checks would be carried out by humans, which can be time-consuming and leaves room for human error. This becomes unnecessary, as checks to ensure that all criteria have been met, and can be done automatically using Warrantii. Once all obligations are fulfilled, the resulting replacement or repair is automatically initiated. This can all be done using minimum human involvement.</p>
										<!--<h4>Jasmin Joshph <span>/ Front end</span></h4>-->
									</div>
								</div>
							</div>						
						</div>
						<div class="testimonial-nav">
							<div class="testimonial-btn testimonial-prev"><i class="fa fa-chevron-left"></i></div>
							<div class="testimonial-btn testimonial-next"><i class="fa fa-chevron-right"></i></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Technology Section ends -->
	
	<!-- Services Section starts -->
	<section class="services" id="services">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title wow fadeInUp">
						<h2>A WORLD OF POSSIBILITIES</h2>
						<h5>Enabling Supply Chain - Efficiency, Visibility, Reducing Costs & Improving Sales</h5>
					</div>
				</div>
			</div>
			
			<div class="row">
				<!-- Service Single start -->
				<div class="col-md-4">
					<div class="service-single wow fadeInUp" data-wow-delay="0.6s">
						<div class="icon-box">
							<i class="flaticon-startup"></i>
						</div>
						
						<h3>Augmenting Sales Channel</h3>
						
						<p>Register More, Sell More with Sales Channel Partners getting more Sales Opportunities with Warrantii</p>
					</div>
				</div>
				<!-- Service Single end -->
				<!-- Service Single start -->
				<div class="col-md-4">
					<div class="service-single wow fadeInUp" data-wow-delay="0.2s">
						<div class="icon-box">
							<i class="flaticon-coding"></i>
						</div>
						
						<h3>Leverage All Digital Channels</h3>
						
						<p>Utilize Technological Channels - Internet, Mobile Apps to communicate with Channel, Partners and Consumers</p>
					</div>
				</div>
				<!-- Service Single end -->
				
				<!-- Service Single start -->
				<div class="col-md-4">
					<div class="service-single wow fadeInUp" data-wow-delay="0.4s">
						<div class="icon-box">
							<i class="flaticon-analysis"></i>
						</div>
						
						<h3>Product Track & Trace</h3>
						
						<p>Track Product Movement Across Supply Chain Primary, Secondary & Tertiary Sales Points to Final Consumption</p>
					</div>
				</div>
				<!-- Service Single end -->
			</div>
			<div class="row" id="2">
				<!-- Service Single start -->
				<div class="col-md-4">
					<div class="service-single wow fadeInUp" data-wow-delay="0.6s">
						<div class="icon-box">
							<i class="flaticon-phone-call"></i>
						</div>
						
						<h3>Greater Sales Opportunities</h3>
						
						<p>With Warrantii, Sales Opportunities exist not only for You, but also for your Sales Channel & Services Partners</p>
					</div>
				</div>
				<!-- Service Single end -->
				<!-- Service Single start -->
				<div class="col-md-4">
					<div class="service-single wow fadeInUp" data-wow-delay="0.2s">
						<div class="icon-box">
							<i class="flaticon-envelope"></i>
						</div>
						
						<h3>One Up on Competition</h3>
						
						<p>Stay ahead of Competition in the Market. Consumers perceive value in being able to record purchases. </p>
					</div>
				</div>
				<!-- Service Single end -->
				
				<!-- Service Single start -->
				<div class="col-md-4">
					<div class="service-single wow fadeInUp" data-wow-delay="0.4s">
						<div class="icon-box">
							<i class="flaticon-play-button"></i>
						</div>
						
						<h3>Key Performance Indicators</h3>
						
						<p>Define KPIs to Understanding Supply Chain Sales, Inventory & most importantly your Customer. </p>
					</div>
				</div>
				<!-- Service Single end -->
			</div>
			<div class="row" id="3">
				<!-- Service Single start -->
				<div class="col-md-4">
					<div class="service-single wow fadeInUp" data-wow-delay="0.6s">
						<div class="icon-box">
							<i class="flaticon-support"></i>
						</div>
						
						<h3>Integrated Relationship Management</h3>
						
						<p>Record Channel Feedback in One Place. Manage Channel Relationships & Get visibility on issues in Supply Chain</p>
					</div>
				</div>
				<!-- Service Single end -->
				<!-- Service Single start -->
				<div class="col-md-4">
					<div class="service-single wow fadeInUp" data-wow-delay="0.2s">
						<div class="icon-box">
							<i class="flaticon-satellite"></i>
						</div>
						
						<h3>Partner Performance Tracking</h3>
						
						<p>Start Collecting Data from All Levels in Sales Channel, Services Partners and Consumers in Your Supply Chain</p>
					</div>
				</div>
				<!-- Service Single end -->
				
				<!-- Service Single start -->
				<div class="col-md-4">
					<div class="service-single wow fadeInUp" data-wow-delay="0.4s">
						<div class="icon-box">
							<i class="flaticon-stopwatch"></i>
						</div>
						
						<h3>Realtime Sales Recording</h3>
						
						<p>Sales reported directly from Point of Sale Systems with Partners or Consumers who want to register the product.</p>
					</div>
				</div>
				<!-- Service Single end -->
			</div>
			<div class="row" id="4">
				<!-- Service Single start -->
				<div class="col-md-4">
					<div class="service-single wow fadeInUp" data-wow-delay="0.6s">
						<div class="icon-box">
							<i class="flaticon-placeholder"></i>
						</div>
						
						<h3>Featured Retail Stores</h3>
						<p>Consumers prefer Warrantii registered Stores that help register Purchase and activate Product Warranty</p>
					</div>
				</div>
				<!-- Service Single end -->
				<!-- Service Single start -->
				<div class="col-md-4">
					<div class="service-single wow fadeInUp" data-wow-delay="0.2s">
						<div class="icon-box">
							<i class="flaticon-idea"></i>
						</div>
						
						<h3>360 Degree Marketing Strategy</h3>
						
						<p>Complete Supply Chain Data - Channel to Partners to Consumer, available in One Solution for Marketing</p>
					</div>
				</div>
				<!-- Service Single end -->
				
				<!-- Service Single start -->
				<div class="col-md-4">
					<div class="service-single wow fadeInUp" data-wow-delay="0.4s">
						<div class="icon-box">
							<i class="flaticon-settings"></i>
						</div>
						
						<h3>Sales & Service Data Analysis</h3>
						
						<p>Leverage Data to Gain Insights into operations of your Sales Channel & Service Partners, their Efficiencies </p>
					</div>
				</div>
				<!-- Service Single end -->
			</div>
			<div class="row" id="5">
				<!-- Service Single start -->
				<div class="col-md-4">
					<div class="service-single wow fadeInUp" data-wow-delay="0.6s">
						<div class="icon-box">
							<i class="flaticon-bar-chart"></i>
						</div>
						
						<h3>Increase In Sales</h3>
						
						<p>Warrantii helps you increase Sales by helping with new Sales Avenues like Cross Sell, Up Sell and Expire Sell </p>
					</div>
				</div>
				<!-- Service Single end -->
				<!-- Service Single start -->
				<div class="col-md-4">
					<div class="service-single wow fadeInUp" data-wow-delay="0.2s">
						<div class="icon-box">
							<i class="flaticon-quality"></i>
						</div>
						
						<h3>Loyalty Tool</h3>
						
						<p>Use Tertiary Sales and Consumption Data now available to target Supply Chain Members for Loyalty</p>
					</div>
				</div>
				<!-- Service Single end -->
				
				<!-- Service Single start -->
				<div class="col-md-4">
					<div class="service-single wow fadeInUp" data-wow-delay="0.4s">
						<div class="icon-box">
							<i class="flaticon-responsive"></i>
						</div>
						
						<h3>Channel Inventory</h3>
						
						<p>With Inventory Flow Data, Estimate and Identify Net Inventory at each level of Supply Chain. </p>
					</div>
				</div>
				<!-- Service Single end -->
			</div>

		</div>
	</section>
	<!-- Services Section ends -->
	
	<!-- Features section starts -->
	<section class="features" id="features">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title wow fadeInUp">
						<h2>Warrantii Consumer App</h2>
						<p>Eco Friendly Way to Secure your Invoices, for times, just in case you need it - To Claim Warranty</p>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-4 col-md-offset-1">
					<div class="feature-image wow fadeInLeft" data-wow-delay="0.2s">
						<figure>
							<img src="{{asset('sximo/logindesign/images/feature-1.png')}}" alt="" />
						</figure>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="feature-content wow fadeInRight" data-wow-delay="0.2s">
						<h3>Free, Easy To Use, Secure & Robust</h3>
						
						<p>Warrantii is a Consumer Purchase Information System that helps Consumers protect their Purchase Invoice by safely storing it on the cloud and simulataneously helping Consumers Register Product for Warranty, Request Product Fitment or Define Service Schedule. It offers to provide comlementing products like Product Annual Maintenance Contracts or Insurance.  </p>
						
						<ul>
							<li>Purchase Invoice Management</li>
							<li>Expiry & Other Reminders</li>
							<li>Service Channel Information</li>
							<li>Verified Service Record</li>
							<li>Annual Maintenance Contracts</li>
							<li>Product Authentication</li>
							<li>Insurance & Extended Warranty</li>
							<li>Warranty Verification</li>
							<li>Accessible Anywhere, Anytime</li>
							<li>Product Fitment Requests</li>
						</ul>
						
						<a href="http://www.warrantii.com" class="btn-custom">Website</a>
					</div>
				</div>
			</div>
		
		</div>
	</section>
	<!-- Features section ends -->
	
	<!-- Application Counter starts -->
	<div class="app-counter" style="display: none;">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="counter-single">
						<div class="icon-box">
							<i class="fa fa-download"></i>
						</div>
						
						<div class="counter-entry">
							<h3 class="counter">5496</h3>
							<p>Downloads</p>
						</div>
					</div>
				</div>
				
				<div class="col-md-3 col-sm-6">
					<div class="counter-single">
						<div class="icon-box">
							<i class="fa fa-star"></i>
						</div>
						
						<div class="counter-entry">
							<h3 class="counter">382</h3>
							<p>Ratings</p>
						</div>
					</div>
				</div>
				
				<div class="col-md-3 col-sm-6">
					<div class="counter-single">
						<div class="icon-box">
							<i class="fa fa-commenting-o"></i>
						</div>
						
						<div class="counter-entry">
							<h3 class="counter">468</h3>
							<p>Comments</p>
						</div>
					</div>
				</div>
				
				<div class="col-md-3 col-sm-6">
					<div class="counter-single">
						<div class="icon-box">
							<i class="fa fa-user-o"></i>
						</div>
						
						<div class="counter-entry">
							<h3 class="counter">149</h3>
							<p>Happy Client</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Application Counter ends -->
	
	<!-- Screenshot Slider starts -->
	<section class="screenshot" id="screenshot">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title wow fadeInUp">
						<h2>Consumer App Screenshots</h2>
						<p>Our Androind and iOS Apps let Consumers - Record Purchases, Request Service Partner Information and send Warranty Expiry Notifications. We keep adding more functions, and updating the Apps basis the feedback we received from Customers.</p>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<div class="swiper-container screenshot-slider">
						<div class="swiper-wrapper">
							<div class="swiper-slide"><img src="{{asset('sximo/logindesign/images/screen01.png')}}" /></div>
							<div class="swiper-slide"><img src="{{asset('sximo/logindesign/images/screen06.png')}}" /></div>
							<div class="swiper-slide"><img src="{{asset('sximo/logindesign/images/screen05.png')}}" /></div>
							<div class="swiper-slide"><img src="{{asset('sximo/logindesign/images/screen07.png')}}" /></div>
							<div class="swiper-slide"><img src="{{asset('sximo/logindesign/images/screen08.png')}}" /></div>
							<div class="swiper-slide"><img src="{{asset('sximo/logindesign/images/screen09.png')}}" /></div>
						</div>
						
						<div class="slider-navigation">
							<div class="slider-nav-btn swiper-prev"><i class="fa fa-chevron-left"></i></div>
							<div class="slider-nav-btn swiper-next"><i class="fa fa-chevron-right"></i></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Screenshot Slider ends -->
	
	<!-- Download Application Starts -->
	<section class="app-download">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title wow fadeInUp">
						<h2>Our 3 Step Methodology</h2>
						<p>From Start to Finish, Enabling Supply Chain, Data Collection and Analyses</p>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<div class="app-download-single">
						<a href="#" class="btn-download"><i class="fa" style="font-family: 'Source Sans Pro', sans-serif">1</i> <span>QUICK START</span>Data Modelling</a>
						<p style="font-size: 14px; color: white;">Define Your Brand, its Products and Enrol your Demand Chain - Sales Channel, Services Partners, All in One Place</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="app-download-single">
						<a href="#" class="btn-download"><i class="fa" style="font-family: 'Source Sans Pro', sans-serif">2</i> <span>NEXT STEP</span>Data Collection</a>
					<p style="font-size: 14px; color: white;">Collect Performance Data from all Levels in your Supply Chain - Sales Channel, Services Partners and Consumers</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="app-download-single">
						<a href="#" class="btn-download"><i class="fa" style="font-family: 'Source Sans Pro', sans-serif">3</i> <span>FINAL STEP</span>Data Analysis</a>
					<p style="font-size: 14px; color: white;">Leverage Data to Gain Insights by Aggregating Information and Analysing Trends - Understand your Customer</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Download Application ends -->
	
	<!-- Pricing Section starts -->
	<section class="pricing" id="pricing" style="display: none;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title wow fadeInUp">
						<h2>Pricing</h2>
						<p>Our Business Plans allow Organizations of different sizes take advantage of our Technology Platform. </p>
					</div>
				</div>
			</div>
			
			<div class="row">
				<!-- Price Single Start -->
				<div class="col-md-4">
					<div class="price-single wow fadeInUp" data-wow-delay="0.2s">
						<div class="price-header">
							<h3>Consumer Sales</h3>
							<p>$1999<span>/ Month</span></p>
						</div>
						
						<div class="price-body">
							<ul>
								<li>Upto 10 Users</li>
								<li>Cloud Storage</li>
								<li>24/7 Support</li>
								<li>Backup Service</li>
								<li>Tertiary Sales Visibility</li>
								<li>Limited Analytics</li>
							</ul>
						</div>
						
						<div class="price-footer">
							<a href="#" class="btn-custom">Contact Us</a>
						</div>
					</div>
				</div>
				<!-- Price Single end -->
				
				<!-- Price Single Start -->
				<div class="col-md-4">
					<div class="price-single recommended wow fadeInUp" data-wow-delay="0.4s">
						<div class="price-header">
							<h3>Retail Visibility</h3>
							<p>$2999<span>/ Month</span></p>
						</div>
						
						<div class="price-body">
							<ul>
								<li>Basic +</li>
								<li>Supply Channel Participation</li>
								<li>SCRM - Call Center Module</li>
								<li>Channel Inventory Visibility</li>
								<li>Product Track & Trace</li>
								<li>Retail PoS</li>
							</ul>
						</div>
						
						<div class="price-footer">
							<a href="#" class="btn-custom">Contact Us</a>
						</div>
					</div>
				</div>
				<!-- Price Single end -->
				
				<!-- Price Single Start -->
				<div class="col-md-4">
					<div class="price-single wow fadeInUp" data-wow-delay="0.6s">
						<div class="price-header">
							<h3>360° Visibility</h3>
							<p>$4999<span>/ Month</span></p>
						</div>
						
						<div class="price-body">
							<ul>
								<li>Standard +</li>
								<li>Service Partner Participation</li>
								<li>Service Channel Performance</li>
								<li>Service Mobile App</li>
								<li>Loyalty Tracking</li>
								<li>Advanced Analytics</li>
							</ul>
						</div>
						
						<div class="price-footer">
							<a href="#" class="btn-custom">Contact Us</a>
						</div>
					</div>
				</div>
				<!-- Price Single end -->
			</div>
		</div>
	</section>
	<!-- Pricing Section ends -->
	
	<!-- Testimonial Section starts -->
	<!--<section class="testimonials" id="testimonial">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title wow fadeInUp">
						<h2>Our Team</h2>
						<p>Ours is a team of dedicated professionals, committed to solving everyday problems faced by businesses in their Supply Chain. Currently working tirelessly to induct IoT with Warrantii.</p>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<div class="swiper-container testimonials-slider">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<div class="testimonial-slide">
									<div class="author-info">
										<img src="images/anurag.jpg" alt="" />
										<br/>Anurag Jain<br/><span style="font-size:14px;">Founder</span>
									</div>
									
									<div class="testimonial-entry">
										<p>Anurag is a post graduate in Information Technology. His forte being Supply Chain Operations, he specializes in Information Systems, their Analysis, Design and Integration with Operations. He has earlier worked with IBM, i2 Technologies as a Business Transformation / Supply Chain Consultant. He is responsible for designing the system code and managing the IT infrastructure and systems which drive the business.</p>
										
									</div>
								</div>
							</div>
							
							<div class="swiper-slide">
	<!--							<div class="testimonial-slide">
									<div class="author-info">
										<img src="images/virendra.jpg" alt="" />
										<br/>Virendra Singh<br/><span style="font-size:14px;">Technology Lead</span>
									</div>
									
									<div class="testimonial-entry">
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
										
										<h4>Jasmin Joshph <span>/ Front end</span></h4>
									</div>
								</div>
							</div>
							
							<div class="swiper-slide">
								<div class="testimonial-slide">
									<div class="author-info">
										<img src="images/arun.jpg" alt="" />
										<br/>Arun Gupta<br/><span style="font-size:14px;">Operations Lead</span>
									</div>
									
									<div class="testimonial-entry">
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
										
										<h4>Sweta Silva <span>/ Back end</span></h4>
									</div>
								</div>
							</div>							
						</div>
						
						<div class="testimonial-nav">
							<div class="testimonial-btn testimonial-prev"><i class="fa fa-chevron-left"></i></div>
							<div class="testimonial-btn testimonial-next"><i class="fa fa-chevron-right"></i></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>-->
	<!-- Testimonial Section ends -->
	
	<!-- FAQ Section starts -->
	<section class="faq">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title wow fadeInUp">
						<h2>FAQ</h2>
						<p>We have tried to answer all your questions. In case you dont find them here, please feel free to contact us. </p>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-5 col-md-offset-1">
					<!-- FAQ Accordion starts -->
					<div class="panel-group faq-container" id="accordion">
						<div class="panel">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="#collapse1" data-toggle="collapse" data-parent="#accordion">1. Which Industries seem to benefit the most with Warrantii? </a></h4>
							</div>
							
							<div id="collapse1" class="panel-collapse collapse in">
								<div class="panel-body">
									<p>Warrantii is Industry agnostic. All Companies that have access to End Consumers using their product that carries a predefined period of Warranty can leverage Warrantii. That said, Warrantii is best suited for Capital Goods & Home Appliances like TVs, Refrigerators, Washing Machines, ROs, Air & Water Purifiers</p>
								</div>
							</div>
						</div>
						
						<div class="panel">
							<div class="panel-heading">
								<h4 class="panel-title collapsed"><a href="#collapse2" data-toggle="collapse" data-parent="#accordion">2. Is there a Capital Expense or any Licenses are to be purchased for Warrantii?</a></h4>
							</div>
							
							<div id="collapse2" class="panel-collapse collapse">
								<div class="panel-body">
									<p>Warrantii is offered as a Software As A Service and is licensed to OEs monthly. OEs can leverage all the advantages offered by Warrantii for as long as they like and unplug when they want. No strings attached. Customers would pay only for as long as they wish to use Warrantii.</p>
								</div>
							</div>
						</div>
						
						<div class="panel">
							<div class="panel-heading">
								<h4 class="panel-title collapsed"><a href="#collapse3" data-toggle="collapse" data-parent="#accordion">3. How do I access Warrantii? What communication mediums are available for Sales Channel and Customers?</a></h4>
							</div>
							
							<div id="collapse3" class="panel-collapse collapse">
								<div class="panel-body">
									<p>Warrantii has a rich Web UI supporting all user functions. All Workflows on Warrantii including Reports are accessible via this Web UI. Other than the Web UI, Mobile Apps are available on iOS and Android for Channel and Partners. In addition, Warrantii includes a Reports Scheduler that can email reports on a periodicity custom defined by the user.</p>
								</div>
							</div>
						</div>
						
						<div class="panel">
							<div class="panel-heading">
								<h4 class="panel-title collapsed"><a href="#collapse4" data-toggle="collapse" data-parent="#accordion">4. What is the extent of Customization feasible with Warrantii?</a></h4>
							</div>
							
							<div id="collapse4" class="panel-collapse collapse">
								<div class="panel-body">
									<p>Warrantii is an Enterprise Application Platform. It envisages certain Business workflows. That said, at Warrantii, we do acknowledge that Organizations may have varied Supply Chain Operations that may need to be supported. We are committed to evaluating the requirements and discuss how can we achieve the objectives.</p>
								</div>
							</div>
						</div>
						
						<div class="panel">
							<div class="panel-heading">
								<h4 class="panel-title collapsed"><a href="#collapse5" data-toggle="collapse" data-parent="#accordion">5. Where is the Data Hosted? On Premise or on the Cloud? </a></h4>
							</div>
							
							<div id="collapse5" class="panel-collapse collapse">
								<div class="panel-body">
									<p>Warrantii is a Cloud Hosted Solution. It provides all the data, information you may need about your business. It uses state of the art Technology Infrastructure to provide a Safe, Secure, Scalable and Robust Platform for your supply chain operations to leverage and function.</p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-heading">
								<h4 class="panel-title collapsed"><a href="#collapse6" data-toggle="collapse" data-parent="#accordion">6. Does Warrantii work as a standalone system or it can integrate with our ERP Solution? </a></h4>
							</div>
							
							<div id="collapse6" class="panel-collapse collapse">
								<div class="panel-body">
									<p>Warrantii is a built from scratch solution. That said, it can be integrated with existing ERP, where in place or function as a standalone system where ERP is not present. In either case it makes best effort to drive value with the information available.</p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-heading">
								<h4 class="panel-title collapsed"><a href="#collapse7" data-toggle="collapse" data-parent="#accordion">7. Is our Data safe with Warrantii?</a></h4>
							</div>
							
							<div id="collapse7" class="panel-collapse collapse">
								<div class="panel-body">
									<p>We store your information on a host of realtime synchronized server(s) alongside a completely redundant platform taking backups that is designed to withstand worst failures. This helps systems availability with near Zero downtime and promises your business continuity in cases of catastrophes and disasters. </p>
								</div>
							</div>
						</div>
					</div>
					<!-- FAQ Accordion ends -->
				</div>
				
				<div class="col-md-4 col-md-offset-1">
					<div class="faq-image">
						<img src="{{asset('sximo/logindesign/images/faq.png')}}" alt="" />
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- FAQ Section ends -->
	
	<!-- Contact us section starts -->
	<section class="contactus" id="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title wow fadeInUp">
						<h2>Contact Us</h2>
						<p>Have a Question? Or you would like to evaluate Warrantii, Please feel free to call us or write to us. We would be happy to hear from you and schedule a Demo for you. </p>
					</div>
				</div>
			</div>
			
			<div class="row">
				<!-- Contact Form Starts -->
				<div class="col-md-7 col-md-offset-1">
					<div class="contact-form">
						<form id="contactForm" action="./form-process.php" method="post" data-toggle="validator">
							<div class="row">
								<div class="form-group col-md-6 col-sm-6">
									<input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" required>
									<div class="help-block with-errors"></div>
								</div>
								
								<div class="form-group col-md-6 col-sm-6">
									<input type="email" name="email" id="email" class="form-control" placeholder="Your Email Address" required>
									<div class="help-block with-errors"></div>
								</div>
								
								<div class="form-group col-md-12 col-sm-12">
									<input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" required>
									<div class="help-block with-errors"></div>
								</div>
								
								<div class="form-group col-md-12 col-sm-12">
									<textarea rows="8" name="message" id="message" class="form-control" placeholder="How can i help you?" required></textarea>
									<div class="help-block with-errors"></div>
								</div>
								
								<div class="col-md-12 col-sm-12">
									<button type="submit" class="btn-contact" title="Submit Your Message!">Submit</button>
									<div id="msgSubmit" class="h3 text-left hidden"></div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- Contact Form ends -->
				
				<!-- Contact info starts -->
				<div class="col-md-3">
					<div class="contact-info">
						<div class="contact-info-single">
							<div class="icon-box">
								<i class="flaticon-phone-call"></i>
							</div>
							<h3>Phone Number</h3>
							<p>+91 99589 44885</p>
						</div>
						
						<div class="contact-info-single">
							<div class="icon-box">
								<i class="flaticon-envelope"></i>
							</div>
							<h3>Email Address</h3>
							<p>support@warrantii.com</p>
						</div>
					</div>
				</div>
				<!-- Contact info ends -->
			</div>
		</div>
	</section>
	<!-- Contact us section ends -->
	
	<!-- Footer starts -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="footer-logo">
						<a href="#"><img src="{{asset('assets/dist/img/logo/logo-sximoblack.png')}}" alt="" /></a>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="footer-menu">
						<ul>
							<li><a href="http://cpis.warrantii.com">Customer Web</a></li>
							<li><a href="http://wwww.warrantii.com">Consumer Web</a></li>
							<li><a href="http://poss.warrantii.com">Retailer Web</a></li>
							<li><a href="http://assc.warrantii.com">Partners Web</a></li>
							<li><a href="http://blog.warrantii.com">Our Blog</a></li>
						</ul>
					</div>
					
					<div class="footer-siteinfo">
						<p>&copy; 2018 InfoCRAFT Solutions Exchange P Limited. All Rights Reserved</p>
					</div>
				</div>
				
				<div class="col-md-3">
					<div class="footer-social">
						<a href="https://www.facebook.com/warrantii/"><i class="fa fa-facebook"></i></a>
						<a href="https://twitter.com/warrantii"><i class="fa fa-twitter"></i></a>
						<a href="https://www.linkedin.com/company/warrantii"><i class="fa fa-linkedin"></i></a>
						<a href="https://in.pinterest.com/warrantii"><i class="fa fa-pinterest-p"></i></a>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer ends -->
	
    <!-- Jquery Library File -->

<script type="text/javascript" src="{{ asset('sximo/logindesign/js/jquery-1.12.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('sximo/logindesign/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('sximo/logindesign/js/jquery.slicknav.js') }}"></script>
<script type="text/javascript" src="{{ asset('sximo/logindesign/js/validator.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('sximo/logindesign/js/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('sximo/logindesign/js/jquery.counterup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('sximo/logindesign/js/wow.js') }}"></script>
<script type="text/javascript" src="{{ asset('sximo/logindesign/js/swiper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('sximo/logindesign/js/SmoothScroll.js') }}"></script>
<script type="text/javascript" src="{{ asset('sximo/logindesign/js/function.js') }}"></script>
<script type="text/javascript" src="{{ asset('sximo/js/plugins/jquery-1.12.3.min.js') }}"></script>
	
	
	
</body>
</html>
