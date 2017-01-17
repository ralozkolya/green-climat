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
					<h1><?php echo lang('products'); ?></h1>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<?php $this->load->view('elements/messages'); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<h3><?php echo lang('existing_products'); ?></h3>
					<?php echo admin_table('Product', $items, [
						'name',
					]); ?>
				</div>
				<div class="col-sm-6">
					<h3><?php echo lang('add_product'); ?></h3>
					<form method="post" enctype="multipart/form-data">
						<?php
							$fields = [
								['name' => 'ka_name', 'value' => set_value('ka_name')],
								['name' => 'en_name', 'value' => set_value('en_name')],
								['name' => 'ru_name', 'value' => set_value('ru_name')],
								['name' => 'ka_desc', 'type' => 'ckeditor', 'value' => set_value('ka_desc')],
								['name' => 'en_desc', 'type' => 'ckeditor', 'value' => set_value('en_desc')],
								['name' => 'ru_desc', 'type' => 'ckeditor', 'value' => set_value('ru_desc')],
								['name' => 'price', 'value' => set_value('price')],
								['name' => 'category', 'type' => 'select', 'value' => $categories],
								['name' => 'top', 'type' => 'checkbox', 'value' => set_value('top')],
								['name' => 'images', 'type' => 'files'],
								['type' => 'submit', 'value' => lang('add')],
							];

							$form = form_fields($fields);

							foreach($form as $f) {
								echo $f;
							}
						?>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
