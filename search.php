<?php get_header(); ?>

    <div id="maincontent">

	<?php if (have_posts()) : ?>

		<h2>Search Results</h2>
		<div style="line-height:4px;">&nbsp;</div>
		<div><em>If you're looking for an article older than September 2011, <a href="http://archives.advocate-online.net/2009_newdesign/archives_all.php">please visit our old website</a>.</em></div>
		<div style="line-height:4px;">&nbsp;</div>
		
		<div class="topnav">
		<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
        </div>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

              <a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
                <h2><?php the_title(); ?></h2>
              </a>

				<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

				<div class="entry">

                <?php the_advanced_excerpt('length=40&exclude_tags=img,p&finish_sentence=1&ellipsis=%26nbsp;%26nbsp;%26#187;'); ?>

				</div>

			</div>

		<?php endwhile; ?>

        <div class="bottomnav">
		<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
        </div>

	<?php else : ?>

		<h2>No posts found.</h2>
		<div style="line-height:4px;">&nbsp;</div>
		<div><em>If you're looking for an article older than September 2011, <a href="http://archives.advocate-online.net/2009_newdesign/archives_all.php">please visit our old website</a>.</em></div>

	<?php endif; ?>
	
	</div><!--end  maincontent-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
