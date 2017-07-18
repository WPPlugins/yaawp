<?php

if ( ! function_exists('str_replace_assoc') ) {

	function str_replace_assoc ( $replace, $subject ) {

		if (is_array($replace)) {
			foreach($replace as $k => $v) {
				$subject = str_replace("[[$k]]",$v,$subject);
			}
		}

	   return $subject;    
	}
}

if ( ! function_exists('replace_mutations') ) {

    function replace_mutations ( $input ) {

      $search = array('ä', 'Ä', 'ö', 'Ö', 'ü', 'Ü', 'ß', '\\xC3');
      $replace = array('&auml;', '&Auml;', '&ouml;', '&Ouml;', '&uuml;', '&Uuml;', '&szlig;', '&uuml;');

      return str_replace($search, $replace, $input); 
    }
}

if ( ! function_exists('notice') ) {

    function notice ( $msg, $typ = null ){
      switch( $typ ) {
      	case 'error':
      		echo "<div class='error'><p>{$msg}</p></div>";
      	break;
      	default:
      		echo "<div class='updated'><p>{$msg}</p></div>";
      	break;
      }

    }
}

if ( ! function_exists('error_handler') ) {

	function error_handler ( $output ) {
	  
	  /*
	    [type] => 8
	    [message] => Undefined variable: a
	    [file] => D:\xammp\index.php
	    [line] => 2
	  */
	 
	  $error = error_get_last();
	  return $error['message'];  
	}
}

if ( ! function_exists('compress_html') ) {

	function compress_html ( $compress ) {
		$search = array(
		    '/\>[^\S ]+/s',
		    '/[^\S ]+\</s',
		    '/(\s)+/s'
		    );
		$replace = array(
		    '>',
		    '<',
		    '\\1'
		    );
		$buffer = preg_replace($search, $replace, $compress);

		return $buffer;
    }
}

if ( ! function_exists('density') ) {

    function density ( $input, $max = 3 ) {

      $total = 0;
      $data_1 = array();
      $datas = explode(' ', $input);
      for ($i=0; $i < count($datas) ; $i++) {
        if( !empty($datas[$i]) ) {
          $keyword = strtolower($datas[$i]); $total++;
        }
        $_t = isset($data_1[$keyword]) ? ($data_1[$keyword]+1) : 1;
        $data_1[$keyword] = $_t;
      }

      arsort($data_1);

      $data_2 = array();
      $datas = explode(' ', $input);
      for ($i=0; $i < count($datas) ; $i++) {
        if( !empty($datas[$i]) && !empty($datas[++$i]) ) {
          $keyword1 = strtolower($datas[$i]);
          $keyword2 = strtolower($datas[++$i]);
        }
        $keyword = $keyword1.' '.$keyword2;
        $_t = isset($data_2[$keyword]) ? ($data_2[$keyword]+1) : 1;
        $data_2[$keyword] = $_t;
      }

      arsort($data_2);

      $_d1 = '';      
      $i = 0;
      foreach ( $data_1 as $k => $v ) {
        if ( $i < 5 ) {
          $_d1 .= $k.','; $i++;
        }
      }

      $_d2 = '';
      $i = 0;
      foreach ( $data_2 as $k => $v ) {
        if ( $i < 5 ) {
          $_d2 .= $k.','; $i++;
        }
      }

      return array(
        '1-Wort-Phrase'=>substr($_d1,0,-1),
        '2-Wort-Phrasen'=>substr($_d2,0,-1),
        'Total-Words'=>$total
      );

    }
 }

 if ( ! function_exists('yaawp_sidebar_terms') ) {

    function yaawp_sidebar_terms ( $parent = 0 ) {

    	$yaawp_product_cat = get_option('yaawp_product_cat');

    	if ( !$yaawp_product_cat ) {

		    $mylinks_categories = get_terms('shop_category', 'orderby=count&hide_empty=0&parent='.$parent);
		    $count = count($mylinks_categories);

		    if ( $count > 0 ) {

		        echo '<ul>';
		        foreach ( $mylinks_categories as $k => $term ) {

		            $mylinks_scategories = get_terms('shop_category', 'orderby=count&hide_empty=0&parent='.$term->term_id);
		            $counts = count($mylinks_scategories);

		            if ( $count > 0 ) {

		                echo '<li><a href="'.get_term_link($term->slug, 'shop_category').'" title="'.$term->name.'">'.$term->name.'</a><ul>';

		                foreach ( $mylinks_scategories as $k => $sterm ) {

		                    echo '<li><a href="'.get_term_link($sterm->slug, 'shop_category').'" title="'.$sterm->name.'">'.$sterm->name.'</a></li>';

		                }

		                echo '</ul></li>';

		            } else {

		                echo '<li><a href="'.get_term_link($term->slug, 'shop_category').'" title="'.$term->name.'">'.$term->name.'</a></li>';

		            }

		        }

		        echo '</ul>';

		    }

		} else {

		    $mylinks_categories = get_terms('shop_category', 'orderby=count&hide_empty=0&parent='.$parent);
		    $count = count($mylinks_categories);

		    if ( $count > 0 ) {

		        echo '<ul>';
		        foreach ( $yaawp_product_cat as $k => $cat ) {

    	            $index = yaawp_cat_order($cat,$mylinks_categories);
            		$term = $mylinks_categories[$index];

		            $mylinks_scategories = get_terms('shop_category', 'orderby=count&hide_empty=0&parent='.$term->term_id);
		            $counts = count($mylinks_scategories);

		            if ( $count > 0 ) {

		                echo '<li><a href="'.get_term_link($term->slug, 'shop_category').'" title="'.$term->name.'">'.$term->name.'</a><ul>';

		                foreach ( $mylinks_scategories as $k => $sterm ) {

		                    echo '<li><a href="'.get_term_link($sterm->slug, 'shop_category').'" title="'.$sterm->name.'">'.$sterm->name.'</a></li>';

		                }

		                echo '</ul></li>';

		            } else {

		                echo '<li><a href="'.get_term_link($term->slug, 'shop_category').'" title="'.$term->name.'">'.$term->name.'</a></li>';

		            }

		        }

		        echo '</ul>';

		    }

		}

    }
 }

