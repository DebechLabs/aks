<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AKS::<?php //echo $page_title; ?></title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?php echo $this->config->item('assets_url'); ?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<?= @$css; ?>
	<link rel="stylesheet" href="<?php echo $this->config->item('assets_url'); ?>dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo $this->config->item('assets_url'); ?>dist/css/skins/_all-skins.min.css">
</head>
<body class = "hold-transition skin-blue sidebar-mini">
	<div class = "wrapper">
		<header class = "main-header">
			<a href="#" class = "logo">
				<span class = "logo-mini"><b>A</b>KS</span>
				<span class = "logo-lg">AKS</span>
			</a>

			<nav class = "navbar navbar-static-top" role = "navigation">
				<a href="#" class = "sidebar-toggle" data-toggle = "offcanvas" role = "button">
					
				</a>
				<div class = "navbar-custom-menu">
					<ul class = "nav navbar-nav">
						<li class = "dropdown user user-menu">
							<a href="#" class = "dropdown-toggle" data-toggle = "dropdown">
								<img src="<?= @$this->config->item('assets_url'); ?>dist/img/user2-160x160.jpg" class = "user-image" alt = "User Image">

								<span class = "hidden-xs">Sample User</span>
							</a>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<aside class="main-sidebar">

			<section class="sidebar">
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?php echo $this->config->item('assets_url'); ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p>Sample User</p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>

				<form action="#" method="get" class="sidebar-form">
					<div class="input-group">
						<input type="text" name="q" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
							<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
						</span>
					</div>
				</form>

				<ul class="sidebar-menu">
					<li class="header">Navigation Menu</li>
					<li><a href="<?php echo base_url('Dashboard'); ?>"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
					<li><a href="<?php echo base_url('IncidentReport'); ?>"><i class="fa fa-exclamation-triangle"></i> <span>Incident Reports</span></a></li>
					<li><a href="#"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
				</ul>
			</section>
		</aside>

		<div class="content-wrapper">
			<section class = "content-header">
				<h1>
					<?php if(isset($page_title)) { echo $page_title; } ?>
					<small><?php if(isset($page_description)) { echo $page_description; } ?></small>
				</h1>
				<ol class = "breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
					<li class="active">Here</li>
				</ol>
			</section>
			<section class = "content">
				<?php if(isset($content_view)){?>
					<?= @$this->load->view($content_view); ?>
				<?php } else { ?>
					<?php echo "We could not load this page"; ?>
				<?php } ?>
			</section>
		</div>

		<footer class="main-footer">
			<div class = "pull-right hidden-xs">Powered by Symatech Labs</div>
			<strong>Copyright &copy; 2016 <a href="#">Symatech Labs</a>.</strong> All rights reserved.</strong>
		</footer>
	</div>

	<!-- scripts -->
	<script src="<?php echo $this->config->item('assets_url'); ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
	<script src="<?php echo $this->config->item('assets_url'); ?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo $this->config->item('assets_url'); ?>dist/js/app.min.js"></script>

	<?= @$js; ?>

	<?php if(isset($javascript_file)) { ?>
		<?php $this->load->view($javascript_file, $javascript_data); ?>
	<?php } ?>
</body>
</html>