<?php
/*
Plugin Name: Plugin Boilerplate
Plugin URI: http://www.AndreasHegenbarth.de
Description: Wordpress Plugin Boilerplate.
Author: Andreas Hegenbarth
Author URI: http://www.AndreasHegenbarth.de
Version: 1.0
License: GNU GPL v2
Min WP Version: 3.0
Max WP Version: 5.0
*/
?>

<?php
$url = plugin_dir_url( __FILE__ );


function ah_get_foodata() {

	$foo = array (
		'wert1',
		'wert2',
    'wert3'
	);

	return wptexturize( $foo[1] );
}


/* Action Hook */
function ah_header_foo( ) {
	echo '  <p><small>' . ah_get_foodata() . '</small></p> <div id="foo"> </div>';
}
function ah_scripts_with_jquery()
{
    // Register the script like this for a plugin:
    wp_register_script( 'custom-script', plugins_url( 'public/js/location-maps-public.js', __FILE__ ), array( 'jquery' ) );
    //wp_register_script( 'custom-script', plugins_url( '/js/custom-script.js', __FILE__ ), array( 'jquery' ) );
    wp_register_script( 'googleapi', 'http://AndreasHegenbarth.de/foo.js', ( 'jquery' ), false, false );
    // or
    // Register the script like this for a theme:
    //wp_register_script( 'custom-script', get_template_directory_uri() . '/js/custom-script.js', array( 'jquery' ) );

    // For either a plugin or a theme, you can then enqueue the script:
   wp_enqueue_script( 'googleapi' );
  wp_enqueue_script( 'custom-script' );

}
add_action( 'wp_enqueue_scripts', 'ah_scripts_with_jquery' );
add_action('wp_footer', 'ah_header_foo');



/* Filter Hook
function mq_content_filter($content) {
	$quote = "<p>" . mq_get_quote() . "</p>";
	$content = $content . $quote;
	return $content;
}
add_filter('the_content', 'mq_content_filter');
*/
?>
