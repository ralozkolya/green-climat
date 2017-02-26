<!DOCTYPE html>
<html lang="<?php echo get_lang_code(get_lang()); ?>">
<head>
	<?php $this->view('elements/head'); ?>
	<link rel="stylesheet" href="<?php echo static_url('css/list.css?v='.V) ?>">
</head>
<body>

	<div class="wrapper">

		<?php $this->view('elements/header'); ?>
		
		<div class="content">
			<h2 class="text-center">
				<div class="green-header"><?php echo $page->title; ?></div>
			</h2>
			<div class="container">
				<div class="row">
					<?php foreach($items as $i): ?>
						<?php
							$link = $i->link ? $i->link : '#';
							$image = image_exists($i->image, 'static/uploads/partners/thumbs/');
						?>
						<div class="col-sm-4 col-md-3 text-center">
							<a class="unstyled"
								target="_blank"
								href="<?php echo $link; ?>">
								<div class="item">
									<div class="image"
										style="background-image: url(<?php echo $image; ?>)"></div>
									<div class="title"><?php echo $i->title; ?></div>
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