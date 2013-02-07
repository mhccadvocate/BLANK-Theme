<div class="meta">
    <?php if ( ! in_category( array('editorial', 'newsbriefs', 'letterfromeditor' ))) : ?>
        <?php if ( get_the_terms( $post->ID, 'reporter' ) != '' ) : ?>
            by
            <?php the_terms( $post->ID, 'reporter', '', ' <span style="color:#000">/</span> ', '<br />' ); ?>
        <?php endif; ?>
        <?php if ( get_the_terms( $post->ID, 'columnist' ) != '' ) : ?>
            by
            <?php the_terms( $post->ID, 'columnist', '', ' <span style="color:#000">/</span> ', '<br />' ); ?>
        <?php endif; ?>
    <?php endif; ?>
    
    <em><span class="metadate"><?php the_time('F j, Y') ?></span> |
            <?php    echo '<span>';
            //the_terms( $post->ID, 'category', '', ' <span style="color:#000">/</span>', ' &#187;' );
            $cat = get_the_category(); $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' | ');
            echo '</span>';?>
    <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></em>
                <!--<span class="st_facebook" displayText="Share"></span>-->
                <div style="line-height:12px;">&nbsp;</div><hr />
        <div class="sharingiscaring">
                <fb:like href="<?php the_permalink(); ?>" send="true" width="450" show_faces="false" action="recommend"></fb:like>
                <span class="st_twitter" st_via='mhccadvocate' st_username='mhccadvocate' displayText="Tweet" style="position: relative; top: -5px;"></span>
                <a id="print_this" href="<?php the_permalink(); ?>" title="Print this article" style="position: relative; top: -5px;"><span class="advoprint">Print</span></a>
        </div>
                <hr />

</div>