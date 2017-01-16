<!DOCTYPE html>
<html lang="<?php echo get_lang_code(get_lang()); ?>">
<head>
	<?php $this->view('elements/head'); ?>
	<link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo static_url('css/item.css?v='.V) ?>">
	<link rel="stylesheet" href="<?php echo static_url('css/products.css?v='.V) ?>">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
	<script src="<?php echo static_url('js/products.js?v='.V); ?>"></script>
</head>
<body>

	<div class="wrapper">

		<?php $this->view('elements/header'); ?>
		
		<div class="content">

			<?php $this->load->view('elements/sidebar'); ?>

			<div class="product-list">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-7">
							<div class="fotorama-container">
								<?php $this->view('elements/gallery'); ?>
							</div>
						</div>
						<div class="col-md-5">
							<div class="description">
								<h4 class="yellow-header"><?php echo lang('price'); ?></h4>
								<div><strong><?php echo $item->price; ?> ₾</strong></div>
								<br>
								<h4 class="yellow-header"><?php echo lang('description'); ?></h4>
								<div>
									<?php echo $item->desc; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php $this->view('elements/footer'); ?>

	</div>

</body>
</html>