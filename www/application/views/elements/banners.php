<?php if(!empty($banners)): ?>
	<div class="slider">
		<ul>
			<?php foreach($banners as $b): ?>
				<li>
					<a
					<?php if($b->link): ?>
						href="<?php echo $b->link; ?>"
					<?php endif; ?>
					<?php if($b->blank): ?>
						target="_blank"
					<?php endif; ?>>
						<?php
							if(file_exists("static/uploads/banners/{$b->image}")) {
								$url = static_url("uploads/banners/{$b->image}");
							}

							else {
								$url = $b->image;
							}
						?>
						<div class="slide" style="background-image: url('<?php echo $url; ?>')"></div>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php endif; ?>