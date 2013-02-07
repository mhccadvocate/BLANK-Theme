<?php
/*
Template Name: Photos
*/
?>

<?php get_header(); ?>
		<?php if (have_posts()) : ?>

 			<?php // $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

 			<div id="maincontent">
                <?php // Breadcrumbs and Page Header ?>
                <h1 class="pagetitle">Photos</h1>




            <?php // THE QUERY!!!

            //while ($wp_query->have_posts()){
            //$wp_query->the_post();

            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            
            $args = array(
                'paged' => $paged,
                'meta_query' => array(
                    array(
                        'key' => '_thumbnail_id',
                    )
                )
             );
            $new_query = new WP_Query( $args );   ?>

            <div class="topnav">
			<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
            </div>

            <hr />

            <?php while ($new_query->have_posts()){
            $new_query->the_post(); ?>

            <?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>

            <?php $thesub = get_post_meta($post->ID, 'page_sub_title', true); ?>

            <div class="post type-post hentry group">

            <div class="post-thumb">
                <?php $thumbrel = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?>
                <?php $relurl = $thumbrel['0']; ?>
                <a href="<?php echo $relurl; ?>" rel="lightbox">
                    <?php the_post_thumbnail('photopage'); ?>

                </a>
            </div>

            <h2 class="entry-title">
                <a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
                <?php the_title(); ?>
                </a>
            </h2>

            <?php //if ( function_exists('the_subtitle') && $thesub != '' ){
                //echo '<div style="line-height:4px;">&nbsp;</div><a href="'.get_permalink().'">';
                //the_subtitle();
                //echo '</a><div style="line-height:4px;">&nbsp;</div>';
            //}  ?>

            <?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

            </div><hr />

            <?php } ?>
        <?php } /* END WHILE */ ?>
        <?php wp_reset_postdata(); ?>

            <div class="bottomnav">
			<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
            </div>

	<?php else : ?>

		<h2>Nothing found</h2>

	<?php endif; ?>

              </div> <!--end maincontent-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
