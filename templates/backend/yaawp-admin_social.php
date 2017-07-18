<?php

	$options = get_option('yaawp_product_social');

	$yaawp_product_social_list = $options['yaawp_product_social_list'];
	unset($options['yaawp_product_social_list']);

	foreach ( $yaawp_product_social_list as $key => $service ) {
		$options['yaawp_product_social_list'][$service] = $key;
	}

?>
<div style="width: 40%; float: left;">
	<form id="yaawp_settings" class="social" method="POST" style="padding: 0 8px; height: 600px; border-style: solid; border-width: 1px 1px 0; border-color: #dfdfdf #dfdfdf #fff;">

		<div class="header">
			<h1><?php echo __('Social', $this->var_sTextdomain); ?></h1>
		</div>

		<div id="titlewrap">
			<label for="yaawp_product_social_enable"><?php echo __('Sollen Social Bookmark Dienste auf der Produktseite angezeigt werden?', $this->var_sTextdomain); ?></label>
			<?php
				$output = '<select class="yyywp_setting" style="width: 100%" name="yaawp_product_social_enable" id="yaawp_product_social_enable">';
				if ( $options['yaawp_product_social_enable'] == 1 ) {
					$output .= '<option value="1" selected>' . __('Ja', $this->var_sTextdomain) . '</option>';
					$output .= '<option value="0">' . __('Nein', $this->var_sTextdomain) . '</option>';
				} else {
					$output .= '<option value="1">' . __('Ja', $this->var_sTextdomain) . '</option>';
					$output .= '<option value="0" selected>' . __('Nein', $this->var_sTextdomain) . '</option>';
				}
				$output .= '</select>';
				echo $output;
			?>
		</div>

		<div id="titlewrap">
			<label for="yaawp_product_social_size"><?php echo __('Welche gr&ouml;&szlig;e sollen die Icons haben?', $this->var_sTextdomain); ?></label>
			<?php
				$output = '<select class="yyywp_setting" style="width: 100%" name="yaawp_product_social_size" id="yaawp_product_social_size">';
				if ( $options['yaawp_product_social_size'] == 16 ) {
					$output .= '<option value="16" selected>' . __('16 Pixel x 16 Pixel', $this->var_sTextdomain) . '</option>';
					$output .= '<option value="32">' . __('32 Pixel x 32 Pixel', $this->var_sTextdomain) . '</option>';
					$output .= '<option value="64">' . __('64 Pixel x 64 Pixel', $this->var_sTextdomain) . '</option>';
				} elseif ( $options['yaawp_product_social_size'] == 32 ) {
					$output .= '<option value="16">' . __('16 Pixel x 16 Pixel', $this->var_sTextdomain) . '</option>';
					$output .= '<option value="32" selected>' . __('32 Pixel x 32 Pixel', $this->var_sTextdomain) . '</option>';
					$output .= '<option value="64">' . __('64 Pixel x 64 Pixel', $this->var_sTextdomain) . '</option>';
				} else {
					$output .= '<option value="16">' . __('16 Pixel x 16 Pixel', $this->var_sTextdomain) . '</option>';
					$output .= '<option value="32">' . __('32 Pixel x 32 Pixel', $this->var_sTextdomain) . '</option>';
					$output .= '<option value="64" selected>' . __('64 Pixel x 64 Pixel', $this->var_sTextdomain) . '</option>';
				}
				$output .= '</select>';
				echo $output;
			?>
		</div>

		<div id="titlewrap">
			<label><?php echo __('Welche Social Bookmark Dienste sollen auf der Produktseite angezeigt werden?', $this->var_sTextdomain); ?></label>
	        <ul id="yaawp-social-list-32">
	            <li>
	            	<a title="blinklist" class="sprite-blinklist" rel="nofollow" target="_blank" href=""><?php echo __('blinklist', $this->var_sTextdomain); ?></a>
	            	<input name="yaawp_product_social_list[]" type="checkbox" value="blinklist"<?php if (isset($options['yaawp_product_social_list']['blinklist'])): echo ' checked'; endif; ?>>
	            </li>
	            <li>
	            	<a title="delicious" class="sprite-delicious" rel="nofollow" target="_blank" href=""><?php echo __('delicious', $this->var_sTextdomain); ?></a>
	            	<input name="yaawp_product_social_list[]" type="checkbox" value="delicious"<?php if (isset($options['yaawp_product_social_list']['delicious'])): echo ' checked'; endif; ?>>
	            </li>
	            <li>
	            	<a title="designfloat" class="sprite-designfloat" rel="nofollow" target="_blank" href=""><?php echo __('designfloat', $this->var_sTextdomain); ?></a>
	            	<input name="yaawp_product_social_list[]" type="checkbox" value="designfloat"<?php if (isset($options['yaawp_product_social_list']['designfloat'])): echo ' checked'; endif; ?>>
	            </li>
	            <li>
	            	<a title="digg" class="sprite-digg" rel="nofollow" target="_blank" href=""><?php echo __('digg', $this->var_sTextdomain); ?></a>
	            	<input name="yaawp_product_social_list[]" type="checkbox" value="digg"<?php if (isset($options['yaawp_product_social_list']['digg'])): echo ' checked'; endif; ?>>
	            </li>
	            <li>
	            	<a title="facebook" class="sprite-facebook" rel="nofollow" target="_blank" href=""><?php echo __('facebook', $this->var_sTextdomain); ?></a>
	            	<input name="yaawp_product_social_list[]" type="checkbox" value="facebook"<?php if (isset($options['yaawp_product_social_list']['facebook'])): echo ' checked'; endif; ?>>
	            </li>
	            <li>
	            	<a title="google" class="sprite-google" rel="nofollow" target="_blank" href=""><?php echo __('google', $this->var_sTextdomain); ?></a>
	            	<input name="yaawp_product_social_list[]" type="checkbox" value="google"<?php if (isset($options['yaawp_product_social_list']['google'])): echo ' checked'; endif; ?>>
	            </li>
	            <li>
	            	<a title="linkedin" class="sprite-linkedin" rel="nofollow" target="_blank" href=""><?php echo __('linkedin', $this->var_sTextdomain); ?></a>
	            	<input name="yaawp_product_social_list[]" type="checkbox" value="linkedin"<?php if (isset($options['yaawp_product_social_list']['linkedin'])): echo ' checked'; endif; ?>>
	            </li>
	            <li>
	            	<a title="myspace" class="sprite-myspace" rel="nofollow" target="_blank" href=""><?php echo __('myspace', $this->var_sTextdomain); ?></a>
	            	<input name="yaawp_product_social_list[]" type="checkbox" value="myspace"<?php if (isset($options['yaawp_product_social_list']['myspace'])): echo ' checked'; endif; ?>>
	            </li>
	            <li>
	            	<a title="posterous" class="sprite-posterous" rel="nofollow" target="_blank" href=""><?php echo __('posterous', $this->var_sTextdomain); ?></a>
	            	<input name="yaawp_product_social_list[]" type="checkbox" value="posterous"<?php if (isset($options['yaawp_product_social_list']['posterous'])): echo ' checked'; endif; ?>>
	            </li>
	            <li>
	            	<a title="reddit" class="sprite-reddit" rel="nofollow" target="_blank" href=""><?php echo __('reddit', $this->var_sTextdomain); ?></a>
	            	<input name="yaawp_product_social_list[]" type="checkbox" value="reddit"<?php if (isset($options['yaawp_product_social_list']['reddit'])): echo ' checked'; endif; ?>>
	            </li>
	            <li>
	            	<a title="rss" class="sprite-rss" rel="nofollow" target="_blank" href=""><?php echo __('rss', $this->var_sTextdomain); ?></a>
	            	<input name="yaawp_product_social_list[]" type="checkbox" value="rss"<?php if (isset($options['yaawp_product_social_list']['rss'])): echo ' checked'; endif; ?>>
	            </li>
	            <li>
	            	<a title="stumbleupon" class="sprite-stumbleupon" rel="nofollow" target="_blank" href=""><?php echo __('stumbleupon', $this->var_sTextdomain); ?></a>
	            	<input name="yaawp_product_social_list[]" type="checkbox" value="stumbleupon"<?php if (isset($options['yaawp_product_social_list']['stumbleupon'])): echo ' checked'; endif; ?>>
	            </li>
	            <li>
	            	<a title="technorati" class="sprite-technorati" rel="nofollow" target="_blank" href=""><?php echo __('technorati', $this->var_sTextdomain); ?></a>
	            	<input name="yaawp_product_social_list[]" type="checkbox" value="technorati"<?php if (isset($options['yaawp_product_social_list']['technorati'])): echo ' checked'; endif; ?>>
	            </li>
	            <li>
	            	<a title="tumblr" class="sprite-tumblr" rel="nofollow" target="_blank" href=""><?php echo __('tumblr', $this->var_sTextdomain); ?></a>
	            	<input name="yaawp_product_social_list[]" type="checkbox" value="tumblr"<?php if (isset($options['yaawp_product_social_list']['tumblr'])): echo ' checked'; endif; ?>>
	            </li>
	            <li>
	            	<a title="twitter" class="sprite-twitter" rel="nofollow" target="_blank" href=""><?php echo __('twitter', $this->var_sTextdomain); ?></a>
	            	<input name="yaawp_product_social_list[]" type="checkbox" value="twitter"<?php if (isset($options['yaawp_product_social_list']['twitter'])): echo ' checked'; endif; ?>>
	            </li>
	        </ul>
	    </div>

        <div class="yaawp-publishing-actions">
			<input type="submit" id="yaawp_update" class="button button-primary button-large" value="<?php echo __('Speichern', $this->var_sTextdomain); ?>">
		</div>

	</form>
</div>