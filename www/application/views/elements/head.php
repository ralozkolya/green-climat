<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $title; ?></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo static_url('css/main.css?v='.V); ?>">
<link rel="icon" type="image/png" href="<?php echo static_url('img/favicon.png'); ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="<?php echo static_url('js/general.js?v='.V); ?>"></script>
<meta property="og:url" content="<?php echo current_url(); ?>">
<meta property="og:type" content="website">
<?php if(empty($item)): ?>
	<meta property="og:title" content="Green Climat">
<?php else: ?>
	<?php $title = $item->name ? $item->name : $item->title; ?>
	<meta property="og:title" content="<?php echo $title; ?>">
<?php endif; ?>
<?php if(empty($gallery)): ?>
	<meta property="og:image" content="<?php echo static_url('img/logo_og.png'); ?>">
<?php else: ?>
	<meta property="og:image" content="<?php echo "{$uploads_path}/{$gallery[0]->image}"; ?>">
<?php endif; ?>