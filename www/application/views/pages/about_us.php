<!DOCTYPE html>
<html lang="<?php echo get_lang_code(get_lang()); ?>">
<head>
	<?php $this->load->view('elements/head'); ?>
	<link rel="stylesheet" href="<?php echo static_url('css/about_us.css?v='.V) ?>">
</head>
<body>

	<div class="wrapper">

		<?php $this->load->view('elements/header'); ?>
		
		<div class="content">
			<h1 class="text-center">
				<div class="green-header"><?php echo $page->title; ?></div>
			</h1>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-center">
						<?php $this->load->view('elements/circles'); ?>
					</div>
				</div>
			</div>
		</div>

		<?php $this->load->view('elements/footer'); ?>

	</div>

</body>
</html>