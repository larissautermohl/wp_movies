<?php
add_shortcode( 'movie_info', 'movie_info_shortcode' );

function parameter_queryvars( $qvars ) {
	$qvars[] = 'yourvarname';

	return $qvars;
}

function movie_info_shortcode() {

	$movieid      = $_GET['id'];
	$details_data = get_movie_details( $movieid );


	$nome     = $details_data['original_title'];
	$poster   = $details_data['poster_path'];
	$overview = $details_data['overview'];

//	echo '<pre>' . var_export( $movieid, true ) . '</pre>';
//	echo '<pre>' . var_export( $details_data, true ) . '</pre>';

	$html = '<div class="container">
  <div class="row">
    <div class="col-5">
      <img src="https://image.tmdb.org/t/p/w500' . $poster . ' "  alt="$nome poster"/>
    </div>
    <div class="col-7">
    <h1 class=" text-center">' . $nome . '</h1>
      <p>' . $overview . '</p>
      <p>Release date: ' . $details_data['release_date'] . '</p>
      <p>Genres: ';
	foreach ( $details_data['genres'] as $key => $genero ) {
		$html .= "$genero[name], ";
	}
	$html .=
		'</p>
    </div>
  </div>
</div>';


	$html .= get_movie_videos($movieid);
	$html .= get_movie_credits($movieid);

	return $html;
}


function get_movie_details( string $movieID ) {
	$details = wp_remote_get( 'https://api.themoviedb.org/3/movie/' . $movieID . '?api_key=71f33b88b896618dcb506ae62cd23758&language=en-US' );

	return json_decode( wp_remote_retrieve_body( $details ), true );
}

function get_movie_credits( string $movieID ) {
	$details        = wp_remote_get( 'https://api.themoviedb.org/3/movie/' . $movieID . '/credits?api_key=71f33b88b896618dcb506ae62cd23758&language=en-US' );
	$credit_details = json_decode( wp_remote_retrieve_body( $details ), true );
	$html           = '		<section id="cast">
		<h2 class="mt-5">Movie Cast</h2>
		<div class="container text-center">
  <div class="row">
  ';
	foreach ( $credit_details['cast'] as $key => $actor ) {


		if ( $actor["profile_path"] != '' ) {
			$html .= '

<div class="actor card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://image.tmdb.org/t/p/w185' . $actor["profile_path"] . '" class="img-fluid rounded-start" alt="' . $actor["name"] . '">
    </div>
    <div class="col-md-8">
      <div class="card-body pt-5">
        <h5 class="card-title">' . $actor["name"] . '</h5>
        <p class="card-text">as</p>
         <a href="?page_id=41&id=' . $actor["id"] . '" class=" stretched-link"></a>
        <h5 class="card-title">' . $actor["character"] . '</h5>
      </div>
    </div>
  </div>
</div>

		';
		}
	}
	$html .= '</div>
  	</div>
  </section>';

	return $html;
}


function get_movie_videos( string $movieID ) {
	$details       = wp_remote_get( 'https://api.themoviedb.org/3/movie/' . $movieID . '/videos?api_key=71f33b88b896618dcb506ae62cd23758&language=en-US' );
	$video_details = json_decode( wp_remote_retrieve_body( $details ), true );
	$html          = '
<script>
	function autoPlayYouTubeModal(videoID) {
	    $("#movie-frame").attr("src", "https://www.youtube.com/embed/"+videoID+"?autoplay=1");
		$("#videoModal").on("hidden.bs.modal", function(e) {
			$("#movie-frame").attr("src", "");
		});
	}
</script>
<section class="content videos">
<h1 class="mt-5">Trailers</h1>
<div class="modal fade" id="videoModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" id="close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="ratio ratio-16x9">
          <iframe id="movie-frame" width="1280" height="720"  src="" allow="autoplay;" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</div>';

	foreach ( $video_details['results'] as $key => $value ) {
		if ( $value['site'] == 'YouTube' && $value['type'] == 'Trailer' ) {
			$videoId = $value['key'];
			$html    .= '<button onclick="autoPlayYouTubeModal(this.id)" data-bs-toggle="modal" data-bs-target="#videoModal" id="' . $videoId . '">Trailer</button>';
		}
	}
	$html .= "</section>";

	return $html;
}




















