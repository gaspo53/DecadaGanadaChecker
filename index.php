<?php $SITE_URL = "http://".$_SERVER['SERVER_NAME'] ?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="">
		
		<title>Sin captcha</title>
		
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-app-custom.css" rel="stylesheet">
		<link href="css/docs.css" rel="stylesheet">
		<link href="css/animate.min.css" rel="stylesheet">
		
		<!-- Custom styles for this template -->
		<link href="css/sticky-footer.css" rel="stylesheet">
		
		<link href="img/favicon.ico" rel="icon" type="image/x-icon" />
	
		<!-- Just for debugging purposes. Don't actually copy this line! -->
		<!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		    <![endif]-->

		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/modernizr.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/wonDecade.js"></script>
		<script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
		<script type="text/javascript" src="js/bootbox.min.js"></script>
					
		<script type="text/javascript">
			var HOST_ADDRESS = "<?php echo $SITE_URL;?>";
		</script>
	</head>
	
	<body>

		<?php 
				if (isset($_GET['faq'])){
						include("faq.inc.php");
				}else{
					include("main_body.inc.php");
				} 
	    ?>
	    
	    
	    
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-45954254-1', 'sincaptcha.com.ar');
		  ga('send', 'pageview');
		
		</script>
		
		<div id="fb-root"></div>
		<script>
			(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
		
	</body>
</html>
