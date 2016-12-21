<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $title; ?></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo static_url('css/admin/main.css?v='.V); ?>">
<link rel="icon" type="image/png" href="<?php echo static_url('img/favicon.png'); ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="<?php echo static_url('ckeditor/ckeditor.js'); ?>"></script>
<script src="<?php echo static_url('ckeditor/adapters/jquery.js'); ?>"></script>
<script>

	var lang = {
		areYouSure: '<?php echo lang('are_you_sure'); ?>',
	};

	var url = {
		baseUrl: '<?php echo base_url(); ?>',
		localeUrl: '<?php echo locale_url(); ?>',
		staticUrl: '<?php echo static_url(); ?>',
	};

	var config = window.config || {};
	config.language = '<?php echo get_lang_code(get_lang()); ?>';

</script>
<script src="<?php echo static_url('js/admin/general.js?v='.V); ?>"></script>