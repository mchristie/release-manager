<!doctype html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" xmlns:og="http://ogp.me/ns#"> <!--<![endif]-->
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Release Manager</title>

	<meta name="viewport" content="width=device-width">

  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  	{{ HTML::style('css/foundation.min.css') }}
  	{{ HTML::style('css/app.css') }}

	<style type="text/css">
		@yield('additional_css')
	</style>
</head>

<body>
	<div id="wrapper">

		<header class="row" role="header" id="header">
			<div class="columns twelve">
				<img src='/img/swanify_logo.jpg' id="header_logo" alt="Swanify" />
				<h1><a href="/" style="color: inherit;">Release Manager</a></h1>
			</div>
		</header>

		<div class="row">
			
			@yield('main')

		</div>

		<div class="row">

			
		</div>

		<footer id="footer">
			© 2012 Swanify. All Rights Reserved
		</footer>

	</div>


</body>
</html>
