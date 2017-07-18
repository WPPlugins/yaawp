<?php

global $wp_query;

get_header();

?>

    <section id="primary" class="site-content">
        <div id="content" role="main">

        <?php if ( have_posts() ) : ?>
            <header class="archive-header">
                <h1 class="archive-title"><?php

                    echo $wp_query->queried_object->name;

                ?></h1>

                <?php
                    if ( class_exists('yaawp') ):
                        $image = yaawp::yaawp_taxonomy_image_url();
                        if ( $image ):
                            $image = pluginUrl . 'classes/timthumb.php?src='.$image.'&h=180&w=624';
                            echo '<img class="rounded shadow" style="margin-top: 10px;" src="'.$image.'" />';
                        endif;
                    endif;
                    if ( $wp_query->queried_object->description ):
                        echo '<p style="margin: 20px 0 0 0;">'.$wp_query->queried_object->description.'</p>';
                    endif;
                ?>

            </header>

            <?php

                echo '<ul id="products" class="'.get_option('yaawp_product_layout').' clearfix">';

                $i = 1;

                while ( have_posts() ) : the_post();

            ?>

            <li class="clearfix<?php if ( ($i % 3) == 0 ): echo ' lilast'; endif; ?>" style="box-shadow: 0 0 5px #CCC;">
                <?php if(get_post_meta($post->ID, 'AmountSavedFormattedPrice', true)): ?><div class="special_promo"></div><?php endif; ?>
                <div class="left">
                    <img src="<?php echo get_post_meta($post->ID, 'LargeImageUrl', true); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" class="thumb">
                    <h3><?php echo yaawp_the_title(); ?></h3>
                    <span class="excerpt"><?php echo yaawp_the_content(); ?></span>
                </div>
             
                <div class="right">
                    <span class="price"><?php $preis = (get_post_meta($post->ID, 'LowestOfferFormattedPrice', true)) ? get_post_meta($post->ID, 'LowestOfferFormattedPrice', true) : get_post_meta($post->ID, 'LowestNewOfferFormattedPrice', true); echo $preis; if(get_post_meta($post->ID, 'AmountSavedFormattedPrice', true)): echo '<br/><sub>'.get_post_meta($post->ID, 'AmountSavedFormattedPrice', true).' '.__('sparen', 'yaawp').'</sub>'; endif; ?></span>
                    <span class="darkview">
                        <a href="<?php the_permalink(); ?>" class="yaawp-btn yaawp-btn-warning firstbtn" title="<?php echo __('Zum Artikel', 'yaawp'); ?>"><?php echo __('Zum Artikel', 'yaawp'); ?></a>
                        <a href="<?php echo get_post_meta($post->ID, 'DetailPageURL', true); ?>" rel="external nofollow" target="_blank"><img src="<?php echo pluginUrl; ?>assets/img/amazon_small.gif" alt="Add to Cart"></a>
                    </span>
                </div>
            </li>

            <?php 

                $i++; endwhile; echo '</ul>';
                
                yaawp_pagination();

                else :
                    get_template_part( 'content', 'none' );
                endif;

            ?>

        </div><!-- #content -->
    </section><!-- #primary -->


<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
    <div id="secondary" class="widget-area" role="complementary">
        <aside id="yaawp_widget_categ-3" class="widget yaawp_widget_categ">
            <h3 class="widget-title"><?php echo __('Kategorien', 'yaawp'); ?></h3>

            <?php yaawp_sidebar_terms(); ?>
            
        </aside>
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div><!-- #secondary -->
<?php endif; ?>

<?php get_footer(); ?>