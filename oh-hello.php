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
	public function __construct(){
		add_action( 'admin_notices' , array( $this, 'hello_dolly' ) );
		add_action( 'admin_head' , array( $this, 'dolly_css') );
	}

	public function hello_dolly_get_lyric() {
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
		return wptexturize( $lyrics[mt_rand( 0, count( $lyrics ) - 1 )] );
	}

	// returns the chosen line
	public function get_hello_dolly() {
		/* The '$this' refers to the class that's currently in use */
		$chosen = $this->hello_dolly_get_lyric();
		return "<p id='dolly'>$chosen</p>";
	}

	// This just echoes the chosen line, we'll position it later
	public function hello_dolly() {
		/* The '$this' refers to the class that's currently in use */
		echo $this->get_hello_dolly();
	}

	// We need some CSS to position the paragraph, returns the css
	public function get_dolly_css() {
		// This makes sure that the positioning is also good for right-to-left languages
		$x = is_rtl() ? 'left' : 'right';

		return "
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

	// We need some CSS to position the paragraph, echoes the css
	public function dolly_css() {
		echo $this->get_dolly_css();
	}

}
/* Make a global to store our new class so that other plugins can access and modify it */
global $hellodolly;
$hellodolly = new Hello_Dolly();