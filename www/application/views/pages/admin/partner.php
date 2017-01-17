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
								['name' => 'ka_body', 'type' => 'ckeditor', 'value' => $item->ka_body],
								['name' => 'en_body', 'type' => 'ckeditor', 'value' => $item->en_body],
								['name' => 'ru_body', 'type' => 'ckeditor', 'value' => $item->ru_body],
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
					<h3><?php echo lang('gallery'); ?></h3>
					<form action="<?php echo base_url('admin/add_images/Partner_image'); ?>"
						method="post"
						enctype="multipart/form-data">
						<?php
							$fields = [
								[
									'name' => 'item',
									'value' => $item->id,
									'type' => 'hidden',
								],
								[
									'name' => 'images',
									'type' => 'files',
								],
								[
									'value' => lang('upload'),
									'type' => 'submit',
								],
							];

							$form = form_fields($fields);

							foreach($form as $f) {
								echo $f;
							}
						?>
					</form>
					<br>
					<?php foreach($gallery as $g): ?>
						<div class="thumb">
							<img alt="<?php echo $g->image; ?>" src="<?php echo static_url('uploads/partners/thumbs/'.$g->image); ?>">
							<a href="<?php echo base_url('admin/delete/Partner_image/'.$g->id); ?>" class="unstyled delete">
								<span class="glyphicon glyphicon-remove"></span>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>	
		</div>
	</div>
</body>
</html>