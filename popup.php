<?php
ini_set('display_errors', '1');

global $wpdb,$wp_query;

if(!isset($wpdb)) {
  require_once('../../../wp-load.php');
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<?php wp_head('admin-header'); ?>

<script>
jQuery(document).ready(function($) {

  var wto;

  $('#TB_ajaxContent').css({
    'width': '90%',
    'padding': '5px 10px',
    'margin': '0 auto'
  });

  $('#ASIN,#template,#Texttrim,#CTitle').bind('change keyup input', function() {

    clearTimeout(wto);

    wto = setTimeout(function() {

      $('#insert').hide();

      var ASIN = $('#ASIN').val();
      var Texttrim = $('#Texttrim').val();
      var option = $('#template option:selected').val();
      var CTitle = $('#CTitle').val();

      if ( ASIN.length == 10 && option != '' ) {

        $.post(yaawp.ajaxurl, {
            action: 'Backend',
            ASIN: $('#ASIN').val(),
            method: 'ReadItem',
            nonce: yaawp.nonce
        }, function(response) {

          if ( response.ASIN ==  '' ) {
            $('.response').text('(<?php echo __('Keine Daten vorhanden', 'yaawp'); ?>)').closet('#ASIN').addClass('error');
            return;
          }

          if ( $('#ASIN').hasClass('error') ) {
            $('#ASIN').removeClass('error');
          }

          $('.response').empty();
          $('#insert').show();

          var Title = response.Title;

          if ( Title.length > Texttrim ) Title = Title.substring(0,Texttrim) + ' ...';

          if ( CTitle.length > 0 ) {
            response.Title = CTitle;
            Title = CTitle;
          }

          var html = '';

          switch(parseInt(option)) {
            case 1:
              html += '<div class="asin" id="' + response.ASIN + '" style="width: 320px;">';
              html += '<img width="32" style="float: left; padding-right: 5px; width: 35px; height: 43px" id="' + response.ASIN + '" src="' + response.SmallImageUrl + '">';
              html += '<a href="' + response.DetailPageURL + '" title="' +  response.Title + '" target="_blank" rel="external">' +  Title + '</a><br />';
              if ( response.Binding ) {
                html += response.Director + ' (' + response.Binding + ')';
              }
              html += '</div>';
            break;
            case 2:
              html += '<div class="asin" id="' + response.ASIN + '" style="width: 320px;">';
              html += '<a href="' + response.DetailPageURL + '" title="' +  response.Title + '" target="_blank" rel="external">' +  Title + '</a><br />';
              if ( response.Binding ) {
                html += response.Director + ' (' + response.Binding + ')';
              }
              html += '</div>';
            break;
            case 3:
              html += response.DetailPageURL;
            break;
            case 4:
              html += '<a href="' + response.DetailPageURL + '" title="' +  response.Title + '" target="_blank" rel="external">' +  Title + '</a>';
            break;
          }

          $('#preview').empty().html(html).css('padding-bottom','20px');
          $('#preview_code').empty().text(html);

          console.log(response);

          return;

        });

      }

      $('#ASIN').addClass('error');

    }, 1000);

  });

  $('#tt-insert').click(function() {

    var ASIN = $('#ASIN').val();
    var option = $('#template option:selected').val();
    var CTitle = $('#CTitle').val();
    var Texttrim = $('#Texttrim').val();

    if(window.tinyMCE)
    {

      var shortcode = '';
      shortcode += '[yaawp_asin ';
      shortcode += 'ASIN=\''+ASIN+'\' ';
      shortcode += 'TEMPLATE=\''+option+'\' ';
      shortcode += 'CTITLE=\''+CTitle+'\' ';
      shortcode += 'TRIM=\''+Texttrim+'\'';
      shortcode += ']';
      
      tinyMCE.activeEditor.selection.setContent(shortcode);

    }
    tb_remove();
  });

});
</script>

</head>
<body>

  <div class="form-wrap" style="-webkit-border-radius: 3px;border-radius: 3px;border-width: 1px;border-style: solid;border-color: #dfdfdf;background-color: #f9f9f9;padding: 5px;">
    
    <div class="form-field form-required">
      <label for="ASIN"><?php echo __('ASIN', 'yaawp'); ?><span class="response"></span></label>
      <input name="ASIN" id="ASIN" type="text" size="40" aria-required="true" style="width: 100%">
    </div>

    <div class="form-field form-required">
      <div style="float: left; width: 35%">
      <label for="Texttrim"><?php echo __('Text abschneiden nach X Zeichen*', 'yaawp'); ?><span class="response"></span></label>
      <input name="Texttrim" id="Texttrim" type="number" size="40" aria-required="true" style="width: 95%" value="30" min="5" max="250" step="5">
      </div>
      <div style="float: left; width: 65%">
        <label for="CTitle"><?php echo __('Titel und Linktext*', 'yaawp'); ?><span class="response"></span></label>
        <input name="CTitle" id="CTitle" type="text" aria-required="true" style="width: 100%">
      </div>
      <div style="clear: both;"></div>
    </div>

    <div class="form-field" style="margin: 0; padding: 3px 0;">
      <label for="parent"><?php echo __('Template', 'yaawp'); ?></label>
        <select name="template" id="template" aria-required="true" style="width: 100%">
        <option value="1" selected><?php echo __('Produkt mit Bild', 'yaawp'); ?></option>
        <option value="2"><?php echo __('Produkt ohne Bild', 'yaawp'); ?></option>
        <option value="3"><?php echo __('Nur Produktlink', 'yaawp'); ?></option>
        <option value="4"><?php echo __('Produktlink als Link', 'yaawp'); ?></option>
      </select>
    </div>

    <div class="form-field form-required" style="display: none;" id="insert">
      <a href="#" id="tt-insert" class="button button-primary" style="color: #FFF;"><?php echo __('Shortcode ein&uuml;gen', 'yaawp'); ?></a>
    </div>
  
  </div>

  <hr style="margin: 10px 0;" />

  <div class="form-wrap" style="-webkit-border-radius: 3px;border-radius: 3px;border-width: 1px;border-style: solid;border-color: #dfdfdf;background-color: #f9f9f9;padding: 5px;">
    <h2><?php echo __('Vorschau', 'yaawp'); ?></h2>
    
      <div class="form-field" style="margin: 0; padding: 3px 0;" id="preview">
        <?php echo __('Keine vorhanden', 'yaawp'); ?>
      </div>

    </form>
  </div>

  <hr style="margin: 10px 0;" />

  <div class="form-wrap" style="-webkit-border-radius: 3px;border-radius: 3px;border-width: 1px;border-style: solid;border-color: #dfdfdf;background-color: #f9f9f9;padding: 5px;">
    <h2><?php echo __('Quellcode Vorschau', 'yaawp'); ?></h2>
    
      <div class="form-field" style="margin: 0; padding: 3px 0;" id="preview_code">
        <?php echo __('Keine vorhanden', 'yaawp'); ?>
      </div>

    </form>
  </div>

  <hr style="margin: 10px 0;" />

  <em>* (optional)</em>

</div>
</body>
</html>