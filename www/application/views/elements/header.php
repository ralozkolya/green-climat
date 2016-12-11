<header class="header text-center">
	<div class="lang">
		<?php foreach(get_alternative_langs() as $lang): ?>
			<a class="unstyled" href="<?php echo lang_link($lang); ?>"><?php echo get_lang_label($lang); ?></a>
		<?php endforeach; ?>
	</div>
	<div>
		<a href="<?php echo locale_url(); ?>" class="unstyled"><img src="<?php echo static_url('img/logo.png?v='.V); ?>" alt="Logo"></a>
	</div>
	<div class="text-center">
		<div class="visible-xs">
			<button type="button" class="navbar-toggle">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<ul class="navigation">
			<?php foreach($navigation as $n): ?>
				<li>
					<?php
						$class = 'unstyled';

						if($highlighted === $n->slug) $class .= ' active';
					?>
					<a class="<?php echo $class; ?>"
						href="<?php echo locale_url($n->slug); ?>"><?php echo $n->title; ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</header>