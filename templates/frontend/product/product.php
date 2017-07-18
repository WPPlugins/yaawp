<?php

/**
Plugin Name: Layout 1
Plugin URI: http://www.yaawp-plugin.com/
Description: Kompatibel mit Twenty Twelve, Twenty Eleven 
Author: Kai Lange
Author URI: http://www.pc-halle.de/
**/

get_header(); ?>

    <div id="primary" class="site-content product">
        <div id="content" role="main">

            <?php while ( have_posts() ) : the_post(); endwhile; ?>

            <div class="product-view" style="margin: 0; padding: 0;">

                <h1 style="margin: 0 0 15px 0;font: bold 20px/1.35 Arial, Helvetica, sans-serif;"><?php the_title(); ?></h1>

                <div class="product-essential" style="padding: 0 0 8px;">

                    <div class="product-img-box" style="float: left; width: 267px;">

                        <div class="wraptocenter product1">
                            <span></span>

                            <p class="product-image" style="margin: 0 0 8px; border: 1px solid #D5D5D5;" id="img_<?php echo get_post_meta($post->ID, 'ASIN', true); ?>">
                                <a href="<?php echo get_post_meta($post->ID, 'LargeImageUrl', true); ?>" title="<?php the_title(); ?>" class="thickbox"><img src="<?php echo get_post_meta($post->ID, 'LargeImageUrl', true); ?>" alt="<?php the_title(); ?>" style="max-width: 250px; max-height: 300px;margin-bottom: 1px;" id="bigimg"></a>
                            </p>
                        </div>

                        <div class="more-views ma-more-img">
                            <ul style="margin-left: -9px; list-style: none; padding: 0; margin: 0;">
                                <?php
                                    $small = (get_post_meta($post->ID, 'ImageSetTiny0', true)) ? get_post_meta($post->ID, 'ImageSetTiny0', true) : 'http://placehold.it/76x96.png';
                                    $large = (get_post_meta($post->ID, 'ImageSetLarge0', true)) ? get_post_meta($post->ID, 'ImageSetLarge0', true) : 'http://placehold.it/760x960.png';
                                ?>
                                <li style="float: left;margin: 0 0 8px 0;">
                                    <a href="<?php echo $large; ?>" style="float: left;width: 76px;height: 96px;border: 1px solid #D5D5D5;overflow: hidden;" title="<?php the_title(); ?>" class="thickbox" rel="gallery-<?php echo get_post_meta($post->ID, 'ASIN', true); ?>"><img src="<?php echo $small; ?>" alt="" style="border: 0;vertical-align: top; max-width: 75px; max-height: 95"></a>
                                </li>
                                <?php
                                    $small = (get_post_meta($post->ID, 'ImageSetTiny1', true)) ? get_post_meta($post->ID, 'ImageSetTiny1', true) : 'http://placehold.it/76x96.png';
                                    $large = (get_post_meta($post->ID, 'ImageSetLarge1', true)) ? get_post_meta($post->ID, 'ImageSetLarge1', true) : 'http://placehold.it/760x960.png';
                                ?>
                                <li style="float: left;margin: 0 0 8px 8px;">
                                    <a href="<?php echo $large; ?>" style="float: left;width: 76px;height: 96px;border: 1px solid #D5D5D5;overflow: hidden;" title="<?php the_title(); ?>" class="thickbox" rel="gallery-<?php echo get_post_meta($post->ID, 'ASIN', true); ?>"><img src="<?php echo $small; ?>" alt="" style="border: 0;vertical-align: top; max-width: 75px; max-height: 95"></a>
                                </li>
                                <?php
                                    $small = (get_post_meta($post->ID, 'ImageSetTiny2', true)) ? get_post_meta($post->ID, 'ImageSetTiny2', true) : 'http://placehold.it/76x96.png';
                                    $large = (get_post_meta($post->ID, 'ImageSetLarge2', true)) ? get_post_meta($post->ID, 'ImageSetLarge2', true) : 'http://placehold.it/760x960.png';
                                ?>
                                <li style="float: left;margin: 0 0 8px 8px;">
                                    <a href="<?php echo $large; ?>" style="float: left;width: 76px;height: 96px;border: 1px solid #D5D5D5;overflow: hidden;" title="<?php the_title(); ?>" class="thickbox" rel="gallery-<?php echo get_post_meta($post->ID, 'ASIN', true); ?>"><img src="<?php echo $small; ?>" alt="" style="border: 0;vertical-align: top; max-width: 75px; max-height: 95"></a>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <div style="float: right;width: 350px;">
                        <div style="float: left;width: 350px; border: 1px solid #D5D5D5;" id="test">
                            <p style="line-height: 20px; margin: 0 10px; background: url('<?php echo pluginUrl; ?>assets/img/bullet.png') no-repeat scroll 0 11px transparent;border-bottom: 1px solid #DEDEDE;padding: 5px 20px 5px 12px;">
                                <?php echo __('Kundenstimmen auf Amazon:', 'yaawp'); ?> <span style="font-weight: bold;"><a style="text-decoration: none;" href="<?php echo get_post_meta($post->ID, 'CustomerReviewsIFrameURL', true); ?>&amp;KeepThis=true&amp;TB_iframe=true&amp;height=400&amp;width=600" title="Kundenstimmen" class="thickbox" rel="nofollow">hier klicken</a></span>
                            </p>
                            <p style="line-height: 20px; margin: 0 10px; background: url('<?php echo pluginUrl; ?>assets/img/bullet.png') no-repeat scroll 0 11px transparent;border-bottom: 1px solid #DEDEDE;padding: 5px 20px 5px 12px;">
                               <?php echo __('ASIN:', 'yaawp'); ?> <span style="font-weight: bold;"><?php echo get_post_meta($post->ID, 'ASIN', true); ?></span>
                            </p>
                            <p style="line-height: 20px; margin: 0 10px; background: url('<?php echo pluginUrl; ?>assets/img/bullet.png') no-repeat scroll 0 11px transparent;border-bottom: 1px solid #DEDEDE;padding: 5px 20px 5px 12px;">
                                <?php echo __('EAN:', 'yaawp'); ?> <span style="font-weight: bold;"><?php echo get_post_meta($post->ID, 'EAN', true); ?></span>
                            </p>
                            <p style="line-height: 20px; margin: 0 10px; background: url('<?php echo pluginUrl; ?>assets/img/bullet.png') no-repeat scroll 0 11px transparent;border-bottom: 1px solid #DEDEDE;padding: 5px 20px 5px 12px;">
                                <?php echo __('Verf&uuml;gbarkeit:', 'yaawp'); ?> <span style="font-weight: bold;"><?php echo get_post_meta($post->ID, 'Availability', true); ?></span>
                            </p>
                            <p style="line-height: 20px; margin: 0 10px; background: url('<?php echo pluginUrl; ?>assets/img/bullet.png') no-repeat scroll 0 11px transparent;border-bottom: 1px solid #DEDEDE;padding: 5px 20px 5px 12px;">
                                <?php echo __('Kategorie:', 'yaawp'); ?> <span style="font-weight: bold;"><?php $terms = get_the_terms( $post->ID, 'shop_category' );foreach ($terms as $term){echo '<a href="'.get_term_link($term->slug, 'shop_category').'">'.$term->name.'</a>';} ?></span>
                            </p>
                            <p style="line-height: 20px; margin: 0 10px; background: url('<?php echo pluginUrl; ?>assets/img/bullet.png') no-repeat scroll 0 11px transparent;border-bottom: 1px solid #DEDEDE;padding: 5px 20px 5px 12px;">
                                <?php echo __('Preis', 'yaawp'); ?> (<?php echo get_post_meta($post->ID, 'LastCheck', true); ?>): <span style="font-weight: bold;"><?php $preis = (get_post_meta($post->ID, 'LowestOfferFormattedPrice', true)) ? get_post_meta($post->ID, 'LowestOfferFormattedPrice', true) : get_post_meta($post->ID, 'LowestNewOfferFormattedPrice', true); echo $preis; if(get_post_meta($post->ID, 'AmountSavedFormattedPrice', true)): echo '<sub style="font-size: 60%;"> ('.get_post_meta($post->ID, 'AmountSavedFormattedPrice', true).' sparen)</sub>'; endif; ?> </span>
                            </p>
                            <?php if (get_post_meta($post->ID, 'ListPriceFormatted', true) > $preis ): ?>
                            <p style="line-height: 20px; margin: 0 10px; background: url('<?php echo pluginUrl; ?>assets/img/bullet.png') no-repeat scroll 0 11px transparent;border-bottom: 1px solid #DEDEDE;padding: 5px 20px 5px 12px;">
                                <?php echo __('Preis UVP', 'yaawp'); ?> (<?php echo get_post_meta($post->ID, 'LastCheck', true); ?>): <span style="font-weight: bold; text-decoration: line-through;"><?php echo get_post_meta($post->ID, 'ListPriceFormatted', true); ?></span>
                            </p>
                            <?php endif; ?>
                            <p style="line-height: 20px; margin: 0;border-bottom: 0px solid #DEDEDE;padding: 5px 20px 5px 12px;">
                                <span style="font-weight: bold;"><a href="<?php echo get_post_meta($post->ID, 'DetailPageURL', true); ?>" style="text-decoration: none;" rel="external nofollow" target="_blank"><img src="<?php echo pluginUrl; ?>assets/img/amazon.png"></a></span>
                            </p>
                        </div><br class="clearfix" />

                        <?php yaawp_social( $post ); ?>

                    </div><div style="clear: both;"></div>

                </div>

                <?php
                    $content = get_the_content();
                    if ( !empty($content) ):
                ?>
                    <div style="margin: 0;border: 1px solid #D5D5D5;padding: 12px 10px;line-height: 20px;" class="desc clearfix">
                        <h2 style="margin-bottom: 5px;"><?php echo __('Produktbeschreibung', 'yaawp'); ?></h2>
                        <?php echo $content; ?>
                    </div>

                <?php
                    endif;
                    $amazon = get_post_meta($post->ID, 'AmazonDescription', true);
                    if ( !empty($amazon) ):
                ?>

                <div style="margin: 15px 0 0 0;border: 1px solid #D5D5D5;padding: 12px 10px;line-height: 20px;" class="desc clearfix">
                    <h2 style="margin-bottom: 5px;"><?php echo __('Produktbeschreibung von Amazon', 'yaawp'); ?></h2>
                    <?php echo $amazon; ?>
                </div>

                <?php
                    endif;
                    $features = get_post_meta($post->ID, 'Features', true);
                    if ( !empty($features) ):
                ?>

               <div style="margin: 15px 0 0 0;border: 1px solid #D5D5D5;padding: 12px 10px;line-height: 20px;" class="desc clearfix">
                    <h2 style="margin-bottom: 5px;"><?php echo __('Produktmerkmale', 'yaawp'); ?></h2>
                    <ul style="list-style-type: disc; margin-left: 20px;">
                        <?php
                        foreach ( $features as $feature ):
                            echo '<li>'.$feature.'</li>';
                        endforeach;
                        ?>
                    </ul>
                </div>

                <?php
                    endif;
                ?>

            </div>

        </div>
    </div>

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