<?php

	$options = get_option('yaawp_product_social');

	$yaawp_product_social_list = $options['yaawp_product_social_list'];
	unset($options['yaawp_product_social_list']);

	foreach ( $yaawp_product_social_list as $key => $service ) {
		$options['yaawp_product_social_list'][$service] = $key;
	}

	$yaawp_product_cat = get_option('yaawp_product_cat');

?>
<div style="width: 40%; float: left;">
	<form id="yaawp_settings" class="cat" method="POST" style="padding: 0 8px; height: 600px; border-style: solid; border-width: 1px 1px 0; border-color: #dfdfdf #dfdfdf #fff;">

		<div class="header">
			<h1><?php echo __('Kategorien', $this->var_sTextdomain); ?></h1>
		</div>

		<div id="titlewrap">

			<label><?php echo __('Die Kategorien in der Navigation/Sidebar k&ouml;nnen hier sortiert werden.', $this->var_sTextdomain); ?></label>

		<?php 

		$mylinks_categories = get_terms('shop_category', 'orderby=count&hide_empty=0&parent=0');

		if ( count($mylinks_categories) > 0 ):

			echo '<ul id="itemsort">';

			if ( is_array($yaawp_product_cat) ):

				foreach ( $yaawp_product_cat as $cat ):

					$index = yaawp_cat_order($cat,$mylinks_categories);
					$term = $mylinks_categories[$index];

					echo '<li id="'.$term->term_id.'" style="border: 1px solid #CCC;padding: 5px; margin-bottom: 2px;">'.$term->name.'</li>';

				endforeach;

			else:

				foreach ( $mylinks_categories as $term ):

					echo '<li id="'.$term->term_id.'" style="border: 1px solid #CCC;padding: 5px; margin-bottom: 2px;">'.$term->name.'</li>';

				endforeach;

			endif;

			echo '</ul>';

		else:

			echo __('Keine Kategorien zum sortieren.', $this->var_sTextdomain);

		endif;

	    ?>

	    </div>

        <div class="yaawp-publishing-actions">
			<input type="submit" id="yaawp_update" class="button button-primary button-large" value="<?php echo __('Speichern', $this->var_sTextdomain); ?>">
		</div>

	</form>
</div>