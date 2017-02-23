<!DOCTYPE html>
<html lang="<?php echo get_lang_code(get_lang()); ?>">
<head>
	<?php $this->view('elements/head'); ?>
	<link rel="stylesheet" href="<?php echo static_url('css/about_us.css?v='.V) ?>">
</head>
<body>

	<div class="wrapper">

		<?php $this->view('elements/header'); ?>
		
		<div class="content">
			<h1 class="text-center">
				<div class="green-header"><?php echo $page->title; ?></div>
			</h1>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-center hidden-xs">
						<?php $this->view('elements/circles'); ?>
					</div>
					<div class="col-xs-12 visible-xs mobile-text text-center">
						<div>
							<img alt="Logo" src="<?php echo static_url('img/logo.png'); ?>">
							<div class="green">
					           <div><?php echo lang('heating_cooling'); ?></div>
					           <div><a href="<?php echo base_url(); ?>" class="unstyled">www.greenclimat.com</a></div>
					           <div><a href="<?php echo 'mailto:'.INFO_MAIL; ?>" class="unstyled"><?php echo INFO_MAIL; ?></a></div>
					        </div>
						</div>
						<br>
						<div class="mobile-content"><?php echo $page->body; ?></div>
					</div>
				</div>
			</div>
		</div>

		<?php $this->view('elements/footer'); ?>

	</div>

</body>
</html>