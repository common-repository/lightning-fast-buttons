<?php if ( !empty( $social_media ) ): ?>
	<svg style="position: absolute; width: 0; height: 0;" width="0" height="0" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
		<defs>
			<?php
			foreach ( $social_media as $key => $social ):
				// make sure the media is displayed if needed
				if ( get_option( $key . '_display' ) ):
					?>
					<symbol id="c-lf-icon--<?php echo sanitize_title( $social['name'] ); ?>" viewBox="<?php echo get_option( $key . '_vb' ) ? get_option( $key . '_vb' ) : $social['svg_box']; ?>">
						<title><?php echo $social['name']; ?></title>
						<path d="<?php echo get_option( $key . '_path' ) ? get_option( $key . '_path' ) : $social['svg_path']; ?>" transform="<?php echo get_option( $key . '_transform' ) ? get_option( $key . '_transform' ) : $social['svg_transform']; ?>" />
					</symbol>
					<?php
				endif;
			endforeach;
			?>
		</defs>
	</svg>
	<ul class="c-lf-buttons js-lf-buttons">
		<?php foreach ( $social_media as $key => $social ): ?>
			<?php if ( get_option( $key . '_display' ) ): ?>
				<li>
					<a href="<?php echo $social['share_url']; ?><?php the_permalink(); ?>" class="c-lf-buttons__button" title="Share on <?php echo $social['name']; ?>" target="_blank">
						<svg class="c-lf-buttons__icon">
							<use xlink:href="#c-lf-icon--<?php echo sanitize_title( $social['name'] ); ?>"></use>
						</svg>
						<?php if ( get_option( $key . '_counter' ) ): ?>
							<span class="c-lf-buttons__counter js-<?php echo sanitize_title( $social['name'] ); ?>-count"></span>
						<?php endif; ?>
					</a>
				</li>
			<?php endif; ?>
		<?php endforeach; ?>
	</ul>
	<?php




 endif; 
