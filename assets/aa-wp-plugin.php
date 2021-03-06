<?php
//---------------------------------------------------------------
// Hook our plugin functions to WordPress Event
// Set that function up to execute when the admin_notices action is called
//---------------------------------------------------------------
add_shortcode('artworkarchive_portfolio_embed', 'get_user_public_gallery' );

//---------------------------------------------------------------
// Do work (all HTML binding and events for pagination control are handled by javascript code)
//---------------------------------------------------------------
//[artworkarchive_public_profile user_slug="sophia-rouhana"]
function get_user_public_gallery($atts){
    $a = shortcode_atts( array(
        'user_slug' => 'artwork-archive-artist-slug-name-here'
    ), $atts );

    $user_slug = $a['user_slug'];

	$js_script =  
	'<script type="text/javascript">
	jQuery(document).ready(function() {
		onPageLoad("'.$user_slug.'");
	});
	</script>';

	$html = '
	<!-- Artwork Archive WordPress Plugin Base Layout -->
	
	<!-- Gallery -->
	<div class="aawp-plugin-container">
		<input id="selected_page" type="hidden" value="1">
		<div id="main_loader" class="aawp-loader" style="display: none;"></div>
		<!-- HTML Created On Runtime -->
		<div id="aawp-data-section"></div>
		<div id="aawp-pieces-section" class="aawp-pieces-section aawp-clearfix" data-columns></div>
		<!-- Pagination control -->
		<div id="aawp-pagination-section" class="aawp-pagination"></div>
		<!-- Pagination Helper -->
		<input id="aawp-user-slug" type="hidden" value=""/>
	</div>

	<div class="aawp-plugin-footer">
		Powered by <a href="https://www.artworkarchive.com/" target="_blank">Artwork Archive</a>
	</div>';

	echo $html.$js_script;
}