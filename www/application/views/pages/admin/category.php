<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/admin/head'); ?>
	<link rel="stylesheet" href="<?php echo static_url('css/admin/banners.css?v='.V); ?>">
</head>
<body>
	<?php $this->load->view('elements/admin/sidebar'); ?>
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<h1><?php echo $item->name; ?></h1>
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
								['name' => 'id', 'value' => $item->id, 'type' => 'hidden'],
								['name' => 'ka_name', 'value' => $item->ka_name],
								['name' => 'en_name', 'value' => $item->en_name],
								['name' => 'ru_name', 'value' => $item->ru_name],
								['name' => 'parent', 'value' => $parents, 'type' => 'select'],
								['name' => 'image', 'type' => 'file'],
								['value' => lang('change'), 'type' => 'submit'],
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
					<?php $image = image_exists($item->image, 'static/uploads/categories/'); ?>
					<img src="<?php echo $image; ?>" alt="Image">
					<h3><?php echo lang('sub_categories'); ?></h3>
					<?php if(!empty($products)): ?>
						<?php echo admin_table('Category', $sub_categories, [
							'name',
						]); ?>
					<?php else: ?>
						<h3 class="text-center"><?php echo lang('nothing_found'); ?></h3>
					<?php endif; ?>
					<br>
					<h3><?php echo lang('products'); ?></h3>
					<?php if(!empty($products)): ?>
						<?php echo admin_table('Product', $products, [
							'name',
						]); ?>
					<?php else: ?>
						<h3 class="text-center"><?php echo lang('nothing_found'); ?></h3>
					<?php endif; ?>
				</div>
			</div>	
		</div>
	</div>
</body>
</html>