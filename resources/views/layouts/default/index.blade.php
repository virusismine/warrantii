<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>{{ CNF_APPNAME }} | {{ $pageTitle}}</title>
		<meta name="keywords" content="{{ $pageMetakey }}" />
		<meta name="description" content="{{ $pageMetadesc }}" />
		<meta name="Author" content="Mangopik [www.mangopik.com]" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
		<link rel="shortcut icon" href="" type="image/x-icon">	

		<!-- GOOGLE WEB FONTS  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />

		<!-- CORE CSS -->
		<link href="{{ asset('frontend') }}/default/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

		<!-- THEME CSS -->		
		<link href="{{ asset('frontend') }}/default/css/core.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('frontend') }}/default/css/post.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('frontend') }}/default/css/default.css" rel="stylesheet" type="text/css" />
		<!-- PAGE LEVEL SCRIPTS -->
		<link href="{{ asset('frontend') }}/default/css/color_scheme/green.css" rel="stylesheet" type="text/css" id="color_scheme" />

		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = '{{ asset("frontend/default/plugins/") }}/';</script>
		<script type="text/javascript" src="{{ asset('frontend') }}/default/plugins/jquery/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="{{ asset('frontend') }}/default/js/default.js"></script>
		<script type="text/javascript" src="{{ asset('sximo/js/plugins/parsley.js') }}"></script>
		<script type="text/javascript" src="{{ asset('sximo/js/plugins/jquery.jCombo.min.js') }}"></script>

<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "90d7901a-4bf9-4acd-967c-a770c0fc6756", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

	</head>

	<body class="smoothscroll enable-animation">
		

		<div id="wrapper">

			<!-- Top Bar -->
			
			<!-- /Top Bar -->

			


			@include($pages)


		
		</div>
		<!-- /wrapper -->
		<!-- SCROLL TO TOP -->
		<a href="#" id="toTop"></a>
	</body>
</html>