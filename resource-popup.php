<?php
	$active_subscription = KG_get_curr_user()->get_current_subscription();
	$free_resources_remaining = $active_subscription ? $active_subscription->get_status()['free_resources_remaining'] : 0;
?>

<div class="PresentSelector" ng-controller="ResourcePopupCtrl" ng-show="visible" ng-cloak ng-click="hide()">
	<div class="PresentSelector-popupContainer">
		<div class="PresentSelector-background"></div>
		<div class="PresentSelector-popup PresentSelector-popup--resourcePopup Scrollable">
			<div class="Scrollable-wrapper" layout="column">
				<div class="Scrollable-scrolled" flex layout="column" layout-align="center center">
					<div class="container" layout-align="center center" layout="column" ng-if="item" ng-click="$event.stopPropagation()">
						<?php get_template_part('resource'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
