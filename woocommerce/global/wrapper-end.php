<?php
/**
 * Content wrappers
 *
 * @author 		Fruitful
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */


$template    = strtolower(get_option( 'template' ));


switch( $template ) {
	case 'twentyeleven' :
		echo '</div></div>';
		break;
	case 'twentytwelve' :
		echo '</div></div>';
		break;
	case 'twentythirteen' :
		echo '</div></div>';
		break;
	case 'twentyfourteen' :
		echo '</div></div></div>';
		//get_sidebar( 'content' );
		break;
	case 'fruitful' :
			echo '</div></div>';
		break;
	default :
		echo '</div></main>';
		break;
}