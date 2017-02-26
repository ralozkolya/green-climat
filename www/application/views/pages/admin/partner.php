<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/admin/head'); ?>
	<script>
		config.type = 'partners';
	</script>
</head>
<body>
	<?php $this->load->view('elements/admin/sidebar'); ?>
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<h1><?php echo $item->ka_title; ?></h1>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<?php $this->load->view('elements/messages'); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<form method="post" enctype="multipart/form-data">
						<?php
							$fields = [
								['name' => 'id', 'type' => 'hidden', 'value' => $item->id],
								['name' => 'ka_title', 'value' => $item->ka_title],
								['name' => 'en_title', 'value' => $item->en_title],
								['name' => 'ru_title', 'value' => $item->ru_title],
								['name' => 'link', 'value' => $item->link],
								['name' => 'image', 'type' => 'file'],
								['name' => 'priority', 'value' => set_value('priority')],
								['type' => 'submit', 'value' => lang('change')],
							];

							$form = form_fields($fields);

							foreach($form as $f) {
								echo $f;
							}
						?>
					</form>
				</div>
				<div class="col-sm-6">
					<h3><?php echo lang('image'); ?></h3>
					<?php $image = image_exists($item->image, 'static/uploads/partners/'); ?>
					<img src="<?php echo $image; ?>" alt="Image">
				</div>
			</div>	
		</div>
	</div>
</body>
</html>