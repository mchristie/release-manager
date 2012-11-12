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
				<h1>Release Manager</h1>
			</div>
		</header>

		<div class="row">

			<div class="columns two">
				<ul class="nav-bar vertical">
					<li @if(URI::segment(2) == '')class="active"@endif>
						<a href="/admin">Home</a>
					</li>
					<!--
					<li @if(URI::segment(2) == 'upload')class="active"@endif>
						<a href="/admin/upload">Upload</a>
					</li>
					-->
					<li @if(URI::segment(2) == 'builds')class="active"@endif>
						<a href="/admin/builds">Builds</a>
					</li>
					<li @if(URI::segment(2) == 'apps')class="active"@endif>
						<a href="/admin/apps">Apps</a>
					</li>
					<li @if(URI::segment(2) == 'clients')class="active"@endif>
						<a href="/admin/clients">Clients</a>
					</li>
					<li @if(URI::segment(2) == 'types')class="active"@endif>
						<a href="/admin/types">Types</a>
					</li>
				</ul>
			</div>
			
			<div class="columns ten">
				@yield('main')
			</div>

		</div>

		<div class="row">

			
		</div>

		<footer id="footer">
			© 2012 Swanify. All Rights Reserved
		</footer>

	</div>

	{{ HTML::script('js/jquery.js') }}
	{{ HTML::script('js/foundation.min.js') }}
	{{ HTML::script('js/jquery.foundation.tabs.js') }}
	{{ HTML::script('js/app.js') }}
	{{ HTML::script('js/jquery.filedrop.js') }}

	@yield('additional_js')

</body>
</html>
