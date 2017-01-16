<ul class="sidebar">
	<?php foreach($categories as $c): ?>
		<li <?php if(!empty($category) && $category->id === $c->id) echo 'class="active"'; ?>>
			<?php
				$class = "unstyled category-link";

				if(!empty($category) && $category->id === $c->id) {
					$class .= ' active';
				}
			?>
			<a class="<?php echo $class; ?>"
				data-slug="<?php echo $c->slug; ?>"
				href="<?php echo locale_url('products?category='.$c->slug); ?>">
					<?php echo $c->name; ?>
			</a>
			<?php if(!empty($c->sub)): ?>
				<ul class="subcategories">
					<?php foreach($c->sub as $s): ?>
						<li>
							<?php
								$class = 'unstyled subcategory-link';

								if(!empty($category) && $category->id === $s->id) {
									$class .= ' active';
								}
							?>
							<a class="<?php echo $class; ?>"
								href="<?php echo locale_url('products?category='.$s->slug); ?>"
								data-slug="<?php echo $s->slug; ?>">
								<?php echo $s->name; ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</li>
	<?php endforeach; ?>
</ul>