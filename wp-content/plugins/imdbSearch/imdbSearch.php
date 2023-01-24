<?php
/*
 * Plugin Name: IMDB Plugin
 * Description: Consumes data from a REST API and displays it on the website
 */


// Make the request to the API
//function get_api_data() {
//	$response = wp_remote_get( 'https://api.themoviedb.org/3/movie/tt0499549?api_key=71f33b88b896618dcb506ae62cd23758&language=en-US' );
//	$data = json_decode( wp_remote_retrieve_body( $response ) );
//	return $data;
//}

// Display the data on the website
//function display_api_data() {
//	$response = wp_remote_get( 'https://api.themoviedb.org/3/movie/tt0499549?api_key=71f33b88b896618dcb506ae62cd23758&language=en-US' );
//	$data = json_decode( wp_remote_retrieve_body( $response ) );
//	echo '<h1>oiiii genteeee</h1>';
//	var_dump($data);
//}

// Hook the display function to a WordPress action
//add_action( 'init', 'display_api_data' );
if (!defined('ABSPATH')) {
	die;
}


require_once plugin_dir_path(__FILE__) . '/includes/imdbSearch_upcomingMovies_shortcode.php';
require_once plugin_dir_path(__FILE__) . '/includes/imdbSearch_movieDetail_shortcode.php';