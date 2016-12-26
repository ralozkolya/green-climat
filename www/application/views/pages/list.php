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
							$url = "{$uploads_path}/{$i->image}";
							$desc = mb_substr(strip_tags($i->body), 0, 100) . '...';
						?>
						<div class="col-sm-4 col-md-3 text-center">
							<a class="unstyled"
								href="<?php echo "{$item_url}/{$i->id}/{$i->slug}"; ?>">
								<div class="item">
									<div class="image"
										style="background-image: url(<?php echo $url; ?>)"></div>
									<div class="title"><?php echo $i->title; ?></div>
									<div class="desc"><?php echo $desc; ?></div>
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