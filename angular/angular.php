<!doctype html>
<html lang="pl" ng-app="<?= ($koda_angular_params['application']); ?>">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?php //wp_head(); ?>

		<title><?php the_title()?> - Knowledge Garden</title>

		<style>[ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {display: none !important;}</style>
		
		<meta http-equiv="cache-control" content="max-age=0" />
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="expires" content="0" />
		<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
		<meta http-equiv="pragma" content="no-cache" />

		<link rel="Shortcut icon" href="<?=get_template_directory_uri(); ?>/assets/favicon.ico" />	
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="css/main.css">
	</head>

	<?php 
		function koda_angular_wrap_template($koda_angular_content,$koda_angular_template_params){
			include(dirname(__FILE__).'/templates/'.$koda_angular_template_params['name'].'.php');
		}

		if(array_key_exists('template', $koda_angular_params)){
			koda_angular_wrap_template($koda_angular_content,$koda_angular_params['template']);
		}else {
			echo $koda_angular_content;
		}
	?>

</html>