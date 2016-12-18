<!DOCTYPE html>
<html lang="<?php echo get_lang_code(get_lang()); ?>">
<head>
	<?php $this->view('elements/head'); ?>
	<link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo static_url('css/item.css?v='.V) ?>">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
</head>
<body>

	<div class="wrapper">

		<?php $this->view('elements/header'); ?>
		
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-sm-5 fotorama-container">
						<?php $this->view('elements/gallery'); ?>
					</div>
					<div class="col-sm-7 text-center">
						<h2>
							<div class="yellow-header"><?php echo $service->title; ?></div>
						</h2>
						<div><?php echo $service->body; ?></div>
					</div>
				</div>
			</div>
		</div>

		<?php $this->view('elements/footer'); ?>

	</div>

</body>
</html>