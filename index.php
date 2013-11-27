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
		<script type="text/javascript">
			var HOST_ADDRESS = "http://<?php echo $_SERVER['SERVER_NAME'];?>";
		</script>
	</head>
	
	<body>
	
		<!-- Wrap all page content here -->
		<div id="wrap">
			<!-- Affix para numeros usados -->
			<div class="col-md-3">
				<div id="usedTrackingList"  class="bs-sidebar hidden-print affix" role="complementary" style="">
		            <ul class="nav bs-sidenav"></ul>
	          </div>		
			</div>
			
			
			<!-- Begin page content -->
			<div class="container">
				<div class="page-header">
					<h1>Consulta de env&iacute;os</h1>
				</div>
				<p class="lead">S&oacute;lo ingres&aacute; el n&uacute;mero de env&iacute;o y listo!</p>
	
				<p>
					Us&aacute; <a href="#">Correo Argentino</a> (por ahora).
				</p>
	
				<form id="wonDecadeForm" onsubmit="return doTheDecade($('#decadeQueryValue').val());">
					<fieldset>
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<input  type="text" class="form-control"	id="decadeQueryValue" 
											placeholder="Ej.: RD654985313AR" autocomplete="off" autofocus="autofocus">
								</div>
								<!-- /input-group -->
							</div>
							<!-- /.col-lg-6 -->
							<button type="submit" class="ganar-decada btn btn-primary btn-lg btn-block top-block">
								Consultar
							</button>
						</div>
						<!-- /.row -->
					</fieldset>
				</form>
				<hr />
	
	
				<h1 class="decade animated bounceInDown" id="decadeSwing">
					Comprobando si el personal del Correo no est&aacute; en el receso...
					<span class="particle particle--c"></span>
					<span class="particle particle--a"></span>
					<span class="particle particle--b"></span>
				</h1>
	
	
				<div id="decadeResults"></div>
				<div class="fb-like right" data-href="https://www.facebook.com/sincaptcha" 
				 data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
				
			</div>
		</div>
	
	
		<div id="footer">
			<div class="container">
				<p class="text-muted credit">
					The <a href="http://martinbean.co.uk" target="_blank">Katrina's boys</a> - Haciendo simple lo que debe ser simple
				</p>
			</div>
		</div>
	
		
		<script type="text/javascript">
		        
			 $(function(){
				swingOffDecade();
				$("#decadeQueryValue").focus();
				$('#usedTrackingList').affix({
				    offset: {
				      top: 100
				    , bottom: function () {
				        return (this.bottom = $('.bs-footer').outerHeight(true))
				      }
				    }
			    });

				buildTrackingAffixList();

				var idParam;
				<?php if ( isset($_GET['id']) && (strlen($_GET['id']) >= 10) ){ ?>
					idParam = "<?php echo $_GET['id']; ?>";
				<?php }?>

				if ($.trim(idParam) != ""){
					$("#decadeQueryValue").val(idParam);
					$("#wonDecadeForm").submit();
				}

				$('.save-item-label').on("click", function(){
					$("#descripcionModalForm").submit();
				});

				$('#descripcionModalForm').on("submit", function(e){
					e.preventDefault();
					saveTrackingLabel($("#decadeQueryValue").val(),$("#descripcion").val());
					$("#descripcionModal").modal('toggle');
				});					
				
			 });
	
	    </script>
	
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

		<div class="modal fade" id="descripcionModal" tabindex="-1">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title">Qu&eacute; es esto?</h4>
		      </div>
		      <div class="modal-body">
		        <p>S&eacute; lo m&aacute;s breve posible</p>
		        <form class="form-horizontal" role="form" id="descripcionModalForm" >
				  <div class="form-group">
				    <label class="sr-only" for="descripcion">Descripci&oacute;n</label>
				    <div class="col-sm-7">
				    	<input type="text" class="form-control input-large" id="descripcion" placeholder="ej.: Zapatillas, memorias, etc." maxlength="32">
			    	</div>
				  </div>
			    </form>
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="save-item-label btn btn-primary" data-dismiss="modal">Guardar</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->		
		
	</body>
</html>
