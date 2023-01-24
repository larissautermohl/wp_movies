<?php
add_shortcode('popular_movies', 'popular_movies_shortcode');

function popular_movies_shortcode()
{
	$html = "";
	$html .= get_upcoming_movies();

	return $html;
}


function get_upcoming_movies()
{
	$response = wp_remote_get('https://api.themoviedb.org/3/movie/upcoming?api_key=71f33b88b896618dcb506ae62cd23758&language=en-US&page=1');
	$data = json_decode(wp_remote_retrieve_body($response), true);
	$html = '
<h1>Upcomings movies</h1>
<div class="container">';

	foreach ($data['results'] as $key => $movie) {
		$html .= '
	<div class="row position-relative mb-5">
		<div class="col-5">
			<img src="https://image.tmdb.org/t/p/w500' . $movie['backdrop_path'] . ' "  alt="$nome poster"/>
		</div>
		<div class="col-7">
			<h1 class=" text-center">' . $movie['original_title'] . '</h1>
			<p>' . $movie['original_title'] . '</p>
			<p>' . $movie['overview'] . '</p>
			<p>Release date: ' . $movie['release_date'] . '</p>
			<a href="http://localhost/wp_movies/index.php/movie/?id=' . $movie["id"] . '" class="stretched-link"></a>
		</div>
	</div>';
		if ($key > 8) {
			break;
		}
	}
	$html .= '</div>';
	return $html;
}

function get_popular_actors()
{

}