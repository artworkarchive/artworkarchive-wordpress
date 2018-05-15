<!--
//
//base styles and fonts
//
-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Magra" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Varela" rel="stylesheet">

<?php
//---------------------
//header information
//---------------------
/**
	Plugin Name: Artwork Archive Artist's Gallery Plugin
	Plugin URI: https://github.com/artworkarchive/aa_wp_plugin
	Description: Artwork Archive wordpress plugin which lets the user to pull down public data, including user's public pieces as well as user's public general information
	Version: 1.1.2
	Author: Artwork Archive (John Feustel & Jonathan Barquero)
	Author URI: http://www.artworkarchive.com/
    License: GPLv2 or later
	Text Domain: artwork-archive-gallery
	
	Copyright 2018  Smash Balloon LLC (email : hey@smashballoon.com)
	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

//---------------------------------------------------------------
//includes php required files
//---------------------------------------------------------------
require_once("api_helper.php");

//[artworkarchive_public_profile user_slug="sophia-rouhana"]
function get_user_public_gallery($atts){
    $a = shortcode_atts( array(
        'user_slug' => 'artwork-archive-artist-slug-name-here'
    ), $atts );

    $user_slug = $a['user_slug'];

	echo ArtworkArchiveApiHelper::generate_public_pieces_modal_popups($user_slug);
    echo ArtworkArchiveApiHelper::get_user_public_pieces_information($user_slug);
}

//---------------------------------------------------------------
// Hook our plugin functions to WordPress Event
// Set that function up to execute when the admin_notices action is called
//---------------------------------------------------------------
add_shortcode('artworkarchive_artist_gallery', 'get_user_public_gallery' );

//---------------------------------------------------------------
// Hooks for local css styles
//---------------------------------------------------------------
wp_enqueue_style( 'wp-aa-style', plugin_dir_url( __FILE__ ) . 'css/wp-aa-style.css',false,'1.1','all');
wp_enqueue_style( 'wp-aa-modal', plugin_dir_url( __FILE__ ) . 'css/wp-aa-modal.css',false,'1.1','all');


/*

//---------------------------------------------------------------
//Hardcode Localhost Test comment#1
//---------------------------------------------------------------
echo ArtworkArchiveApiHelper::generate_public_pieces_modal_popups('sophia-rouhana');
echo ArtworkArchiveApiHelper::get_user_public_pieces_information('sophia-rouhana');

*/
?>

<!--//Hardcode Test comment#2-->

<!--

<link href="http://public.aeonitgroup.com/aeon/artworkarchive/aa20-wp-plugin/css/wp-aa-style.css" rel="stylesheet">
<link href="http://public.aeonitgroup.com/aeon/artworkarchive/aa20-wp-plugin/css/wp-aa-modal.css" rel="stylesheet">

-->