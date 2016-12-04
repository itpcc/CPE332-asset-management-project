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
	<link href="<?php echo base_url('assets/css/style.css'); ?>?_time=<?php echo time(); ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
	<style type="text/css">
		.module-data{
			position: relative;
		}
		.support-backgroundblendmode .module-data .module-data-background{
			content: " ";
			display: block;
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-size: cover;
			background-position: top center;
			background-repeat: no-repeat;
			background-color: inherit;
			background-blend-mode: overlay;
			-webkit-filter: grayscale(1);
			filter: grayscale(1);
			opacity: 0.15;
		}
	</style>
</head>
<body>
	<nav class="white" role="navigation">
		<div class="nav-wrapper container">
			<a id="logo-container" href="#" class="brand-logo">Asset Management</a>
			<ul class="right hide-on-med-and-down">
				<?php foreach($sectionDetails AS $sectionID => $sectionDetail): ?>
					<li>
						<a href="<?php echo $sectionID; ?>/">
							<?php if(isset($sectionDetail['icon'])): ?><i class="material-icons left"><?php echo $sectionDetail['icon']; ?></i><?php endif; ?>
							<?php echo $sectionDetail['name']; ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>

			<ul id="nav-mobile" class="side-nav">
				<?php foreach($sectionDetails AS $sectionID => $sectionDetail): ?>
					<li>
						<?php if(isset($sectionDetail['icon'])): ?><i class="material-icons"><?php echo $sectionDetail['icon']; ?></i><?php endif; ?>
						<a href="<?php echo $sectionID; ?>/"><?php echo $sectionDetail['name']; ?></a>
					</li>
				<?php endforeach; ?>
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
	<section 
		id="<?php echo $sectionID; ?>-section" 
		class="module-data <?php if(isset($sectionDetail['color'])): ?> <?php echo $sectionDetail['color']; ?> darken-1<?php endif; ?>"
	>
		<?php if(isset($sectionDetail['background'])) : ?>
			<div class="module-data-background" style="background-image: url(<?php echo base_url('assets/img/bg/'.$sectionDetail['background']['file']); ?>)"></div>
			<div class="chip photo-credit">
				Background photo by <a href="<?php echo $sectionDetail['background']['url']; ?>"><?php echo $sectionDetail['background']['name']; ?></a>
			</div>
		<?php endif; ?>
		<nav class="pushpin-nav" data-target="<?php echo $sectionID; ?>-section">
			<div class="nav-wrapper<?php if(isset($sectionDetail['color'])): ?> <?php echo $sectionDetail['color']; ?>  darken-3"<?php endif; ?>">
				<div class="container">
					<a href="<?php echo $sectionID; ?>/" class="brand-logo"><i class="material-icons"><?php echo $sectionDetail['icon']; ?></i> <?php echo $sectionDetail['name']; ?></a>
					<a href="#" data-activates="<?php echo $sectionID; ?>-menu-mobile" class="button-collapse white-text"><i class="material-icons">menu</i></a>
					<ul class="right hide-on-med-and-down" id="<?php echo $sectionID; ?>-menu">
						<li><a href="<?php echo $sectionID; ?>/add/" class="white-text"><i class="material-icons"><?php echo $sectionDetail['add']['icon']; ?></i></a></li>
					</ul>
					<ul class="side-nav" id="<?php echo $sectionID; ?>-menu-mobile">
						<li><a href="<?php echo $sectionID; ?>/add/" class="white-text"><i class="material-icons"><?php echo $sectionDetail['add']['icon']; ?></i></a></li>
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
								<th><?php echo $sectionDetail['fields'][is_array($tableField)?($tableField['localField']):$tableField]['name']; ?></th>
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
							<?php foreach($formLine AS $formField): ?>
							<?php if($sectionDetail['fields'][$formField]['input']['type'] !== 'select2') :?>
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
										      case 'select': ?>
											<select
												id="app-modal-<?php echo $sectionID; ?>-<?php echo $sectionDetail['fields'][$formField]['slug']; ?>" 
												name="<?php echo $formField; ?>" 
												class="validate"
											<?php if(isset($sectionDetail['fields'][$formField]['input']['required']) && $sectionDetail['fields'][$formField]['input']['required']) : ?>
												required="required"
											<?php endif;?>
											<?php if(isset($sectionDetail['fields'][$formField]['input']['default'])) : ?>
												value="<?php echo $sectionDetail['fields'][$formField]['input']['default']; ?>"
											<?php endif;?>
											></select>
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
									<?php if($sectionDetail['fields'][$formField]['input']['type'] !== 'hidden' && !(isset($sectionDetail['fields'][$formField]['input']['show_name']) && $sectionDetail['fields'][$formField]['input']['show_name'] === false)): ?>
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
									<?php if(!(isset($sectionDetail['fields'][$formField]['input']['show_name']) && $sectionDetail['fields'][$formField]['input']['show_name'] === false)): ?>
									<label 
										for="app-modal-<?php echo $sectionID; ?>-<?php echo $sectionDetail['fields'][$formField]['slug']; ?>"
									><?php echo $sectionDetail['fields'][$formField]['name']; ?></label>
									<?php endif; ?>
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
	<script src="<?php echo base_url('assets/js/jquery.deparam.min.js'); ?>"></script>	
	<script src="<?php echo base_url('assets/js/modernizr-backgroundBlendMode.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/init.js'); ?>?_time=<?php echo time(); ?>"></script>
	<script type="text/javascript">
		var BASE_URL = '<?php echo base_url(); ?>';
		var BASE_URL_ELEMENT = document.createElement("a");
		BASE_URL_ELEMENT.href = BASE_URL;
		var SECTION_FORM_CONFIG = <?php echo json_encode($sectionDetails); ?>;
	</script>

	</body>
</html>