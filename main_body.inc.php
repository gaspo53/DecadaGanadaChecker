		<!-- Wrap all page content here -->
		<div id="wrap">
			<!-- Affix para numeros usados -->
			<div class="col-md-3" >
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
	
	
				<h1 class="decade animated bounceInDown hide" id="decadeSwing">
					Comprobando si el personal del Correo no est&aacute; en el receso...
					<span class="particle particle--c"></span>
					<span class="particle particle--a"></span>
					<span class="particle particle--b"></span>
				</h1>
	
	
				<div id="decadeResults"></div>
				<div class="fb-like right" data-href="https://www.facebook.com/sincaptcha" 
				 	 data-layout="standard" data-action="like" data-show-faces="true" data-share="true">
				</div>
				
			</div>
		</div>
	
		<div id="footer">
			<div class="container">
				<p class="text-muted credit">
					The <a href="#" onclick="about();">Katrina's boys</a> - Haciendo simple lo que debe ser simple
					<a href="<?php echo $SITE_URL; ?>?faq" class="right" target="_blank" >Qu&eacute; onda Sincaptcha?</a>
				</p>
			</div>
		</div>
	
		<div class="modal fade span8" id="aboutModal" tabindex="-1">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title">Would you clap your hands, please?</h4>
		      </div>
		      <div class="modal-body">
		      	<iframe width="480" height="360" frameborder="0" allowfullscreen=""></iframe>
		      </div>
		      <div class="modal-footer">
		        <a href="#" onclick="dontStopTheMusic()">Me gust&oacute; el tema, dejalo mientras trackeo</a>
		      </div>		      
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->	
​

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