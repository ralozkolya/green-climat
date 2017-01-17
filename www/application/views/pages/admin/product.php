<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/admin/head'); ?>
	<script>
		config.type = 'products';
	</script>
</head>
<body>
	<?php $this->load->view('elements/admin/sidebar'); ?>
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<h1><?php echo $item->ka_name; ?></h1>
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
								['name' => 'ka_name', 'value' => $item->ka_name],
								['name' => 'en_name', 'value' => $item->en_name],
								['name' => 'ru_name', 'value' => $item->ru_name],
								['name' => 'ka_desc', 'type' => 'ckeditor', 'value' => $item->ka_desc],
								['name' => 'en_desc', 'type' => 'ckeditor', 'value' => $item->en_desc],
								['name' => 'ru_desc', 'type' => 'ckeditor', 'value' => $item->ru_desc],
								['name' => 'price', 'value' => $item->price],
								['name' => 'category', 'type' => 'select', 'value' => $categories],
								['name' => 'top', 'type' => 'checkbox', 'value' => $item->top],
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
					<form action="<?php echo base_url('admin/add_images/Product_image'); ?>"
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
							<img alt="<?php echo $g->image; ?>" src="<?php echo static_url('uploads/products/thumbs/'.$g->image); ?>">
							<a href="<?php echo base_url('admin/delete/Product_image/'.$g->id); ?>" class="unstyled delete">
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
