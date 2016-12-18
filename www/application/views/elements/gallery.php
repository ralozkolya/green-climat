<div class="fotorama"
	data-nav="thumbs"
	data-width="100%"
	data-height="300"
	data-arrows="false"
	data-click="false"
	data-fit="cover">
	<?php foreach($gallery as $g): ?>
		<img
			alt="<?php echo $g->image; ?>"
			src="<?php echo "{$path}/{$g->image}"; ?>">
	<?php endforeach; ?>
</div>

<script>
	var width = $('.fotorama-container').width() / 3;
	$('.fotorama').attr('data-thumbwidth', width);
	$('.fotorama').attr('data-thumbheight', width * 9 / 16);
</script>