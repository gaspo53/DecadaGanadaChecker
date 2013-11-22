
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
    <link href="css/animate.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="css/sticky-footer.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

	    <!-- Wrap all page content here -->
	    <div id="wrap">
	
	      <!-- Begin page content -->
	      <div class="container">
	        <div class="page-header">
	          <h1>La d&eacute;cada ganada</h1>
	        </div>
	        <p class="lead">Eleg&iacute; buscar Nac&Pop o Internacional y superior (todo junto, sin separar)</p>
	
	        <p>Us&aacute; <a href="../sticky-footer-navbar">Correo Argentino, OCA, Moreno's Mail</a> o lo que quieras.</p>
	
			<div class="row">
			  <div class="col-lg-12">
			    <div class="input-group">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="button">DG!</button>
			      </span>
			      <input type="text" class="form-control" id="decadeQueryValue">
			    </div><!-- /input-group -->
			  </div><!-- /.col-lg-6 -->
			</div><!-- /.row -->
	        <button type="button" class="ganar-decada btn btn-primary btn-lg btn-block top-block">A ganar la d&eacute;cada</button>
	        
	        <hr />
	        
	        
	        <div class="sandbox">
				<div id="animateTest" class="">
					<p>Tratando de ganar la d&eacute;cada...</p>
				</div>
			</div>
	        
	        
	        <div class="highlight">
	        	<table class="table table-striped" id="decadeResults"></table>
	        </div>
	      </div>
	    </div>
	
	    <div id="footer">
	      <div class="container">
	        <p class="text-muted credit">The <a href="http://martinbean.co.uk">Katrina's boys</a></p>
	      </div>
	    </div>
	
	
	    <!-- Bootstrap core JavaScript
	    ================================================== -->
	    <!-- Placed at the end of the document so the pages load faster -->
    	<script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        
        
        <script type="text/javascript">

			function swingOnDecade(){
				$('#animateTest').show();
				$("#animateTest").addClass("swing animated");
			}

			function swingOffDecade(){
				$('#animateTest').hide();
				$("#animateTest").removeClass("swing animated");
			}
			
			function doTheDecade(trackingNumber){
				var data = { id: trackingNumber, action: "oidn" };
				swingOnDecade();
				$.get( "action/caQuery.php", data)
					.done(function( data ) {
						try{
							$("#decadeResults").append($("<tr />").html(data));
						}catch(e){}
					})
					.fail(function( data ) {
						alert( "No se ha ganado");
					})
					.always(function(data){
						swingOffDecade();
					});			

			}
			
	        
			 $(function(){
				$('.ganar-decada').on("click",function(){
					doTheDecade($("#decadeQueryValue").val());
				});
			 });
			

        </script>
        
        
        
    </body>
</html>
