<?php 
	$this->config->load('main_form'); 
	$sectionDetails = $this->config->item('section_detail'); 
	$this->config->load('analysis_table'); 
	$analysisTable = $this->config->item('analysis_table');
	$analysisTableURL = $this->config->item('analysis_table_url'); 
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
	<div id="login-modal" class="modal">
		<div class="modal-content">
			<h4>Login</h4>
			<div class="row">
				<form class="col s12" id="login-form">
					<div class="row">
						<div class="input-field col s6">
							<input id="first_name" type="text" class="validate">
							<label for="first_name">Username</label>
						</div>
						<div class="input-field col s6">
							<input id="last_name" type="password" class="validate">
							<label for="last_name">Password</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="submit" class="waves-effect waves-light btn">
						</div>
					</div>
				</form>
			</div>

		</div>
	</div>

	<?php foreach(array('', '-mobile') AS $moduleSuffix): ?>
	<ul id="moduledropdown<?php echo $moduleSuffix; ?>" class="dropdown-content">
		<?php foreach($sectionDetails AS $sectionID => $sectionDetail): ?>
		<li>
			<a 
				href="<?php echo $sectionID; ?>/"
				<?php if(isset($sectionDetail['color'])): ?> class="<?php echo $sectionDetail['color']; ?>-text"<?php endif; ?>
			>
				<?php if(isset($sectionDetail['icon'])): ?><i class="material-icons left"><?php echo $sectionDetail['icon']; ?></i><?php endif; ?>
				<?php echo $sectionDetail['name']; ?>
			</a>
		</li>
		<?php endforeach; ?>
	</ul>
	<ul id="analysisdropdown<?php echo $moduleSuffix; ?>" class="dropdown-content">
		<?php foreach($analysisTable AS $analysisID => $analysisDetail): ?>
		<li>
			<a href="analysis/<?php echo $analysisID; ?>/">
				<?php echo $analysisDetail['name']; ?>
			</a>
		</li>
		<?php endforeach; ?>
	</ul>
	<?php endforeach; ?>

	<nav class="white" role="navigation">
		<div class="nav-wrapper container">
			<a id="logo-container" href="<?php echo base_url(''); ?>" class="brand-logo">Asset Management</a>
			<ul class="right hide-on-med-and-down">
				<li><a class="dropdown-button" href="#!" data-activates="moduledropdown"><i class="material-icons left">account_balance_wallet</i> Module &nbsp;&nbsp;&nbsp;&nbsp;<i class="material-icons right">arrow_drop_down</i></a></li>	
				<li><a class="dropdown-button" href="#!" data-activates="analysisdropdown"><i class="material-icons left">highlight</i> Analysis &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-icons right">arrow_drop_down</i></a></li>
				<li><a class="login-logout"><i class="material-icons left">lock</i> Logout</a></li>	
			</ul>
			<ul id="nav-mobile" class="side-nav">
				<li><a class="dropdown-button" href="#!" data-activates="moduledropdown-mobile"><i class="material-icons left">account_balance_wallet</i> Module &nbsp;&nbsp;&nbsp;&nbsp;<i class="material-icons right">arrow_drop_down</i></a></li>
				<li><a class="dropdown-button" href="#!" data-activates="analysisdropdown-mobile"><i class="material-icons left">highlight</i> Analysis &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-icons right">arrow_drop_down</i></a></li>
				<li><a class="login-logout"><i class="material-icons left">lock</i> Logout</a></li>
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
					<p>by</p>
					<ol>
						<li>Mr. Athicom Fahpratanchai -- 57070501057</li>
						<li>Mr. Wirot Saehang -- 57070501039</li>
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
		<nav class="<?php //pushpin-nav ?>" data-target="<?php echo $sectionID; ?>-section">
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
								<th><?php echo $sectionDetail['fields'][(is_array($tableField)?($tableField['localField']):$tableField)]['name']; ?></th>
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
												class="validate browser-default"
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

	<!-- Analysis -->
	<section class=" light-blue darken-1 hide indigo-text text-darken-4" id="analysis-section">
		<nav class="pushpin-nav" data-target="analysis-section">
			<div class="nav-wrapper teal darken-3">
				<div class="container">
					<a href="analysis/" class="brand-logo"><i class="material-icons">highlight</i> Analysis : <span class="analysis-name"></span></a>
				</div>
			</div>
		</nav>
		<div class="container">
			<div class="row white-text">
				<span class="right analysis-description"></span>
			</div>
			<div class="row white-text">
				<div class="input-field col m4 offset-m8 hide" id="analysis-argument-wrapper">
					<label for="analysis-argument" id="analysis-argument-label"></label>
					<input type="text" class="validate" name="argument" id="analysis-argument" />
				</div>
			</div>
			<div class="row white">
				<table id="analysis-table" class="bordered bordered responsive-table hoverable">
					<thead>
						<tr>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</section>

	<!-- Buy Form -->
	<section id="Buy_page" class="complex-page">
		<div class="container">
			<div class="row col s12">
				<form class="col s12" action="<?php echo base_url('index.php/complex_Form/buy/'); ?>">
					<h3>Buy Asset</h3>
					<h5>Vendor</h5>
					<div class="row">
						<div class="input-field col s6">
							<i class="material-icons prefix">account_circle</i>
							<input name="vendor_first_name" id="vendor_first_name" type="text" length="20" class="validate">
							<label for="vendor_first_name">First Name</label>
						</div>
						<div class="input-field col s6">
							<input name="vendor_last_name" id="vendor_last_name" type="text" length="20" class="validate">
							<label for="vendor_last_name">Last Name</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<i class="material-icons prefix">phone</i>
							<input name="vendor_phone" id="vendor_phone" type="tel" length="10" class="validate">
							<label for="vendor_phone">Phone Number</label>
						</div>
						<div class="input-field col s6">
							<input name="vendor_email" id="vendor_email" type="email" length="30" class="validate">
							<label for="vendor_email">Email</label>        
						</div>
					</div>
				 	<div class="row">
						<div class="input-field col s12">
							<textarea name="buy_location" id="buy_location" length="50" class="materialize-textarea"></textarea>
							<label for="buy_location">Buy Location</label>
						</div>
					</div>
					<h5>Company</h5>
					<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">account_circle</i>
							<input name="company_name" id="buy_company_name" type="text" length="50" class="validate">
							<label for="company_name">Company Name</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							 <i class="material-icons prefix">home</i>
							<textarea name="company_address" id="buy_company_address" length="100" class="materialize-textarea"></textarea>
							<label for="company_address">Company Address</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<i class="material-icons prefix">phone</i>
							<input name="company_phone" id="buy_company_phone" type="tel" length="10" class="validate">
							<label for="company_phone">Phone Number</label>
						</div>
						<div class="input-field col s6">
							<i class="material-icons prefix">phone</i>
							<input name="company_phone_2" id="buy_company_phone_2" type="tel" length="10" class="validate">
							<label for="company_phone_2">Secondary Phone Number</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<i class="material-icons prefix">insert_drive_file</i>
							<input name="company_fax" id="buy_company_fax" type="tel" length="15" class="validate">
							<label for="company_fax">Fax Number</label>
						</div>
						<div class="input-field col s6">
							<i class="material-icons prefix">email</i>
							<input name="company_email" id="buy_company_email" type="email" length="20" class="validate">
							<label for="company_email">Email Address</label>
						</div>
					</div>
					<h5>Asset</h5>
					<div class="row">
						<div class="input-field col s4">
							<i class="material-icons prefix">shopping_cart</i>
							<input name="asset_id" id="buy_asset_id" type="text" length="50" class="validate">
							<label for="asset_id">Asset ID</label>
						</div>
						<div class="input-field col s4">
							<input name="asset_name" id="buy_asset_name" type="text" length="50" class="validate">
							<label for="asset_name">Asset Name</label>
						</div>
						<div class="input-field col s4">
							<i class="material-icons prefix">home</i>
							<input name="manufacturer" id="buy_manufacturer" type="text" length="25" class="validate">
							<label for="manufacturer">Manufacturer</label>
						</div>
					</div>
					<div class="row"> 
						<div class="input-field col s3">
							<i class="material-icons prefix">attach_money</i>
							<input name="price" id="buy_price" type="number" length="8" class="validate">
							<label for="price">Price</label>
						</div>          
						<div class="input-field col s4">
							<input name="quantity" id="buy_quantity" type="number" class="validate">
							<label for="quantity">Quantity</label>
						</div>
					</div>
					<div class="row">
						<input class="waves-effect right waves-light btn" type="submit">
					</div>
				</form>
			</div> 
				<!-- Table  --> 
			<!--   Icon Section   -->				
		</div>
	</section>
	<!-- End Buy -->


	<!-- Sell Form -->
	<section  id="Sell_page" class="complex-page">
		<div class="container">
			<div class="row col s12">
				<form class="col s12" action="<?php echo base_url('index.php/complex_Form/sold/'); ?>">
					<h3>Sell Asset</h3>
					<h5>Client</h5>
					<div class="row">
						<div class="input-field col s6">
							<i class="material-icons prefix">account_circle</i>
							<input name="client_first_name" id="client_first_name" type="text" length="20" class="validate">
							<label for="client_first_name">First Name</label>
						</div>
						<div class="input-field col s6">
							<input name="client_last_name" id="client_last_name" type="text" length="20" class="validate">
							<label for="client_last_name">Last Name</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">home</i>
							<input name="client_address" id="client_address" type="text" length="50" class="validate">
							<label for="client_address">Address</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<i class="material-icons prefix">phone</i>
							<input name="phone" id="sold_phone" type="tel" length="10" class="validate">
							<label for="phone">Phone Number</label>
						</div>
						<div class="input-field col s6">
							<input name="email" id="sold_email" type="email" length="30" class="validate">
							<label for="email">Email</label>        
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<textarea name="client_sell_location" id="sold_client_sell_location" class="materialize-textarea"></textarea>
							<label for="client_sell_location">Sell Location</label>
						</div>
					</div>
					<h5>Company</h5>
					<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">account_circle</i>
							<input name="company_name" id="sold_company_name" type="text" length="50" class="validate">
							<label for="company_name">Company Name</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							 <i class="material-icons prefix">home</i>
							<textarea name="company_address" id="sold_company_address" length="100" class="materialize-textarea"></textarea>
							<label for="company_address">Company Address</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<i class="material-icons prefix">phone</i>
							<input name="company_phone" id="sold_company_phone" type="tel" length="10" class="validate">
							<label for="company_phone">Phone Number</label>
						</div>
						<div class="input-field col s6">
							<i class="material-icons prefix">phone</i>
							<input name="company_phone_2" id="sold_company_phone_2" type="tel" length="10" class="validate">
							<label for="company_phone_2">Secondary Phone Number</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<i class="material-icons prefix">insert_drive_file</i>
							<input name="company_fax" id="sold_company_fax" type="tel" length="15" class="validate">
							<label for="company_fax">Fax Number</label>
						</div>
						<div class="input-field col s6">
							<i class="material-icons prefix">email</i>
							<input name="company_email" id="sold_company_email" type="email" length="20" class="validate">
							<label for="company_email">Email Address</label>
						</div>
					</div>
					<h5>Asset</h5>
					<div class="row">
						<div class="input-field col s4">
							<i class="material-icons prefix">shopping_cart</i>
							<input name="asset_id" id="sold_asset_id" type="text" length="50" class="validate">
							<label for="asset_id">Asset ID</label>
						</div>
						<div class="input-field col s4">
							<input name="asset_name" id="sold_asset_name" type="text" length="50" class="validate">
							<label for="asset_name">Asset Name</label>
						</div>
						<div class="input-field col s4">
							<i class="material-icons prefix">home</i>
							<input name="manufacturer" id="sold_manufacturer" type="text" length="25" class="validate">
							<label for="manufacturer">Manufacturer</label>
						</div>
					</div>
					<div class="row"> 
						<div class="input-field col s3">
							<i class="material-icons prefix">attach_money</i>
							<input name="price" id="sold_price" type="number" length="8" class="validate">
							<label for="price">Price</label>
						</div>          
						<div class="input-field col s4">
							<input name="quantity" id="sold_quantity" type="number" class="validate">
							<label for="quantity">Quantity</label>
						</div>
					</div>
					<div class="row">
						<input class="waves-effect right waves-light btn" type="submit">
					</div>
				</form>
			</div>
		</div>
	</section>
	<!-- End Sell -->



	<!-- Contact Company Form -->
	<section  id="Asset_move_page" class="complex-page">
		<div class="container">
			<div class="row col s12">
				<form class="col s12" action="<?php echo base_url('index.php/complex_Form/transfer_asset/'); ?>">
					<h3>Asset Location Change</h3>
					<h5>Asset</h5>
					<div class="row">
						<div class="input-field col s9">
							<i class="material-icons prefix">shopping_cart</i>
							<input name="asset_name" id="move_asset_name" type="text" length="50" class="validate">
							<label for="asset_name">Asset Name</label>
						</div>
						<div class="input-field col s3">
							<input name="quantity" id="move_quantity" type="number" class="validate">
							<label for="quantity">Quantity</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s4">
							<i class="material-icons prefix">home</i>
							<input name="manufacturer" id="move_manufacturer" type="text" length="25" class="validate">
							<label for="manufacturer">Manufacturer</label>
						</div>
						<div class="input-field col s4">
							<input name="vendor_id" id="move_vendor_id" type="number" length="8" class="validate">
							<label for="vendor_id">Seller</label>
						</div> 
					</div>
					<h5>Move To</h5>
					<div class="row">
						<div class="input-field col s6">
							 <i class="material-icons prefix">home</i>
							<input name="location_id" id="location_id" type="text" length="8" class="validate">
							<label for="location_id">Location ID</label>
						</div>
						<div class="input-field col s6">
							<input name="new_location_id" id="new_location_id" type="text" length="8" class="validate">
							<label for="new_location_id">New Location ID</label>
						</div>
					</div>
					 <div class="row">
						<div class="input-field col s8">
							 <i class="material-icons prefix">chrome_reader_mode</i>
							<textarea name="new_location_name" id="new_location_name" length="50" class="materialize-textarea"></textarea>
							<label for="new_location_name">Address</label>
						</div>
						 <label for="movement_date">Transfer Date</label>
						<div class="input-field col s4">
							 <i class="material-icons prefix">schedule</i>
							<input name="movement_date" id="movement_date" type="date" length="8" class="validate">
						</div>
					</div>
					<div class="row">
						<div class="input-field col s4">
							<i class="material-icons prefix">account_circle</i>
							<input name="employee_id" id="employee_id" type="text" class="validate">
							<label for="employee_id" >Responsible By</label>
						</div>
					</div>
					<div class="row">
						<input class="waves-effect right waves-light btn" type="submit">
					</div>
				</form>
			</div> 
				<!-- Table  --> 
				<!--   Icon Section   -->
		</div>
	</section>
	<!-- End Company -->

	<!-- Vendor & Client Form -->
	<section  id="Add_Vendor_Client_page" class="complex-page">
		<div class="container">
			<div class="row col s12">
				<form class="col s12" action="<?php echo base_url('index.php/complex_Form/add_client_vendor/'); ?>">
					<h3>Client/Vendor Add</h3>
					<div class="row">
						<div class="input-field col s6">
							<i class="material-icons prefix">account_circle</i>
							<input name="client_first_name" id="vc_client_first_name" type="text" length="20" class="validate">
							<label for="client_first_name">First Name</label>
						</div>
						<div class="input-field col s6">
							<input name="client_last_name" id="vc_client_last_name" type="text" length="20" class="validate">
							<label for="client_last_name">Last Name</label>
						</div>
					</div>
					<div class="row">
						 <div class="input-field col s12">
							 <i class="material-icons prefix">home</i>
								<input name="company_address" id="vc_company_address" type="text" length="50" class="validate">
									<label for="company_address">Company</label>
						 </div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<i class="material-icons prefix">phone</i>
							<input name="phone" id="vc_phone" type="tel" length="10" class="validate">
							<label for="phone">Phone Number</label>
						</div>
						<div class="input-field col s6">
							<input name="email" id="vc_email" type="email" length="30" class="validate">
							<label for="email">Email</label>        
						</div>
					</div>
				 	<div class="row">
						<div class="input-field col s12">
							<textarea name="client_sell_location" id="client_sell_location" class="materialize-textarea"></textarea>
							<label for="client_sell_location">Sell/Buy Location</label>
						</div>
					</div>
					<div class="row">
						<input class="waves-effect right waves-light btn" type="submit">
					</div>
				</form>
			</div> 
				<!-- Table  --> 
				<!--   Icon Section   -->
				
		</div>
	</section>
	<!-- End Vendor & Client -->


	<!--  Scripts-->
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="<?php echo base_url('assets/js/materialize.js'); ?>"></script>
	<script src="https://cdn.datatables.net/v/dt/dt-1.10.12/fh-3.1.2/r-2.1.0/datatables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<script src="<?php echo base_url('assets/js/jquery.history.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.deparam.min.js'); ?>"></script>	
	<script src="<?php echo base_url('assets/js/modernizr-backgroundBlendMode.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/analysis-table.js'); ?>?_time=<?php echo time(); ?>"></script>
	<script src="<?php echo base_url('assets/js/init.js'); ?>?_time=<?php echo time(); ?>"></script>
	<script type="text/javascript">
		var BASE_URL = '<?php echo base_url(); ?>';
		var BASE_URL_ELEMENT = document.createElement("a");
		BASE_URL_ELEMENT.href = BASE_URL;
		var SECTION_FORM_CONFIG = <?php echo json_encode($sectionDetails); ?>;
		var ANALYSIS_TABLE = <?php echo json_encode($analysisTable); ?>;
		var ANALYSIS_TABLE_URL = "<?php echo $analysisTableURL; ?>";
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.modal').modal();
			if(localStorage.getItem("is-login") === null)
				$('#login-modal').modal('open');
			$("#login-form").submit(function(e){
				e.preventDefault();
				$('#login-modal').modal('close');
				localStorage.setItem("is-login", "truether");
			});

			$(".login-logout").click(function(e){
				e.preventDefault();
				$('#login-modal').modal('open');
				localStorage.removeItem("is-login");
			});
			$(".complex-page form[action]").submit(function(e){
				e.preventDefault();
				$.ajax({
					url: $(this).attr("action"),
					type: "POST",
					data: $(this).serialize(),
                    dataType: 'json',
                    error: function(XMLHttpRequest, textStatus, errorThrown)  {
                        Materialize.toast("An error has occurred making the request: " + errorThrown, 4000);
                    },
                    success: function(data){
                    	if(data.error){
                    		Materialize.toast("Server response: " + JSON.stringify(data.error), 4000);
                    	}else{
                    		Materialize.toast("Success!", 2000);
                    	}
                    }
				});
			});
		});
	</script>

	</body>
</html>