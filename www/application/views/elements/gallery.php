<div class="fotorama"
	data-nav="thumbs"
	data-width="100%"
	data-height="300"
	data-arrows="false"
	data-click="false"
	data-fit="contain">
	<?php foreach($gallery as $g): ?>
		<a href="<?php echo "{$uploads_path}/{$g->image}"; ?>">
			<img
				alt="<?php echo $g->image; ?>"
				src="<?php echo "{$uploads_path}/thumbs/{$g->image}"; ?>">
		</a>
	<?php endforeach; ?>
</div>

<script>
	var width = $('.fotorama-container').width() / 3;
	$('.fotorama').attr('data-thumbwidth', width);
	$('.fotorama').attr('data-thumbheight', width * 9 / 16);
</script>