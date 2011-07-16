<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>$Title</title>
  $MetaTags(false)

  <!-- Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Place favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="$ThemeDir/images/favicon.ico">
  <link rel="apple-touch-icon" href="$ThemeDir/images/apple-touch-icon.png">


  <!-- CSS: implied media="all" -->
	<link href='http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica:400,400italic|PT+Serif:400,700,400italic&v2' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="$ThemeDir/css/style.css?v=2">


  <!-- Uncomment if you are specifically targeting less enabled mobile browsers
  <link rel="stylesheet" media="handheld" href="$ThemeDir/css/handheld.css?v=2">  -->

  <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
  <script src="$ThemeDir/js/libs/modernizr-1.7.min.js"></script>

</head>

<body>

  <div id="container">
    <header>
			<img id="logo" />
			<h1>Beyond the Debt Ceiling</h1>
			<p id="intro-text">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean venenatis mauris at eros porta aliquet. Vivamus vel diam et lorem faucibus iaculis ut a nunc. Nunc tincidunt, lectus vitae ultricies euismod, arcu lectus adipiscing turpis, at volutpat magna nibh ut turpis.
    </header>
    <div id="main" role="main">
			<div class="section" id="quiz">
				<h1>What <em>will</em> happen if the debt ceiling isn't raised?</h1>
				<div id="quiz-illustration"><img src=""></div>
				<div id="quiz-answers">
					<form>
						<ul>
							<li><input name="quiz_answer" id="quiz_answer1" value="1" type="checkbox"> <label for="quiz_answer1">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</label></li>
							<li><input name="quiz_answer" id="quiz_answer2"  value="2" type="checkbox"> <label for="quiz_answer1">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</label></li>
						<li><input name="quiz_answer" id="quiz_answer3"  value="3" type="checkbox"> <label for="quiz_answer1">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</label></li>
						<li><input name="quiz_answer" id="quiz_answer4"  value="4" type="checkbox">	 <label for="quiz_answer1">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</label></li>			
					</form>
				</div>
			</div>
			<div id="story">
				<div class="section" id="debt-ceiling">
					<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				</div>
				<div class="section" id="local">
					<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				</div>
				<div class="section" id="international">
					<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				</div>
				<div class="section" id="long-term">
					<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				</div>
				<div class="section" id="conclusion">
					<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				</div>
			</div>
			<div class="section" id="do-something-about-it">
				<div id="contact">
					<h2>Contact your representatives</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				</div>
				<div id="share">
					<h2>Share this information</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean venenatis mauris at eros porta aliquet. Vivamus vel diam et lorem faucibus iaculis ut a nunc. Nunc tincidunt, lectus vitae ultricies euismod, arcu lectus adipiscing turpis, at volutpat magna nibh ut turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				</div>
			</div>
    </div>
		$Login

    <footer>
			A public service announcement by <a href="The Notion Collective">The Notion Collective</a> &amp; The Marauding Tigers
    </footer>
  </div> <!--! end of #container -->


  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>

  <!-- scripts concatenated and minified via ant build script-->
  <script src="$ThemeDir/js/plugins.js"></script>
  <script src="$ThemeDir/js/script.js"></script>
	<% require javascript(congressapi/javascript/sl-congress-api.js) %>
  <!-- end scripts-->


  <!--[if lt IE 7 ]>
    <script src="js/libs/dd_belatedpng.js"></script>
    <script>DD_belatedPNG.fix("img, .png_bg"); // Fix any <img> or .png_bg bg-images. Also, please read goo.gl/mZiyb </script>
  <![endif]-->


  <!-- mathiasbynens.be/notes/async-analytics-snippet Change UA-XXXXX-X to be your site's ID -->
  <script>
    var _gaq=[["_setAccount","UA-XXXXX-X"],["_trackPageview"]];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
    s.parentNode.insertBefore(g,s)}(document,"script"));
  </script>

</body>
</html>