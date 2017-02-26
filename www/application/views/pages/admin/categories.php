<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/admin/head'); ?>
</head>
<body>
	<?php $this->load->view('elements/admin/sidebar'); ?>
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<h1><?php echo lang('categories'); ?></h1>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<?php $this->load->view('elements/messages'); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<h3><?php echo lang('existing_categories'); ?></h3>
					<?php echo admin_table('Category', $items, [
						'name',
					]); ?>
				</div>
				<div class="col-sm-6">
					<h3><?php echo lang('add_category'); ?></h3>
					<form method="post" enctype="multipart/form-data">
						<?php
							$fields = [
								['name' => 'ka_name', 'value' => set_value('ka_name')],
								['name' => 'en_name', 'value' => set_value('en_name')],
								['name' => 'ru_name', 'value' => set_value('ru_name')],
								['name' => 'parent', 'value' => $parents, 'type' => 'select'],
								['name' => 'image', 'type' => 'file'],
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