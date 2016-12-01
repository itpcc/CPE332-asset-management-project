<!DOCTYPE html>
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


	<section id="vendor-section">
		<nav class="pushpin-nav" data-target="vendor-section">
			<div class="nav-wrapper red">
				<div class="container">
					<a href="#vendor-section" class="brand-logo"><i class="material-icons">person</i> Vendor</a>
					<a href="#" data-activates="vendor-menu-mobile" class="button-collapse white-text"><i class="material-icons">menu</i></a>
					<ul class="right hide-on-med-and-down" id="vendor-menu">
						<li><a href="vendor/add/"><i class="material-icons">person_add</i></a></li>
					</ul>
					<ul class="side-nav" id="vendor-menu-mobile">
						<li><a href="vendor/add/"><i class="material-icons">person_add</i></a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			<!--   Icon Section   -->
			<div class="row">
				<table class="vendor-table hoverable" id="vendor-section-list">
					<thead>
						<tr>
							<th>#</th>
							<th>First name</th>
							<th>Last name</th>
							<th>Company</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Buy location</th>
							<th>Option</th>
						</tr>
					</thead>
				</table>

			</div>

		</div>
		<!-- Modal Structure -->
		<div id="app-modal-vendor" class="modal">
			<div class="modal-content">
				<h4>จัดการ Vendor</h4>
				<p class="modal-dynamic-header"></p>
				<div class="row">
					<form class="col s12">
						<input type="hidden" name="VendorID">
						<div class="row">
							<div class="input-field col s6">
								<i class="material-icons prefix">account_circle</i>
								<input id="app-modal-vendor-first_name" type="text" class="validate">
								<label for="app-modal-vendor-first_name">First Name</label>
							</div>
							<div class="input-field col s6">
								<input id="app-modal-vendor-last_name" type="text" class="validate">
								<label for="app-modal-vendor-last_name">Last Name</label>
							</div>
						</div>
						<div class="row">
							<div class="col m3">
								<i class="material-icons">domain</i> <label for="app-modal-vendor-company-id">Company</label>
							</div>
							<div class="col m9">
								<select id="app-modal-vendor-company-id" name="CompanyID"></select>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6">
								<i class="material-icons prefix">phone</i>
								<input id="app-modal-vendor-tel" name="VendorPhoneNO" type="tel" class="validate">
								<label for="app-modal-vendor-tel">Phone</label>
							</div>
							<div class="input-field col s6">
								<i class="material-icons prefix">email</i>
								<input id="app-modal-vendor-email" name="VendorEmail" type="email" class="validate">
								<label for="app-modal-vendor-email">Email</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<i class="material-icons prefix">store</i>
								<textarea id="app-modal-vendor-buy-location" name="BuyLocation" length="50" class="validate materialize-textarea"></textarea>
								<label for="app-modal-vendor-buy-location">Buy Location</label>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat" class="app-modal-vendor-submit">Submit</a>
			</div>
		</div>

	</section>

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

			/* jQuery Deparam : https://raw.githubusercontent.com/chrissrogers/jquery-deparam/master/jquery-deparam.min.js */
			(function(h){h.deparam=function(i,j){var d={},k={"true":!0,"false":!1,"null":null};h.each(i.replace(/\+/g," ").split("&"),function(i,l){var m;var a=l.split("="),c=decodeURIComponent(a[0]),g=d,f=0,b=c.split("]["),e=b.length-1;/\[/.test(b[0])&&/\]$/.test(b[e])?(b[e]=b[e].replace(/\]$/,""),b=b.shift().split("[").concat(b),e=b.length-1):e=0;if(2===a.length)if(a=decodeURIComponent(a[1]),j&&(a=a&&!isNaN(a)?+a:"undefined"===a?void 0:void 0!==k[a]?k[a]:a),e)for(;f<=e;f++)c=""===b[f]?g.length:b[f],m=g[c]=
f<e?g[c]||(b[f+1]&&isNaN(b[f+1])?{}:[]):a,g=m;else h.isArray(d[c])?d[c].push(a):d[c]=void 0!==d[c]?[d[c],a]:a;else c&&(d[c]=j?void 0:"")});return d}})(jQuery);


			function _bindAjaxLinkElement(){
				$("a:not([data-bind-ajax])").each(function(){
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
					if(urlPath[0] === 'vendor'){
						scrollTo('#vendor-section');
						if(urlPath[1] === 'add'){
							openForm('vendor');
						}else{

						}
					}
				}
			}

			function openForm(formID, data){
				if(data){
					$.each(data, function(key, val){
						$("#app-modal-"+formID+"-"+key).val(val);
					});
				}else{
					$('#app-modal-'+formID+' input, #app-modal-'+formID+' textarea').val('');
				}
				if(formID === 'vendor'){
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
					});
					$("#app-modal-vendor").modal('open');
				}
			}

			function generateTable(tableID){
				if(tableID === 'vendor'){
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
				}
			}

			$(document).ready(function(){
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

				// Change our States
				/*History.pushState({state:1}, "State 1", "?state=1"); // logs {state:1}, "State 1", "?state=1"
				History.pushState({state:2}, "State 2", "?state=2"); // logs {state:2}, "State 2", "?state=2"
				History.replaceState({state:3}, "State 3", "?state=3"); // logs {state:3}, "State 3", "?state=3"
				History.pushState(null, null, "?state=4"); // logs {}, '', "?state=4"
				History.back(); // logs {state:3}, "State 3", "?state=3"
				History.back(); // logs {state:1}, "State 1", "?state=1"
				History.back(); // logs {}, "Home Page", "?"
				History.go(2); // logs {state:3}, "State 3", "?state=3"*/

			})(window);


	</script>

	</body>
</html>