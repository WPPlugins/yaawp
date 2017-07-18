<div style="width: 40%; float: left;">
	<form id="yaawp_settings" class="shop" method="POST" style="padding: 0 8px; height: 600px; border-style: solid; border-width: 1px 1px 0; border-color: #dfdfdf #dfdfdf #fff;">

		<div class="header">
			<h1><?php echo __('Shop', $this->var_sTextdomain); ?></h1>
		</div>

		<div id="titlewrap">
			<label for="yaawp_product_template"><?php echo __('Standard Produkt Layout (Einzelseite)', $this->var_sTextdomain); ?></label>
			<?php echo '<select class="yyywp_setting" style="width: 100%" name="yaawp_product_template" id="yaawp_product_template">'.yaawp::getTemplate(get_option('yaawp_product_template')).'</select>'; ?>
		</div>

		<div class="yaawp-publishing-actions">
			<input type="submit" id="yaawp_update" class="button button-primary button-large" value="<?php echo __('Speichern', $this->var_sTextdomain); ?>">
			<input type="submit" id="yaawp_force_update" class="button button-primary button-large" style="float: right" value="<?php echo __('Alle Produktlayouts &auml;ndern', $this->var_sTextdomain); ?>">
		</div>

		<hr />

		<div id="titlewrap">
			<label for="yaawp_product_number"><?php echo __('Anzahl der Produkte pro Seite (-1 zeigt alle Produkte an)', $this->var_sTextdomain); ?></label>
			 <input type="text" class="yyywp_setting" name="yaawp_product_number" size="20" value="<?php echo get_option('yaawp_product_number');?>" id="yaawp_product_number" autocomplete="off">
		</div>

		<div class="yaawp-publishing-actions">
			<input type="submit" id="yaawp_update_2" class="button button-primary button-large" value="<?php echo __('Speichern', $this->var_sTextdomain); ?>">
		</div>

		<hr />

		<div id="titlewrap">
			<label for="yaawp_product_title"><?php echo __('Anzahl der Zeichen eines Produktnamens', $this->var_sTextdomain); ?></label>
			 <input type="text" class="yyywp_setting" name="yaawp_product_title" size="20" value="<?php echo get_option('yaawp_product_title');?>" id="yaawp_product_title" autocomplete="off" placeholder="40">
		</div>

		<div id="titlewrap">
			<label for="yaawp_product_exc"><?php echo __('Anzahl der Zeichen einer Produktbeschreibung', $this->var_sTextdomain); ?></label>
			 <input type="text" class="yyywp_setting" name="yaawp_product_exc" size="20" value="<?php echo get_option('yaawp_product_exc');?>" id="yaawp_product_exc" autocomplete="off" placeholder="145">
		</div>

		<div class="yaawp-publishing-actions">
			<input type="submit" id="yaawp_update_4" class="button button-primary button-large" value="<?php echo __('Speichern', $this->var_sTextdomain); ?>">
		</div>

		<hr />

		<div id="titlewrap">
			<label for="yaawp_product_layout"><?php echo __('Produktlayout der Seite', $this->var_sTextdomain); ?></label>
			 <?php echo '<select class="yyywp_setting" style="width: 100%" name="yaawp_product_layout" id="yaawp_product_layout">'.yaawp::getProductLayout().'</select>'; ?>
		</div>

		<div class="yaawp-publishing-actions">
			<input type="submit" id="yaawp_update_3" class="button button-primary button-large" value="<?php echo __('Speichern', $this->var_sTextdomain); ?>">
		</div>

	</form>
</div>