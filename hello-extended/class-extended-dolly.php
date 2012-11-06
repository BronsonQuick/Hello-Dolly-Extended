<?php
/* Let's extend the the Hello_Dolly class we made when we modified Matt's original plugin.
* By doing this we have access to all the functionality in that class and can override the original functions as required
*/

class Hello_Dolly_Extended extends Hello_Dolly {

	/* We want to replace the lyrics in Hello Dolly with a song called "Bye Bye Blues" by Fred Hamm, Dave Bennett, Bert Lown, and Chauncey Gray
	* To do this all we have to do is declare the hello_dolly_get_lyric function again and add our new lyrics
	*/
	public function get_lyric() {
	$lyrics = "Bye bye blues.... bye bye blues
Bells ring.... birds sing
Sun is shin-in'.... no more pin-in'
Just we two...smil-in' through
Don't sigh....don't cry
Bye bye blues
Bye bye blues....I'm sayin' bye bye blues
Bells will ring and birds all sing
Stop your mope-in', keep on hope-in'
You and me....can't you see
Now don't you sigh.....and don't you cry
Bye bye blues";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[mt_rand( 0, count( $lyrics ) - 1 )] );
	}
}
/* Make our extended class global so that another plugin developer could extend and modify our plugin as well */
global $hellodollyextended;
$hellodollyextended = new Hello_Dolly_Extended();