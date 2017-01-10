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
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h2 class="text-center">
							<div class="green-header"><?php echo $page->title; ?></div>
						</h2>
					</div>
				</div>
				<br>
				<div class="row text-center contact-info">
					<div class="col-sm-6">
						<h3>
							<div class="yellow-header"><?php echo lang('contact_info'); ?></div>
						</h3>
						<div><?php echo $page->body; ?></div>
					</div>
					<div class="col-sm-4 col-sm-offset-1">
						<h3>
							<div class="yellow-header"><?php echo lang('contact_us'); ?></div>
						</h3>
						<div><?php echo lang('support_center'); ?></div>
					</div>
				</div>
				<br><br>
				<div class="row">
					<div class="col-sm-6">
						<div class="map">
							<iframe
								width="100%"
								height="100%"
								frameborder="0" style="border:0"
								src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAu8HIsJAUOjrJ4sO0UrIhCAoljfjfXQgg&q=Greenclimat,Tbilisi,Georgia" allowfullscreen>
							</iframe>
							<div class="shadow"></div>
						</div>
					</div>
					<div class="col-sm-4 col-sm-offset-1">
						<form class="text-left contact-form">
							<div class="form-group">
								<label for="name"><?php echo lang('name'); ?></label>
								<input class="form-control" id="name" name="name">
							</div>
							<div class="form-group">
								<label for="email"><?php echo lang('email'); ?></label>
								<input class="form-control" id="email" name="email">
							</div>
							<div class="form-group">
								<label for="subject"><?php echo lang('subject'); ?></label>
								<input class="form-control" id="subject" name="subject">
							</div>
							<div class="form-group">
								<label for="message"><?php echo lang('message'); ?></label>
								<textarea rows="6" class="form-control" id="message" name="message"></textarea>
							</div>
							<div class="form-group text-center">
								<input class="btn btn-default" type="submit"
									value="<?php echo lang('send'); ?>">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<?php $this->view('elements/footer'); ?>

	</div>

</body>
</html>