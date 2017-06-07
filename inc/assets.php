<?php 
	
	function get_asset_directory_uri(){
		return get_template_directory_uri().'/assets/';
	}

	function get_svg_asset_directory_uri(){
		return get_asset_directory_uri().'svg/';
	}

	function get_asset_uri($name){
		return get_asset_directory_uri().$name;
	}

	function the_asset_uri($name){
		echo get_asset_uri($name);
	}

	function get_svg_asset_uri($name){
		return get_svg_asset_directory_uri().$name.'.svg';
	}

	function the_svg_asset_uri($name){
		echo get_svg_asset_uri($name);
	}

	function the_svg_asset($name){
		echo file_get_contents(get_template_directory().'/assets/svg/'.$name.'.svg');
	}

?>
