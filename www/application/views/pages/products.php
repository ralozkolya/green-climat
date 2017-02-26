<!DOCTYPE html>
<html lang="<?php echo get_lang_code(get_lang()); ?>">
<head>
	<?php $this->view('elements/head'); ?>
	<link rel="stylesheet" href="<?php echo static_url('css/products.css?v='.V) ?>">
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
						<?php
							$title;
							if(!empty($category)) {
								$title = $category->name;
							}

							else {
								$title = $page->title;
							}
						?>
						<div class="col-xs-12">
							<h3 class="yellow-header"><?php echo $title; ?></h3>
						</div>
					</div>
					<?php if(!empty($items)): ?>
						<br>
						<div class="row">
							<?php foreach($items as $i): ?>
								<?php
									$url = locale_url("product/{$i->id}/{$i->slug}");
									$image = image_exists($i->image, 'static/uploads/products/thumbs/');
								?>
								<div class="col-md-4 text-center">
									<a href="<?php echo $url; ?>" class="unstyled">
										<div class="product">
											<div class="image" style="background-image: url('<?php echo $image; ?>');"></div>
											<div class="name"><?php echo $i->name; ?></div>
										</div>
									</a>
								</div>
							<?php endforeach; ?>
						</div>
					<?php elseif($category_list): ?>
						<br>
						<div class="row">
							<?php foreach($categories as $c): ?>
								<?php
									$url = locale_url("products?category={$c->slug}");
									$image = image_exists($c->image, 'static/uploads/categories/thumbs/');
								?>
								<div class="col-md-4 text-center">
									<a href="<?php echo $url; ?>" class="unstyled">
										<div class="product">
											<div class="image" style="background-image: url('<?php echo $image; ?>');"></div>
											<div class="name"><?php echo $c->name; ?></div>
										</div>
									</a>
								</div>
							<?php endforeach; ?>
						</div>
					<?php else: ?>
						<h3 class="text-center"><?php echo lang('nothing_found'); ?></h3>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<?php $this->view('elements/footer'); ?>

	</div>

</body>
</html>