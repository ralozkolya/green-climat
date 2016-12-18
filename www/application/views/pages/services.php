<!DOCTYPE html>
<html lang="<?php echo get_lang_code(get_lang()); ?>">
<head>
	<?php $this->load->view('elements/head'); ?>
	<link rel="stylesheet" href="<?php echo static_url('css/services.css?v='.V) ?>">
</head>
<body>

	<div class="wrapper">

		<?php $this->load->view('elements/header'); ?>
		
		<div class="content">
			<h2 class="text-center">
				<div class="yellow-header"><?php echo $page->title; ?></div>
			</h2>
			<div class="container">
				<div class="row">
					<?php foreach($services as $s): ?>
						<?php
							$url = static_url("uploads/services/{$s->image}");
							$desc = mb_substr(strip_tags($s->body), 0, 100) . '...';
						?>
						<div class="col-sm-4 col-md-3 text-center">
							<a class="unstyled"
								href="<?php echo locale_url("service/{$s->id}/{$s->slug}"); ?>">
								<div class="service">
									<div class="image"
										style="background-image: url(<?php echo $url; ?>)"></div>
									<div class="title"><?php echo $s->title; ?></div>
									<div class="desc"><?php echo $desc; ?></div>
								</div>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>

		<?php $this->load->view('elements/footer'); ?>

	</div>

</body>
</html>