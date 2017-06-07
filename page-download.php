<?php 

	if(Angular::wrap())
		return; 

	Angular::params([
		'application' => 'Dummy',
		'popupless' => true
	]);
?>


<body layout="Layout-body" ng-controller="DummyCtrl">
	<div class="Layout-content">
		<main class="white-text red Layout-main" layout="column" layout-align="center center" id="accessdeined">
			<h4 layout-padding layout-margin>NIE MASZ DOSTĘPU DO TEGO ZASOBU.</h4>
			<a layout-margin class="Button red-text text-accent-4  waves-red white" href="/">WEJDŹ DO KNOWLEDGE GARDEN</a>
		</main>
	</div>
</body>
