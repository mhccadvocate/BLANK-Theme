   <div id="sidebar">

   <div id="sidebarnosearch">
     	<?php get_search_form(); ?>
    <?php wp_reset_query();
    if ( ! is_home() ) { ?>
    <div id="headlinewidget" class="group widget">
    <h2>Recent Stories:</h2>
    <div class="TabbedPanels" id="tp1">
    <ul class="TabbedPanelsTabGroup">
        <li class="TabbedPanelsTab" tabindex="0">News</li>

        <li class="TabbedPanelsTab" tabindex="0">Opinion</li>
        <li class="TabbedPanelsTab" tabindex="0">Living Arts</li>
        <li class="TabbedPanelsTab" tabindex="0">Sports</li>
    </ul>
    <div class="TabbedPanelsContentGroup">
        <div class="TabbedPanelsContent">
            <?php
            $args = array( 'numberposts' => 4, 'order'=> 'DESC', 'orderby' => 'date', 'category_name' => 'news' );
            $postslist = get_posts( $args );
            foreach ($postslist as $post) :  setup_postdata($post); ?>
               <div style="line-height:6px;">&nbsp;</div>
	           <div style="padding: 0px 5px 0px 5px; position: relative;width:95%;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;">
                 <span style="font-size:10px;"><a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
                    <?php the_title() ?>
                 </a></span>
                 <br />
                 <span class="font-size: 9px"><em>&nbsp;<?php wp_days_ago_ajax(); ?> | <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></em></span>
               </div>
            <?php endforeach; ?>
            <a href="/news/"><span style="float:right;">More in News...</span></a>
            <div class="group"></div>
        </div>

        <div class="TabbedPanelsContent">
            <?php
            $args = array( 'numberposts' => 4, 'order'=> 'DESC', 'orderby' => 'date', 'category_name' => 'opinion' );
            $postslist = get_posts( $args );
            foreach ($postslist as $post) :  setup_postdata($post); ?>
               <div style="line-height:6px;">&nbsp;</div>
	           <div style="padding: 0px 5px 0px 5px; position: relative;width:95%;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;">
                 <span style="font-size:10px;"><a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
                    <?php the_title() ?>
                 </a></span>
                 <br />
                 <span class="font-size: 9px"><em>&nbsp;<?php wp_days_ago_ajax(); ?> | <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></em></span>
               </div>
            <?php endforeach; ?>
            <a href="/opinion/"><span style="float:right;">More in Opinion...</span></a>
            <div class="group"></div>
            </div>
        <div class="TabbedPanelsContent">
            <?php
            $args = array( 'numberposts' => 4, 'order'=> 'DESC', 'orderby' => 'date', 'category_name' => 'living arts' );
            $postslist = get_posts( $args );
            foreach ($postslist as $post) :  setup_postdata($post); ?>
               <div style="line-height:6px;">&nbsp;</div>
	           <div style="padding: 0px 5px 0px 5px; position: relative;width:95%;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;">
                 <span style="font-size:10px;"><a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
                    <?php the_title() ?>
                 </a></span>
                 <br />
                 <span class="font-size: 9px"><em>&nbsp;<?php wp_days_ago_ajax(); ?> | <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></em></span>
               </div>
            <?php endforeach; ?>
            <a href="/living-arts/"><span style="float:right;">More in Living Arts...</span></a>
            <div class="group"></div>
        </div>

        <div class="TabbedPanelsContent">
            <?php
            $args = array( 'numberposts' => 4, 'order'=> 'DESC', 'orderby' => 'date', 'category_name' => 'sports' );
            $postslist = get_posts( $args );
            foreach ($postslist as $post) :  setup_postdata($post); ?>
               <div style="line-height:6px;">&nbsp;</div>
	           <div style="padding: 0px 5px 0px 5px; position: relative;width:95%;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;">
                 <span style="font-size:10px;"><a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
                    <?php the_title() ?>
                 </a></span>
                 <br />
                 <span class="font-size: 9px"><em>&nbsp;<?php wp_days_ago_ajax(); ?> | <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></em></span>
               </div>
            <?php endforeach; ?>
            <a href="/sports/"><span style="float:right;">More in Sports...</span></a>
            <div class="group"></div>
            </div>
    </div>
    </div>
    </div>
    <?php } ?>

     	
    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Widgets')) : else : ?>

        <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->



    	<h2>Archives</h2>
    	<ul>
    		<?php wp_get_archives('type=monthly'); ?>
    	</ul>

        <h2>Categories</h2>
        <ul>
    	   <?php wp_list_categories('show_count=1&title_li='); ?>
        </ul>

    	<?php wp_list_bookmarks(); ?>

    	<h2>Meta</h2>
    	<ul>
    		<?php wp_register(); ?>
    		<li><?php wp_loginout(); ?></li>
    		<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
    		<?php wp_meta(); ?>
    	</ul>

    	<h2>Subscribe</h2>
    	<ul>
    		<li><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a></li>
    		<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a></li>
    	</ul>
	
	<?php endif; ?>
	

</div>
</div>