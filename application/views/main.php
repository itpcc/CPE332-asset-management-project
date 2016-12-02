<?php 
	$this->config->load('main_form'); 
	$sectionDetails = $this->config->item('section_detail'); 
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
	<title>CPE332 Asset management project</title>


	<!-- CSS  -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/materialize.min.css'); ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="https://cdn.datatables.net/v/dt/jq-2.2.3/dt-1.10.12/fh-3.1.2/r-2.1.0/datatables.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/style.css'); ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
	<style type="text/css">
		/* Setup for full-page height */
		html, body{
			height:100%;
			margin:0;
			padding:0;
		}
		section, .parallax-container{
			height: 100%;
			min-height: 100vh;
			line-height: initial;
		}
		section .pushpin-nav{
			z-index: 99;
		}
		section nav .brand-logo{
			color: white;
		}
		section nav ul li a:hover, section nav ul li a.active {
			background-color: rgba(0,0,0,.1);
		}

		section > .container{
			padding-top: calc(5vh + 2.1rem);
		}
		section .photo-credit{
			position: absolute;
			bottom: 5%;
			right: 2%;
		}
		#index-banner{
			height: calc(100% - 2.1rem);
			min-height: calc(100vh - 2.1rem);
		}
		#index-banner .section{
			margin-top: 10%;
			margin-top: 10vh;
			background-color: rgba(255,255,255,0.5);
		}
		#vendor-section{
			background-color: #ee6e73;
		}
	</style>
