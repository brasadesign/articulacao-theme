<?php
/**
 * Main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package P2
 */
?>
<?php get_header(); ?>

<div class="sleeve_main">
	<?php if ( p2_user_can_post() && !is_archive() ) : ?>
		<?php locate_template( array( 'post-form.php' ), true ); ?>
	<?php endif; ?>
	<div id="main">
		<h2>
			<?php if ( is_home() or is_front_page() ) : ?>

				<?php _e( 'Postagem mais Recente', 'p2' ); ?> <?php if ( p2_get_page_number() > 1 ) printf( __( 'Page %s', 'p2' ), p2_get_page_number() ); ?>

			<?php else : ?>

				<?php printf( _x( 'Atualizações de %s', 'Month name', 'p2' ), get_the_time( 'F, Y' ) ); ?>

			<?php endif; ?>

			<span class="controls">
				<a href="#" id="togglecomments"> <?php _e( 'Abrir/Fechar Comentários', 'p2' ); ?></a> | <a href="#directions" id="directions-keyboard"><?php _e( 'Keyboard Shortcuts', 'p2' ); ?></a>
			</span>
		</h2>

		<ul id="postlist">
		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>
	    		<?php p2_load_entry(); ?>
			<?php endwhile; ?>

		<?php else : ?>

			<li class="no-posts">
		    	<h3><?php _e( 'Sem postagens por enquanto!', 'p2' ); ?></h3>
			</li>

		<?php endif; ?>
		</ul>

		<div class="navigation">
			<p class="nav-older"><?php next_posts_link( __( '&larr; Postagens Anteriores', 'p2' ) ); ?></p>
			<p class="nav-newer"><?php previous_posts_link( __( 'Postagens Posteriores &rarr;', 'p2' ) ); ?></p>
		</div>

	</div> <!-- main -->

</div> <!-- sleeve -->

<?php get_footer(); ?>
