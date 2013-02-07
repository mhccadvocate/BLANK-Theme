<?php get_header(); ?>

		<?php if (have_posts()) : ?>

 			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 			
 			<div id="maincontent">

            <?php echo '<a href="'.get_bloginfo('url').'">Home</a> &raquo; '; ?>

			<?php /* If this is a category archive */ if (is_category()) { ?>
				<h1><?php single_cat_title(); ?> Archive</h1>

			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h1>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>

			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h1>Archive for <?php the_time('F j, Y'); ?></h1>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h1>Archive for <?php the_time('F, Y'); ?></h1>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h1 class="pagetitle">Archive for <?php the_time('Y'); ?></h1>

			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h1 class="pagetitle">Author Archive</h1>
				
           	<?php /* If this is a reporter archive. Use page title for header (get reporter name from title) */} elseif (is_tax('reporter')) { ?>
           	<?php //echo 'hi'; ?>
           	<?php $reporter = get_term_by('slug', get_query_var( 'reporter' ), 'reporter' ); ?>
            <?php if ( xydac_cloud('reporter',get_query_var( 'reporter' ),'image') != '' ) { ?>
            <?php echo '<img class="reporter" src="'.xydac_cloud('reporter',get_query_var( 'reporter' ),'image').'" />'; ?>
            <?php } ?>
				<h1 class="pagetitle"><?php echo $reporter->name; ?></h1>
				
           	<?php /* If this is a reporter archive. Use page title for header (get reporter name from title) */} elseif (is_tax('columnist')) { ?>
           	<?php //echo 'hi'; ?>
           	<?php $columnist = get_term_by('slug', get_query_var( 'columnist' ), 'columnist' ); ?>
            <?php if ( xydac_cloud('columnist',get_query_var( 'columnist' ),'image') != '' ) { ?>
            <?php echo '<img class="columnist" src="'.xydac_cloud('columnist',get_query_var( 'columnist' ),'image').'" />'; ?>
            <?php } ?>
				<h1 class="pagetitle"><?php echo $columnist->name; ?></h1>
				<?php if ( $columnist->description != '') { ?>
				<div><em><?php echo $columnist->description; ?></em></div><br />
				<?php } ?>
				

			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h1 class="pagetitle">Blog Archives</h1>
			
			<?php } ?>
			
            <div class="topnav">
			<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
            </div>

            <hr />

            <?php /* Run a separate loop if this is a reporter archive, to display custom fields and such */ if ( is_tax('reporter') || is_tax('columnist') ) { ?>

            <?php while (have_posts()) : the_post(); ?>
            
            <?php $thesub = get_post_meta($post->ID, 'page_sub_title', true); ?>

            <div class="post type-post hentry group">
            <?php// if (pa_in_taxonomy('featured', array('firstfeatured','secondfeatured','thirdfeatured','fourthfeatured'))) { ?>
            <?php //echo 'style="background: #dddddd;">'; ?>
            <?php //} else { ?>
            <?php //echo '>'; ?>
            <?php //} ?>
            <h2 class="entry-title">
              <a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
                <?php the_title(); ?>
              </a>
            </h2>
            <?php if ( function_exists('the_subtitle') && $thesub != '' ){
                echo '<div style="line-height:4px;">&nbsp;</div><a href="'.get_permalink().'">';
                the_subtitle();
                echo '</a><div style="line-height:4px;">&nbsp;</div>';
            }  ?>
            <?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>

            <div class="post-thumb">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('thumbnail'); ?>

                </a>
            </div>
            <?php } ?>
            <?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>



			<div class="excerpt-entry">
                <?php the_advanced_excerpt('length=40&exclude_tags=img,p&finish_sentence=1&ellipsis=%26nbsp;%26nbsp;%26#187;'); ?>
			</div>
            </div><hr />
        <?php endwhile; ?>
            
            
        <?php } /* Run a separate loop for all CATEGORIES without templates */ elseif (is_category()) { ?>
            <?php while (have_posts()) : the_post(); ?>
            
            <?php $thesub = get_post_meta($post->ID, 'page_sub_title', true); ?>
            
            <?php /* if ( get_post_meta($post->ID, 'story_featured', true) ) : */?>

            <div class="post type-post hentry group">
            <h2 class="entry-title">
              <a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
                <?php the_title(); ?>
              </a>
            </h2>
            
            <?php if ( function_exists('the_subtitle') && $thesub != '' ){
                echo '<div style="line-height:4px;">&nbsp;</div><a href="'.get_permalink().'">';
                the_subtitle();
                echo '</a><div style="line-height:4px;">&nbsp;</div>';
            }  ?>

            <?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>

            <div class="post-thumb">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('thumbnail'); ?>

                </a>
            </div>
            <?php } ?>
            <?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

			<div class="excerpt-entry">
                <?php the_advanced_excerpt('length=40&exclude_tags=img,p&finish_sentence=1&ellipsis=%26nbsp;%26nbsp;%26#187;'); ?>
			</div>
            </div><hr />
            
        <?php endwhile; ?>
            
            
            
            
        <?php } /* Run the normal loop */ else { ?>

			<?php while (have_posts()) : the_post(); ?>
			
            <?php $thesub = get_post_meta($post->ID, 'page_sub_title', true); ?>

            <?php /* if ( get_post_meta($post->ID, 'story_featured', true) ) : */?>

            <div class="post type-post hentry group">
            <h2 class="entry-title">
              <a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
                <?php the_title(); ?>
              </a>
            </h2>

            <?php if ( function_exists('the_subtitle') && $thesub != '' ){
                echo '<div style="line-height:4px;">&nbsp;</div><a href="'.get_permalink().'">';
                the_subtitle();
                echo '</a><div style="line-height:4px;">&nbsp;</div>';
            }  ?>

            <?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>

            <div class="post-thumb">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('thumbnail'); ?>

                </a>
            </div>
            <?php } ?>
            <?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

			<div class="excerpt-entry">
                <?php the_advanced_excerpt('length=40&exclude_tags=img,p&finish_sentence=1&ellipsis=%26nbsp;%26nbsp;%26#187;'); ?>
			</div>
            </div><hr />

			<?php endwhile; ?>
			<?php } ?>


            <div class="bottomnav">
			<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
            </div>
			
	<?php else : ?>

		<h2>Nothing found</h2>

	<?php endif; ?>

              </div> <!--end maincontent-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
