<div class="ResourceList-content Scrollable">
	<div id="resource-list-warapper" class="Scrollable-wrapper" ng-cloak>
		<ul ng-show="list.length>0" class="List Scrollable-scrolled" infinite-scroll-container="'#resource-list-warapper'" infinite-scroll="more()">
			<li ng-repeat="item in list" class="List-element">
				<?php include(get_template_directory().'/resource.php'); ?>
			</li>
		</ul>
		<div ng-hide="list.length>0" class="List-empty Scrollable-scrolled">
			<h5 class="List-emptyLabel">Brak wyników dla zaznaczonych zagadnień.</h5>
		</div>
	</div>
</div>	