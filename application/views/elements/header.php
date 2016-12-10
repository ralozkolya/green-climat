<header class="header text-center">
	<div>
		<a href="<?php echo locale_url(); ?>" class="unstyled"><img src="<?php echo static_url('img/logo.png?v='.V); ?>" alt="Logo"></a>
	</div>
	<div class="lang">
		<?php foreach(get_alternative_langs() as $lang): ?>
			<div>
				<a class="unstyled" href="<?php echo lang_link($lang); ?>"><?php echo get_lang_label($lang); ?></a>
			</div>
		<?php endforeach; ?>
	</div>
</header>