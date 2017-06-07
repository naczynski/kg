<?php 

	if(Angular::wrap())
		return; 

	Angular::params([
        'application' => 'NotFound',
        'popupless' => true
    ]);
?>

<body layout="column" ng-controller="NotFoundCtrl">
	<main flex layout="column" class="blue white-text" layout-align="center center" flex-auto>
		<div layout-margin>
			<h2 layout-margin class="center">404</h2>
			<h4 layout-margin class="center">Strony nie odnaleziono</h4>
		</div>
		<img id="not-found-book" hide show-gt-md src="<?= the_svg_asset_uri('book') ?>" width="100%" height="100%">
	</main>
</body>