</head>
<body>
	<nav class="white" role="navigation">
		<div class="nav-wrapper container">
			<a id="logo-container" href="#" class="brand-logo">Asset Management</a>
			<ul class="right hide-on-med-and-down">
				<li><a href="vendor/">Vendor</a></li>
			</ul>

			<ul id="nav-mobile" class="side-nav">
				<li><a href="vendor/">Vendor</a></li>
			</ul>
			<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
		</div>
	</nav>

	<section id="index-banner" class="parallax-container">
		<div class="section no-pad-bot blue-text text-darken-4">
			<div class="container">
				<h1 class="header text-lighten-2">CPE332 Asset management project</h1>
				<div class="row">
					<h5 class="header col s12 light">Web application for manage assets.</h5>
					<p>Brought to you by</p>
					<ol>
						<li>Mr. Athicom Fahpratanchai -- 570705010xx</li>
						<li>Mr. Wirot Saehang -- 570705010xx</li>
						<li>Mr. Rachasak Ragkamnerd -- 57070501075</li>
						<li>Mr. Suttiwat Songboonkaew -- 57070501079</li>
					</ol>
				</div>
			</div>
		</div>
		<div class="parallax"><img src="<?php echo base_url('assets/img/bg/city.jpg'); ?>" alt="City background"></div>
		<div class="chip photo-credit">
			Background photo by <a href="https://unsplash.com/@anthonydelanoix">Anthony DELANOIX</a>
		</div>
	</section>

	<?php foreach($sectionDetails AS $sectionID => $sectionDetail) : ?>
	<section id="<?php echo $sectionID; ?>-section" class="module-data <?php if(isset($sectionDetail['color'])): ?> <?php echo $sectionDetail['color']; ?> darken-1<?php endif; ?>">
		<nav class="pushpin-nav" data-target="<?php echo $sectionID; ?>-section">
			<div class="nav-wrapper<?php if(isset($sectionDetail['color'])): ?> <?php echo $sectionDetail['color']; ?>  darken-3"<?php endif; ?>">
				<div class="container">
					<a href="<?php echo $sectionID; ?>/" class="brand-logo"><i class="material-icons">person</i> <?php echo $sectionDetail['name']; ?></a>
					<a href="#" data-activates="<?php echo $sectionID; ?>-menu-mobile" class="button-collapse white-text"><i class="material-icons">menu</i></a>
					<ul class="right hide-on-med-and-down" id="<?php echo $sectionID; ?>-menu">
						<li><a href="<?php echo $sectionID; ?>/add/"><i class="material-icons">person_add</i></a></li>
					</ul>
					<ul class="side-nav" id="<?php echo $sectionID; ?>-menu-mobile">
						<li><a href="<?php echo $sectionID; ?>/add/"><i class="material-icons">person_add</i></a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			<!--   Icon Section   -->
			<div class="row">
				<table class="<?php echo $sectionID; ?>-table hoverable" id="<?php echo $sectionID; ?>-section-list">
					<thead>
						<tr>
							<?php foreach($sectionDetail['table'] AS $tableField): ?>
								<th><?php echo $sectionDetail['fields'][$tableField]['name']; ?></th>
							<?php endforeach; ?>
							<th>Option</th>
						</tr>
					</thead>
				</table>

			</div>

		</div>
		<!-- Modal Structure -->
		<div id="app-modal-<?php echo $sectionID; ?>" class="modal">
			<div class="modal-content">
				<h4><?php echo $sectionDetail['modal']['header']; ?></h4>
				<p class="modal-dynamic-header"></p>
				<div class="row">
					<form class="col s12 app-modal-form">
						<?php 
							foreach($sectionDetail['form_lines'] AS $formLine) : 
								$columnWidth = ceil(12/count($formLine));
						?>
						<div class="row">
							<?php 
								foreach($formLine AS $formField): 
									if($sectionDetail['fields'][$formField]['input']['type'] !== 'select2') :
							?>
								<div class="col input-field m<?php echo $columnWidth; ?>">
									<?php if(isset($sectionDetail['fields'][$formField]['icon'])) : ?>
										<i class="material-icons prefix"><?php echo $sectionDetail['fields'][$formField]['icon']; ?></i>
									<?php endif; ?>
									<?php switch($sectionDetail['fields'][$formField]['input']['type']) : 
										case 'textarea' : ?>
											<textarea 
												id="app-modal-<?php echo $sectionID; ?>-<?php echo $sectionDetail['fields'][$formField]['slug']; ?>" 
												name="<?php echo $formField; ?>" 
												class="validate materialize-textarea" 
											<?php if(isset($sectionDetail['fields'][$formField]['input']['required']) && $sectionDetail['fields'][$formField]['input']['required']) : ?>
												required="required"
											<?php endif;?>
											<?php if(isset($sectionDetail['fields'][$formField]['input']['length'])) : ?>
												length="<?php echo $sectionDetail['fields'][$formField]['input']['length']; ?>"
											<?php endif;?>
											></textarea>
										<?php break;
										      default: ?>
											<input 
												type="<?php echo $sectionDetail['fields'][$formField]['input']['type']; ?>" 
												id="app-modal-<?php echo $sectionID; ?>-<?php echo $sectionDetail['fields'][$formField]['slug']; ?>" 
												name="<?php echo $formField; ?>" 
												class="validate"
											<?php if(isset($sectionDetail['fields'][$formField]['input']['required']) && $sectionDetail['fields'][$formField]['input']['required']) : ?>
												required="required"
											<?php endif;?>
											<?php if(isset($sectionDetail['fields'][$formField]['input']['length'])) : ?>
												length="<?php echo $sectionDetail['fields'][$formField]['input']['length']; ?>"
											<?php endif;?>
											>
										<?php break;
									endswitch; ?>
									<?php if($sectionDetail['fields'][$formField]['input']['type'] !== 'hidden'): ?>
										<label 
											for="app-modal-<?php echo $sectionID; ?>-<?php echo $sectionDetail['fields'][$formField]['slug']; ?>"
										><?php echo $sectionDetail['fields'][$formField]['name']; ?></label>
									<?php endif; ?>
								</div>
							<?php else: ?>
								<div class="col m3">
									<?php if(isset($sectionDetail['fields'][$formField]['icon'])) : ?>
										<i class="material-icons"><?php echo $sectionDetail['fields'][$formField]['icon']; ?></i>
									<?php endif; ?> 
									<label 
										for="app-modal-<?php echo $sectionID; ?>-<?php echo $sectionDetail['fields'][$formField]['slug']; ?>"
									><?php echo $sectionDetail['fields'][$formField]['name']; ?></label>
								</div>
								<div class="col m9">
									<select 
										id="app-modal-<?php echo $sectionID; ?>-<?php echo $sectionDetail['fields'][$formField]['slug']; ?>" 
										name="<?php echo $formField; ?>" 
										class="validate"
									<?php if(
										isset($sectionDetail['fields'][$formField]['input']['required']) && 
										$sectionDetail['fields'][$formField]['input']['required']
									) : ?>
										required="required"
									<?php endif;?>
										></select>
								</div>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
						<?php endforeach; ?>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<a href="#!" class="waves-effect waves-green btn-flat app-modal-submit">Submit</a>
			</div>
		</div>

	</section>
	<?php endforeach; ?>

	<footer class="page-footer teal">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
					<h5 class="white-text">Company Bio</h5>
					<p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


				</div>
				<div class="col l3 s12">
					<h5 class="white-text">Settings</h5>
					<ul>
						<li><a class="white-text" href="#!">Link 1</a></li>
						<li><a class="white-text" href="#!">Link 2</a></li>
						<li><a class="white-text" href="#!">Link 3</a></li>
						<li><a class="white-text" href="#!">Link 4</a></li>
					</ul>
				</div>
				<div class="col l3 s12">
					<h5 class="white-text">Connect</h5>
					<ul>
						<li><a class="white-text" href="#!">Link 1</a></li>
						<li><a class="white-text" href="#!">Link 2</a></li>
						<li><a class="white-text" href="#!">Link 3</a></li>
						<li><a class="white-text" href="#!">Link 4</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
			Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
			</div>
		</div>
	</footer>


	<!--  Scripts-->
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="<?php echo base_url('assets/js/materialize.js'); ?>"></script>
	<script src="https://cdn.datatables.net/v/dt/dt-1.10.12/fh-3.1.2/r-2.1.0/datatables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<script src="<?php echo base_url('assets/js/jquery.history.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/init.js'); ?>"></script>
	<script type="text/javascript">
			var BASE_URL = '<?php echo base_url(); ?>';
			var BASE_URL_ELEMENT = document.createElement("a");
			BASE_URL_ELEMENT.href = BASE_URL;
			var SECTION_FORM_CONFIG = <?php echo json_encode($sectionDetails); ?>;

			/* jQuery Deparam : https://raw.githubusercontent.com/chrissrogers/jquery-deparam/master/jquery-deparam.min.js */
			(function(h){h.deparam=function(i,j){var d={},k={"true":!0,"false":!1,"null":null};h.each(i.replace(/\+/g," ").split("&"),function(i,l){var m;var a=l.split("="),c=decodeURIComponent(a[0]),g=d,f=0,b=c.split("]["),e=b.length-1;/\[/.test(b[0])&&/\]$/.test(b[e])?(b[e]=b[e].replace(/\]$/,""),b=b.shift().split("[").concat(b),e=b.length-1):e=0;if(2===a.length)if(a=decodeURIComponent(a[1]),j&&(a=a&&!isNaN(a)?+a:"undefined"===a?void 0:void 0!==k[a]?k[a]:a),e)for(;f<=e;f++)c=""===b[f]?g.length:b[f],m=g[c]=
f<e?g[c]||(b[f+1]&&isNaN(b[f+1])?{}:[]):a,g=m;else h.isArray(d[c])?d[c].push(a):d[c]=void 0!==d[c]?[d[c],a]:a;else c&&(d[c]=j?void 0:"")});return d}})(jQuery);


			function _bindAjaxLinkElement(){
				$("a:not([data-bind-ajax], a[href^='#'])").each(function(){
					if(
						this.hostname === BASE_URL_ELEMENT.hostname && 	//check is in the same domain
						this.pathname.indexOf(BASE_URL_ELEMENT.pathname) === 0 //and in the same directory (localhost are placed in subdir)
					){
						$(this).attr("data-bind-ajax", "true").click(function(e){
							var currURL = this.href;
							e.preventDefault();
							if(!currURL.match(/[?&]api=/)){
								currURL = BASE_URL+'?api='+encodeURIComponent(this.pathname.substring(BASE_URL_ELEMENT.pathname.length));
								if(this.search)
									currURL += '&'+this.search.substring(1); // Strip ? and append into exist query string
							}

							console.log("going to URL: ", currURL);
							if(History.getState().cleanUrl !== currURL){
								History.pushState(null, document.title + ' | '+ ($(this).attr("title") || $(this).text()), currURL);
							}else{
								//if state not change
								console.log("Manual: ", currURL);
								gotoPage(currURL); //go manually
							}
							// cancel the normal action of the hyperlink
							return false;
						});
					}else{
						$(this).attr("data-bind-ajax", "false");
					}
				});
			}

			function scrollTo(selector){
				$('html, body').animate({
					scrollTop: $(selector).offset().top
				}, 500);
			}

			function gotoPage(url){
				var urlObj = document.createElement("a");
				var urlQueryObj, urlPath;
				urlObj.href = url;
				if(!urlObj.search)
					return false;

				urlQueryObj = $.deparam(urlObj.search.substring(1));

				if(urlQueryObj.api){
					urlPath = $.grep(urlQueryObj.api.split('/'), function(elem){ return elem.length > 0; });
					console.log(urlPath);
					if(!jQuery.isEmptyObject(SECTION_FORM_CONFIG[urlPath[0]])){
						scrollTo('#'+urlPath[0]+'-section');
						if(urlPath[1] === 'add'){
							openForm(urlPath[0]);
						}else{

						}
					}else{
						jQuery.noop();
					}
					/*if(urlPath[0] === 'vendor'){
						scrollTo('#vendor-section');
						if(urlPath[1] === 'add'){
							openForm('vendor');
						}else{

						}
					}*/
				}
			}

			function openForm(formID, formData){
				if(jQuery.isEmptyObject(SECTION_FORM_CONFIG[formID]))
					return;

				$('#app-modal-'+formID+' :input').removeClass("valid invalid");
				if(!jQuery.isEmptyObject(formData)){
					$.each(formData, function(key, val){
						$("#app-modal-"+formID+"-"+key).val(val);
					});
				}else{
					$('#app-modal-'+formID+' :input').val('');
				}

				jQuery.each(SECTION_FORM_CONFIG[formID].fields, function(fieldName, fieldProperties){
					if(fieldProperties.input.type === "select2"){
						$('#app-modal-'+formID+'-'+fieldProperties.slug).select2({
							ajax: {
								url: fieldProperties.input.ajax,
								dataType: 'json',
								processResults: function (ajaxData) {
									//console.log(data);
									return {
										results: $.map(ajaxData.data, function (item) {
											console.log(item);
											return {
												text: item[fieldProperties.input.ajax_text],
												slug: item[fieldProperties.input.ajax_id],
												id: item[fieldProperties.input.ajax_id]
											};
										})
									};
								}
							},
							minimumInputLength: 2,
							width: '100%'
						});
						if(!jQuery.isEmptyObject(formData) && formData[fieldName]){
							$.ajax({
								cache: true,
								dataType: "json",
								url: fieldProperties.input.ajax_query_id+formData[fieldName],
								success: function(ajaxData){
									$('#app-modal-'+formID+'-'+fieldProperties.slug).append('<option value="'+ajaxData.data[0][fieldProperties.input.ajax_id]+'">'+ajaxData.data[0][fieldProperties.input.ajax_text]+'</option>').val(ajaxData.data[0][fieldProperties.input.ajax_id]).trigger('change');
								}
							});
						}else{
							$('#app-modal-'+formID+'-'+fieldProperties.slug).val('').trigger('change');
						}
					}else if(typeof fieldProperties.input.length === "number"){
						$('#app-modal-'+formID+'-'+fieldProperties.slug).trigger('autoresize').characterCounter();
					}
				});

				$("#app-modal-"+formID).modal('open');

				/*if(formID === 'vendor'){
					$('#app-modal-vendor-buy-location').trigger('autoresize').characterCounter();
					$('#app-modal-vendor-company-id').select2({
						ajax: {
							url: '<?php echo base_url('index.php/vendors/dummy_company/'); ?>',
							dataType: 'json',
							processResults: function (data) {
								console.log(data);
								return {
									results: $.map(data.data, function (item) {
										console.log(item);
										return {
											text: item.CompanyName,
											slug: item.CompanyID,
											id: item.CompanyID
										};
									})
								};
							}
						},
						minimumInputLength: 2,
						width: '100%'
					}).val((!jQuery.isEmptyObject(data) && data.CompanyID)?data.CompanyID:"").trigger('change');

					$("#app-modal-vendor").modal('open');
				}*/

				$('#app-modal-'+formID+' .app-modal-submit').click(function(e){
					var error = {};
					e.preventDefault();
					console.log('#app-modal-'+formID+' [required]');
					$('#app-modal-'+formID+' :input').each(function(){
						$(this).removeClass("invalid");

						if(!this.validity.valid){
							error[$(this).attr("id") || $(this).attr("name")] = ($("label[for='"+$(this).attr("id")+"']").text() || $(this).attr("name")).toString()+' : '+this.validationMessage;
						}
					});

					if(!jQuery.isEmptyObject(error)){
						Materialize.toast(Object.values(error).join('<br>'), 4000); // 4000 is the duration of the toast
						$.each(error, function(key, name){
							$('#'+key+', #app-modal-'+formID+' input[name="'+key+'"]').addClass("invalid");
						});
					}else{
						console.log("Submit Data: ", $('#app-modal-'+formID+' .app-modal-form').serialize());
						$.ajax({
							dataType: 'json',
							method: 'POST',
							data: $('#app-modal-'+formID+' .app-modal-form').serialize(),
							error: function(jqXHR, textStatus, errorThrown){
								Materialize.toast('<span class="text-red">Error while submit data ('+textStatus+'):'+errorThrown+'</span>', 4000); // 4000 is the duration of the toast
							},
							success: function(data){
								if(data.error){
									Materialize.toast('<span class="red-text">Error: '+((typeof data.error === "string")?data.error:JSON.stringify(data.error))+'</span>', 4000); // 4000 is the duration of the toast
								}else{
									Materialize.toast('<span class="green-text">Success!</span>', 2000); // 4000 is the duration of the toast
									$("#app-modal-"+formID).modal('close');
									generateTable(formID);
								}
							},
							url:( 
								jQuery.isEmptyObject($('#app-modal-'+formID+'-'+SECTION_FORM_CONFIG[formID].fields[SECTION_FORM_CONFIG[formID].id_key].slug).val())?
								SECTION_FORM_CONFIG[formID].url.add:
								SECTION_FORM_CONFIG[formID].url.edit
							),

						});
						//@TODO: add submit procedure
					}
				});

			}

			function generateTable(tableID){
				if(jQuery.isEmptyObject(SECTION_FORM_CONFIG[tableID]))
					return;
				var columnList = [];
				jQuery.each(SECTION_FORM_CONFIG[tableID].table, function(i, fieldName){
					columnList.push({ data: fieldName });
				});
				columnList.push({ data: null });

				console.log("columnList: ", columnList);

				if(!$('#'+tableID+'-section-list').attr('data-DataTable')){
					window.dataTableObj[tableID] = $('#'+tableID+'-section-list').DataTable( {
							responsive: true,
							dom: '<<"row"<"col m8"l><"#'+tableID+'-section-list-searchbox.input-field col m4 right">><t>ip>',
							ajax: SECTION_FORM_CONFIG[tableID].url.list,
							columns: columnList,
							"columnDefs": [ {
								"targets": -1,
								"data": null,
								"defaultContent": '<a href="#!" class="app-'+tableID+'-edit">Edit!</a>'
							} ]
					} );
					$('#'+tableID+'-section-list').attr('data-DataTable', 'true');
					$('#'+tableID+'-section-list-searchbox').html('<input value="" id="'+tableID+'-section-filter-field" class="white-text" type="text"><label for="'+tableID+'-section-filter-field" class="white-text">Search:</label>');
					$('#'+tableID+'-section-filter-field').keyup(function(){
						$('#'+tableID+'-section-list').dataTable().search($(this).val()).draw() ;
					});
				}else{
					window.dataTableObj[tableID].ajax.reload();
				}
				Materialize.updateTextFields();

				/*if(tableID === 'vendor'){
					//$.fn.dataTableExt.oStdClasses.sPageButton = $.fn.dataTableExt.oStdClasses.sPageButton + " waves-effect waves-light btn";
					$('#vendor-section-list').DataTable( {
						responsive: true,
						dom: '<<"row"<"col m8"l><"#vendor-section-list-searchbox.input-field col m4 right">><t>ip>',
						ajax: "<?php echo base_url('index.php/vendors/'); ?>",
						columns: [
							{ data: "VendorID" },
							{ data: "FirstName" },
							{ data: "LastName" },
							{ data: "CompanyID" },
							{ data: "VendorPhoneNO" },
							{ data: "VendorEmail" },
							{ data: "BuyLocation" },
							{ data: null }
						],
						"columnDefs": [ {
							"targets": -1,
							"data": null,
							"defaultContent": '<a href="#!" class="app-vendor-edit">Edit!</a>'
						} ]
					} );
					$("#vendor-section-list-searchbox").html('<input value="" id="vendor-section-filter-field" class="white-text" type="text"><label for="vendor-section-filter-field" class="white-text">Search:</label>');
					$("#vendor-section-filter-field").keyup(function(){
						$('#vendor-section-list').DataTable().search($(this).val()).draw() ;
					});
					Materialize.updateTextFields();
				}*/
			}

			$(document).ready(function(){
				window.dataTableObj = {};
				_bindAjaxLinkElement();
				$('.modal').modal();
				gotoPage(document.location);
				$('.pushpin-nav').each(function() {
					var $this = $(this);
					var $target = $('#' + $(this).attr('data-target'));
					$this.pushpin({
						top: $target.offset().top,
						bottom: $target.offset().top + $target.outerHeight() - $this.height()
					});
				});
				generateTable('vendor');
			});
			(function(window,undefined){
				// Bind to StateChange Event
				History.Adapter.bind(window,'statechange',function(){ // Note: We are using statechange instead of popstate
					var State = History.getState(); // Note: We are using History.getState() instead of event.state
					gotoPage(State.cleanUrl);
					return true;
				});
			})(window);


	</script>

	</body>
</html>