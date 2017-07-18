<?php

    $options = get_option('yaawp_product_social');
    if ( $options['yaawp_product_social_enable'] == 1 && is_array($options['yaawp_product_social_list']) ):
?>

<div id="yaawp-social-wrapper" class="clearfix">

    <div id="yaawp-social-list-wrapper">
        <div class="yaawp-social-title"><?php echo __('In Verbindung bleiben!', 'yaawp'); ?></div>

        <ul id="yaawp-social-list-<?php echo $options['yaawp_product_social_size']; ?>">

            <?php
                foreach ( $options['yaawp_product_social_list'] as $key => $service ) {
                    echo '<li><a title="'.ucfirst($service).'" class="sprite-'.$service.'" rel="nofollow" target="_blank" href="'.$services[$service].'">'.ucfirst($service).'</a></li>';
                }
            ?>

        </ul>
    </div>

</div>

<?php
    endif;
?>