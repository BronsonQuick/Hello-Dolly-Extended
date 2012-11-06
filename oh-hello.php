<?php
/**
 * @package Hello_Dolly
 * @version 1.7
 */
/*
Plugin Name: Hello Dolly
Plugin URI: http://wordpress.org/extend/plugins/hello-dolly/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Matt Mullenweg
Version: 1.7
Author URI: http://ma.tt/
*/

class Hello_Dolly {

	/* We need to add both the actions used in the original Hello Dolly when the class is constructed */
	public function __construct() {
		add_action( 'admin_notices' , array( $this, 'print_lyric' ) );
		add_action( 'admin_head' , array( $this, 'print_css') );
	}

	public function get_lyric() {
		/* This is where Matt adds the lyrics to Hello Dolly */
		$lyrics = "Hello, Dolly
Well, hello, Dolly
It's so nice to have you back where you belong
You're lookin' swell, Dolly
I can tell, Dolly
You're still glowin', you're still crowin'
You're still goin' strong
We feel the room swayin'
While the band's playin'
One of your old favourite songs from way back when
So, take her wrap, fellas
Find her an empty lap, fellas
Dolly'll never go away again
Hello, Dolly
Well, hello, Dolly
It's so nice to have you back where you belong
You're lookin' swell, Dolly
I can tell, Dolly
You're still glowin', you're still crowin'
You're still goin' strong
We feel the room swayin'
While the band's playin'
One of your old favourite songs from way back when
Golly, gee, fellas
Find her a vacant knee, fellas
Dolly'll never go away
Dolly'll never go away
Dolly'll never go away again";

		// Here we split it into lines
		$lyrics = explode( "\n", $lyrics );

		// And then randomly choose a line
		return $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ];
	}

	// This just echoes the chosen line, we'll position it later
	public function print_lyric() {
		/* The '$this' refers to the class that's currently in use */
		$chosen = $this->get_lyric();
		echo sprintf( "<p id='dolly'>%s</p>", wptexturize(  esc_html( $chosen ) ) );
	}

	// We need some CSS to position the paragraph
	public function print_css() {
		// This makes sure that the positioning is also good for right-to-left languages
		$x = is_rtl() ? 'left' : 'right';

		echo "
			<style type='text/css'>
			#dolly {
				float: $x;
				padding-$x: 15px;
				padding-top: 5px;
				margin: 0;
				font-size: 11px;
			}
			</style>
		";
	}
}

/* Make a global to store our new class so that other plugins can access and modify it */
global $hellodolly;
$hellodolly = new Hello_Dolly();
