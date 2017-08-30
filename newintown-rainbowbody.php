<?php
/*
 * Plugin Name: NewInTown Rainbow Body
 * Description: Fed up of seeing the same old color background for the body of your site? Finding life boringly predictable? Get NewInTown Rainbow Body and you too could enjoy the excitement of a randomly generated background color every time you load a page!
 * Version: 1.0
 * Author: Kerry Manning
 * Author URI: http://new-in-town.uk
 * License: GPL2
*/


class RainbowBody
{

  function __construct() {
		add_filter( 'body_class', array( $this, 'add_rainbow_body_class' ) );
		add_action( 'wp_enqueue_scripts', array( $this , 'load_body_color' ) );
 	}
  
  function add_rainbow_body_class ( $classes ) {
    $classes[] = 'rainbow-body';
    return $classes;
	}

	function load_body_color () {
			wp_enqueue_style( 'body-color', plugins_url( '/css/body-color.css', __FILE__ ) );
			for (
					$color = '', $i = 0, $max = strlen($hex_digit_options = '0123456789abcdef')-1;
					$i != 6; 
					$hex_digit = rand(0,$max), $color .= $hex_digit_options{$hex_digit}, $i++
					);
	 		$css = '.rainbow-body { background-color: #' . $color . '; }';
	 		wp_add_inline_style( 'body-color', $css );
		}
  
}
$make_body_colorful = new RainbowBody();




