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
					<img src="img/logo.png" alt="Sin Captcha">
				</div>
				<p class="lead">Sólo ingresá el número de envío y listo!</p>
				<p>
					Eleg&iacute; <a href="#">el servicio postal del paquete</a>.
				</p>
				<form id="wonDecadeForm" onsubmit="return doTheDecade($('#decadeQueryValue').val());">
					<fieldset>
						<div class="row">
							<div class="col-lg-12">
					          <div class="input-group">
					            <div class="input-group-btn">
					              <button id="postalMailChosen" type="button" class="btn btn-default" tabindex="-1"></button>
					              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" tabindex="-1">
					                <span class="caret"></span>
					                <span class="sr-only">Toggle Dropdown</span>
					              </button>
					              <ul class="dropdown-menu postalMail-list" role="menu">
					                <li><a href="#" class="mail-brand" data-postal="CA">Correo Argentino</a></li>
					                <li><a href="#" class="mail-brand" data-postal="OCA">OCA</a></li>
					              </ul>
					            </div>
									<input type="text" class="form-control"	id="decadeQueryValue" 
										   placeholder="Ej.: RD654985313AR" autocomplete="off" autofocus="autofocus">					          </div><!-- /.input-group -->
					        </div>
							<div class="col-lg-12">
								<div class="form-group">

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
					Hablando con el Correo...
					<span class="particle particle--c"></span>
					<span class="particle particle--a"></span>
					<span class="particle particle--b"></span>
				</h1>
	
	
				<div id="decadeResults"></div>
				<div class="fb-like" data-href="https://www.facebook.com/sincaptcha" 
					 data-layout="button_count" data-action="like" 
					 data-show-faces="false" data-share="true"></div>
				
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
				$(".mail-brand").on("click",function(){
					$("#postalMailChosen").html($(this).html());
					setPostalMail($(this).attr("data-postal"));
				});

				if (!actualTracking){
					var element = $('.postalMail-list').children().children().first();
					$("#postalMailChosen").html(element.html());
					setPostalMail(element.attr("data-postal"));
				}

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
				var typeParam;
				<?php if ( isset($_GET['id']) && (strlen($_GET['id']) >= 10) ){ ?>
					idParam = "<?php echo $_GET['id']; ?>";
					typeParam = "<?php if (isset($_GET['type'])){
											echo $_GET['type'];
										}else{
											echo "";
										} 
								  ?>";
				<?php }?>

				if ($.trim(idParam) != ""){
					$("#decadeQueryValue").val(idParam);
					if ($.trim(typeParam) != ""){
						setPostalMail(typeParam);
					}
				}

				$("#wonDecadeForm").submit();

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