if ( ! function_exists('yaawp_terms_dropdown_options') ) {

    function yaawp_terms_dropdown_options ( $parent = 0 ) {

	    $mylinks_categories = get_terms('shop_category', 'orderby=count&hide_empty=0&parent='.$parent);
	    $count = count($mylinks_categories);

	    if ( $count > 0 ) {

	        foreach ( $mylinks_categories as $k => $term ) {

	            $mylinks_scategories = get_terms('shop_category', 'orderby=count&hide_empty=0&parent='.$term->term_id);
	            $counts = count($mylinks_scategories);

	            if ( $count > 0 ) {

	                echo '<option value="'.$term->term_id.'">'.utf8_decode($term->name).'</option>';

	                foreach ( $mylinks_scategories as $k => $sterm ) {

	                   echo '<option value="'.$sterm->term_id.'">---'.utf8_decode($sterm->name).'</option>';

	                }

	            } else {

	                echo '<option value="'.$term->term_id.'">'.utf8_decode($term->name).'</option>';

	            }

	        }

	    }

    }
}

if ( ! function_exists('yaawp_pagination') ) {

	function yaawp_pagination () {
		global $wp_query;
	 
		$big = 999999999;
	 
		$paginate_links = paginate_links( array(
			'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'mid_size' => 5,
			'type' => 'list',
			'prev_text' => '&laquo;',
    		'next_text' => '&raquo;',
		) );

		if ( $paginate_links ) {
			echo '<div class="pagination pagination-centered">';
			echo $paginate_links;
			echo '</div><!--// end .pagination -->';
		}
	}

}

