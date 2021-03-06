<!DOCTYPE html>
<html lang="<?php echo get_lang_code(get_lang()); ?>">
<head>
	<?php $this->view('elements/head'); ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/unslider/2.0.3/css/unslider.css">
	<link rel="stylesheet" href="<?php echo static_url('css/home.css?v='.V); ?>">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/unslider/2.0.3/js/unslider-min.js"></script>
	<script src="<?php echo static_url('js/home.js?v='.V); ?>"></script>
</head>
<body>

	<div class="wrapper">

		<?php $this->view('elements/header'); ?>
		
		<div class="content">
			<?php $this->view('elements/banners'); ?>
			<h1 class="text-center">
				<div class="green-header"><?php echo lang('top_products'); ?></div>
			</h1>
			<div class="container products">
				<div class="row">
					<?php foreach($top_products as $p): ?>
						<?php
							$url = locale_url("product/{$p->id}/{$p->slug}");
							$image = static_url("uploads/products/{$p->image}");
						?>
						<div class="col-sm-4 col-md-3 text-center product-container">
							<a href="<?php echo $url; ?>" class="unstyled">
								<div class="product">
									<div class="image"
										style="background-image: url(<?php echo $image ?>)"></div>
									<div class="name"><?php echo $p->name; ?></div>
								</div>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>

		<?php $this->view('elements/footer'); ?>

	</div>

</body>
</html>