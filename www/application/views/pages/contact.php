<!DOCTYPE html>
<html lang="<?php echo get_lang_code(get_lang()); ?>">
<head>
	<?php $this->view('elements/head'); ?>
	<link rel="stylesheet" href="<?php echo static_url('css/contact.css?v='.V) ?>">
</head>
<body>

	<div class="wrapper">

		<?php $this->view('elements/header'); ?>
		
		<div class="content">
			<div class="map">
				<div>
					<iframe
						width="100%"
						height="100%"
						frameborder="0" style="border:0"
						src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAu8HIsJAUOjrJ4sO0UrIhCAoljfjfXQgg&q=Greenclimat,Tbilisi,Georgia" allowfullscreen>
					</iframe>
				</div>
			</div>
			<div class="contact-info">
				<div class="text-center">
					<br><br>
					<h2>
						<div class="yellow-header"><?php echo lang('contact_info'); ?></div>
					</h2>
					<div><?php echo $page->body; ?></div>
					<br><br><br><br>
					<h2>
						<div class="yellow-header"><?php echo lang('contact_us'); ?></div>
					</h2>
					<div><?php echo $page->body; ?></div>
				</div>
			</div>
		</div>

		<?php $this->view('elements/footer'); ?>

	</div>

</body>
</html>