if ( ! function_exists('yaawp_social') ) {

	function yaawp_social ( $post ) {

		$file = YAAWP_BASE . YAAWP_BASE_DS . 'templates' . YAAWP_BASE_DS . 'frontend' . YAAWP_BASE_DS . 'social' . YAAWP_BASE_DS . 'social.php';

		$get_the_permalink = urlencode(get_permalink());
		$get_the_title = urlencode(get_the_title());
		$get_the_excerpt = urlencode(get_the_excerpt());

		$services = array(
			'blinklist' => 'http://blinklist.com/user/login/?next=GoTo&u='.$get_the_permalink.'&t='.$get_the_title.'&d='.$get_the_excerpt,
			'delicious' => 'http://delicious.com/post?url='.$get_the_permalink.'&title='.$get_the_title,
			'designfloat' => 'http://www.designfloat.com/submit.php?url='.$get_the_permalink.'&title='.$get_the_title,
			'digg' => 'http://digg.com/submit?phase=2&url='.$get_the_permalink.'&title='.$get_the_title.'&bodytext='.$get_the_excerpt,
			'facebook' => 'http://www.facebook.com/share.php?u='.$get_the_permalink.'&t='.$get_the_title,
			'google' => 'https://plus.google.com/share?url='.$get_the_permalink,
			'linkedin' => 'http://www.linkedin.com/shareArticle?mini=true&url='.$get_the_permalink.'&title='.$get_the_title.'&summary='.$get_the_excerpt,
			'myspace' => 'http://www.myspace.com/Modules/PostTo/Pages/?u='.$get_the_permalink.'&t='.$get_the_title,
			'posterous' => 'http://posterous.com/share?linkto='.$get_the_permalink.'&title='.$get_the_title,
			'reddit' => 'http://reddit.com/submit?url='.$get_the_permalink.'&title='.$get_the_title,
			'rss' => 'http://feeds.feedburner.com/New2WP',
			'stumbleupon' => 'http://www.stumbleupon.com/submit?url='.$get_the_permalink.'&title='.$get_the_title,
			'technorati' => 'http://technorati.com/faves?add='.$get_the_permalink,
			'tumblr' => 'http://www.tumblr.com/share?v=3&u='.$get_the_permalink.'&t='.$get_the_title.'&s='.$get_the_excerpt,
			'twitter' => 'http://twitter.com/home?status='.$get_the_title.'-'.$get_the_permalink
		);

		include( $file );
	}

}

// http://php.net/manual/en/book.simplexml.php objectsIntoArray function
if ( ! function_exists('yaawp_objectsIntoArray') ) {

	function yaawp_objectsIntoArray ( $arrObjData, $arrSkipIndices = array() ) {

	    $arrData = array();

	    if ( is_object($arrObjData) ) {
	        $arrObjData = get_object_vars($arrObjData);
	    }

	    if ( is_array($arrObjData) ) {

	        foreach ( $arrObjData as $index => $value ) {

	            if ( is_object($value) || is_array($value) ) {
	                $value = yaawp_objectsIntoArray($value, $arrSkipIndices);
	            }

	            if ( in_array($index, $arrSkipIndices) ) {
	                continue;
	            }

	            $arrData[$index] = $value;
	        }

	    }

	    return $arrData;

	}

}

if ( ! function_exists('yaawp_the_content') ) {

	function yaawp_the_content ( ) {

		$limit = (get_option('yaawp_product_exc')) ? get_option('yaawp_product_exc') : 145;
		
		$_the_content = get_the_content();
		$_the_ID = get_the_ID();
		$_the_title = get_the_title($_the_ID );
		$_permalink = get_permalink($_the_ID);

		if ( strlen($_the_content) >= $limit ) return substr($_the_content,0,$limit).' ... <a href="'. $_permalink . '" title="'. $_the_title .'">' . 'Weiterlesen &raquo;' . '</a>';
		else return $_the_content.' ... <a href="'. $_permalink . '" title="'. $_the_title .'">' . 'Weiterlesen &raquo;' . '</a>';

	}
}

if ( ! function_exists('yaawp_the_title') ) {

	function yaawp_the_title ( ) {

		$limit = (get_option('yaawp_product_title')) ? get_option('yaawp_product_title') : 40;
		
		$_the_ID = get_the_ID();
		$_the_title = get_the_title($_the_ID);
		
		if ( strlen($_the_title) >= $limit ) return substr($_the_title,0,$limit).' ...';
		else return $_the_title;

	}
}

if ( ! function_exists('yaawp_cat_order') ) {

	function yaawp_cat_order ( $id, $cats ) {

		foreach($cats as $index => $cat) {
			if ( $id == $cat->term_id ) return $index;
		}

	}
}

?>